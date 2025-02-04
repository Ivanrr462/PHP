<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Procesos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table tr th {
            background-color: #007BFF;
            color: #fff;
            font-weight: bold;
        }
        table tr td {
            text-align: center;
        }
        .welcome-text {
            text-align: center;
        }
        a {
            text-decoration: none;
        }
        hr {
            border: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>LISTA DE PROCESOS</h1>
    <hr>
    <div class="welcome-text">
        <?php
        session_start();
        if ($_SESSION['usuario']) {
            echo "Bienvenido al servidor";
            echo "<a href='cerrar.php'><img src='icono.png' width='10'></a>";
        } else {
            header('location:index.html');
        }
        ?>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
        <?php
        $conn = new mysqli("127.0.0.1", "root", "", "almacen");
        if (!$conn) {
            die("Error en la conexión");
        }
        $consulta = "select * from procesos";
        $result = $conn->query($consulta);
        while ($fila = $result->fetch_array()) {
            echo "<tr><td>{$fila[0]}</td><td>{$fila[1]}</td><td>{$fila[2]}</td></tr>";
        }
        ?>
    </table>
    <hr>
</body>
</html>


