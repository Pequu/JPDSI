<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\WorkerSearchForm;

class WorkerPanelCtrl {
    private $form;
    public function __construct(){
        $this->form = new WorkerSearchForm;
    }

    public function action_workerPanel() {
        $this->action_workerPanelEdit();
    }
    public function validate() {
        $this->form->searchData = ParamUtils::getFromRequest('sf_searchData');
        $this->form->searchCat = ParamUtils::getFromRequest('sf_searchCat', false, 'trim');
        if (empty($this->form->searchCat)) {
            $this->form->searchCat = 'idReservation';
        }
        $this->form->sortCatOpt = ParamUtils::getFromRequest('sf_sortOpt', false, 'trim');
        if (empty($this->form->sortCatOpt)) {
            $this->form->sortCatOpt = 'ASC';
        }


        return !App::getMessages()->isError();
    }

    public function action_workerPanelEdit() {
    $this->validate();

    $search_params = [];
    if (!empty($this->form->searchData)) {
        $search_params['roomName[~]'] = $this->form->searchData . '%';
    }

    $where = [];
    if (!empty($search_params)) {
        $where['AND'] = $search_params;
    }

    try {
        $page = ParamUtils::getFromCleanURL(1, false) ?? 1;
        $page = max(1, intval($page));
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        // Dodaj sortowanie i limit
        $where['ORDER'] = [$this->form->searchCat => $this->form->sortCatOpt];
        $where['LIMIT'] = [$offset, $perPage];

        // Pobierz rekordy
        $records = App::getDB()->select("reservations", [
            "[><]accounts" => ["accounts_idAccount" => "idAccount"],
            "[><]rooms"    => ["rooms_idRoom" => "idRoom"]
        ], [
            "accounts.idAccount",
            "accounts.accName",
            "accounts.accSurname",
            "rooms.roomName",
            "reservations.resPayment",
            "reservations.resDate",
            "reservations.resPrice",
            "reservations.idReservation",
            "reservations.resIsActive"
        ], $where);

        // Liczba wszystkich rekordów do stronicowania
        $countWhere = !empty($search_params) ? ["AND" => $search_params] : [];

        $countRecords = App::getDB()->select("reservations", [
            "[><]rooms" => ["rooms_idRoom" => "idRoom"]
        ], [
            "reservations.idReservation"
        ], $countWhere);

        $total = count($countRecords);

        $totalPages = max(1, ceil($total / $perPage));

    } catch (\PDOException $e) {
        Utils::addErrorMessage("Błąd podczas pobierania danych z bazy.");
        if (App::getConf()->debug) {
            Utils::addErrorMessage($e->getMessage());
        }
        $records = [];
        $page = 1;
        $totalPages = 1;
    }

    // Przekazanie danych do widoku 
    App::getSmarty()->assign("records", $records);
    App::getSmarty()->assign("currentPage", $page);
    App::getSmarty()->assign("totalPages", $totalPages);
    App::getSmarty()->assign('searchForm', $this->form);

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    App::getSmarty()->display("WorkerPanelTable.tpl");
    } else {
        App::getSmarty()->display("WorkerPanel.tpl");
    }

}
        public function action_toggleResActive() {
        $resId = ParamUtils::getFromRequest('res_id');

        if (!$resId) {
            Utils::addErrorMessage("Brak ID rezerwacji.");
            App::getRouter()->forwardTo("workerPanelEdit");
            return;
        }

        try {
             $currentStatus = App::getDB()->get("reservations", "resIsActive", ["idReservation" => $resId]);
            $newStatus = $currentStatus ? 0 : 1;

            $updateData = ["resIsActive" => $newStatus];


            App::getDB()->update("reservations", $updateData, [
                "idReservation" => $resId
            ]);

            Utils::addInfoMessage("Status aktywności rezerwacji został zmieniony.");
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas zmiany statusu aktywności rezerwacji.");
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        App::getRouter()->forwardTo("workerPanelEdit");
    }

}
