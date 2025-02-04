<?php
session_start();
$usuario = $_POST['usu'];
$clave = $_POST['clave'];
$nombre = $_POST['nom'];
$a = md5($clave);
$conn = new mysqli("localhost", "root", "", "drive");

if (!$conn) {
    die("error en la conexion");
}

$consulta = "insert into usuarios values('$usuario','$nombre','$a') ";
$result = $conn->query($consulta);

if ($result) {
    $folder_name = $usuario;
    $folder_path = 'Usuarios/';
    $user_folder = $folder_path . $folder_name;

    if (!is_dir($user_folder)) {
        if (mkdir($user_folder, 0777)) {
            header('Location: index.html');
        } else {
            echo "<script>alert('ERROR: No se pudo crear la carpeta de usuario');</script>";
        }
    } else {
        echo "<script>alert('La carpeta de usuario ya existe');</script>";
    }
} else {
    echo "<script>alert('ERROR EN LA OPERACION');</script>";
}
?>
