<?php
// app/Controllers/MainController.php
namespace App\Controllers;

class MainController extends CoreController
{
    public function home()
    {
        // On peut charger des données ici, par exemple la liste des 5 catégories à la une
        // Pour l’exemple on utilise du statique
        $highlightedCategories = [
            "Papeterie", "Stylos", "Calculatrices", "Cartables", "Agendas"
        ];

        // On affiche la vue home.tpl.php en lui passant les données
        $this->show('home', [
            'categories' => $highlightedCategories
        ]);
    }
}
