<html>
    <head>
        <meta charset="UTF-8">
        </head>
        <body>
            <center>
            <?php
                $dni = $_GET['dni'];
                $conn = new mysqli("localhost", "root", "", "congreso");

                if ($conn->connect_error) {
                    die("Error en la conexión: " . $conn->connect_error);
                }

                $consulta = "SELECT * FROM registros WHERE dni = '$dni'";
                $result = $conn->query($consulta);

                if ($result) {
                    $n = $result->num_rows;
                    if ($n > 0) {
                        echo "Usted está registrado correctamente en nuestro congreso.";
                    } else {
                        echo "Usted no está registrado.";
                    }
                }else {
                        echo "Error en la consulta: " . $conn->error;
                }

                $conn->close();
            ?>

            </center>
        </body>
        </html>