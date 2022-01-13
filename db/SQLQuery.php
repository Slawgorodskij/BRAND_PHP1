<?php

use JetBrains\PhpStorm\NoReturn;

function dataOnePage($count): array
{
    $sqlOnePage = 'SELECT media.filename, products.id, products.name, 
                          products.description, products.price 
                   FROM products 
                     JOIN photo_products ON photo_products.product_id = products.id
                       JOIN media ON media.id = photo_products.media_id
                   ORDER BY RAND() LIMIT ' . $count;
    return arrayElementData($sqlOnePage);
}

function dataProductPage(int $productId): bool|array|null
{
    $sqlQuery = "SELECT p.id, p.name, p.description, p.price, pc.category, m.filename 
                 FROM products p 
                   JOIN product_categories pc ON pc.id = p.category_id 
                   JOIN photo_products pp ON pp.product_id = p.id 
                   JOIN media m ON m.id = pp.media_id 
                 WHERE p.id = {$productId}";
    return oneElementData($sqlQuery);
}

function dataCart(int $userId): array
{
    $sqlQuery = "SELECT p.id, p.name, p.price, pc.color, ps.`size`, op.total, m.filename  
                 FROM orders o 
                   JOIN orders_product op ON op.id = o.order_product_id
                   JOIN products p ON p.id  = op.product_id 
                   JOIN product_colors pc  ON pc.id = op.color_id 
                   JOIN product_sizes ps ON ps.id = op.size_id 
                   JOIN photo_products pp ON pp.product_id = p.id 
                   JOIN media m ON m.id = pp.media_id
                 WHERE user_id = {$userId}";
    return arrayElementData($sqlQuery);
}

function sumProductCart(int $userId)
{
    $sqlCount = "SELECT 
                   SUM(op.total)
                 FROM orders o 
                   JOIN orders_product op ON o.order_product_id = op.id 
                 WHERE o.user_id ={$userId}";
    return oneElementData($sqlCount)['SUM(op.total)'];
}

function countProductCart(int $idTable): bool|array|null
{
    $sqlQuery = "SELECT total FROM orders_product WHERE id = {$idTable}";
    return oneElementData($sqlQuery);
}

function dataOrder(int $userId, int $idProduct): bool|array|null
{
    $sqlQuery = "SELECT op.id, op.total 
                 FROM  orders o 
                   JOIN orders_product op ON op.id = o.order_product_id 
                WHERE o.user_id = {$userId} AND op.product_id = {$idProduct}";

    return oneElementData($sqlQuery);
}

function arrayDataOrder(int $userId): array
{
    $sqlQuery = "SELECT op.id AS order_product_id 
                 FROM  orders o 
                   JOIN orders_product op ON op.id = o.order_product_id 
                WHERE o.user_id = {$userId}";
    return arrayElementData($sqlQuery);
}


function dataTotalCosts(int $userId)
{
    $sqlQuery = "SELECT sum(total*price)
                 FROM orders o
                   JOIN orders_product op ON op.id = o.order_product_id
                   JOIN products p ON p.id  = op.product_id
                 WHERE user_id = {$userId}";
    return oneElementData($sqlQuery)['sum(total*price)'];
}

function adminOnePage(): array
{
    $sqlQuery = "SELECT
                    o.id AS 'orderNumber',
                    concat(u.firstname, ' ', u.lastname) AS 'userName', 
                    p.name AS 'productName',
                    o.created_at AS 'dateOrder',
                    op.id AS 'idOrdersProduct',
                    u.id AS 'idUser'
                  FROM  orders o 
                    JOIN orders_product op ON op.id = o.order_product_id 
                    JOIN users u ON u.id = o.user_id 
                    JOIN products p ON p.id  = op.product_id ";
    return arrayElementData($sqlQuery);
}

function adminSecondPage(int $idOrderProduct): bool|array|null
{
    $sqlQuery = "SELECT 
                    p.name AS 'productName',
                    pc.color AS 'productColor',
                    ps.`size` AS 'productSize',
                    op.total 
                 FROM orders_product op 
                   JOIN products p ON p.id = op.product_id
                   JOIN product_colors pc ON pc.id = op.color_id
                   JOIN product_sizes ps ON ps.id = op.size_id 
                 WHERE op.id = {$idOrderProduct}";
    return oneElementData($sqlQuery);
}

function dataCustomer(int $idUser): bool|string|null
{
    $sqlQuery = "SELECT
                   concat(firstname, ' ', lastname) AS 'userName' 
                 FROM users  
                 WHERE id = {$idUser}";
    return oneElementData($sqlQuery)['userName'];
}

function arrayProductCustomer(int $idUser): array
{
    $sqlQuery = "SELECT
                   p.name AS 'productName',
                   p.price AS 'productPrice',
                   pc.color AS 'productColor',
                   ps.`size` AS 'productSize',
                   op.total
                  FROM orders o 
                    JOIN orders_product op ON op.id = o.order_product_id
                    JOIN products p ON p.id  = op.product_id 
                    JOIN product_colors pc ON pc.id = op.color_id 
                    JOIN product_sizes ps ON ps.id = op.size_id
                  WHERE user_id = {$idUser}";
    return arrayElementData($sqlQuery);
}

function checkedAddress($userId): bool|array|null
{
    $sqlQuery = "SELECT * FROM addresses WHERE user_id = {$userId}";
    return oneElementData($sqlQuery);
}
