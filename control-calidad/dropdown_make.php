<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "servital_servita3";

$connect = mysql_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `cc_vehiclemake`";

$result1 = mysql_master_query($connect, $query);

?>