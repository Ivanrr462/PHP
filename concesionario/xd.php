<html>
<head>
<script>
// this significa que env�a el objeto select a la funci�n
// la funci�n lo recoge con la variable m y extrae su value

   function enviar(m){

   	location.href="index.php?dato=" + m.value 
   }
</script>
</head>
<body>

    <select  onChange="enviar(this)">

    <option value="opel">Opel</option>
    <option value="Seat">Seat </option>
    </select> 

</body>
</html>

La pagina php recoge la variable dato que ha venido por la red y la pasa a $marca y luego opera con ella.

<?php
$marca=$_GET['dato'];
echo $marca;
?>
