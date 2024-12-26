<?php
// app/Controllers/CartController.php
namespace App\Controllers;

use App\Models\Product;

class CartController extends CoreController
{
    /**
     * Méthode pour ajouter un produit au panier
     */
    public function add()
    {
        // Démarrer la session si ce n'est pas déjà fait
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Récupère l'id transmis en GET
        $productId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($productId) {
            // Récupérer le produit depuis la base de données
            $product = Product::find($productId);

            if ($product) {
                // Initialiser le panier si nécessaire
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                // Vérifier si le produit est déjà dans le panier
                $found = false;
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] === $product->getId()) {
                        $item['quantity'] += 1; // Augmenter la quantité
                        $found = true;
                        break;
                    }
                }

                // Si le produit n'est pas trouvé, l'ajouter au panier
                if (!$found) {
                    $_SESSION['cart'][] = [
                        'id' => $product->getId(),
                        'name' => $product->getName(),
                        'price' => $product->getPrice(),
                        'quantity' => 1
                    ];
                }
            }
        }

        // Rediriger vers la page panier
        header('Location: ?controller=cart&method=showCart');
        exit;
    }

    /**
     * Méthode pour afficher le panier
     */
    public function showCart()
    {
        // Démarrer la session si ce n'est pas déjà fait
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Récupérer les produits du panier
        $cartItems = $_SESSION['cart'] ?? [];

        // Afficher la vue du panier
        $this->show('cart', [
            'cartItems' => $cartItems
        ]);
    }

    /**
     * Méthode pour vider le panier
     */
    public function clear()
    {
        // Démarrer la session si ce n'est pas déjà fait
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Supprimer le contenu du panier dans la session
        unset($_SESSION['cart']);

        // Rediriger vers la page panier vide
        header('Location: ?controller=cart&method=showCart');
        exit;
    }
}
