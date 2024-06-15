<?php
require_once 'config.php';
require_once 'lib/smarty/Smarty.class.php';
require_once 'controllers/CalcController.php';

session_start();


$action = isset($_GET['action']) ? $_GET['action'] : 'home';


function checkAccess() {

    return true;
}

if (!checkAccess()) {
    die('Brak dostępu');
}

switch ($action) {
    case 'calc':
        $controller = new CalcController();
        $controller->calc();
        break;
    case 'home':
    default:
        $smarty = new Smarty();
        $smarty->display('templates/main.html');
        break;
}
?>
