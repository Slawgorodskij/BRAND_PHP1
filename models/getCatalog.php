<?php

use JetBrains\PhpStorm\ArrayShape;

 #[ArrayShape(['catalog' => "array[]"])]
function getCatalog(): array
{
    return [
        'catalog' => [
            [
                'name' => 'Пицца',
                'url_img' => IMAGES_DIR . 'pizza.jpeg',
                'description' => 'Свежие продукты, тонкое тесто, прекрасный аромат',
                'price' => 24,
            ],
            [
                'name' => 'Чай',
                'url_img' => IMAGES_DIR . 'tea.png',
                'description' => 'Ароматный с насыщенным вкусом.',
                'price' => 1,
            ],
            [
                'name' => 'Яблоко',
                'url_img' => IMAGES_DIR . 'apple.jpg',
                'description' => 'Сладкое, спелое, Российское',
                'price' => 12,
            ],
        ]
    ];
}
