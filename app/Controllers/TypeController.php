<?php
// app/Controllers/TypeController.php
namespace App\Controllers;

use App\Models\Product;

class TypeController extends CoreController
{
    /**
     * Méthode pour afficher la liste des types de produits
     */
    public function list()
    {
        // Récupérer tous les produits (ou les types, selon ta logique)
        $products = Product::findAll();

        // Afficher la vue 'type_list' avec les produits
        $this->show('type_list', [
            'products' => $products
        ]);
    }

    /**
     * Méthode pour afficher les détails d'un type spécifique (optionnel)
     */
    public function view()
    {
        // Récupérer l'id transmis en GET
        $typeId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($typeId) {
            // Récupérer les produits par type (si une méthode existe)
            // $products = Product::findByType($typeId);
            // Pour l'instant, nous utiliserons findAll() pour simplifier
            $products = Product::findAll();

            // Afficher la vue 'type_view' avec les produits
            $this->show('type_view', [
                'products' => $products,
                'typeId' => $typeId
            ]);
        } else {
            // Rediriger ou afficher une erreur
            http_response_code(404);
            echo "Erreur 404 : Type de produit introuvable.";
        }
    }
}
