<?php
session_start();
include_once '../config/config.php';

$authorization = false;

if (checkedAuth()) {
    $authorization = true;
    $login = $_SESSION['login'];
}

$urlArray = explode('/', $_SERVER['REQUEST_URI']);

controllerMain($urlArray, $authorization);




