<?php
require_once('modelo.php');

final class noticias extends modeloCredencialesBD
{
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct()
    {
        parent::__construct();
    }

    public function consultar_noticias()
    {
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

    public function consultar_noticias_paginacion($pagina, $noticias_por_pagina)
    {
        $inicio = ($pagina - 1) * $noticias_por_pagina;
        $instruccion = "CALL sp_listar_noticias_paginacion($inicio, $noticias_por_pagina)";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            echo "Fallo al consultar las noticias con paginación";
        } else {
            $consulta->close();
            $this->_db->close();
            return $resultado;
        }
    }

    public function consultar_noticias_filtro($campo, $valor)
    {
        $instruccion = "CALL sp_listar_noticias_filtro('" . $campo . "','" . $valor . "')";
        // Resto del código para la consulta con filtro...
    }
}
?>
