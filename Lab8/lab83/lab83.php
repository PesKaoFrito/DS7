<!DOCTYPE html>
<html>
<head>
    <title>Generar arreglo aleatorio</title>
</head>
<body>
    <?php

    // Incluye la clase
    require_once 'class_lib.php';

    // Crea una instancia de la clase
    $generador = new GeneradorArregloAleatorio();

    // Genera el arreglo aleatorio
    $generador->generarArreglo();

    // Muestra la tabla HTML
    echo '<h1>Arreglo de 20 elementos con números aleatorios entre 1 y 1000</h1>';
    echo $generador->obtenerTablaHTML();

    // Muestra el resultado
    echo '<h1>Resultado</h1>';
    echo '<p>' . $generador->obtenerResultado() . '</p>';

    ?>
</body>
</html>
