<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Noticia</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Editar Noticia</h1>

    <?php
    require_once("class/noticias.php");

    $obj_noticia = new noticias();

    $id_noticia = isset($_GET['id']) ? $_GET['id'] : null;
    
    if (!$id_noticia) {
        die("ID de noticia no proporcionado.");
    }

    $noticia_actual = $obj_noticia->consultar_noticias_filtro("id", $id_noticia);

    if (!$noticia_actual) {
        die("No se pudo obtener la información de la noticia actual.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $categoria = $_POST['categoria'];
        $fecha = $_POST['fecha'];

        // Procesar la imagen si se selecciona una nueva
        if ($_FILES['nueva_imagen']['size'] > 0) {
            $imagen = subirImagen();
        } else {
            $imagen = $noticia_actual[0]['imagen'];
        }

        $obj_noticia->actualizar_noticia($id_noticia, $titulo, $texto, $categoria, $fecha, $imagen);

        header("Location: lab91.php");
        exit();
    }
    // Función para subir una nueva imagen y devolver el nombre del archivo
    function subirImagen() {
        $directorio_destino = "img/";
        $nombre_archivo = $_FILES['nueva_imagen']['name'];
        $ruta_archivo = $directorio_destino . $nombre_archivo;

        if (move_uploaded_file($_FILES['nueva_imagen']['tmp_name'], $ruta_archivo)) {
            return $nombre_archivo;
        } else {
            die("Error al subir la imagen.");
        }
    }
    ?>

    <form method="post" action="editar_noticia.php?id=<?php echo $id_noticia; ?>" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $noticia_actual[0]['titulo']; ?>" required><br>

        <label for="texto">Texto:</label>
        <textarea name="texto" required><?php echo $noticia_actual[0]['texto']; ?></textarea><br>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" value="<?php echo $noticia_actual[0]['categoria']; ?>" required><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $noticia_actual[0]['fecha']; ?>" required><br>

        <label for="nueva_imagen">Nueva Imagen:</label>
        <input type="file" name="nueva_imagen"><br>

        <label for="imagen_actual">Imagen Actual:</label>
        <?php echo $noticia_actual[0]['imagen'] ? "<img src='img/{$noticia_actual[0]['imagen']}' width='100'>" : "No hay imagen actual"; ?><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
