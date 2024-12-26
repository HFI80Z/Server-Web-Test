<?php
// app/Controllers/CatalogController.php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Type;

class CatalogController extends CoreController
{
    public function category()
    {
        $categories = Category::findAll();

        $this->show('category', [
            'categories' => $categories
        ]);
    }

    public function brand()
    {
        $brands = Brand::findAll();
        $this->show('brand', [
            'brands' => $brands
        ]);
    }

    public function product()
    {
        $products = Product::findAll();
        $this->show('product', [
            'products' => $products
        ]);
    }

    /**
     * Méthode qui affiche la page "Types de produits".
     * On peut récupérer l'ID de la catégorie si besoin.
     */
    public function type()
    {
        // Récupération éventuelle d'un "id" depuis l'URL (catégorie)
        $categoryId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($categoryId) {
            // Si tu souhaites faire un filtrage
            // par exemple : $types = Type::findByCategory($categoryId);
            // (il te faudrait implémenter findByCategory($id) dans Type.php)
            
            // Mais si tu n'en as pas besoin, tu ignores.
            // Par exemple, on se contente d'afficher tous les types :
            $types = Type::findAll();
        } else {
            // Pas de catégorie en paramètre, on affiche tous les types
            $types = Type::findAll();
        }

        $this->show('type', [
            'types' => $types
        ]);
    }

    /**
     * Exemple : on conserve showProductsByCategory si tu en as encore l'usage
     */
    public function showProductsByCategory()
    {
        $categoryId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($categoryId) {
            $products = Product::findByCategory($categoryId);
            $this->show('product-list', [
                'products' => $products
            ]);
        } else {
            echo "Catégorie introuvable ou ID manquant.";
        }
    }
}
