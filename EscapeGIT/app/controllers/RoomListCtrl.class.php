<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\RoomSearchForm;

class RoomListCtrl {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new RoomSearchForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->room_name = ParamUtils::getFromRequest('sf_roomName');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function action_roomList() {
        // 1. Walidacja danych formularza (z pobraniem)
        $this->validate();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->room_name) && strlen($this->form->room_name) > 0) {
            $search_params['roomName[~]'] = $this->form->room_name . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "roomName";
        //wykonanie zapytania


        try {
            $this->records = App::getDB()->select("rooms", [
                "idRoom",
                "roomName",
                "roomDescription",
                "roomPrice",
                "roomCover",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('rooms', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('RoomList.tpl');
    }

}
