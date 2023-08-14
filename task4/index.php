<?php

$array = [
    'revs' => 4,
    'news' => 5,
    'users' => 6,
];

//Возвращает массив в обратном порядке
function getArReverse($array): array
{
    $arReverse = [];
    end($array);

    do {
        $arReverse[key($array)] = current($array);
    } while (prev($array));

    return $arReverse;
}

print_r(getArReverse($array));