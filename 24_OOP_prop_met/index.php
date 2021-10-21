<?php
declare(strict_types=1);

spl_autoload_register(function ($className) {
    include_once 'classes/' . $className . '.php';
});

$params = include __DIR__ . '/configuration/config.php';

const USER_ID = 2;

try {
    $shoppingCart = new ShoppingCart($params);

    if (isset($_GET['addGoodId'])) {
        $goodId = (int) $_GET['addGoodId'];

        if ($goodId > 0) {
            $shoppingCart->addGood($goodId, USER_ID);
        }
    }

    if (isset($_GET['deleteGoodId'])) {
        $goodId = (int) $_GET['deleteGoodId'];

        if ($goodId > 0) {
            $shoppingCart->deleteGood($goodId, USER_ID);
        }
    }

    $goodsInCart = [];
    $goodsInCart = $shoppingCart->getAll();
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $good = new Good($params);

    $goods = [];
    $goods = $good->getAll();
} catch (Exception $e) {
    echo $e->getMessage();
}

require 'template/catalog.php';
