<?php
    if (isset($_GET['archivo'])) {
        $archivo_path = $_GET['archivo'];

        if (file_exists($archivo_path)) {
            $extension = pathinfo($archivo_path, PATHINFO_EXTENSION);

            if (in_array($extension, array("jpg", "jpeg", "png", "gif"))) {
                // Mostrar imágenes directamente
                echo "<img src='$archivo_path' alt='Imagen'>";
            } elseif ($extension === "pdf") {
                // Mostrar archivos PDF usando un iframe
                echo "<iframe src='https://docs.google.com/viewer?url=$archivo_path' width='100%' height='600px' style='border: none;'></iframe>";
            } else {
                // Mostrar contenido de archivos de texto en un preformato
                $contenido = htmlentities(file_get_contents($archivo_path));
                echo "<pre>$contenido</pre>";
            }
        } else {
            echo "El archivo no existe.";
        }
    } else {
        echo "No se proporcionó un archivo para visualizar.";
    }
?>



