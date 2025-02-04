<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit();
}

$usuario = $_SESSION['usuario'];
$folder_path = './Usuarios/' . $usuario;

$conn = new mysqli("localhost", "root", "", "drive");

if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

$sql = "SELECT nombre FROM usuarios WHERE login = '$usuario'";
$resultado = $conn->query($sql);
$nombre_usuario = ($resultado->num_rows > 0) ? $resultado->fetch_assoc()['nombre'] : 'Usuario';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nube</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .rotulo {
            text-align: center;
            margin: 50px;
            padding: 20px;
            background-color: lightblue;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #666666;
        }

        center {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #dddddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        img {
            vertical-align: middle;
        }

    </style>
</head>
<body>
    <div class="rotulo">
        <h1>Nube</h1>
        <p>Bienvenido, <?php echo $nombre_usuario; ?></p>
        <a href='cerrar.php'><img src='imagenes/icono.png' width='30'></a>
    </div>

    <center>
        <form action="subir.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button class="upload" name="submit">Subir archivos</button>
        </form>

        <table>
            <tr>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            <?php
            foreach ($contenido as $elemento) {
                if ($elemento != "." && $elemento != "..") {
                    $extension = pathinfo($elemento, PATHINFO_EXTENSION);
                    $nombre = pathinfo($elemento, PATHINFO_FILENAME);
                    $archivo_path = $folder_path . '/' . $elemento;

                    echo "<tr>";
                    echo "<td>";
                    if (is_dir($archivo_path)) {
                        echo "<img src='imagenes/carpeta.png' alt='Carpeta' width='20'>";
                    } else {
                        echo "<img src='imagenes/txt.png' alt='Archivo' width='25'>";
                    }
                    echo "</td>";
                    echo "<td>";
                    if (is_dir($archivo_path)) {
                        echo $nombre;
                    } else {
                        echo "<a href='ver_archivo.php?archivo=$archivo_path' target='_blank'>$nombre</a>";
                    }
                    echo "</td>";
                    echo "<td>";
                    if (!is_dir($archivo_path)) {
                        echo "<a href='descargar.php?archivo=$archivo_path'><img src='imagenes/descargar.png' width='25'></a> | ";
                    }
                    echo "<a href='borrar.php?archivo=$archivo_path'><img src='imagenes/basura.png' width='25'></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </center>
</body>
</html>
