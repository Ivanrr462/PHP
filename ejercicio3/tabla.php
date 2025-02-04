<html>
    <script>
        function comprobar(){
            var n=document.form1.num.value;
            if((isNaN(n) ) \\ (n=="")) {alert("debes introducir un numero")}
            else
                {form1.submit()}
        }
    </script>
<body>
    <form name="form1" action="tabla.php" method="get">
        <table>
            <tr><td>NUMERO</td><td><input type="text" name="num"></td></tr></table>
        <input type="button" onclick="comprobar()" value="ENVIAR">
    </form>
    <?php
    if($_GET)
    {
        echo"<hr><br>";
        $num=$_GET['num'];
        for ($i=1;$i<=10;$i++);
        {
            $r=$num*$i;
            echo "<center><table><tr><td>$num</td><td>x</td><td>$i</td><td>=</td><td>$r</td></tr></table></center> ";
        }
    }
    ?>
</body>    
</html>