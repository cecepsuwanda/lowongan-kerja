<?php
$server = "localhost";
$user = "root";
$pass = "123456";
$mysql_db = "career";
mysqli_connect($server, $user, $pass)or die("Error Connecting to MYSql Server:".mysql_error());  
mysql_select_db($mysql_db)or die("Error Selecting MYSql Database:".mysql_error());  
?>