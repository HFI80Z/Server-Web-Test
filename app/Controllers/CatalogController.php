<?php
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

    public function type()
    {
        
        $categoryId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($categoryId) {

            $types = Type::findAll();
        } else {
            $types = Type::findAll();
        }

        $this->show('type', [
            'types' => $types
        ]);
    }

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
