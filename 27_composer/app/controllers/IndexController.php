<?php
namespace Shop\Controllers;

use Shop\models\Good;
use Shop\Models\ShoppingCart;

class IndexController
{
    public function home(): void
    {
        $good = new Good();
        $goods = $good->getAll();

        $userId = $_SESSION['user']['id'];

        $shoppingCart = new ShoppingCart();
        $goodsInCart = $shoppingCart->getAll($userId);

        include '../views/catalog.php';
    }

    public function error404()
    {
        echo 'Страница не найдена';
    }
}