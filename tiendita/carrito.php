<?php
session_start();
$nom=$_GET['nom'];
$pre=$_GET['pre'];


if (!isset($_SESSION['indice'])) 
  {$_SESSION['indice'] =0; 
   $_SESSION['suma']=0; }
else $_SESSION['indice']++;


$_SESSION['carrito'][$_SESSION['indice']]=$nom;
$_SESSION['precio'][$_SESSION['indice']]=$pre;
$_SESSION['suma']= $_SESSION['suma'] + $pre;

header('Location:index.php');

?>
