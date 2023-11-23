<?php

class CalculadoraFactorial {

    public function calcularFactorial($num) {
        $res = 0;
        $mult = 1;

        if ($num != "") {
            for ($i = 1; $i <= $num; $i++) {
                $mult *= $i;
            }
            return "El resultado del factorial es $mult";
        } else {
            return "Introduzca un número, por favor";
        }
    }

    public function mostrarFormulario() {
        return '
            <form action="lab82.php" method="post">
                Introduzca un valor y determinaré su factorial
                <br><br>
                <input type="number" name="valor">
                <br><br>
                <input type="submit" name="enviar" value="Enviar Número">
            </form>';
    }

}

?>
