<?php
session_start();
$fichero=$_GET['fichero'];
unlink($fichero);
header('location:administrador.php');
?>