<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: index.html');
    exit();
}

$directorio = 'imagenes/';
$mensaje='';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])) {
    $nombrearchivo = $_FILES['foto']['name'];
    $fileTmpPath = $_FILES['foto']['tmp_name'];
    $uploadPath = $directorio . basename($nombrearchivo);
    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        $mensaje = 'Archivo subido con exito';
    }else{
        $mensaje = 'Hubo un error al subir el archivo';
    }
}

$fotos = array_diff(scandir($directorio), array('..', '.'));
?>
<!DOCTYPE html>
<html>
    <head>
    <style>
            td{
    font-family: tahoma;
    font-size: 14px;
    color: black;
    border-bottom-width: 1px;
    border-bottom-style: inset;
    border-bottom-color: black; 
}
body {
    font-family: Arial, sans-serif;
    background-color: black;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding-top: 20px;
}

a {
    text-decoration: none;
    color: blue;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    
}

th,
td {
    border: 1px solid black;
    text-align: left;
    padding: 8px;
}

th {
    background-color: blue;
    color: white;
}
        </style>   
    </head>
    <body style="background-color: lightblue;">
        <div class="container">
            <center>
            <img src="images/vida.png" width="500"><br>
            <?php       
                        if ($_SESSION['usuario']) {
                        echo "<a href='cerrar.php'><img src='images/icono.png' width='15'></a>";
                        } else {
                        header('location:index.html');
                        
                    }
                    ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="foto" required>
                <input type="submit" value="SUBIR FOTO">
                </form>
                <?php if (!empty($fotos)): ?>
                <?php endif; ?>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Enlace</th>
                        <th>Borrar</th>
                    </tr>
                    <?php
                        $path = "imagenes/";
                        $dir = opendir($path);
                        if (!$dir) {
                            echo "Error al abrir el directorio";
                        }
                        while ($elemento = readdir($dir)) {
                            if (($elemento != ".") && ($elemento != "..")) {
                                $fichero = $path . $elemento;
                                $extension = pathinfo($elemento, PATHINFO_EXTENSION);
                                $nombre = pathinfo($elemento, PATHINFO_FILENAME);
                                if ($extension == 'jpg') {
                                    echo "<tr>
                                    <td align='center'>
                                        <a href='$fichero'><img src='$fichero' width='300' style='display: block; margin: 0 auto;'></a>
                                    </td>
                                    <td>$nombre</td>
                                    <td><a href='borrar.php?fichero=$fichero'><img src='images/basura.png' width='40'></a></td>
                                </tr>
                                ";
                                }
                            }
                        }
                        closedir($dir);
                    ?>
                </table>
            </center>
        </div>
    </body>
</html>