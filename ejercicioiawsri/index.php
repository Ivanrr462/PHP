<html>
<head><meta charset="UTF-8"></head>
<body>
	
	<BR><hr>
	<table>
        <center>
        <h1>LISTA DE PROCESOS</h1>
        
	<?php
	session_start();
    if($_SESSION['usuario']){
        echo "CERRAR SESION <a href='cerrar.php'><img src='icono.png' width='30'>";
      }else{
        header("Location: cerrar.php");
    }
	  $conn = new mysqli("127.0.0.1", "root", "","almacen");
         if (!$conn)  die ("Error en la conexion");
         $consulta="select * from procesos "; 
         $result = $conn->query($consulta); 
          while ($fila = $result->fetch_array())
          {
          	echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td></tr>";
          } 
        
          ?>
        </center>
      </table>
     <hr>
</body>
</html>