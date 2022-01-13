<?php


function addendumController($dirName)
{
    $listFiles = scandir($dirName);
    foreach ($listFiles as $item) {
        $filesName = $dirName . '/' . $item;
        if (is_file($filesName)) {
            include_once $filesName;
        }
    }
}


function renderPage($page, $params): bool|string
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'header' => renderTemplate('header', controllerHeaderCart()),
        'content' => renderTemplate($page, $params),
        'footer' => renderTemplate('footer', getFooter()),
    ]);
}

function renderTemplate($page, $params): bool|string
{
    extract($params);
    ob_start();
    include TEMPLATES_DIR . $page . '.php';
    return ob_get_clean();
}
