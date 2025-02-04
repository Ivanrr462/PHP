     <?php
        session_start();
        $nom=$_POST['nom'];
        $clave=$_POST['clave'];  
        $a=md5($clave);
        $conn = new mysqli("localhost", "root", "", "almacen");
        if (!$conn){
            die ("error en la conexion");}
        $consulta ="select * from facturacion where Nombre = '$nom' ";
        $result = $conn->query($consulta);
        $n=mysqli_affected_rows($conn);
        $fila = $result->fetch_array();
        if(($n==1) && ($a==$fila[0]))
        {
            $_SESSION['usuario'] = $nom;
            header('Location: index.php');
        }
        else {
            header('Location: index.html');
        }
          
?>
