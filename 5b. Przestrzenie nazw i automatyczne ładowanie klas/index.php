<?php

require_once 'init.php';

use controllers\CalcController;


$action = isset($_GET['action']) ? $_GET['action'] : 'home';


function checkAccess() {

    return true;
}

if (!checkAccess()) {
    die('Brak dostępu');
}

global $smarty;

switch ($action) {
    case 'calc':
        $controller = new CalcController();
        $controller->calc();
        break;
    case 'home':
    default:
        $smarty->display('main.html');
        break;
}
?>
