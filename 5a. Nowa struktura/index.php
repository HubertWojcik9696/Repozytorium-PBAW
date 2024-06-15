<?php
require_once 'init.php';
require_once 'controllers/CalcController.php';

// Ustalanie akcji użytkownika
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

// Bezpieczeństwo - sprawdzanie dostępu
function checkAccess() {
    // Tutaj można dodać logikę ochrony dostępu, np. sprawdzanie sesji użytkownika
    return true;
}

if (!checkAccess()) {
    die('Brak dostępu');
}

// Upewnij się, że zmienna $smarty jest globalna
global $smarty;

// Wybór kontrolera i metody na podstawie akcji
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
