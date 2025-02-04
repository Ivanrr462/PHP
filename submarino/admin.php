<?php
session_start();
       $clave=$_POST['clave'];
       if ($clave=="admin")
       {
        $_SESSION['usuario']='usuario';
        header('location:administrador.php');
       }
       else
       {
        session_destroy();
        header('location:index.php');
       }
       ?>