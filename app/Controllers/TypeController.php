<?php
namespace App\Controllers;

use App\Models\Product;

class TypeController extends CoreController
{

    public function list()
    {
        
        $products = Product::findAll();

        
        $this->show('type_list', [
            'products' => $products
        ]);
    }


    public function view()
    {
        
        $typeId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($typeId) {

            $products = Product::findAll();


            $this->show('type_view', [
                'products' => $products,
                'typeId' => $typeId
            ]);
        } else {
            
            http_response_code(404);
            echo "Erreur 404 : Type de produit introuvable.";
        }
    }
}
