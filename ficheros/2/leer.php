<?php
$nombre=$_GET['fich'];
$path="C:/tmp/".$nombre;
$fp = fopen($path, "r");
$cadena="";
while($linea= fgets($fp,1024))
    $cadena=$cadena.$linea;
    echo "<textarea cols='80' rows='20'>$cadena</textarea>";
fclose($fp);
?>