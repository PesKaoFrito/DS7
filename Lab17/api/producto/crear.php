<?php
// Encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Obtener conexión a la base de datos
include_once '../configuracion/conexion.php';

// Instanciar el objeto producto
include_once '../objetos/producto.php';

$conex = new Conexion();
$db = $conex->obtenerConexion();

$producto = new Producto($db);

// Obtener los datos del cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"));

// Asegurar que los datos no estén vacíos
if (
    !empty($data->nombre) &&
    !empty($data->precio) &&
    !empty($data->descripcion) &&
    !empty($data->categoria_id)
) {
    // Asignar valores de propiedad a producto
    $producto->nombre = $data->nombre;
    $producto->precio = $data->precio;
    $producto->descripcion = $data->descripcion;
    $producto->categoria_id = $data->categoria_id;
    $producto->creado = date('Y-m-d H:i:s');

    // Intentar crear el producto
    if ($producto->crear()) {
        // Asignar código de respuesta - 201 Creado
        http_response_code(201);

        // Informar al usuario
        echo json_encode(array("message" => "El producto ha sido creado."));
    } else {
        // No se puede crear el producto, informar al usuario
        // Asignar código de respuesta - 503 Servicio no disponible
        http_response_code(503);

        // Informar al usuario
        echo json_encode(array("message" => "No se puede crear el producto."));
    }
} else {
    // Informar al usuario que los datos están incompletos
    // Asignar código de respuesta - 400 Solicitud incorrecta
    http_response_code(400);

    // Informar al usuario
    echo json_encode(array("message" => "No se puede crear el producto. Los datos están incompletos."));
}
?>
