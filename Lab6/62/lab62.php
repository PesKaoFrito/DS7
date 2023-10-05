<?php
include("class_lib.php");

// Instanciamos un par de objetos clientes
$cliente1 = new cliente("Pepe", 1);
$cliente2 = new cliente("Roberto", 564);

// Mostramos el nombre de cada cliente
echo "<br> El identificador del cliente 1 es: " . $cliente1->dame_numero();
echo "<br> El identificador del cliente 2 es: " . $cliente2->dame_numero();
?>
