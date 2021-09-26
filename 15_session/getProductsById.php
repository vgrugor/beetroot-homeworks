<?php

function getProductsById(array $listIds, array $products): array
{
    $productsById = array_filter($products, function ($product) use ($listIds) {
        if (in_array($product['id'], $listIds, true)) {
            return true;
        }

        return false;
    });

    return $productsById;
}
