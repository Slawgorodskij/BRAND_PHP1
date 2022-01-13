<?php

use JetBrains\PhpStorm\NoReturn;

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'addProduct':
            addProductCart($_GET['id'], $_SESSION['userId']);
            break;
        case 'deleteProduct':
            deleteProductCart($_GET['id'], $_SESSION['userId']);
            break;
        case 'deleteProductAll':
            deleteProductCartAll($_SESSION['userId']);
            break;
    }


}

#[NoReturn]
function addProductCart(int $idProduct, int $userId)
{
    include_once '../db/workDataBase.php';
    include_once '../db/SQLQuery.php';

    $idOrderProductDB = dataOrder($userId, $idProduct);

    if (is_null($idOrderProductDB)) {
        $idOrderProduct = (int)executeSQL("INSERT INTO orders_product (product_id) VALUES ({$idProduct})");
        executeSQL("INSERT INTO orders (user_id, order_product_id) VALUES ({$userId},{$idOrderProduct})");
    } else {
        executeSQL("UPDATE orders_product SET total = total+1 WHERE id = {$idOrderProductDB['id']}");
    }

    $response['status'] = 'ok';
    $response['countProduct'] = sumProductCart($userId);

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();
}

//Удаление товара из корзин

#[NoReturn]
function deleteProductCart(int $idProduct, int $userId)
{
    include_once '../db/workDataBase.php';
    include_once '../db/SQLQuery.php';

    $totalProductDB = dataOrder($userId, $idProduct);

    if ((int)$totalProductDB['total'] > 1) {
        executeSQL("UPDATE orders_product SET total = total-1 WHERE id = {$totalProductDB['id']}");
    } else {
        executeSQL("DELETE FROM orders WHERE order_product_id = {$totalProductDB['id']}");
        executeSQL("DELETE FROM orders_product WHERE id = {$totalProductDB['id']}");
    }
    $answerQuantity = countProductCart($totalProductDB['id']);
    $answerSubTotal = dataTotalCosts($userId);

    $response['status'] = 'ok';
    $response['quantity'] = is_null($answerQuantity) ? 0 : $answerQuantity['total'];
    $response['countProduct'] = (int)sumProductCart($userId);
    $response['subTotal'] = is_null($answerSubTotal) ? 0 : $answerSubTotal;

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();
}

#[NoReturn]
function deleteProductCartAll(int $userId)
{
    include_once '../db/workDataBase.php';
    include_once '../db/SQLQuery.php';

    $orderID = arrayDataOrder($userId);

    $arrayId = [];

    for ($i = 0; $i < count($orderID); $i++) {
        $arrayId[] = implode(',', $orderID[$i]);
    }

    $listId = implode(',', $arrayId);

    executeSQL("DELETE FROM orders WHERE order_product_id in ($listId)");
    executeSQL("DELETE FROM orders_product WHERE id in ($listId)");

    $response['status'] = 'ok';
    $response['countProduct'] = sumProductCart($userId);

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();
}

