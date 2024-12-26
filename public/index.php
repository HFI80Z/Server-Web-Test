<?php
// public/index.php

// 1) ACTIVER L'AFFICHAGE DES ERREURS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2) CHARGER L'AUTLOAD
require_once __DIR__ . '/../vendor/autoload.php'; 

// 3) NAMESPACES
use App\Controllers\MainController;
use App\Controllers\CatalogController;

// 4) ROUTING
$controllerName = filter_input(INPUT_GET, 'controller') ?? 'main';
$methodName = filter_input(INPUT_GET, 'method') ?? 'home';

$controllerName = ucfirst(strtolower($controllerName)) . 'Controller';
$fullyQualifiedControllerName = 'App\\Controllers\\' . $controllerName;

if (class_exists($fullyQualifiedControllerName)) {
    $controller = new $fullyQualifiedControllerName();

    if (method_exists($controller, $methodName)) {
        $controller->$methodName();
    } else {
        http_response_code(404);
        echo "Erreur 404 : La méthode '$methodName' n'existe pas dans $controllerName.";
    }
} else {
    http_response_code(404);
    echo "Erreur 404 : Le contrôleur '$controllerName' est introuvable.";
}
