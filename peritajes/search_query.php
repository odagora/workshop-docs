<?php
$construct2 = "SELECT * FROM document2 WHERE
						(id+2000 LIKE '%$search2%'
						OR firstname LIKE '%$search2%'
						OR lastname LIKE '%$search2%'
						OR license LIKE '%$search2%')"; 
$run2 = mysql_query($construct2);
?>