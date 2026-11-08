<?php

include "texto.php";

function obtenerPalabras($texto)
{
    $texto = str_replace(".", " ", $texto);
    $texto = str_replace(",", " ", $texto);
    $texto = str_replace(";", " ", $texto);
    $texto = str_replace(":", " ", $texto);
    $texto = str_replace("!", " ", $texto);
    $texto = str_replace("?", " ", $texto);
    $texto = str_replace("\n", " ", $texto);

    $palabrasSeparadas = explode(" ", $texto);
    $palabras = [];

    foreach ($palabrasSeparadas as $palabra) {
        $palabra = trim($palabra);

        if ($palabra != "") {
            $palabras[] = strtolower($palabra);
        }
    }

    return $palabras;
}

function numeroCaracteres($texto)
{
    $cantidad = 0;

    for ($i = 0; $i < strlen($texto); $i++) {
        $caracter = substr($texto, $i, 1);

        if ($caracter != " " && $caracter != "\n" && $caracter != "\r") {
            $cantidad++;
        }
    }

    return $cantidad;
}

function numeroPalabras($texto)
{
    $palabras = obtenerPalabras($texto);
    $cantidad = 0;

    foreach ($palabras as $palabra) {
        $cantidad++;
    }

    return $cantidad;
}

function numeroFrases($texto)
{
    $cantidad = 0;

    for ($i = 0; $i < strlen($texto); $i++) {
        $caracter = substr($texto, $i, 1);

        if ($caracter == "." || $caracter == "!" || $caracter == "?") {
            $cantidad++;
        }
    }

    return $cantidad;
}

function numeroParrafos($texto)
{
    $cantidad = 1;

    for ($i = 0; $i < strlen($texto); $i++) {
        if (substr($texto, $i, 1) == "\n") {
            $cantidad++;
        }
    }

    return $cantidad;
}

function promedioLetrasPorPalabra($texto)
{
    $palabras = obtenerPalabras($texto);
    $letras = 0;
    $cantidadPalabras = 0;

    foreach ($palabras as $palabra) {
        $letras += strlen($palabra);
        $cantidadPalabras++;
    }

    if ($cantidadPalabras == 0) {
        return 0;
    }

    return round($letras / $cantidadPalabras, 2);
}

function promedioPalabrasPorFrase($texto)
{
    $frases = numeroFrases($texto);

    if ($frases == 0) {
        return 0;
    }

    return round(numeroPalabras($texto) / $frases, 2);
}

function promedioFrasesPorParrafo($texto)
{
    $parrafos = numeroParrafos($texto);

    if ($parrafos == 0) {
        return 0;
    }

    return round(numeroFrases($texto) / $parrafos, 2);
}

function letraModa($texto)
{
    $palabras = obtenerPalabras($texto);
    $letrasPermitidas = "abcdefghijklmnopqrstuvwxyz";
    $frecuencias = [];
    $letraMasFrecuente = "";
    $mayorFrecuencia = 0;

    for ($i = 0; $i < strlen($letrasPermitidas); $i++) {
        $letra = substr($letrasPermitidas, $i, 1);
        $frecuencias[$letra] = 0;
    }

    foreach ($palabras as $palabra) {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $letra = substr($palabra, $i, 1);

            if (strpos($letrasPermitidas, $letra) !== false) {
                $frecuencias[$letra]++;
            }
        }
    }

    for ($i = 0; $i < strlen($letrasPermitidas); $i++) {
        $letra = substr($letrasPermitidas, $i, 1);

        if ($frecuencias[$letra] > $mayorFrecuencia) {
            $mayorFrecuencia = $frecuencias[$letra];
            $letraMasFrecuente = $letra;
        }
    }

    return $letraMasFrecuente;
}

function palabraModa($texto)
{
    $palabras = obtenerPalabras($texto);
    $cantidadPalabras = numeroPalabras($texto);
    $palabraMasFrecuente = "";
    $mayorFrecuencia = 0;

    for ($i = 0; $i < $cantidadPalabras; $i++) {
        $frecuencia = 0;

        for ($j = 0; $j < $cantidadPalabras; $j++) {
            if ($palabras[$i] == $palabras[$j]) {
                $frecuencia++;
            }
        }

        if ($frecuencia > $mayorFrecuencia) {
            $mayorFrecuencia = $frecuencia;
            $palabraMasFrecuente = $palabras[$i];
        }
    }

    return $palabraMasFrecuente;
}

echo "Número de caracteres: " . numeroCaracteres($texto) . PHP_EOL;
echo "Número de palabras: " . numeroPalabras($texto) . PHP_EOL;
echo "Número de frases: " . numeroFrases($texto) . PHP_EOL;
echo "Número de párrafos: " . numeroParrafos($texto) . PHP_EOL;
echo "Promedio de letras por palabra: " . promedioLetrasPorPalabra($texto) . PHP_EOL;
echo "Promedio de palabras por frase: " . promedioPalabrasPorFrase($texto) . PHP_EOL;
echo "Promedio de frases por párrafo: " . promedioFrasesPorParrafo($texto) . PHP_EOL;
echo "Letra moda: " . letraModa($texto) . PHP_EOL;
echo "Palabra moda: " . palabraModa($texto) . PHP_EOL;
