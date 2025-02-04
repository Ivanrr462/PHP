[void][System.Reflection.Assembly]::LoadWithPartialName("MySql.Data")
$MySQLAdminUserName = 'root'
$MySQLAdminPassword = ''
$MySQLDatabase = 'congreso'
$MySQLHost = 'localhost'
$ConnectionString = "server=" + $MySQLHost + ";port=3306;uid=" + $MySQLAdminUserName + ";pwd=" + $MySQLAdminPassword + ";database="+$MySQLDatabase
$Connection = New-Object MySql.Data.MySqlClient.MySqlConnection
$Connection.ConnectionString = $ConnectionString
$Connection.Open()
$sql = New-Object MySql.Data.MySqlClient.MySqlCommand
$sql.Connection = $Connection
$sql.CommandText = "select * from registros"


$dataAdapter = New-Object MySql.Data.MySqlClient.MySqlDataAdapter($sql)
$dataSet = New-Object System.Data.DataSet

$g=$sql.ExecuteNonQuery()
$c=$dataAdapter.Fill($dataSet)
$l=$dataset.tables[0].rows.Count;
for($i=0; $i -lt $l; $i++){
$a=$dataset.Tables[0].Rows[$i].Item(0)
write-host $a

}