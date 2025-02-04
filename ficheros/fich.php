<html>
    <body>
        <select>
<?php
$archivo="C:/tmp/hola.txt";
$id = fopen($archivo, "r");
while(!feof($id))
{
$linea=fgets($id,1024);
echo "<option>".$linea."</option>";
}
fclose($id);
?>
</select>
</body>
</html>
