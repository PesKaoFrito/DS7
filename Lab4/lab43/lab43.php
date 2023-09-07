<!DOCTYPE html>
<html>
<head>
    <title>Generar arreglo aleatorio</title>
</head>
<body>
    <?php
    // Inicializa el arreglo de elementos
    $elementos = [];

    // Llena el arreglo con 20 números aleatorios entre 1 y 1000
    while (count($elementos) < 20) {
        $numeroAleatorio = rand(1, 1000);
        if (!in_array($numeroAleatorio, $elementos)) {
            $elementos[] = $numeroAleatorio;
        }
    }

    // Encuentra el elemento mayor y su posición
    $maxElemento = max($elementos);
    $posicionMax = array_search($maxElemento, $elementos);
    ?>

    <h1>Arreglo de 20 elementos con números aleatorios entre 1 y 1000</h1>
    <table border="1">
        <tr>
            <th>Índice</th>
            <th>Número</th>
        </tr>
        <?php
        foreach ($elementos as $indice => $valor) {
            echo "<tr>";
            echo "<td>$indice</td>";
            echo "<td>$valor</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h1>Resultado</h1>
    <p>El elemento mayor es <?php echo $maxElemento; ?> y se encuentra en la posición <?php echo $posicionMax; ?> del arreglo.</p>
</body>
</html>
