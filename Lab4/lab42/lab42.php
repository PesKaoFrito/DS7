<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.2</title>
</head>
<body>
    <?php
        if (array_key_exists('enviar',$_POST)) {
            $num=$_REQUEST['valor'];
            $res=0;
            $mult=1;
            if ($num!="") {
                for ($i=1; $i <=$num; $i++) { 
                    $mult*=$i;
                }
                echo "El resultado del factorial es $mult";
            }
            else {
                echo "Introduzca un número, por favor";
            }
        }
        else {
            ?>
            <form action="lab42.php" method="post">
                Introduzca un valor y determinaré su factorial
                <br><br>
                <input type="number" name="valor">
                <br><br>
                <input type="submit" name="enviar" value="Enviar Número" >
            </form>
            <?php
        }
    ?>
</body>
</html>