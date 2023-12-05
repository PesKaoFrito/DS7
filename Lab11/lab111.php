<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 9.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>

    <?php
    require_once("class/noticias.php");
    $obj_noticia = new noticias();
    
    // Configuración de paginación
    $noticias_por_pagina = 5;
    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    // Consulta de noticias con paginación
    $noticias = $obj_noticia->consultar_noticias_paginacion($pagina_actual, $noticias_por_pagina);

    $nfilas = count($noticias);

    if ($nfilas > 0) {
        echo "<table>\n";
        echo "<tr>\n";
        echo "<th>Titulo</th>\n";
        echo "<th>Texto</th>\n";
        echo "<th>Categoria</th>\n";
        echo "<th>Fecha</th>\n";
        echo "<th>Imagen</th>\n";
        echo "</tr>\n";

        foreach ($noticias as $resultado) {
            echo "<tr>\n";
            echo "<td>" . $resultado['titulo'] . "</td>\n";
            echo "<td>" . $resultado['texto'] . "</td>\n";
            echo "<td>" . $resultado['categoria'] . "</td>\n";
            echo "<td>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</td>\n";

            if ($resultado['imagen'] != "") {
                echo "<td><a target='_blank' href='img/" . $resultado['imagen'] . "'><img border='0' src='img/iconotexto.gif'></a></td>\n";
            } else {
                echo "<td>&nbsp;</td>\n";
            }

            echo "</tr>\n";
        }

        echo "</table>\n";

        // Añade los enlaces de paginación
        echo "<div class='pagination'>\n";
        for ($i = 1; $i <= ceil($nfilas / $noticias_por_pagina); $i++) {
            echo "<a " . ($i == $pagina_actual ? "class='active'" : "") . " href='?pagina=$i'>$i</a> ";
        }
        echo "</div>\n";
    } else {
        echo "No hay noticias disponibles";
    }
    ?>
</body>
</html>
