<?php
$numero=$_GET['num'];
$d=$numero % 2;
if ($d==0)
	{echo "$numero es par";}
else 
	echo "$numero es impar";;
?>