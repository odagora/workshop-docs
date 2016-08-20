<?php
//Verify if session started, else redirect to login.php
session_start();
if (!$_SESSION['logged']) {
	header("Location: login.php");
	exit;
}
// echo "Bienvenido, ".$_SESSION['username'];
// echo "<br><br>";
// // echo session_id();
// // echo "<br><br>";
// echo "<a href=logout.php>Cerrar Sesión</a>";

//Control session timeout to logout after 30 minutes of last login
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

//Change session ID periodically to avoid attacks on sessions
if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 10) {
    // session started more than 10 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Servitalleres - Menú Principal</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<div class="header-info">
						<a href=""><img src="img/logo.png"></a>
						<div class="logout">
							<a href="login.php">Cerrar Sesión</a>
						</div>
					</div>	
				</div>		
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h3><div class="label label-default">CONTROL CALIDAD</div></h3>	
				<a href="control-calidad/index.php"><img src="img/list.png"></a>
			</div>
			<div class="col-md-4">
				<h3><div class="label label-default">PERITAJES</div></h3>	
				<a href=""><img src="img/car-inspection.png"></a>
			</div>
			<div class="col-md-4">
				<h3><div class="label label-default">INSPECCIONES VISUALES</div></h3>	
				<a href=""><img src="img/car-repair-check.png"></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<h3><div class="label label-default">COLISIÓN EXPRÉS</div></h3>	
				<a href=""><img src="img/car-painting.png"></a>
			</div>
			<div class="col-md-3">
				<h3><div class="label label-default">FOTOS OT</div></h3>	
				<a href=""><img src="img/photo-camera.png"></a>
			</div>
			<div class="col-md-3">
				<h3><div class="label label-default">PRECIOS OM</div></h3>	
				<a href=""><img src="img/label.png"></a>
			</div>
			<div class="col-md-3">
				<h3><div class="label label-default">COTIZACIONES</div></h3>	
				<a href=""><img src="img/sales-quotation.png"></a>
			</div>
		</div>
		<div class="footer">
			<h4>Copyright &copy; 2016 Servitalleres</h4>
		</div>
	</div>
	<script type="text/javascript" src="js/scrolltotop.js"></script>
	<a href="#" class="scrollToTop"></a>
</body>
</html>