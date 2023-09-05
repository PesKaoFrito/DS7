<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laboratorio 2.5</title>
</head>
<body>
    <?php
    $figuras = array('cuadrado','triángulo','circulo');
    $figuras[1]='rectángulo';
    mostrar_figuras($figuras,"asignación de rectangulo");

    array_push($figuras,'pentágono');
    mostrar_figuras($figuras,"asignación del pentágono al final");
    array_unshift($figuras,'hexágono');
    mostrar_figuras($figuras,"adición de hexágono al inicio");
    array_pop($figuras);
    mostrar_figuras($figuras,"eliminación del último");
    array_shift($figuras);
    mostrar_figuras($figuras,"eliminación del primero");

    function mostrar_figuras($figuras, $mensaje){
        echo "<br>Arreglo después de $mensaje <br>";
        foreach($figuras as $figura){
            echo "$figura <br>";
        }
    }
    ?>
</body>
</html>