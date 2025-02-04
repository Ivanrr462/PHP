<html>
    <body>
        <center><table width="60%">
<?php
$conn = new mysqli("127.0.0.1", "root", "", "inmo");
        if (!$conn) {
            die("Error en la conexión");
        }
        $consulta = "select * from inmueble";
        $result = $conn->query($consulta);
        while ($fila = $result->fetch_array()) {
            echo "<tr><td><img src='foto/$fila[5]' width='100'><br>Tipo: $fila[0]<br>Operacion: $fila[1]<br>Porvincia: $fila[2]<br></td></tr>";
        }
?>
</table></center></body></html>
