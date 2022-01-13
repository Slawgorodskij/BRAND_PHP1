<?php

function checkedAuth(): bool
{
    if (isset($_SESSION['login'])) {
        return true;
    } elseif (isset($_COOKIE['hash'])) {
        $result = queryTableUsers($_COOKIE['hash']);

        if (!empty($result['firstname'])) {
            $_SESSION['login'] = $result['firstname'];
            $_SESSION['userId'] = $result['id'];
            return true;
        } else {
            addAnonymous();
        }

    } elseif (empty($_SESSION['userId'])) {
        addAnonymous();
    }
    return false;
}

function checkedAdmin($userId): bool
{
    $sqlQuery = "SELECT roles FROM users WHERE id = {$userId}";
    return oneElementData($sqlQuery)['roles'] === 'admin';
}

function addAnonymous()
{
    $hash = session_id();
    $sqlInsert = "INSERT INTO users (`hash`) VALUES  ('{$hash}')";
    executeSQL($sqlInsert);

    $_SESSION['userId'] = queryTableUsers($hash)['id'];
}

function queryTableUsers($hash): bool|array|null
{
    $sqlQuery = "SELECT * FROM users WHERE hash = '{$hash}'";
    return oneElementData($sqlQuery);
}

if (isset($_POST['goOut'])) {
    setcookie('hash', '', time() - 3600 * 24 * 7, '/');
    session_destroy();
    header('location:' . $_SERVER['HTTP_REFERER']);
}


