<?php

function diferenciaEdad($a, $b)
{
    if ($a > $b) {
        $resultado = $a - $b;
    } else {
        $resultado = $b - $a;
    }

    return $resultado;
}

if (isset($_POST["edad1"]) && isset($_POST["edad2"])) {
    $edad1 = (int) $_POST["edad1"];
    $edad2 = (int) $_POST["edad2"];

    echo "La diferencia de edad es: ";
    echo diferenciaEdad($edad1, $edad2);
} else {
    echo '<form method="post">';
    echo 'Edad del primer hermano: <input type="number" name="edad1" required><br><br>';
    echo 'Edad del segundo hermano: <input type="number" name="edad2" required><br><br>';
    echo '<input type="submit" value="Calcular diferencia">';
    echo '</form>';
}
