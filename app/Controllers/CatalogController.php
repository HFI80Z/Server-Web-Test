<?php
// app/Controllers/CatalogController.php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Type;

class CatalogController extends CoreController
{
    public function category()
    {
        // Récupération de la liste des catégories depuis le modèle Category
        $categories = Category::findAll();

        $this->show('category', [
            'categories' => $categories
        ]);
    }

    public function brand()
    {
        // Récupérer la liste des marques
        $brands = Brand::findAll();

        $this->show('brand', [
            'brands' => $brands
        ]);
    }

    public function product()
    {
        // Pour la démonstration, on récupère tous les produits
        $products = Product::findAll();

        $this->show('product', [
            'products' => $products
        ]);
    }

    public function type()
    {
        // Récupération des types
        $types = Type::findAll();

        $this->show('type', [
            'types' => $types
        ]);
    }
}
