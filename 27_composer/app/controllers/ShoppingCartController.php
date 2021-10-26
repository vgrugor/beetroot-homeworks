<?php

namespace Shop\Controllers;

use Shop\Models\ShoppingCart;

class ShoppingCartController
{
    public function add(): void
    {
        $goodId = $_POST['id'] ?? null;

        if ($goodId !== null) {
            $userId = $_SESSION['user']['id'];

            $shoppingCart = new ShoppingCart();
            $goodIsAdded = $shoppingCart->add($goodId, $userId);

            if ($goodIsAdded) {
                header('Location: /');
            }
        }
    }

    public function delete(): void
    {
        $goodId = $_POST['id'] ?? null;

        if ($goodId !== null) {
            $userId = $_SESSION['user']['id'];

            $shoppingCart = new ShoppingCart();
            $shoppingCart->deleteGood($goodId, $userId);

            header('Location: /');
        }
    }
}