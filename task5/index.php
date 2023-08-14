<?php

$arNums = [1, 1, 0, 1, 1, 1,];

//Возвращает максимальное количество повторяемых единиц, идущих друг за другом
function getMaxCountRep($arNums): int
{
    $curCountRep = 0;
    $maxCountRep = 0;

    foreach ($arNums as $arNum) {
        if ($arNum === 1) {
            $curCountRep += 1;
        } else {
            if ($curCountRep > $maxCountRep) {
                $maxCountRep = $curCountRep;
            }

            $curCountRep = 0;
        }
    }

    return ($curCountRep > $maxCountRep) ? $curCountRep : $maxCountRep;
}

print_r(getMaxCountRep($arNums));