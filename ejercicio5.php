<?php

function figura($caracter, $numero)
{
    for ($fila = 1; $fila <= $numero; $fila++) {
        echo str_repeat($caracter, 2 * $fila - 1) . PHP_EOL;
    }

    for ($fila = $numero - 1; $fila >= 1; $fila--) {
        echo str_repeat($caracter, 2 * $fila - 1) . PHP_EOL;
    }
}

$caracter = "*";
$numero = 4;

figura($caracter, $numero);
