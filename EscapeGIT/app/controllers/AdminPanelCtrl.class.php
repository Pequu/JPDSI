<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;

class AdminPanelCtrl {

    public function action_adminPanel() {
        $this->action_adminPanelEdit();
    }

    public function action_adminPanelEdit() {
        try {
            // Pobierz użytkowników wraz z rolami
            $usersWithRoles = App::getDB()->select("accounts", [
                "[><]accroles" => ["idAccount" => "acc_idAccount"],
                "[><]roles"    => ["accroles.roles_idRole" => "idRole"]
            ], [
                "accounts.idAccount",
                "accounts.accName",
                "accounts.accSurname",
                "accounts.accBirthDate",
                "accounts.accLogin",
                "accounts.accIsActive",
                "accounts.accDeletion",
                "roles.roleName",
                "roles.idRole"
            ]);

            // Pobierz wszystkich użytkowników (do selecta)
            $users = App::getDB()->select("accounts", ["idAccount", "accName"]);

            // Pobierz dostępne role (do selecta)
            $roles = App::getDB()->select("roles", ["idRole", "roleName"]);

            App::getSmarty()->assign("users_with_roles", $usersWithRoles);
            App::getSmarty()->assign("users", $users);
            App::getSmarty()->assign("roles", $roles);

        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas pobierania danych z bazy.");
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->display("AdminPanel.tpl");
    }

    public function action_addUserRole() {
        $userId = ParamUtils::getFromRequest('user_id');
        $roleId = ParamUtils::getFromRequest('role_id');

        if (!$userId || !$roleId) {
            Utils::addErrorMessage("Brak danych do przypisania roli.");
            App::getRouter()->forwardTo("adminPanelEdit");
            return;
        }

        try {
            App::getDB()->insert("accroles", [
                "acc_idAccount" => $userId,
                "roles_idRole" => $roleId
            ]);
            Utils::addInfoMessage("Rola została przypisana użytkownikowi.");
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas przypisywania roli.");
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getRouter()->forwardTo("adminPanelEdit");
    }

    public function action_updateUserRole() {
        $userId = ParamUtils::getFromRequest('user_id');
        $newRoleId = ParamUtils::getFromRequest('role_id');

        if (!$userId || !$newRoleId) {
            Utils::addErrorMessage("Brak danych do aktualizacji roli.");
            App::getRouter()->forwardTo("adminPanelEdit");
            return;
        }

        try {
            App::getDB()->update("accroles", [
                "roles_idRole" => $newRoleId
            ], [
                "acc_idAccount" => $userId
            ]);
            Utils::addInfoMessage("Rola użytkownika została zaktualizowana.");
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas aktualizacji roli.");
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getRouter()->forwardTo("adminPanelEdit");
    }

    public function action_toggleUserActive() {
        $userId = ParamUtils::getFromRequest('user_id');

        if (!$userId) {
            Utils::addErrorMessage("Brak ID użytkownika.");
            App::getRouter()->forwardTo("adminPanelEdit");
            return;
        }

        try {
            $currentStatus = App::getDB()->get("accounts", "accIsActive", ["idAccount" => $userId]);
            $newStatus = $currentStatus ? 0 : 1;

            $updateData = ["accIsActive" => $newStatus];
            if ($newStatus === 0) {
                $updateData["accDeletion"] = date('Y-m-d');
            } else {
                $updateData["accDeletion"] = null;
            }

            App::getDB()->update("accounts", $updateData, [
                "idAccount" => $userId
            ]);

            Utils::addInfoMessage("Status aktywności użytkownika został zmieniony.");
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas zmiany statusu aktywności użytkownika.");
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getRouter()->forwardTo("adminPanelEdit");
    }
}
