<?php

use JetBrains\PhpStorm\ArrayShape;

#[ArrayShape(['text' => "string", 'dateYear' => "string"])]
function getFooter(): array
{
    return [
        'text' => 'Brand All Rights Reserved. ',
        'dateYear' => date('Y'),
    ];
}
