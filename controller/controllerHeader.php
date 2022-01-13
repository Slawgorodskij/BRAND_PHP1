<?php

use JetBrains\PhpStorm\ArrayShape;


#[ArrayShape(['classHeader' => "string", 'counter' => "int|mixed", 'menu' => "string", 'linkAdmin' => "string"])]
function controllerHeaderCart(): array
{
    $menu = initializationRenderMenu();
    $classHeader = 'inactive';
    $counter = 0;
    $linkAdmin = '';

    if (isset($_SESSION['userId'])) {
        $counter = sumProductCart($_SESSION['userId']);
    }
    if ($counter) {
        $classHeader = 'header-cart__counter';
    }
    if (checkedAdmin($_SESSION['userId'])) {
        $linkAdmin = '<a class="header-menu__section" href="/admin">admin</a>';
    }
    
    return [
        'classHeader' => $classHeader,
        'counter' => $counter,
        'menu' => $menu,
        'linkAdmin' => $linkAdmin,
    ];

}

