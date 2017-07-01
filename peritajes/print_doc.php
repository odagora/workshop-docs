<?php
//Verify if session started, else redirect to login.php
ob_start();
if(!isset($_SESSION)) { 
    session_start(); 
} 
if (!$_SESSION['logged']) {
	header("Location: ../login.php");
	exit;
}
//Connect to the database
include ('../info.php');

//Search for the number of document in db
@$doc2 = $_POST['doc2']-2000;
@$search2 = $_SESSION['cons2'];

//get last results from database if recently submitted
$result2 = mysql_query("SELECT * FROM document2 ORDER BY id DESC LIMIT 1")
	or die(mysql_error());

if (!empty($search2)) {
	$result2 = mysql_query("SELECT * FROM document2 WHERE id = '$doc2'")
		or die(mysql_error());

	//If there's no information in database from search query
	if (mysql_num_rows($result2) == 0) {
		die('No hay información con ese criterio de búsqueda');
	}
}	

while ($row2 = mysql_fetch_array($result2)) {
	$doc2 = $row2['id'];
	require('print_p.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		function search(){
			window.location.replace("search.php");
		}
	</script>
	<script type="text/javascript">
		function home(){
			window.location.replace("index.php");
		}
	</script>
	<script type="text/javascript">
		function root(){
			window.location.replace("../index.php");
		}
	</script>
</head>
<body id="report">
<div id="overlay">
  <div id="text">Generado Peritaje No. <?php echo ("$doc2")+2000;?><br>
  	<?php 
  		$doc2 = $doc2+2000;
  		$doc3 = $doc2 -2000;
  	?>
  	<form style="display:inline-block" name="fpdf" id= "fpdf" method="post" action="print_pdf.php">
			<th width='60' align='center'>
				<input type="submit" name="pdf" value="Imprimir en pdf">
				<input type="hidden" name="doc2" value="<?php echo $doc2;?>" >
				<input type="hidden" name="doc3" value="<?php echo $doc3;?>" >
			</th>
	</form>
  	<form style="display:inline-block" name="send" id="send" action="send_email.php" method="post">
  		<th width='60' align='center'>
	  		<input type="submit" name="emailSend" value="Enviar por correo">
	  		<input type="hidden" name="doc2" value="<?php echo $doc2;?>" >
			<input type="hidden" name="doc3" value="<?php echo $doc3;?>" >
		</th>
  	</form>
  	<button onclick= "search()">Buscar otro peritaje</button>
  	<button onclick= "home()">Hacer otro peritaje</button>
  	<button onclick= "root()">Ir al inicio</button>
  </div>
</div>
</body>
</html>
