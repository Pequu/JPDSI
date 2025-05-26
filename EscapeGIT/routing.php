<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('roomList'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('roomList',    'RoomListCtrl');
Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('toggleUserActive', 'AdminPanelCtrl', ['admin']);
Utils::addRoute('adminPanelEdit',  'AdminPanelCtrl', ['admin']);
Utils::addRoute('adminPanel',      'AdminPanelCtrl', ['admin']);
Utils::addRoute('updateUserRole',  'AdminPanelCtrl', ['admin']);
Utils::addRoute('deleteUserRole',  'AdminPanelCtrl', ['admin']);
Utils::addRoute('personNew',     'PersonEditCtrl',	['admin']);
Utils::addRoute('personEdit',    'PersonEditCtrl',	['admin']);
Utils::addRoute('personSave',    'PersonEditCtrl',	['admin']);
Utils::addRoute('personDelete',  'PersonEditCtrl',	['admin']);