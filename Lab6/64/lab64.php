<?php
include("class_lib.php");

// Acceso a propiedad estática
print Foo::$mi_static . " value (1)<br>";

$foo = new Foo();

// Acceso a propiedad estática a través de un método
print $foo->staticValor() . " value (2)<br>";

// Esto es incorrecto y podría causar un error en versiones recientes de PHP
// print $foo->mi_static . " value (3)<br>";

// Acceso correcto a propiedad estática desde objeto
print $foo::$mi_static . " value (3)<br>";

print Bar::$mi_static . " value (4)<br>";

$bar = new Bar();

// Acceso a propiedad estática a través de un método
print $bar->fooStatic() . " value (5)<br>";
?>
