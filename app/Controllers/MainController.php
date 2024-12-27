<?php
namespace App\Controllers;

class MainController extends CoreController
{
    public function home()
    {
        $highlightedCategories = [
            "Papeterie", "Stylos", "Calculatrices", "Cartables", "Agendas"
        ];

        $this->show('home', [
            'categories' => $highlightedCategories
        ]);
    }
}
