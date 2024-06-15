<?php

require_once 'init.php';

use app\controllers\CalcCtrl;
use app\controllers\LoginCtrl;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Sprawdź, czy użytkownik jest zalogowany
$user = isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;

$action = isset($_GET['action']) ? $_GET['action'] : 'calc';

if (!isset($user) && $action != 'login') {
    $ctrl = new LoginCtrl();
    $ctrl->generateView();
} else {
    switch ($action) {
        case 'calc':
            $ctrl = new CalcCtrl();
            $ctrl->process();
            break;
        case 'login':
            $ctrl = new LoginCtrl();
            $ctrl->doLogin();
            break;
        case 'logout':
            $ctrl = new LoginCtrl();
            $ctrl->doLogout();
            break;
        default:
            $ctrl = new CalcCtrl();
            $ctrl->process();
            break;
    }
}
