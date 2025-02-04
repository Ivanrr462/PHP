<?php
session_start();
       $usuario=$_POST['usu'];
       $clave=$_POST['cla'];
       if ($clave=="Ciclo.01")
       {
        $_SESSION['usuario']=$usuario;
        header('location:index.php');
       }
       else
       {
        session_destroy();
        header('location:index.html');
       }
       ?>
       