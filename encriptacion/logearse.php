<?php
        $usuario=$_POST['usu'];
        $clave=$_POST['cla'];  
        $a=md5($clave);
        $conn = new mysqli("localhost", "root", "", "almacen");
        if (!$conn)
            die ("error en la conexion");
        $consulta ="select * from users where nombre='$usuario' ";
        $result = $conn->query($consulta);
        $n=mysqli_affected_rows($conn);
        $fila = $result->fetch_array();
        if(($n==1) && ($a==$fila[1]))
        {
            echo "Bienvenido a nuestra aplicacion";
        }
        else {echo "UHUH, algo salio mal";}
          
?>