<html>
<body>
    <head>
        <meta charset="UTF-8">
    </head>
    <center>
        <?php
        $cd=$_GET['cod'];
        $conn = new mysqli("localhost", "root", "", "almacen");
        if (!$conn)
            die ("error en la conexion");
        $consulta="DELETE FROM almacen WHERE codigo = '$cd'";
        $result=$conn->query($consulta);
        if ($result) {
            $n = $conn->affected_rows;
            echo "Se han eliminado $n registro(s) correctamente.";
        } else {
            echo "Error al eliminar el registro: " . $conn->error;
        }
        
        ?>
    </center>
</body>
</html>