<?php
require('assets/lychee/data/config.php');

//Connect to database
try {
$dbo = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPassword);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

//Set table names to truncate
if (!empty($dbTablePrefix)) {
	$tablePhoto = $dbTablePrefix.'_'.'lychee_photos';
	$tableAlbum = $dbTablePrefix.'_'.'lychee_albums';
}
else{
	$tablePhoto = 'lychee_photos';
	$tableAlbum = 'lychee_albums';	
}

$tables = array('table1' => $tableAlbum,
				'table2' => $tablePhoto
				);

//MySQL command to truncate photo and albums table
foreach ($tables as $table=>$value) {
	$sql= "TRUNCATE TABLE `".$value."`";
	$result = $dbo->query($sql);	
}
?>