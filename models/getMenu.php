<?php

use JetBrains\PhpStorm\ArrayShape;

#[ArrayShape(['menu' => "array"])]
function getMenu(): array
{
    return [
        'menu' => [
            [
                'url'=>'/index',
                'name'=>'Главная',
            ],
            [
                'url'=>'/about',
                'name'=>'О нас',
                'submenu'=> [
                    [
                        'url'=>'/contact',
                        'name'=>'Контакты',
                    ],
                    [
                        'url'=>'/history',
                        'name'=>'История',
                    ],
                ],
            ],
            [
                'url'=>'/catalog',
                'name'=>'Каталог',
            ],
            [
                'url'=>'/admin',
                'name'=>'Админ',
            ],
        ]
    ];
}