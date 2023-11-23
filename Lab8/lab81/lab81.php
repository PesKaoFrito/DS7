<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 8.1</title>
</head>
<body>
    <?php

    // Incluye la clase
    require_once 'class_lib.php';

    // Crea una instancia de la clase
    $evaluador = new EvaluadorVentas();

    if (array_key_exists('enviar', $_POST)) {
        // Si se envió el formulario, evalúa el valor y muestra la imagen o mensaje
        $valor = $_REQUEST['valor'];
        echo $evaluador->evaluar($valor);
    } else {
        // Muestra el formulario
        echo $evaluador->mostrarFormulario();
    }

    ?>
</body>
</html>
