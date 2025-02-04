<html>
    <head>
        <meta charset="UTF-8">
        </head>
        <body>
            <center>
                <?php
                    $dni=$_POST['dni'];
                    $conn = new mysqli("localhost", "root", "", "congreso");
                    if (!$conn)
                        die ("error en la conexion");
                    $consulta="insert into registros values ('$dni')";
                    $result=$conn->query($consulta);
                    if ($result) {
                        $n = $conn->affected_rows;
                        echo "Se ha registrado usted correctamente en nuestro congreso.";
                    } else {
                        echo "Error al intentar registrarse";
                    }
        
                 ?>
            </center>
        </body>
        </html>