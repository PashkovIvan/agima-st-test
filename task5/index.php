<?php

$arNums = [1, 1, 0, 1, 1, 1,];

//Возвращает максимальное количество повторяемых единиц, идущих друг за другом
function getMaxCountRep($arNums): int
{
    $numsCountRep = 0;
    $arNumsCountRep = [];
    $arIndexSize = count($arNums);
    $i = 0;

    while ($i < $arIndexSize) {
        if ($arNums[$i] === 1) {
            $numsCountRep += 1;
            $arNumsCountRep[] = $numsCountRep;
        } else {
            $numsCountRep = 0;
            $arNumsCountRep[] = 0;
        }

        $i += 1;
    }

    $maxCountRep = max($arNumsCountRep);
    return $maxCountRep;
}

print_r(getMaxCountRep($arNums));