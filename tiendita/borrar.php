<?php
session_start();

// Verificar si hay objetos en el carrito
if (isset($_SESSION['indice'])) {
    // Borrar los objetos del carrito
    unset($_SESSION['carrito']);
    unset($_SESSION['precio']);
    unset($_SESSION['indice']);
    unset($_SESSION['suma']);
}

// Redireccionar a la página principal
header("Location: vercarrito.php");
exit();
?>
