<html>
<body>
    <head>
        <meta charset="UTF-8">
    </head>
    <center>
        <?php
        $pro=$_GET['pro'];
        $pre=$_GET['pre'];
        $alm=$_GET['alm'];
        $cd=$_GET['cod'];
        $ex=$_GET['ex'];
        $conn = new mysqli("localhost", "root", "", "almacen");
        if (!$conn)
            die ("error en la conexion");
        $consulta="insert into almacen values ('$pro','$pre','$alm','$cd','$ex')";
        $result=$conn->query($consulta);
        $n=$conn->affected_rows;
        echo $n;
        
        ?>
    </center>
</body>
</html>