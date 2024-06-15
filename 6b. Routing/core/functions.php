<?php

function callController($controllerName, $actionName = 'index') {
    $controllerClass = "app\\controllers\\{$controllerName}Ctrl";
    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            throw new Exception("Action {$actionName} not found in controller {$controllerClass}");
        }
    } else {
        throw new Exception("Controller {$controllerClass} not found");
    }
}
function getUserRole() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['user']) ? unserialize($_SESSION['user'])->role : null;
}

function isUserInRole($role) {
    return getUserRole() === $role;
}

function isUserLoggedIn() {
    return getUserRole() !== null;
}
function getFromRequest($param_name) {
    return isset($_REQUEST[$param_name]) ? $_REQUEST[$param_name] : null;
}

function redirect($url) {
    header("Location: {$url}");
    exit();
}

function forward($url) {
    include $url;
    exit();
}