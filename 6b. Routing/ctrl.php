<?php

require_once 'init.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = isset($_GET['action']) ? $_GET['action'] : 'calc';

if (!isUserLoggedIn() && $action != 'login') {
    $ctrl = new app\controllers\LoginCtrl();
    $ctrl->generateView();
} else {
    try {
        getRouter()->dispatch($action);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
