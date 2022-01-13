<?php

use JetBrains\PhpStorm\ArrayShape;

#[ArrayShape(['dataBase' => "array", 'dataProduct' => "array"])]
function controllerProductPage(int $productId): array
{
    $dataProduct = dataProductPage($productId);
    if (is_null($dataProduct)) {
        die('the page does not exist');
    }

    $dataBase = dataOnePage(3);

    return [
        'dataBase' => $dataBase,
        'dataProduct' => $dataProduct,
    ];
}