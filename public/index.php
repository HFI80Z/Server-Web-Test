<?php

session_start();

require_once '../vendor/autoload.php';

use App\Controllers\CoreController;

$controllerName = ucfirst(strtolower($_GET['controller'] ?? 'main')) . 'Controller';
$methodName = strtolower($_GET['method'] ?? 'home');

$controllerClass = 'App\\Controllers\\' . $controllerName;

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();

    if (method_exists($controller, $methodName)) {
        $controller->$methodName();
    } else {
        http_response_code(404);
        echo "Erreur 404 : La méthode '$methodName' n'existe pas dans le contrôleur '$controllerName'.";
    }
} else {
    http_response_code(404);
    echo "Erreur 404 : Le contrôleur '$controllerName' est introuvable.";
}
