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
            padding: 40px 0; /* Reducimos la altura del banner y el espacio interno */
        }

        .contenedor {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h1 {
            h1 {
            font-size: 36px;
            margin-bottom: 10px; /* Reducimos el espacio inferior del encabezado */
        }
        }

        p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            background-color: white; /* Cambia el color de fondo a tu elección */
            color: black;
            font-size: 18px;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #3498db; /* Cambia el color de fondo al pasar el cursor por encima */
        }
        *{
	    margin: 0;
	    padding: 0;
	    -webkit-box-sizing: border-box;
	    -moz-box-sizing: border-box;
	    box-sizing: border-box;
        }

.navegacion{
	width: 1000px;
	margin: 30px auto;
	
}

.navegacion ul{
	list-style: none;
}

.menu > li{
	position: relative;
	display: inline-block;
}

.menu > li > a{
	display: block;
	padding: 15px 20px;
	color: black;
	font-family: 'Open sans';
	text-decoration: none;
}

.menu li a:hover{
	color: white;
	transition: all .1s;
}

/* Submenu*/

.submenu{
	position: absolute;
	background: white;
	width: 120%;
	visibility: hidden;
	opacity: 0;
	transition: opacity 1.5s;
}

.submenu li a{
	display: block;
	padding: 15px;
	color: black;
	font-family: 'Open sans';
	text-decoration: none;
}

.menu li:hover .submenu{
	visibility: visible;
	opacity: 1;
}
        </style>
    </head>
    <body>
        <header class="banner">
            <div class="contenedor">
                <h1>Concesionario de Autos</h1>
            </div>
        </header>
        <header>
        <center>
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="#">Combustible</a>
                <ul class="submenu">
						<li><a href="gasolina.php">Gasolina</a></li>
						<li><a href="diesel.php">Diesel</a></li>
                        <li><a href="index.php">Todo tipo</a></li>
					</ul>
                </li>
				<li>
    <a href="#">Marca</a>
    <ul class="submenu">
        <select name="Marca" onchange="window.location.href = this.value;">
            <option value="">Selecciona una marca</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "concesionario");
            if ($conn->connect_error) {
                die("Error en la conexión: " . $conn->connect_error);
            }

            $consulta = "SELECT DISTINCT Marca FROM coches";
            $result = $conn->query($consulta);

            if ($result->num_rows > 0) {
                while ($fila = $result->fetch_assoc()) {
                    $marca = $fila['Marca'];
                    echo "<option value='coches.php?marca=$marca'>$marca</option>";
                }
            }
            $conn->close();
            ?>
        </select>
    </ul>
</li>

				
			</ul>
		</nav>
        </center>
        </header>
        <center><table>
        <?php
            $conn = new mysqli("127.0.0.1", "root", "", "concesionario");
            if (!$conn) {
                die("Error en la conexión");
            }
            $consulta = "select * from coches where Combustible = 'Diesel' ";
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
        </table></center>
    </body>
</html>
