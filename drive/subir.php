<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: index.html');
    exit();
}

$targetdir = './Usuarios/' . $_SESSION['usuario'] . '/';
$targetfile = $targetdir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

if(file_exists($targetfile)) {
    echo "Lo siento, el archivo ya existe";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Lo siento, el archivo no fue subido.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetfile)) {
        echo "El archivo ". htmlspecialchars( basename($_FILES["fileToUpload"]["name"])). " ha sido subido";
    }else{
        echo "Lo siento, hubo un error al subir tu archivo";
    }
}

header('Location: indice.php');
?>
