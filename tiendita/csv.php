<?php
session_start();
if (!isset($_SESSION['indice'])) {
    echo "Se te fue la sesion.Click <a href='index.html'>aqui<a> para iniciar sesion";
} else {
   $csvcontent = "Producto,Precio\n";

for($i = 0; $i <= $_SESSION['indice']; $i++){
    $csvcontent .= "{$_SESSION['carrito'][$i]},{$_SESSION['precio'][$i]} €\n" ;
}

$total = array_sum($_SESSION['precio']);

$csvcontent .= "Total,$total €\n";

$filename = "factura.csv";

header( 'Content-Type: application/csv' );
header( 'Content-Disposition: attachment; filename="'.$filename.'"' );

echo $csvcontent;
}
?>