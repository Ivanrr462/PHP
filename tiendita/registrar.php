<?php
session_start();
$nif = $_POST['nif'];
$usu = $_POST['usu'];
$cod = $_POST['cod'];
$clave = $_POST['clave'];
$nombre = $_POST['nom'];
$dir = $_POST['dir'];
$a = md5($clave);
$conn = new mysqli("localhost", "root", "", "almacen");

if (!$conn) {
    die("error en la conexion");
}

$consulta = "insert into facturacion values('$a','$usu','$nif','$dir','$nombre','$cod') ";
$result = $conn->query($consulta);
$n=mysqli_affected_rows($conn);
        if($n==1) {
            echo "<script>alert('Usted se ha resgitrado correctamente')</script>";
            echo "<script>window.location.href = 'index.html';</script>";
        }
        else {echo "Error en la operacion";}
?>
