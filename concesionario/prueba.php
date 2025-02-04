<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario de Autos</title>
    <style>
        /* Resetear los estilos predeterminados del navegador */
        body, h1, p, a {
            margin: 0;
            padding: 0;
        }

        /* Estilo del banner con fondo azul eléctrico */
        .banner {
            background-color: #3498db; /* Color azul eléctrico */
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }

        .contenedor {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            background-color: #ff8c00; /* Cambia el color de fondo a tu elección */
            color: #fff;
            font-size: 18px;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #ff6c00; /* Cambia el color de fondo al pasar el cursor por encima */
        }

        </style>
    </head>
    <body>
    <header class="banner">
        <div class="contenedor">
            <h1>Bienvenido a nuestro Concesionario de Autos</h1>
        </div>
    </header>
    <center><table>
    <?php
$conn = new mysqli("127.0.0.1", "root", "", "concesionario");
if (!$conn) {
    die("Error en la conexión");
}
$consulta = "select * from coches ";
$result = $conn->query($consulta);

$counter = 0; // Inicializamos un contador

echo '<table><tr>';

while ($fila = $result->fetch_array()) {
    echo "<td style='vertical-align: top; padding: 10px;'>"; // Estilo para la celda
    echo "<img src='$fila[9]' width='300'><br>"; // Imagen arriba
    echo "<center><h3>$fila[2] $fila[1]</h3><br>$fila[3] | $fila[4] | $fila[5]<br><b>Precio: $fila[8]<b></center>"; // Texto abajo
    echo "</td>";
    $counter++;

    if ($counter % 3 == 0) {
        echo '</tr><tr>'; // Cerramos la fila después de 3 elementos
    }
}

echo '</tr></table>';

$conn->close();
?>

        
</table></center></body></html>
