<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;
    private $records;
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        try {
            // Pobierz użytkowników wraz z rolami
            $record = App::getDB()->get("accounts", [
                "[><]accroles" => ["idAccount" => "acc_idAccount"],
                "[><]roles"    => ["accroles.roles_idRole" => "idRole"]
            ], [
                "accounts.idAccount",  // dodaj ID
                "accounts.accLogin",
                "accounts.accPass",
                "accounts.accIsActive",
                "roles.roleName"
            ], [
                "accLogin" => $this->form->login
            ]);
               
            // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        if(!empty($record['roleName'])){
            $this->form->role = $record['roleName'];
        }
    
         // test hasla
       if ($record && password_verify($this->form->pass, $record['accPass']) && $record['accIsActive'] == 1) {
        RoleUtils::addRole($record['roleName']);
        
        // Zapisz login i ID w sesji
        $_SESSION['user'] = [
            'id' => $record['idAccount'],  // Musisz dołączyć idAccount w zapytaniu SQL
            'login' => $record['accLogin'],
            'role' => $record['roleName']
        ];
    } else {
        Utils::addErrorMessage('Niepoprawny login lub hasło');
    }

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            switch($this->form->role){
                case 'admin':  App::getRouter()->redirectTo("adminPanel");
                    break;
                case 'pracownik':  App::getRouter()->redirectTo("workerPanel");
                    break;
                default:  App::getRouter()->redirectTo("roomList");
                    break;
            }
        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }

    public function action_logout() {
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo('roomList');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('LoginView.tpl');
    }

}
