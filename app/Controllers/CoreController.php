<?php
// app/Controllers/CoreController.php
namespace App\Controllers;

abstract class CoreController
{
    /**
     * Méthode utilitaire pour afficher une vue
     */
    protected function show(string $viewName, array $viewData = [])
    {
        // Extraction des données pour les rendre disponibles dans la vue
        extract($viewData);

        // Inclusion du header
        require __DIR__ . '/../Views/partials/header.tpl.php';

        // Inclusion de la vue principale
        require __DIR__ . '/../Views/' . $viewName . '.tpl.php';

        // Inclusion du footer
        require __DIR__ . '/../Views/partials/footer.tpl.php';
    }
}
