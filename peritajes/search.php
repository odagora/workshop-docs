<?php
//Verify if session started, else redirect to login.php
session_start();
if (!$_SESSION['logged']) {
	header("Location: ../login.php");
	exit;
}
echo "Bienvenido, ".$_SESSION['username'];
echo "<br><br>";
echo "<a href=index.php>Regresar</a>";
echo "<br><br>";
echo "<a href=../login.php>Cerrar Sesión</a>";
//
include ('../info.php'); //Database connection
require 'data_check.php'; //Input field data check file 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/view3.css" media="all">
	<title>Peritaje de Vehículos Usados</title>
	<link rel="stylesheet" type="text/css" href="css/view.mobile3.css" media="all"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body id="main_body">
	<img id="top" src="img/top.png" alt="">
	<div id="form_container">
		<h1><a>Peritaje de Vehículos Usados</a></h1>
		<form method="post" class="appnitro" action="">
			<div class="header-image">
					<a href="http://servitalleres.com" target="_blank"><img src="img/logo.png"></a>
			</div>
			<div class="form_description">
				<h2>Peritaje de Vehículos Usados</h2>
				<p>Peritaje para compra de vehículos usados</p>
			</div>
			<ul >
				<li>
					<div style="border-bottom:none; margin:0;" class="form_description">
						<h3 style="text-align:center;">Ingrese el No. de documento, placa, nombre o apellido del cliente:</h3>
					</div>
				</li>
				<li id="li_2">	
					<div class="search_box">
						<div>
							<input class="element text medium" type="text" name="cons2" id="cons2" value="<?php echo $search2;?>"/>
							<span><input type="submit" value="Buscar" class="button_text"></input></span>
						</div>							
					</div>
				</li>
				<li id="li_2">
					<div class="error">
						<p><?php echo $search2Err2;?></p>
					</div>
				</li>
				<?php 
					$_SESSION['cons2'] = $search2;
					if (!empty($search2)){
						// header("location: print_cc.php");
						// exit;
						if(strlen($search2) <= 1) {
							echo "<li id=li_2>
								<div class=error>
									<p style=text-align:center>* Término de búsqueda muy corto</span>
								</p>";
						}
						else {
							require('search_query.php');
							$foundnum2 = mysql_num_rows($run2); 

							if ($foundnum2 == 0) {
								echo "<li id=li_2>
								<div class=error>
									<p style=text-align:center>* No existen registros para ese criterio de búsqueda</span>
								</p>"; 
							}
							else {
								//Table column header information 
									echo "<li class=section_break>
									
										</li>
										<div class=document_container>
										<li id=li_3 class=matrix>
										<table>
											<thead>
									            <tr align='center'>
									            	<th width='60' align='center'>No.</th>
									            	<th width='190' align='center'>Cliente</th>
									            	<th width='60' align='center'>Placa</th>
									            	<th width='50' align='center'>Kilometraje</th>
									            	<th width='80' align='center'>Fecha</th>
							            		</tr>
							            	</thead>
							            	<tbody>
							            	</form>";

								while($runrows2 = mysql_fetch_assoc($run2)) {

									//Table content variable information based on query
									$id = $runrows2['id']+2000;
									$client = $runrows2['firstname']. ' '.$runrows2['lastname']; 
									$license = $runrows2['license'];
									$mileage = $runrows2['mileage'];
									$date = $runrows2['day']. '/'.$runrows2['month']. '/'.$runrows2['year'];
					            	
					            	echo "<tr align='center'>
							            	<form method=post action=print_p.php target=_blank>
								            	<th width='60' align='center'>
								            		<input type=submit name=doc2 value=$id>
								            	</th>
								            </form>
							            	<th width='190' align='center'>$client</th>
							            	<th width='60' align='center'>$license</th>
							            	<th width='50' align='center'>$mileage</th>
							            	<th width='80' align='center'>$date</th>
						            	</tr>";
			            		}
			            		echo "</tbody> 
				            		</table>
			            			</li>
			            			</div>
			            			<div class=export_button>
			            				<form method=post action=export.php>
						            		<input type=submit name=export value=Exportar class=button_text>
								    </form>
								    </div>";
							}
						}
					}
					else {
						echo "<form method=post action='search.php'>";
					}
				?>
			</ul>
		</form>
		<div id="footer">
			Copyright &copy; 2016 <a href="http://www.servitalleres.com" target="_blank">Servitalleres</a>
		</div>
	</div>
</body>
</html>	
