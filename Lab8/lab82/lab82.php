<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 8.2</title>
</head>
<body>
    <?php

    // Incluye la clase
    require_once 'class_lib.php';

    // Crea una instancia de la clase
    $calculadora = new CalculadoraFactorial();

    if (array_key_exists('enviar', $_POST)) {
        // Si se envió el formulario, calcula el factorial y muestra el resultado
        $num = $_REQUEST['valor'];
        echo $calculadora->calcularFactorial($num);
    } else {
        // Muestra el formulario
        echo $calculadora->mostrarFormulario();
    }

    ?>
</body>
</html>
