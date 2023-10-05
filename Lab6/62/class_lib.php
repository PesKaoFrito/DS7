<?php

class Cliente {
    public $nombre;
    public $numero;
    public $peliculas_alquiladas;

    public function __construct($nombre, $numero) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->peliculas_alquiladas = array();
    }

    public function __destruct() {
        echo "<br>destruido: " . $this->nombre;
    }

    public function dame_numero() {
        return $this->numero;
    }
}

?>