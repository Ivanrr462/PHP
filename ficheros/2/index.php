<html>
<body>
<form action="leer.php" method="get">
    <select name="fich">
    <?php
        $path="C:/tmp";
        $dir = opendir($path);
        if(!$dir){
            echo "Error al abrir el directorio";
        };
        while($elemento = readdir($dir)){
            if(($elemento != ".") && ($elemento != "..")){
            echo "<option>";
            echo "$elemento";
            echo "</option>";
        }};
        closedir($dir);
    ?>
    </select>
    <input type="submit" value="Mostrar"> 
    </form>
</body>
</hmtl>