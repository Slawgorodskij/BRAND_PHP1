<?php

use JetBrains\PhpStorm\ArrayShape;

#[ArrayShape(['dataBase' => "array", 'title' => "string"])]
function controllerAdminFirstPage(): array
{
    $dataBase = adminOnePage();

    return [
        'dataBase' => $dataBase,
        'title' => 'Admin',
    ];
}


function controllerAdminSecondPage()
{
    $customer = 0;
    $dataTotalCosts = 0;
    $nameCustomer = '';
    $addressCustomer = '';
    $dataBase = [];
    $nameTable = '';

    if (isset($_POST['idUser'])) {
        $idUser = $_POST['idUser'];
        $customer = 1;
        $dataBase = arrayProductCustomer($idUser);
        $dataTotalCosts = dataTotalCosts($idUser);
        $nameCustomer = dataCustomer($idUser);
        $addressCustomer = checkedAddress($idUser);
        $nameTable = 'Customer table';
    } else {
        $dataBase = adminSecondPage($_POST['idOrdersProduct']);
        $nameTable = 'Product table';
    }

    return [
        'dataBase' => $dataBase,
        'nameTable' => $nameTable,
        'dataTotalCosts' => $dataTotalCosts,
        'nameCustomer' => $nameCustomer,
        'customer' => $customer,
        'addressCustomer' => $addressCustomer,
        'title' => 'Admin second page',
    ];
}
