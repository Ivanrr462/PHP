<?php
    $clave=$_POST['clave'];
    if($clave == 'Ciclo01')
    header('Location:admin.php');
    else
    header('location:index.php');
?>