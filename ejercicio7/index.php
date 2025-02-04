<html>
<body>
    <head>
        <meta charset="UTF-8">
    </head>
    <style>
td{
    border-bottom-color: blue;
    border-bottom-style: groove;
    border-bottom-width: 2px;
    font-family: tahoma;
    font-size: 12px;
}
.cab{
    background-color: #AED6F1;
    border-top-color: blue;
    border-top-style: groove;
    border-top-width: 2px;
}
    </style>
    <center>
        <h1>LISTADO DE PRODUCTOS</h1>
        <table>
        <tr><td class="cab">Producto</td><td class="cab">Precio</td><td class="cab">Almacen</td><td class="cab">Codigo</td><td class="cab">Existencia</td><td class="cab"></td></tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "almacen");
        if (!$conn)
            die ("error en la conexion");
        $consulta="select * from almacen";
        $result=$conn->query($consulta);
        while ($fila = $result->fetch_array())
        {
            echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td><a href='borrar.php?cd=$fila[3]'><img src='basura.jpg' width='20'></a></td></tr>";
        }
        
        ?>
        </table>
    </center>
</body>
</html>