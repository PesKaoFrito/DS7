<?php

// Encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Incluir archivos de conexión y objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/producto.php';

// Inicializar la base de datos y el objeto producto
$conex = new Conexion();
$db = $conex->obtenerConexion();

// Inicializar el objeto producto
$producto = new Producto($db);

// Query para obtener productos
$stmt = $producto->read();
$num = $stmt->rowCount();

// Verificar si hay más de 0 registros encontrados
if ($num > 0) {
    // Arreglo de productos
    $products_arr = array();
    $products_arr["records"] = array();

    // Obtener todo el contenido de la tabla
    // fetch() es más rápido que fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Extraer valores de la fila
        extract($row);

        // Crear un item de producto
        $product_item = array(
            "id" => $id,
            "nombre" => $nombre,
            "descripcion" => html_entity_decode($descripcion),
            "precio" => $precio,
            "categoria_id" => $categoria_id,
            "categoria_desc" => $categoria_desc
        );

        // Agregar el item al arreglo de registros
        array_push($products_arr["records"], $product_item);
    }

    // Asignar código de respuesta - 200 OK
    http_response_code(200);

    // Mostrar productos en formato JSON
    echo json_encode($products_arr);
} else {
    // No hay productos encontrados, lógica aquí
    // Puedes agregar código adicional si no se encuentran productos
    // Por ejemplo, asignar un código de respuesta diferente y mostrar un mensaje de error
    http_response_code(404);
    echo json_encode(array("message" => "No se encontraron productos."));
}
?>

