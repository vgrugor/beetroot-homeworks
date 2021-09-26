<?php

declare(strict_types=1);

session_start();

const JSON_FILE = 'products.json';

require 'jsonConverter.php';
include 'getProductsById.php';

try {
    $products = convertJsonToArray(JSON_FILE);
} catch (Exception $error) {
    echo $error->getMessage();
}

if (isset($_POST['order'])) {
    $_SESSION['order'] = $_POST['order'];
}

//function_exists на випадок, якщо файл з функцією не підключився
if (!empty($_SESSION['order']) && function_exists('getProductsById')) {
    $idsProductsInOrder = $_SESSION['order'];
    $productsInOrder = getProductsById($idsProductsInOrder, $products);
}

require 'catalog.php';
