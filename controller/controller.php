<?php
function controllerMain($urlArray, $authorization)
{
    if ($urlArray[1] === '') {
        $page = 'index';
    } else {
        $page = $urlArray[1];
    }

    if (isset($urlArray[2])) {
        $action = $urlArray[2];
    }

    $params = [];


    switch ($page) {
        case 'index':
            $params['dataBase'] = dataOnePage(6);
            break;
        case 'registration':
            if ($authorization):
                $params = goOutForm();
            else:
                $params = controllerRegistration();
            endif;
            break;
        case 'catalog':
            $params['title'] = 'catalog';
            $params['dataBase'] = dataOnePage(9);
            break;
        case 'cart':
            $params = controllerCart($_SESSION['userId']);
            break;
        case 'product':
            $params = controllerProductPage($action);
            break;
        case 'admin':
            if (checkedAdmin($_SESSION['userId'])) {
                $params = controllerAdminFirstPage();
            } else {
                die('access is closed');
            }
            break;
        case 'adminSecondPage':
            if (checkedAdmin($_SESSION['userId'])) {
                $params = controllerAdminSecondPage();
            } else {
                die('access is closed');
            }
            break;
    }


    echo renderPage($page, $params);
}