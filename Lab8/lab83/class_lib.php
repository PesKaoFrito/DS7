<?php

class GeneradorArregloAleatorio {

    private $elementos = [];

    public function generarArreglo() {
        while (count($this->elementos) < 20) {
            $numeroAleatorio = rand(1, 1000);
            if (!in_array($numeroAleatorio, $this->elementos)) {
                $this->elementos[] = $numeroAleatorio;
            }
        }
    }

    public function obtenerTablaHTML() {
        $tabla = '<table border="1"><tr><th>Índice</th><th>Número</th></tr>';
        foreach ($this->elementos as $indice => $valor) {
            $tabla .= "<tr><td>$indice</td><td>$valor</td></tr>";
        }
        $tabla .= '</table>';
        return $tabla;
    }

    public function obtenerResultado() {
        $maxElemento = max($this->elementos);
        $posicionMax = array_search($maxElemento, $this->elementos);
        return "El elemento mayor es $maxElemento y se encuentra en la posición $posicionMax del arreglo.";
    }

}

?>
