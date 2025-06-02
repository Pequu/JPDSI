<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\RoomReservationForm;

class RoomReservationCtrl {

    private $form;

    public function __construct() {
        $this->form = new RoomReservationForm();
    }

    // Walidacja przesłanych danych formularza rezerwacji
    public function validate() {
    $this->form->date = ParamUtils::getFromRequest('date', true, 'Błędne wywołanie aplikacji');
    $this->form->id = ParamUtils::getFromRequest('id', true, 'Brak pokoju w formularzu');
    $this->form->voucher_code = ParamUtils::getFromRequest('voucher_code');
    $this->form->pay = ParamUtils::getFromRequest('pay');

    if (App::getMessages()->isError()) return false;

    if (empty(trim($this->form->date))) {
        Utils::addErrorMessage('Wprowadź datę rezerwacji!');
    }

    $validator = new Validator();
    if (!$validator->validate($this->form->date, 'date')) {
        Utils::addErrorMessage('Niepoprawny format daty!');
    }

    if ($this->form->date < date('Y-m-d')) {
        Utils::addErrorMessage('Data nie może być w przeszłości!');
    }

    if (!App::getDB()->has('rooms', ['idRoom' => $this->form->id])) {
        Utils::addErrorMessage('Wybrany pokój nie istnieje.');
    }

    $conflict = App::getDB()->has('reservations', [
        'resDate' => $this->form->date,
        'rooms_idRoom' => $this->form->id
    ]);

    if ($conflict) {
        Utils::addErrorMessage('Pokój jest już zarezerwowany w wybranym dniu.');
    }

    // Walidacja vouchera (jeśli podany)
    $voucher = null;
    if (!empty(trim($this->form->voucher_code))) {
        $voucher = $this->validateVoucher();
        if (!$voucher) {
            // błąd jest dodany w validateVoucher()
        }
    }

    return !App::getMessages()->isError();
}

    // Pobranie ID pokoju z adresu URL
    public function validateID() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    private function validateVoucher() {
    if (empty(trim($this->form->voucher_code))) {
        return null; // voucher nie jest obowiązkowy
    }

    // Szukamy aktywnego vouchera
    $voucher = App::getDB()->get('vouchers', '*', [
        'voName' => $this->form->voucher_code,
        'voIsActive' => 1
    ]);

    if (!$voucher) {
        Utils::addErrorMessage('Nie znaleziono aktywnego vouchera o podanym kodzie.');
        return null;
    }

    // Sprawdź czy voucher był już użyty
    $usedReservation = App::getDB()->get('reservations', [
        'resDate'
    ], [
        'vouchers_idVoucher' => $voucher['idVoucher']
    ]);

    if ($usedReservation) {
        // Jeśli rezerwacja z tym voucherem jest w przyszłości lub dziś — nie pozwalaj
        if ($usedReservation['resDate'] >= date('Y-m-d')) {
            Utils::addErrorMessage('Voucher został już użyty i nie może być ponownie użyty.');
            return null;
        }
        // Jeśli rezerwacja była w przeszłości – pozwól użyć ponownie
    }

    return $voucher;
}


    // Wyświetlenie formularza rezerwacji pokoju
    public function action_roomReservationShow() {
        if ($this->validateID()) {
            try {
                $room = App::getDB()->get('rooms', [
                    'roomName',
                    'roomDescription',
                    'roomPrice'
                ], [
                    'idRoom' => $this->form->id
                ]);

                if (!$room) {
                    Utils::addErrorMessage('Pokój nie został znaleziony.');
                    App::getRouter()->redirectTo('roomList');
                }

                $this->form->name = $room['roomName'];
                $this->form->desc = $room['roomDescription'];
                $this->form->price = $room['roomPrice'];

                $this->generateView();

            } catch (\PDOException $e) {
                Utils::addErrorMessage('Błąd podczas pobierania danych pokoju.');
                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
                App::getRouter()->redirectTo('roomList');
            }
        } else {
            App::getRouter()->redirectTo('roomList');
        }
    }

    // Obsługa zapisu rezerwacji po wysłaniu formularza
    public function action_roomReservation() {

    if ($this->validate()) {
        try {
            // Pobierz cenę pokoju z bazy
            $roomPrice = App::getDB()->get("rooms", "roomPrice", ["idRoom" => $this->form->id]);
            $finalPrice = $roomPrice;

            // Sprawdź voucher i oblicz cenę po rabacie, jeśli jest
            $voucherId = null;
            if (!empty(trim($this->form->voucher_code))) {
                $voucher = App::getDB()->get('vouchers', '*', [
                    'voName' => $this->form->voucher_code,
                    'voIsActive' => 1
                ]);

                if ($voucher) {
                    $voucherId = $voucher['idVoucher'];
                    // Odejmij rabat, ale nie dopuść do wartości ujemnej
                    $finalPrice = max(0, $roomPrice - $voucher['voAmount']);
                }
            }

            $userId = $_SESSION['user']['id'];

            App::getDB()->insert("reservations", [
                "resDate" => $this->form->date,
                "resPrice" => $finalPrice,
                "resIsActive" => 0,
                "resPayment" => $this->form->pay,
                "rooms_idRoom" => $this->form->id,
                "accounts_idAccount" => $userId,
                "vouchers_idVoucher" => $voucherId
            ]);

            Utils::addInfoMessage("Rezerwacja została zapisana.");
            App::getRouter()->redirectTo("roomList");

        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas zapisu rezerwacji.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    }

    $this->generateView();
}


    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('RoomReservation.tpl');
    }
}
