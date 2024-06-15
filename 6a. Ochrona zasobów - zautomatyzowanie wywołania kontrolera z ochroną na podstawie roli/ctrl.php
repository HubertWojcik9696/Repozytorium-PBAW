<?php

require_once 'init.php';

use app\controllers\LoginCtrl;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = isset($_GET['action']) ? $_GET['action'] : 'calc';
$role = isset($_GET['role']) ? $_GET['role'] : null;

// Sprawdź, czy użytkownik jest zalogowany i czy ma odpowiednią rolę
$userRole = getUserRole();
if (!isUserLoggedIn() && $action != 'login') {
    $ctrl = new LoginCtrl();
    $ctrl->generateView();
} else if ($role && $userRole !== $role) {
    echo "Brak uprawnień do wykonania tej akcji";
    exit();
} else {
    try {
        $controllerName = ucfirst($action);
        callController($controllerName);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
