<html>
    <body>
<?php
$archivo="C:/tmp/hola.txt";
if (file_exists($archivo)) {
    $handle = fopen($archivo, 'r');

    while (($linea = fgets($handle)) !== false) {
        $linea = trim($linea);
        $posicion_arroba = strpos($linea, '@');
        $parte_anterior = substr($linea, 0, $posicion_arroba);
        echo "$parte_anterior<br>";
    }
    fclose($handle);
} else {
    echo "El archivo no existe.";
}

?>
</body>
</html>