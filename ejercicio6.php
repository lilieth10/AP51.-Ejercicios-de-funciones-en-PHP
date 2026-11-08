<?php

include "texto.php";

function contarCoincidencias($texto, $palabra)
{
    $coincidencias = 0;
    $posicion = 0;

    while (($posicion = strpos($texto, $palabra, $posicion)) !== false) {
        $coincidencias++;
        $posicion += strlen($palabra);
    }

    return $coincidencias;
}

function reemplazarPorMayusculas($texto, $palabra)
{
    return str_replace($palabra, strtoupper($palabra), $texto);
}

echo "Escribe la palabra que quieres buscar: ";
$palabra = trim(fgets(STDIN));

if ($palabra == "") {
    echo "Debes escribir una palabra." . PHP_EOL;
} else {
    $coincidencias = contarCoincidencias($texto, $palabra);

    if ($coincidencias > 0) {
        if ($coincidencias == 1) {
            echo "Sí, la palabra existe. Aparece una vez." . PHP_EOL;
        } else {
            echo "Sí, la palabra existe. Aparece " . $coincidencias . " veces." . PHP_EOL;
        }

        echo "Texto con la palabra en mayúsculas:" . PHP_EOL;
        echo reemplazarPorMayusculas($texto, $palabra) . PHP_EOL;
    } else {
        echo "La palabra no aparece en el texto." . PHP_EOL;
    }
}
