<?php

function dameNumero()
{
    return rand(1, 49);
}

$combinacion = [];

while (count($combinacion) < 6) {
    $numero = dameNumero();

    if (!in_array($numero, $combinacion)) {
        $combinacion[] = $numero;
    }
}

echo "La combinación de lotería es: " . implode(", ", $combinacion) . PHP_EOL;
