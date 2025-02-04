<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            border-radius: 5px;
        }

        a img {
            width: 30px;
            height: auto;
            vertical-align: middle;
            margin-right: 5px;
        }

        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<a href="vercarrito.php">Ver carrito</a>
<a href="cerrarse.php"><img src='cerrar.png' width='10'></a>
<table>
<?php
if(isset($_SESSION['usuario'])){
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basedatos = "almacen";
$conn =  mysqli_connect($servidor, $usuario, $clave, $basedatos) or die("Error en la conexion");

$consulta = "select * from almacen";
$resultado = $conn->query($consulta);

while ($fila = $resultado->fetch_array()) {
    echo "<tr><td>$fila[0]</td><td>$fila[1]</td>
    <td><a href='carrito.php?nom=$fila[0] &  pre=$fila[1]'>Añadir al Carrito</a></td></tr>";
}
}else{
    header('Location: index.html');
}
?>
</table>

</body>
</html>

