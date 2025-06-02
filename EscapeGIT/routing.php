<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('roomList'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('roomList',    'RoomListCtrl');
Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('registerShow',      'RegisterCtrl');
Utils::addRoute('register',      'RegisterCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('workerPanelEdit',  'workerPanelCtrl', ['pracownik']);
Utils::addRoute('workerPanel',      'workerPanelCtrl', ['pracownik']);
Utils::addRoute('toggleResActive',  'workerPanelCtrl',  ['pracownik']);
Utils::addRoute('workerPanel', 'WorkerPanelCtrl', ['pracownik'], 'workerPanel/:page?');
Utils::addRoute('toggleUserActive', 'AdminPanelCtrl', ['admin']);
Utils::addRoute('adminPanelEdit',  'AdminPanelCtrl', ['admin']);
Utils::addRoute('adminPanel',      'AdminPanelCtrl', ['admin']);
Utils::addRoute('updateUserRole',  'AdminPanelCtrl', ['admin']);
Utils::addRoute('deleteUserRole',  'AdminPanelCtrl', ['admin']);
Utils::addRoute('personNew',     'RoomReservationCtrl',	['klient']);
Utils::addRoute('roomReservation',    'RoomReservationCtrl',	['klient']);
Utils::addRoute('roomReservationShow',    'RoomReservationCtrl',	['klient']);
Utils::addRoute('personDelete',  'RoomReservationCtrl',	['klient']);