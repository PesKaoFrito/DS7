<?php

class Producto {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $nombre_tabla = "productos";

    // Atributos de la clase
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria_id;
    public $categoria_desc;
    public $creado;

    // Constructor con $db como conexión a base de datos
    public function __construct($db) {
        $this->conn = $db;
    }
    // leer productos
function read(){
    // query para seleccionar todos
    $query = "SELECT 
                c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado 
            FROM 
                " . $this->nombre_tabla . " p 
                LEFT JOIN 
                    categorias c 
                        ON p.categoria_id = c.id 
            ORDER BY 
                p.creado DESC";

    // sentencia para preparar query  
    $stmt = $this->conn->prepare($query);

    // ejecutar query 
    $stmt->execute();

    // verificar si hay más de 0 registros encontrados
    $num = $stmt->rowCount();

    // si no hay productos encontrados
    if ($num === 0) {
        // Asignar código de respuesta - 404 No Encontrado
        http_response_code(404);

        // Informar al usuario que no se encontraron productos
        echo json_encode(array("message" => "No se encontraron productos."));
        
        // Detener la ejecución del script
        exit();
    }

    // si hay productos encontrados, devolver la sentencia preparada
    return $stmt;
    }
    // Crear producto
    function crear(){
        // Query para insertar un registro
        $query = "INSERT INTO 
                    " . $this->nombre_tabla . " 
                SET 
                    nombre=:nombre, precio=:precio, descripcion=:descripcion, categoria_id=:categoria_id, creado=:creado";

        // Preparar query
        $stmt = $this->conn->prepare($query);

        // Sanitizar los datos para evitar inyección de SQL
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->categoria_id = htmlspecialchars(strip_tags($this->categoria_id));
        $this->creado = htmlspecialchars(strip_tags($this->creado));

        // Bind values
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":categoria_id", $this->categoria_id);
        $stmt->bindParam(":creado", $this->creado);

        // Ejecutar query y verificar si fue exitoso
        if($stmt->execute()){
            return true; // Devolver verdadero si la inserción fue exitosa
        }

        return false; // Devolver falso si la inserción falló
    }
    // utilizado al completar el formulario de actualización del producto
    function readOne(){
        // consulta para leer un solo registro
        $query = "SELECT
                    c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado
                FROM
                    " . $this->nombre_tabla . " p
                LEFT JOIN
                    categorias c
                ON p.categoria_id = c.id
                WHERE
                    p.id = ?
                LIMIT
                    0,1";

        // preparar declaración de consulta
        $stmt = $this->conn->prepare( $query );

        // ID de enlace del producto a actualizar
        $stmt->bindParam(1, $this->id);

        // ejecutar consulta
        $stmt->execute();

        // obtener fila recuperada
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // establecer valores a las propiedades del objeto
        $this->nombre = $row['nombre'];
        $this->precio = $row['precio'];
        $this->descripcion = $row['descripcion'];
        $this->categoria_id = $row['categoria_id'];
        $this->categoria_desc = $row['categoria_desc'];
    }
}
?>
