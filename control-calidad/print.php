<?php
//Verify if session started, else redirect to login.php
// ob_start();
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

//get last results from database if recently submitted
$result = mysql_query("SELECT * FROM document ORDER BY id DESC LIMIT 1")
	or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
	$doc = $row['id'];
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
  	<?php 
  		$doc = $doc+1000;
  	?>
<body id="report">
<div id="overlay">
  <div id="text">Generando archivo pdf<br>
	<form style="display:inline-block" name="send" id="send" action="send_email.php" method="post">
  		<th width='60' align='center'>
	  		<input type="submit" name="emailSend" value="Enviar por correo">
	  		<input type="hidden" name="doc" value="<?php echo $doc;?>" >
		</th>
  	</form>
  	<button onclick= "search()">Buscar certificado</button>
  	<button onclick= "home()">Hacer otro certificado</button>
  	<button onclick= "root()">Ir al inicio</button>
  </div>
</div>
<?php
include('print_cc.php');
?>
</body>
</html>
