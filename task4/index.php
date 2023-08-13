<?php

$array = [
    'revs' => 4,
    'news' => 5,
    'users' => 6,
];

//Возвращает массив в обратном порядке
function getArReverse($array): array
{
    $arIndexSize = count($array) - 1;
    $arReverse = [];

    while ($arIndexSize >= 0) {
        $arLastItem = array_slice($array, $arIndexSize);
        $arReverse = array_merge($arReverse, $arLastItem);
        $arIndexSize -= 1;
    }

    return $arReverse;
}

print_r(getArReverse($array));