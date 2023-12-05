<?php
require_once('modelo.php');

final class noticias extends modeloCredencialesBD {
    public $consulta;
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct() {
        parent::__construct();
    }

    public function consultar_noticias() {
        $instruccion = "CALL sp_listar_noticias ()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            echo "Fallo al consultar las noticias";
        } else {
            $consulta->close();
            $this->_db->close();
            return $resultado;
        }
    }

    public function actualizar_noticia($p_id, $p_titulo, $p_texto, $p_categoria, $p_fecha, $p_imagen) {
        try {
            $stmt = $this->_db->prepare("CALL sp_actualizar_noticia (?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                die("Error al preparar la consulta: " . $this->_db->error);
            }
    
            $stmt->bind_param("isssss", $p_id, $p_titulo, $p_texto, $p_categoria, $p_fecha, $p_imagen);

    
            $stmt->execute();
    
            $stmt->close(); // Cerrar el resultado después de ejecutar la consulta
    
            $this->_db->close();
    
        } catch (Exception $e) {
            die("Error al actualizar la noticia: " . $e->getMessage());
        }
    }

    public function consultar_noticias_filtro($campo, $valor) {
        $instruccion = "CALL sp_listar_noticias_filtro('$campo', '$valor')";
        $consulta = $this->_db->query($instruccion);
    
        if (!$consulta) {
            die("Error en la consulta: " . $this->_db->error);
        }
    
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    
        $consulta->close(); 
        return $resultado;
    }
    
}
?>
