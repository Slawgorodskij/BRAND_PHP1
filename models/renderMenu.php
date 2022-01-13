<?php

use JetBrains\PhpStorm\Pure;

#[Pure]
function renderMenu($menu): string
{
    $listMenu = "<ul>";
    foreach ($menu as $value) {
        $listMenu .= "<li><a href='{$value['url']}'>{$value['name']}</a>";
        if (isset($value['submenu'])) {
            $listMenu .= renderMenu($value['submenu']);
        }
        $listMenu .= "</li>";
    }
    $listMenu .= "</ul>";
    return $listMenu;
}

#[Pure]
function initializationRenderMenu(): string
{
    $menu = getMenu()['menu'];
    return renderMenu($menu);
}

