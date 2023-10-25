<!DOCTYPE HTML>
<HTML LANG="es">
<HEAD>
    <TITLE>Laboratorio 10.1</TITLE>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<?php
require_once("class/votos.php");

if (array_key_exists('enviar', $_POST)) {
    echo "<H1>Encuesta. Voto registrado</H1>";
    $obj_votos = new votos();
    $result_votos = $obj_votos->listar_votos();
    
    if ($_POST['voto'] == "si") {
        $votos1 = $result_votos[0]['votos1'] + 1;
        $votos2 = $result_votos[0]['votos2'];
    } elseif ($_POST['voto'] == "no") {
        $votos1 = $result_votos[0]['votos1'];
        $votos2 = $result_votos[0]['votos2'] + 1;
    }

    $obj_votos = new votos();
    $result = $obj_votos->actualizar_votos($votos1, $votos2);

    if ($result) {
        echo "<P>Su voto ha sido registrado. Gracias por participar</P>";
        echo "<A HREF='lab102.php'>Ver resultados</A>";
    } else {
        echo "<P>Error al actualizar su voto</P>";
    }
} else {
    echo "<H1>Encuesta</H1>";
    echo "<P>¿Cree ud. que el precio de la vivienda seguirá subiendo al ritmo actual?</P>";
    echo "<FORM ACTION='lab101.php' METHOD='POST'>";
    echo "<INPUT TYPE='RADIO' NAME='voto' VALUE='si' CHECKED>Si<BR>";
    echo "<INPUT TYPE='RADIO' NAME='voto' VALUE='no'>No<BR><BR>";
    echo "<INPUT TYPE='SUBMIT' NAME='enviar' VALUE='votar'>";
    echo "</FORM>";
    echo "<A HREF='lab102.php'>Ver resultados</A>";
}
?>
</BODY>
</HTML>
    