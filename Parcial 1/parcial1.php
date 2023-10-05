<!DOCTYPE html>
<html>
<head>
    <title>Generador de Matriz</title>
</head>
<body>
    <h1>Generador de Matriz</h1>

    <?php
    function generarValorAleatorio() {
        return rand(1, 100);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST["n"];

        if ($n >= 6 && $n % 2 == 0) {
            // Crear matriz de NxN
            $matriz = array();
            for ($i = 0; $i < $n; $i++) {
                $matriz[$i] = array();
                for ($j = 0; $j < $n; $j++) {
                    if (($i < 2 && ($j == 0 || $j == 1 || $j == $n - 2 || $j == $n - 1)) || ($i >= $n - 2 && ($j == 0 || $j == 1 || $j == $n - 2 || $j == $n - 1))) {
                        // Rellenar solo los primeros dos y los últimos dos valores con aleatorios
                        $matriz[$i][$j] = generarValorAleatorio();
                    } else {
                        $matriz[$i][$j] = 0;
                    }
                }
            }

            // Calcular suma de las 2 primeras filas y 2 últimas filas
            $sumaPrimerasFilas = array_sum(array_slice($matriz[0], 0, 2)) + array_sum(array_slice($matriz[1], 0, 2));
            $sumaUltimasFilas = array_sum(array_slice($matriz[$n - 2], 0, 2)) + array_sum(array_slice($matriz[$n - 1], 0, 2));

            // Mostrar la matriz y las sumas
            echo "<h2>Matriz creada:</h2>";
            echo "<table border='1'>";
            for ($i = 0; $i < $n; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $n; $j++) {
                    echo "<td>" . $matriz[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            echo "<h2>Suma de los valores de las 2 primeras filas:</h2>";
            echo "<p>$sumaPrimerasFilas</p>";

            echo "<h2>Suma de los valores de las 2 últimas filas:</h2>";
            echo "<p>$sumaUltimasFilas</p>";
        } else {
            echo "<p>El valor de N debe ser un número par mayor o igual que 6.</p>";
        }
    }
    ?>

    <h2>Generar Matriz</h2>
    <form method="post">
        <label for="n">Ingrese un número par mayor o igual que 6 para N:</label>
        <input type="number" name="n" min="6" step="2" required>
        <input type="submit" value="Generar">
    </form>
</body>
</html>
