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

//Connect to phpmailer script 
require '../assets/phpmailer/PHPMailerAutoload.php';

//Connect to the database
include ('../info.php');

//Search for the number of document in db
@$search = $_SESSION['cons'];
@$doc = $_POST['doc']-1000;

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

//loop through results of database query, displaying them in the format
while ($row = mysql_fetch_array($result)) {
	$doc = $row['id']+1000;
	$day = $row['day'];
	$month = $row['month'];
	$year = $row['year']-2000;
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$email = $row['email'];
	$make = $row['make'];
	$line = $row['type'];
	$license = $row['license'];
}

if (isset($_POST['emailSend'])) {
		$bodytext = $firstname." ".$lastname."<p>Adjunto se encuentra el certificado de control calidad de la reparación hecha a tu vehículo". " ". $make."  ". $line." "."de placas"." ". $license."."." ". "Ten presente las observaciones dadas. Recuerda revisar la política de garantía en el siguiente vínculo: <a href='http://servitalleres.com/politica-de-garantia'>click aquí</a>.<p>Cordial saludo,<p>Servicio al cliente<br>Servitalleres Ltda<br>Carrera 22 # 76-57<br>Tels: 2117943 - 2119290<br><a href='http://servitalleres.com'>www.servitalleres.com</a>";

  		//Create a new PHPMailer instance
	    $mail = new PHPMailer();
	    $mail->CharSet = "UTF-8";   
	    $mail->isSMTP();
		// change this to 0 if the site is going live and 2 if working on localhost or development
	    $mail->SMTPDebug = 0;
	    $mail->Debugoutput = 'html';
	    $mail->Host = 'smtp.gmail.com';
	    $mail->Port = 465;
	    $mail->SMTPSecure = 'ssl';

	    //Options for self-signed certificate in mail server (May not work on every server - OPTIONAL)
	    $mail->SMTPOptions = array (
	    	'ssl' => array (
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
    		)
		);

	 	//use SMTP authentication
	    $mail->SMTPAuth = true;
		//Username to use for SMTP authentication
		$filename = '../assets/config.ini';
	    $data = parse_ini_file($filename, true);

	    $mail->Username = $data['config']['email'][0];
	    $mail->Password = $data['config']['email'][1];
	    $mail->setFrom($data['config']['email'][0], 'Servitalleres');
	    $mail->addAddress($email, $firstname." ".$lastname);
	    //Create an array with recipients addresses
		$recipients = array(
			'dgonzalez@servitalleres.com' => 'Daniel González',
			// 'corjuela@servitalleres.com' => 'Carlos Orjuela'
		);
		foreach ($recipients as $m => $name) {
			$mail->AddBCC($m, $name);
		}

	    $mail->Subject = "Certificado de control calidad". " ". $make."  ". $line." "."placas"." ". $license;

	    //Handle attachment storing a copy in temp folder
	    $fileAttach = 'C:/Temp/'.$doc.'_'.$license.'_'.$day.$month.$year.'.pdf';
	    
	    if (!file_exists($fileAttach)) {
	    	include 'print_pdf.php';
	    	header('HTTP/1.1 307 Temporary Redirect');
	    	header('Location:send_email.php');
	    }

	    $mail->AddAttachment($fileAttach);

	    // $message is gotten from the form
    	$mail->msgHTML($bodytext);


		//Check if email exist in database then send the message or report the error
    	if(!empty($email)){
		    if (!$mail->send()) {
		        $confMsg = "El correo no fue enviado correctamente, favor intentar de nuevo.";
		    } else {
		        $confMsg = "El correo fue enviado correctamente.";
		    }
		}
		else {
			$confMsg = "No existe dirección de correo registrada. Favor verificar.";
		}
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
</head>
<body id="report">
	<div id="overlay">
		 <div id="text"><?php echo $confMsg;?><br>
		 	<button onclick= "search()">Buscar otro certificado</button>
		 	<button onclick= "home()">Ir al inicio</button>
		 </div>
	</div>
</body>
</html>