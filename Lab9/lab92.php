<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 9.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>
    <FORM NAME="FormFiltro" METHOD="post" ACTION="lab92.php"> <BR/>
    Filtrar por: <SELECT NAME="campos">
    <OPTION value="texto" SELECTED>Descripcion
    <OPTION value="titulo">Titulo
    <OPTION value="categoria">Categoria
    </SELECT>
    con el valor
    <input TYPE="text" NAME="valor">
    <INPUT
    NAME="ConsultarFiltro" VALUE="Filtrar Datos" TYPE="submit"/>
    <INPUT NAME="ConsultarTodos" VALUE="Ver todos" TYPE="submit" /> </FORM>
    <?php
    require_once("class/noticias.php");
    $obj_noticia = new noticias(); // Correct the class name to noticias
    $noticias = $obj_noticia->consultar_noticias();
    if (array_key_exists('ConsultarTodos', $_POST)) {
        $obj_noticia=new noticias();
        $noticias_new = $obj_noticia->consultar_noticias();
    }
    if (array_key_exists('ConsultarFiltro', $_POST)) {
        $obj_noticia=new noticias();
        $noticias = $obj_noticia->consultar_noticias_filtro($_REQUEST('campos'),$_REQUEST('valor'));
    }
    $nfilas = count($noticias); // Correct the syntax error and assign the count to $nfilas

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
    } else {
        echo "No hay noticias disponibles";
    }
    ?>
</body>
</html>
