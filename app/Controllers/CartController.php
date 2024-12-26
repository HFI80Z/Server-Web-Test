<?php
namespace App\Controllers;

class CartController extends CoreController
{
    public function showCart()
    {
        // Exemple : on considère un panier vide
        // Dans une vraie app, on récupère la liste des articles depuis la session ou la BD
        $cartItems = [];
        $this->show('cart', [
            'cartItems' => $cartItems
        ]);
    }
}
