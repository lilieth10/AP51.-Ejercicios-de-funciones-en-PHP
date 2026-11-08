<?php

function numRomano($numero)
{
    $romanos = [
        1 => "I",
        2 => "II",
        3 => "III",
        4 => "IV",
        5 => "V",
        6 => "VI",
        7 => "VII",
        8 => "VIII",
        9 => "IX",
        10 => "X"
    ];

    return $romanos[$numero];
}

echo "Escribe un número entre 1 y 10: ";
$numero = (int) trim(fgets(STDIN));

if ($numero >= 1 && $numero <= 10) {
    echo "Su equivalente en número romano es " . numRomano($numero) . "." . PHP_EOL;
} else {
    echo "El número debe estar entre 1 y 10." . PHP_EOL;
}
