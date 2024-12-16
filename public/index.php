<?php
// public/index.php

// On active le rapport d'erreurs pour le développement (à désactiver en production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Chargement de l'autoload de Composer (si tu veux des librairies externes)
require_once __DIR__ . '/../vendor/autoload.php';

// Chargement manuel des classes de notre application (simple SPL autoload)
spl_autoload_register(function($className) {
    // Exemple : $className = "App\\Controllers\\MainController"
    // On convertit en chemin de fichier
    $file = __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// On peut récupérer la "route" via l'URL (ex: index.php?route=home)
$route = $_GET['route'] ?? 'home';

// On instancie nos contrôleurs :
use App\Controllers\MainController;
use App\Controllers\CatalogController;

// Router basique
switch($route) {
    case 'home':
        $controller = new MainController();
        $controller->home();
        break;

    case 'catalog-category':
        $controller = new CatalogController();
        $controller->category();
        break;

    case 'catalog-brand':
        $controller = new CatalogController();
        $controller->brand();
        break;

    case 'catalog-product':
        $controller = new CatalogController();
        $controller->product();
        break;
        
    case 'catalog-type':
        $controller = new CatalogController();
        $controller->type();
        break;

    default:
        // Page 404 ou redirection
        http_response_code(404);
        echo "Page non trouvée.";
        break;
}
