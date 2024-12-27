<?php
namespace App\Controllers;

use App\Models\Product;

class CartController extends CoreController
{
    public function add()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $productId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($productId) {
            $product = Product::find($productId);

            if ($product) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                $found = false;
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] === $product->getId()) {
                        $item['quantity'] += 1; 
                        $found = true;
                        break;
                    }
                }

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

        header('Location: ?controller=cart&method=showCart');
        exit;
    }

    public function showCart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cartItems = $_SESSION['cart'] ?? [];

        $this->show('cart', [
            'cartItems' => $cartItems
        ]);
    }

    public function clear()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION['cart']);

        header('Location: ?controller=cart&method=showCart');
        exit;
    }
}
