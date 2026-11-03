<?php

function aprekins(float $cena, int $skaits) {
    $starpSumma = $cena * $skaits;
if ($skaits >= 3) {
    $atlaide = $starpSumma * 0.1;
} else {
    $atlaide = 0;
}

$kopSumma = $starpSumma - $atlaide;

return [$starpSumma, $atlaide, $kopSumma];

    }