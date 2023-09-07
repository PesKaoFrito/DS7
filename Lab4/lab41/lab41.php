<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.1</title>
</head>
<body>
    <?php
        if (array_key_exists('enviar',$_POST)) {
            if ($_REQUEST['valor']!="") {
                
                if ($_REQUEST['valor']>=80) {
            ?>
                    <img src="verde.png" alt="Carita Verde">
            <?php
            }
                else if ($_REQUEST['valor']<80 && $_REQUEST['valor'] >=50){
            ?>
                    <img src="amarillo.png" alt="Carita Amarilla">
            <?php
                }
                else if ($_REQUEST['valor']<50) {
                    ?>
                    <img src="rojo.png" alt="Carita Roja">
                    <?php
                }
            }
            else {
                echo "Introduzca un número, por favor";
            }
        }
        else {
            ?>
            <form action="lab41.php" method="post">
                Introduzca un valor porcentual para valorar las ventas
                <br><br>
                <input type="text" name="valor">
                <br><br>
                <input type="submit" name="enviar" value="Enviar Número" >
            </form>
            <?php
        }
    ?>
</body>
</html>