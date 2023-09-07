<!DOCTYPE html>
<html>
<head>
    <title>App de Números Pares</title>
</head>
<body>
    <h1>App de Números Pares</h1>

    <?php
    session_start(); // Iniciar la sesión si aún no está iniciada

    if (!isset($_SESSION['numerosPares'])) {
        $_SESSION['numerosPares'] = array();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = (int)$_POST["numero"];

        if ($numero % 2 == 0) {
            // El número es par, lo agregamos al arreglo de sesión
            $_SESSION['numerosPares'][] = $numero;
        } else {
            echo "El número ingresado es impar. Introduzca un número par.\n";
        }
    }

    // Verificar si se ha hecho clic en el enlace "Cerrar Sesión"
    if (isset($_GET['logout'])) {
        session_destroy(); // Cerrar la sesión
        header('Location: ' . $_SERVER['PHP_SELF']); // Redirigir a la misma página
        exit;
    }
    ?>

    <form method="post">
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero">
        <input type="submit" value="Agregar">
    </form>

    <h2>Números pares ingresados:</h2>
    <?php
    foreach ($_SESSION['numerosPares'] as $par) {
        echo $par . " ";
    }
    ?>

    <br><br>
    <a href="?logout=1">Cerrar Sesión</a> <!-- Enlace para cerrar la sesión -->
</body>
</html>
