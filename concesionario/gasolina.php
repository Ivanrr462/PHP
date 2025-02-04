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
        <script>
   function enviar(m){
    
   	location.href="marcas.php?Marca=" + m.value 
   }
   function enviarg(m){
    
    location.href="gasolina.php?Combustible=" + m.value 
}
</script>
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
                <select  onChange="enviarg(this)">

                    <option value="">Opciones</option>
                    <option value="nada">Muestra Todo</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Gasolina">Gasolina</option>
                </select>   
					</ul>
                </li>
				<li>
    <a href="#">Marca</a>
    <ul class="submenu">
    <select  onChange="enviar(this)">

        <option value="nada">Opciones</option>
        <option value="nada">Muestra Todo</option>
        <option value="Nissan">Nissan</option>
        <option value="Audi">Audi</option>
        <option value="Maserati">Maserati</option>
        <option value="Volkswagen">Volkswagen</option>
        <option value="Mercedes">Mercedes</option>
        <option value="Renault">Renault</option>
        <option value="Ford">Ford</option>
        <option value="Seat">Seat </option>
        </select>   

    </ul>
</li>	
			</ul>
		</nav>
        </center>
        </header>
        <center><table>
        <?php
        $conn = new mysqli("localhost", "root", "", "concesionario");

        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }
        $combustible=$_GET['Combustible'];
        if($combustible !== 'nada'){
            $consulta = "select * from coches where Combustible = ('$combustible')";
            $result = $conn->query($consulta);

            $counter = 0; 

            echo '<table><tr>';

            while ($fila = $result->fetch_array()) {
                echo "<td style='vertical-align: top; padding: 10px;'>"; 
                echo "<img src='$fila[9]' width='300'><br>"; 
                echo "<center><h3>$fila[2] $fila[1]</h3><br>$fila[3] | $fila[4] | $fila[5]<br><b>Precio: $fila[8]<b></center>"; 
                echo "</td>";
                $counter++;

                if ($counter % 3 == 0) {
                    echo '</tr><tr>'; 
                }
            }}else{
                header ('Location:index.php');
             }

            echo '</tr></table>';

            $conn->close();
        ?>
        
        </table></center>
    </body>
</html>