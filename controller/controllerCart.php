<?php

use JetBrains\PhpStorm\ArrayShape;


#[ArrayShape(['dataBase' => "array", 'blockFormAddress' => "string",
              'subTotal' => "int|null|string"])]
function controllerCart($userId): array
{
    $blockFormAddress = ' ';
    $dataBase = dataCart($userId);
    $subTotal = dataTotalCosts($userId);
    $dataUserAddress = checkedAddress($userId);

    if ($dataUserAddress) {
        $blockFormAddress = userAddress($dataUserAddress);
    }

    if (is_null($dataUserAddress)) {
        $blockFormAddress = newFormAddress();
    }

    if(isset($_POST['fixAddress'])){
        $blockFormAddress = userFixAddress($dataUserAddress);
    }

    if (isset($_POST['registrationAddress'])) {
        $blockFormAddress = match (checkedRegistrationFormAddress($_POST)) {
            'ok' => userAddress(checkedAddress($userId)),
            'error' => newFormAddress(),
        };
    }



    return [
        'dataBase' => $dataBase,
        'blockFormAddress' => $blockFormAddress,
        'subTotal' => $subTotal,
    ];
}
