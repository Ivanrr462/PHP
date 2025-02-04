<html>
<body>
    <head>
        <meta charset="UTF-8">
    </head>
    <center>
        <?php
        $cd=$_GET['cd'];
        $conn = new mysqli("localhost", "root", "", "almacen");
        if (!$conn)
            die ("error en la conexion");
        $consulta ="DELETE FROM almacen WHERE codigo = '$cd'";
        $result = $conn->query($consulta);
        $n=mysqli_affected_rows($conn);
        if($n==1) header('Location: index.php');
        else echo "Error en la operacion ";
            
            
        
        ?>
    </center>
</body>
</html>