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
@$doc = $_POST['doc']-1000;
@$search = $_SESSION['cons'];

//get last results from database if recently submitted
$result = mysql_query("SELECT * FROM document ORDER BY id DESC LIMIT 1")
	or die(mysql_error());

if (!empty($search)) {
	$result = mysql_query("SELECT * FROM document WHERE id = '$doc'")
		or die(mysql_error());

	//If there's no information in database from search query
	if (mysql_num_rows($result) == 0) {
		die('No hay información con ese criterio de búsqueda');
	}
}	

while ($row = mysql_fetch_array($result)) {
	$doc = $row['id'];
	require('print_cc.php');
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
  <div id="text">Generado Certificado de Control Calidad No. <?php echo ("$doc")+1000;?><br>
  	<?php 
  		$doc = $doc+1000;
  		$doc1 = $doc -1000;
  	?>
  	<form style="display:inline-block" name="fpdf" id= "fpdf" method="post" action="print_pdf.php">
			<th width='60' align='center'>
				<input type="submit" name="pdf" value="Imprimir en pdf">
				<input type="hidden" name="doc" value="<?php echo $doc;?>" >
				<input type="hidden" name="doc1" value="<?php echo $doc1;?>" >
			</th>
	</form>
  	<form style="display:inline-block" name="send" id="send" action="send_email.php" method="post">
  		<th width='60' align='center'>
	  		<input type="submit" name="emailSend" value="Enviar por correo">
	  		<input type="hidden" name="doc" value="<?php echo $doc;?>" >
			<input type="hidden" name="doc1" value="<?php echo $doc1;?>" >
		</th>
  	</form>
  	<button onclick= "search()">Buscar otro certificado</button>
  	<button onclick= "home()">Hacer otro certificado</button>
  	<button onclick= "root()">Ir al inicio</button>
  </div>
</div>
</body>
</html>
