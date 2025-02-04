<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            color: #555;
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

        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<?php
if (!isset($_SESSION['indice'])) {
    echo "<p>NO HAS METIDO OBJETOS</p>";
} else {
    echo "<h2>PRODUCTOS ADQUIRIDOS</h2>";
    echo "<a href='pdf.php'><img src='pdf.png' width='20'></a>";
    echo "<a href='csv.php'><img src='csv.png' width='20'></a>";
    echo "<a href='borrar.php'>Vaciar carrito</a>";
    echo "<hr>";
    
    echo "<table>";
    echo "<tr><th>Producto</th><th>Precio</th></tr>";

    for ($i = 0; $i <= $_SESSION['indice']; $i++) {
        echo "<tr><td>" . $_SESSION['carrito'][$i] . "</td><td>" . $_SESSION['precio'][$i] . "</td></tr>";
    }

    echo "</table><br><br>";
    echo "<p>Total: " . $_SESSION['suma'] . "</p>";
    echo "<p>Productos Comprados: " . ($_SESSION['indice'] + 1) . "</p>";
}

?>

<a href="index.php">Volver</a>
<a href="cerrar.php">Salir</a>

</body>
</html>
