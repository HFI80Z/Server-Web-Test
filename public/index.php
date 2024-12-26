<?php
// public/index.php

session_start();

require_once '../vendor/autoload.php';

use App\Controllers\CoreController;

// Récupérer les paramètres GET
$controllerName = ucfirst(strtolower($_GET['controller'] ?? 'main')) . 'Controller';
$methodName = strtolower($_GET['method'] ?? 'home');

// Construire le nom complet du namespace
$controllerClass = 'App\\Controllers\\' . $controllerName;

// Vérifier si la classe existe
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();

    // Vérifier si la méthode existe
    if (method_exists($controller, $methodName)) {
        $controller->$methodName();
    } else {
        // Méthode introuvable
        http_response_code(404);
        echo "Erreur 404 : La méthode '$methodName' n'existe pas dans le contrôleur '$controllerName'.";
    }
} else {
    // Contrôleur introuvable
    http_response_code(404);
    echo "Erreur 404 : Le contrôleur '$controllerName' est introuvable.";
}
