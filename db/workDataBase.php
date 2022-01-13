<?php

function _connectDB(): mysqli
{
    static $connectBase = null;
    if (!$connectBase) {
        $connectBase = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die('cloud not connect: ' . mysqli_connect_error());
    }
    return $connectBase;
}

function _dataBaseQuery($sqlQuery): mysqli_result|bool
{
    return mysqli_query(_connectDB(), $sqlQuery);
}

//возврат массива
function arrayElementData($sqlQuery): array
{
    $resultQuery = _dataBaseQuery($sqlQuery);
    $listData = [];
    while ($row = mysqli_fetch_assoc($resultQuery)) {
        $listData[] = $row;
    };
    return $listData;
}

//возврат одного элемента
function oneElementData($sqlQuery): array|bool|null
{
    $resultQuery = _dataBaseQuery($sqlQuery);
    return mysqli_fetch_assoc($resultQuery);

}

//Внесение изменений в базу данных
function executeSQL($sqlQuery): int|string
{
    _dataBaseQuery($sqlQuery);
    return mysqli_insert_id(_connectDB());
}