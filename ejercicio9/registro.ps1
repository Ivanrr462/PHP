
[void][System.Reflection.Assembly]::LoadWithPartialName("MySql.Data")
$MySQLAdminUserName = 'root'
$MySQLAdminPassword = ''
$MySQLDatabase = 'congreso'
$MySQLHost = 'localhost'

$ConnectionString = "server=" + $MySQLHost + ";port=3306;uid=" + $MySQLAdminUserName + ";pwd=" + $MySQLAdminPassword + ";database="+$MySQLDatabase


$Connection = New-Object MySql.Data.MySqlClient.MySqlConnection
$Connection.ConnectionString = $ConnectionString
$Connection.Open()

write-host "conectado" 

$sql = New-Object MySql.Data.MySqlClient.MySqlCommand
$sql.Connection = $Connection


# Aqui comienza el bucle de insertar procesos
$query = "select dni from registros"
$command = $connection.CreateCommand()
$command.CommandText = $query

$result = $command.ExecuteReader()
while($result.Read()){
$dni = $result["dni"]
$contraseña = ConvertTo-SecureString $dni -AsPlainText -Force
New-LocalUser -Name $dni -Password $contraseña -Description "Usuario creado" 
Write-Host "Usuario creado"
}

$Connection.Close()