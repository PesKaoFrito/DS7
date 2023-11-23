<?php

class EvaluadorVentas {

    public function evaluar($valor) {
        if ($valor != "") {
            if ($valor >= 80) {
                return '<img src="verde.png" alt="Carita Verde">';
            } else if ($valor < 80 && $valor >= 50) {
                return '<img src="amarillo.png" alt="Carita Amarilla">';
            } else if ($valor < 50) {
                return '<img src="rojo.png" alt="Carita Roja">';
            }
        } else {
            return "Introduzca un número, por favor";
        }
    }

    public function mostrarFormulario() {
        return '
            <form action="lab81.php" method="post">
                Introduzca un valor porcentual para valorar las ventas
                <br><br>
                <input type="text" name="valor">
                <br><br>
                <input type="submit" name="enviar" value="Enviar Número">
            </form>';
    }

}

?>
