     <?php
        session_start();
        $usuario=$_POST['usu'];
        $clave=$_POST['clave'];  
        $a=md5($clave);
        $conn = new mysqli("localhost", "root", "", "drive");
        if (!$conn){
            die ("error en la conexion");}
        $consulta ="select * from usuarios where login = '$usuario' ";
        $result = $conn->query($consulta);
        $n=mysqli_affected_rows($conn);
        $fila = $result->fetch_array();
        if(($n==1) && ($a==$fila[2]))
        {
            $_SESSION['usuario'] = $usuario;
            header('Location: indice.php');
        }
        else {
            echo "<script>alert('UHUH, algo salió mal');</script>";
            echo "<script>window.location.href = 'index.html';</script>";
        }
          
?>
