<?php
session_start(); // Asegúrate de iniciar la sesión si no lo has hecho ya
if (isset($_GET['archivo'])) {
    $archivo = $_GET['archivo'];

    if (file_exists($archivo)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($archivo) . '"');
        readfile($archivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Parámetro de archivo no proporcionado.";
}
?>
