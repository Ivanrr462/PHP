<?php
$fichero=$_GET['fich'];
unlink($fichero);
header('location:index.php');
?>