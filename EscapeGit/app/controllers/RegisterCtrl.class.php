<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\RegisterForm;

class RegisterCtrl {

    private $form;
    private $records;
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new RegisterForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');
        $this->form->pass2 = ParamUtils::getFromRequest('pass2');
        $this->form->name = ParamUtils::getFromRequest('name');
        $this->form->surname = ParamUtils::getFromRequest('surname');
        $this->form->birth = ParamUtils::getFromRequest('birth');
        $this->form->email = ParamUtils::getFromRequest('email');

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
        if (empty($this->form->name)) {
            Utils::addErrorMessage('Nie podano imienia');
        }
        if (empty($this->form->surname)) {
            Utils::addErrorMessage('Nie podano nazwiska');
        }
        if (empty($this->form->email)) {
            Utils::addErrorMessage('Nie podano email');
        }
        if (empty($this->form->birth)) {
            Utils::addErrorMessage('Nie podano daty urodzenia');
        }
        if (strcmp($this->form->pass, $this->form->pass2)) {
            Utils::addErrorMessage('Hasła się nie zgadzają!');
        }
        if ($this->form->birth >= date('Y-m-d')){
            Utils::addErrorMessage('Data się nie zgadza');
        }

        try {
            // Pobierz użytkowników wraz z rolami
            $record = App::getDB()->get("accounts",[
                "accLogin"
            ],[
                "accLogin" => $this->form->login
                    ]);
            if($record && strcmp($record['accLogin'], $this->form->login) == 0){
                Utils::addErrorMessage("Konto z takim loginem już istnieje!");
                }
            // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;
            try{
                App::getDB()->insert("accounts", [
                "accName" => $this->form->name,
                "accSurname" => $this->form->surname,
                "accBirthDate" => $this->form->birth,
                "accIsActive" => 1,
                "accCreation" => date('Y-m-d H:i:s'),
                "accPass" => password_hash($this->form->pass, PASSWORD_DEFAULT),
                "accLogin" => $this->form->login
            ]);

            $idAccount = App::getDB()->id(); // ID nowo dodanego konta

            $idRole = App::getDB()->get("roles", "idRole", [
                "roleName" => "klient"
            ]);

            App::getDB()->insert("accroles", [
                "acc_idAccount" => $idAccount,
                "roles_idRole" => $idRole
            ]);
            // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas rejestracji');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        Utils::addInfoMessage("Pomyślnie zarejestrowano :D");
        return !App::getMessages()->isError();
    }

    public function action_registerShow() {
        $this->generateView();
    }

    public function action_register() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("roomList");
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
        App::getSmarty()->display('RegisterView.tpl');
    }

}
