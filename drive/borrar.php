<?php
session_start(); // Asegúrate de iniciar la sesión si no lo has hecho ya
if (isset($_GET['archivo'])) {
    $archivo = $_GET['archivo'];

    if (file_exists($archivo)) {
        unlink($archivo);
        header('Location:indice.php');
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>
