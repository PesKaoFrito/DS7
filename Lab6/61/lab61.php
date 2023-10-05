<?php

class Cliente {
    private $nombre;
    private $numero;
    private $peliculas_alquiladas = array();

    public function __construct($nombre, $numero) {
        $this->nombre = $nombre;
        $this->numero = $numero;
    }

    public function __destruct() {
        echo "<br> destruido: " . $this->nombre;
    }

    public function dame_numero() {
        return $this->numero;
    }
}

// Instanciamos un par de objetos cliente
$cliente1 = new Cliente("Pepe", 1);
$cliente2 = new Cliente("Roberto", 564);

// Mostramos el numero del cliente creado
echo "<br> El identificador del cliente 1 es: " . $cliente1->dame_numero();
echo "<br> El identificador del cliente 2 es: " . $cliente2->dame_numero();
?>