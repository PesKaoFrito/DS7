<!DOCTYPE HTML>
<HTML LANG="es">
<HEAD>
    <TITLE>Laboratorio 10.2</TITLE>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Encuesta. Resultados de la votacion</H1>
<?php
require_once("class/votos.php");
$obj_votos = new votos();
$result_votos = $obj_votos->listar_votos();
$votos1 = 0;
$votos2 = 0;

foreach ($result_votos as $result_voto) {
    $votos1 = $result_voto['votos1'];
    $votos2 = $result_voto['votos2'];
}

$totalVotos = $votos1 + $votos2;

echo "<TABLE>\n";
echo "<TR>\n";
echo "<TH>Respuesta</TH>\n";
echo "<TH>Votos</TH>\n";
echo "<TH>Porcentaje</TH>\n";
echo "<TH>Representacion grafica</TH>\n";
echo "</TR>\n";

$porcentajeSi = round(($votos1 / $totalVotos) * 100, 2);
$porcentajeNo = round(($votos2 / $totalVotos) * 100, 2);

echo "<TR>\n";
echo "<TD CLASS='izquierda'>Si</TD>\n";
echo "<TD CLASS='derecha'>$votos1</TD>\n";
echo "<TD CLASS='derecha'>$porcentajeSi%</TD>\n";
echo "<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='" . ($porcentajeSi * 4) . "'></TD>\n";
echo "</TR>\n";

echo "<TR>\n";
echo "<TD CLASS='izquierda'>No</TD>\n";
echo "<TD CLASS='derecha'>$votos2</TD>\n";
echo "<TD CLASS='derecha'>$porcentajeNo%</TD>\n";
echo "<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='" . ($porcentajeNo * 4) . "'></TD>\n";
echo "</TR>\n";

echo "</TABLE>\n";
echo "<P>Numero total de votos emitidods: $totalVotos </P>\n";
echo "<P><A HREF='lab101.php'> Pagina de votacion </A></P>\n";
?>
</BODY>
</HTML>
