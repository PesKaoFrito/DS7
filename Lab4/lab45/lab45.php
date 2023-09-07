<!DOCTYPE html>
<html>
<head>
    <title>Generador de Matriz Identidad</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            width: 30px; /* Ancho de las celdas */
            height: 30px; /* Altura de las celdas */
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Generador de Matriz Identidad</h1>
    <form method="post" action="">
        <label for="orden">Ingrese el valor de N (número par): </label>
        <input type="number" name="orden" id="orden" min="2" step="2" required>
        <input type="submit" value="Generar Matriz">
    </form>

    <?php
    // Función para generar la matriz identidad de orden N
    function generarMatrizIdentidad($orden) {
        $matriz = array();
        for ($i = 0; $i < $orden; $i++) {
            $fila = array();
            for ($j = 0; $j < $orden; $j++) {
                if ($i == $j) {
                    $fila[] = 1;
                } else {
                    $fila[] = 0;
                }
            }
            $matriz[] = $fila;
        }
        return $matriz;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $orden = $_POST["orden"];

        if ($orden % 2 == 0) {
            $matriz_identidad = generarMatrizIdentidad($orden);

            echo "<h2>Matriz Identidad de Orden $orden:</h2>";
            echo "<table>";
            foreach ($matriz_identidad as $fila) {
                echo "<tr>";
                foreach ($fila as $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Por favor, ingrese un número par para N.</p>";
        }
    }
    ?>
</body>
</html>
