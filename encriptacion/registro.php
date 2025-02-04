<?php
session_start();
        $usuario=$_POST['usu'];
        $clave=$_POST['cla'];  
        $a=md5($clave);
        $conn = new mysqli("localhost", "root", "", "almacen");
        if (!$conn)
            die ("error en la conexion");
        $consulta ="insert into users values('$usuario','$a') ";
        $result = $conn->query($consulta);
        $n=mysqli_affected_rows($conn);
        if($n==1) {
            echo "1 registro insertado";
        }
        else {echo "Error en la operacion";}
?>