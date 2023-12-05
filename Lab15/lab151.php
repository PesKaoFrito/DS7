<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemlo DataTable JQuery</title>
    <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
    <script src="jquery-3.1.1.js"></script>
    <script src="jquery.dataTables.min.js"></script>
</head>
<body>
<script type="text/javascript">
  $(document).ready(function() {
    $('#grid').DataTable({
      "lengthMenu": [5, 10, 20, 50],
      "order": [[0, "asc"]],
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "No existen resultados en su búsqueda",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(Buscado entre _MAX_ registros en total)",
        "search": "Buscar: ",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    });
  });

  $("*").css("font-family", "arial").css('font-size', '12px');
</script>

    <h1>Consulta de noticias</h1>

    <?php
    require_once("class/noticias.php");
    $obj_noticia = new noticias(); // Correct the class name to noticias
    $noticias = $obj_noticia->consultar_noticias();
    $nfilas = count($noticias); // Correct the syntax error and assign the count to $nfilas

    if ($nfilas > 0) {
        echo "<table id='grid' class='display' cellspacing='0'>\n";
        echo"<thead>";
        echo "<tr>\n";
        echo "<th>Titulo</th>\n";
        echo "<th>Texto</th>\n";
        echo "<th>Categoria</th>\n";
        echo "<th>Fecha</th>\n";
        echo "<th>Imagen</th>\n";
        echo "</tr>\n";
        echo "</thead>";
        echo "<tbody>";

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
            echo "</tbody>";
        }

        echo "</table>\n";
    } else {
        echo "No hay noticias disponibles";
    }
    ?>
</body>
</html>
