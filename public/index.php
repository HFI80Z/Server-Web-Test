<?php
// public/index.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../autoload.php';  // charge vendor/autoload.php

use App\Controllers\MainController;
use App\Controllers\CatalogController;

// On récupère l'URL demandée pour savoir quel contrôleur appeler
// Ex: http://localhost:8888/?controller=main&method=home
$controllerName = filter_input(INPUT_GET, 'controller') ?? 'main';
$methodName     = filter_input(INPUT_GET, 'method') ?? 'home';

$controllerName = ucfirst(strtolower($controllerName)) . 'Controller'; 
// ex: 'MainController'
$fullyQualifiedControllerName = "App\\Controllers\\{$controllerName}";

// Vérification que la classe existe
if (class_exists($fullyQualifiedControllerName)) {
    $controller = new $fullyQualifiedControllerName();
    // Vérifier que la méthode existe
    if (method_exists($controller, $methodName)) {
        $controller->$methodName();
    } else {
        http_response_code(404);
        echo "Méthode inconnue : $methodName";
    }
} else {
    http_response_code(404);
    echo "Contrôleur inconnu : $controllerName";
}