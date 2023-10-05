<?php
if (isset($_FILES['nombre_archivo_cliente']) && is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
    $nombreDirectorio = "archivos/";
    $nombreArchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombreArchivo;
    
    // Validar el tamaño del archivo (1 MB)
    $tamanoMaximo = 1024 * 1024; // 1 MB en bytes
    if ($_FILES['nombre_archivo_cliente']['size'] > $tamanoMaximo) {
        echo "El archivo supera el límite de 1 MB. <br><br>";
    } else {
        // Validar la extensión del archivo
        $extensionesValidas = array("jpg", "jpeg", "gif", "png");
        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
        
        if (in_array($extension, $extensionesValidas)) {
            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombreArchivo = $idUnico . "-" . $nombreArchivo;
                echo "Archivo repetido, se cambiará el nombre a $nombreArchivo <br><br>";
            }

            if (move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombreArchivo)) {
                echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
            } else {
                echo "No se ha podido subir el archivo <br>";
            }
        } else {
            echo "Formato de archivo no válido. Solo se permiten archivos JPG, JPEG, GIF o PNG. <br><br>";
        }
    }
} else {
    echo "No se ha seleccionado ningún archivo para subir <br>";
}
?>
