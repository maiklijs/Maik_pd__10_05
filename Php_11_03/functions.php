<?php

function aprekins($cena, $skaits) {
    $starpSumma = $cena * $skaits;
if ($skaits >= 3) {
    $atlaide = $starpSumma * 0.1;
} else {
    $atlaide = 0;
}

$kopSumma = $starpSumma - $atlaide;

return [$kopSumma, $starpSumma, $atlaide];

    }