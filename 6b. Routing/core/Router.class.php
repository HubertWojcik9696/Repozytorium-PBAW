<?php

namespace core;

class Router {
    private $routes = [];

    public function addRoute($action, $controller, $role = null) {
        $this->routes[$action] = ['controller' => $controller, 'role' => $role];
    }

    public function dispatch($action) {
        if (isset($this->routes[$action])) {
            $route = $this->routes[$action];

            if ($route['role'] && getUserRole() !== $route['role']) {
                echo "Brak uprawnień do wykonania tej akcji";
                exit();
            }

            $controllerName = "app\\controllers\\" . $route['controller'] . "Ctrl";
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, 'index')) {
                    $controller->index();
                } else {
                    throw new Exception("Method 'index' not found in controller {$controllerName}");
                }
            } else {
                throw new Exception("Controller {$controllerName} not found");
            }
        } else {
            throw new Exception("No route defined for action '{$action}'");
        }
    }
}
