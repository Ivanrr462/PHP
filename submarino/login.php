<?php
session_start();
       $clave=$_POST['clave'];
       if ($clave=="fotografia")
       {
        $_SESSION['usuario']='usuario';
        header('location:index.php');
       }
       else
       {
        session_destroy();
        header('location:index.html');
       }
       ?>