<html>
    <head>
        <style>
            td{
                font-family: tahoma;
                font.size: 14px;
                color: blue;
                border-bottom-width: 1px;
                border-bottom-style: inset;
                border-bottom-color: blue; 
            }
        </style>
    </head>
<body>
    <center>
        <img src="images/banner.jpg" width=400><br>
    <table>
    <?php
        $path="libros/";
        $dir = opendir($path);
        if(!$dir){
            echo "Error al abrir el directorio";
        };
        while($elemento = readdir($dir)){
            if(($elemento != ".") && ($elemento != "..")){
            $fichero = $path.$elemento;
            $extension = pathinfo($elemento, PATHINFO_EXTENSION);
            $nombre = pathinfo($elemento, PATHINFO_FILENAME);
            if($extension=='pdf'){
            echo "<tr><td>$nombre</td><td><a href='$fichero'> <img src='images/pdf.png' width=30></a></td><td><a href='borrar.php?fich=$fichero'><img src='images/basura.png' width=30></a></td></tr>";
            }
        }};
        closedir($dir);
    ?>
    </table> 
    </center>
</body>
</hmtl>