<html>
<body>
    <center>
        <table>
            BORRAR UN CODIGO DE UNA BASE DE DATOS
            <form action="index.php" method="get">
                <tr><td>Codigo</td><td><select name="cod">
                    <?php
                    $conn = new mysqli("localhost", "root", "", "almacen");
        if (!$conn)
            die ("error en la conexion");
        $consulta="select codigo from almacen";
        $result=$conn->query($consulta);
        while ($fila = $result->fetch_array())
        {
            echo "<option>$fila[0]</option>";
        }
                    ?>
                </select></td></tr>
                <tr><td><input type="reset" value="Borrar"></td><td><input type="submit" value="Enviar"></td></tr>
            </form>
        </table>
    </center>
</body>
</html>