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
// require ('search.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Peritaje de Vehículos Usados</title>
		<link rel="stylesheet" href="css/style1.css">
		<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/signaturepad/jquery.signaturepad.min.js"></script>
		<script type="text/javascript" src="js/signaturepad/json2.min.js"></script>
	</head>
	<body id="report">
		<?php
		//set search variable to find results from database
		@$search2 = $_SESSION['cons2'];
		@$doc2 = $_POST['doc2']-2000;

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

		//loop through results of database query, displaying them in the format
		while ($row2 = mysql_fetch_array($result2)) {
		?>
		<div class="grid">
			<div class="header">
				<div class="row">
					<div class="col-12">
						<img src="img/logo.png" alt="logo servitalleres" />
						<div class="col-1">
							<h2><?php echo 'N. '. ($row2['id']+2000)?></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<h1>PERITAJE DE VEHICULOS USADOS</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-4" id="hleft">
						<div class="col-12">
							<div class="col-6" style="float:left">
								<h3 style="font-weight:bold">Fecha:</h3>
							</div>
							<div class="col-6" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo $row2['day']. '/'. $row2['month']. '/'. $row2['year']?></h3>
							</div>
						</div>
						<div class="col-12">
							<div class="col-6" style="float:left">
								<h3 style="font-weight:bold">Asesor de servicio:</h3>
							</div>
							<div class="col-6" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo $row2['firstname1']. ' '. $row2['lastname1']?></h3>
							</div>
						</div>
					</div>
					<div class="col-4" id="hcenter">
						<div class="col-12">
							<h3 style="font-weight:bold">DATOS DEL CLIENTE:</h3>
						</div>
						<div class="col-12">
							<div class="col-4" style="float:left">
								<h3 style="font-weight:bold">Nombre:</h3>
							</div>
							<div class="col-8" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo $row2['firstname']. ' '. $row2['lastname']?></h3>
							</div>
						</div>
						<div class="col-12">
							<div class="col-4" style="float:left">
								<h3 style="font-weight:bold">Cédula:</h3>
							</div>
							<div class="col-8" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo number_format($row2['idnumber'],0,",",".")?></h3>
							</div>
						</div>
						<div class="col-12">
							<div class="col-4" style="float:left">
								<h3 style="font-weight:bold">Teléfono:</h3>
							</div>
							<div class="col-8" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo $row2['phone']?></h3>
							</div>
						</div>
						<div class="col-12">
							<div class="col-4" style="float:left">
								<h3 style="font-weight:bold">Email:</h3>
							</div>
							<div class="col-8" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo $row2['email']?></h3>
							</div>
						</div>
					</div>
					<div class="col-4" id="hright">
						<div class="col-12">
							<h3 style="font-weight:bold">DATOS DEL VEHICULO:</h3>
						</div>
						<div class="col-12">
							<div class="col-6" style="float:left">
								<h3 style="font-weight:bold">Marca y línea:</h3>
							</div>
							<div class="col-6" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo $row2['make']. ' '. $row2['type']?></h3>
							</div>
						</div>
						<div class="col-12">
							<div class="col-6" style="float:left">
								<h3 style="font-weight:bold">Modelo:</h3>
							</div>
							<div class="col-6" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo $row2['model']?></h3>
							</div>
						</div>
						<div class="col-12">
							<div class="col-6" style="float:left">
								<h3 style="font-weight:bold">Placa:</h3>
							</div>
							<div class="col-6" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo $row2['license']?></h3>
							</div>
						</div>
						<div class="col-12">
							<div class="col-6" style="float:left">
								<h3 style="font-weight:bold">Kilometraje:</h3>
							</div>
							<div class="col-6" style="float:right">
								<h3 style="border-bottom:1px solid black"><?php echo number_format($row2['mileage'],0,",",".")?></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="row">
					<div class="col-4" id="cleft">
						<?php
						require ('lists.php');
						$k=0;
						foreach ($names as $mat => $name) {
							if ($mat <= 2) {
								echo "<table>
									<thead>
										<tr style=height:20px>
											<th style=width:6% scope=col><span style=display:none>1</span></th>
											<th style=width:55% scope=col><span>$name</span></th>
								            <th  style=width:10% scope=col>B</th>
											<th  style=width:10% scope=col>R</th>
											<th  style=width:10% scope=col>M</th>
											<th  style=width:15% scope=col>N/A</th>
										</tr>
									</thead>
									<tbody>";
									for ($i=1; $i <= count($list[$mat]) ; $i++) {
								    	$concept = $list[$mat][$i];
								    	$matrix = $matrixNames[$mat][$i];
								    	echo "<tr class=alt>
											<td class=first_col>$i</td> 
								    		<td class=second_col>$concept</td>";
								    	for ($j=1; $j < 5; $j++) {
								    		if(isset($row2[$matrix]) && $row2[$matrix]==$j){
								    			$check[$j] = "checked";
								    		}
								    		else {
								    			$check[$j] = "";
								    		} 
							            	echo "<td><label style= display:none for=element_3_$j>$loptions[$j]</label><input id=element$j name=$elNames[$mat][$i] type=radio value=$j $check[$j]/></td>";
								    	}
								    	echo "</tr>";
					   					$k++;
					   					if ($mat==2 && $k==39) {
									   	 	break;
									    }
				   					}
				   			}
						}
						?>
							</tbody>
						</table>
					</div>
					<div class="col-4" id="ccenter">
						<?php
						require ('lists.php');
						$k=0;
						foreach ($names as $mat => $name) {
							if ($mat == 2) {
								echo "<table>
									<thead>
										<tr style=height:20px>
											<th style=width:6% scope=col><span style=display:none>1</span></th>
											<th style=width:55% scope=col><span style=display:none>$name</span></th>
								            <th  style=width:10% scope=col>B</th>
											<th  style=width:10% scope=col>R</th>
											<th  style=width:10% scope=col>M</th>
											<th  style=width:15% scope=col>N/A</th>
										</tr>
									</thead>
									<tbody>";
									for ($i=14; $i <= count($list[$mat]) ; $i++) {
								    	$concept = $list[$mat][$i];
								    	$matrix = $matrixNames[$mat][$i];
								    	echo "<tr class=alt>
											<td class=first_col>$i</td> 
								    		<td class=second_col>$concept</td>";
								    	for ($j=1; $j < 5; $j++) {
								    		if(isset($row2[$matrix]) && $row2[$matrix]==$j){
								    			$check[$j] = "checked";
								    		}
								    		else {
								    			$check[$j] = "";
								    		} 
							            	echo "<td><label style= display:none for=element_3_$j>$loptions[$j]</label><input id=element$j name=$elNames[$mat][$i] type=radio value=$j $check[$j]/></td>";
								    	}
								    	echo "</tr>";
					   					$k++;
					   					if ($k==6) {
									   	 	break;
									    }
				   					}
							}
							if ($mat>2 && $mat<= 5) {
								echo "<table>
									<thead>
										<tr style=height:20px>
											<th style=width:6% scope=col><span style=display:none>1</span></th>
											<th style=width:55% scope=col><span>$name</span></th>
								            <th  style=width:10% scope=col>B</th>
											<th  style=width:10% scope=col>R</th>
											<th  style=width:10% scope=col>M</th>
											<th  style=width:15% scope=col>N/A</th>
										</tr>
									</thead>
									<tbody>";
									for ($i=1; $i <= count($list[$mat]) ; $i++) {
								    	$concept = $list[$mat][$i];
								    	$matrix = $matrixNames[$mat][$i];
								    	echo "<tr class=alt>
											<td class=first_col>$i</td> 
								    		<td class=second_col>$concept</td>";
								    	for ($j=1; $j < 5; $j++) {
								    		if(isset($row2[$matrix]) && $row2[$matrix]==$j){
								    			$check[$j] = "checked";
								    		}
								    		else {
								    			$check[$j] = "";
								    		} 
							            	echo "<td><label style= display:none for=element_3_$j>$loptions[$j]</label><input id=element$j name=$elNames[$mat][$i] type=radio value=$j $check[$j]/></td>";
								    	}
								    	echo "</tr>";
					   					$k++;
					   					if ($mat==5 && $k==37) {
									   	 	break;
									    }
				   					}
							}
						}
						?>			
							</tbody>
						</table>
					</div>
					<div class="col-4" id="cright">
						<?php
						require ('lists.php');
						foreach ($names as $mat => $name) {
							if ($mat == 5) {
								echo "<table>
									<thead>
										<tr style=height:20px>
											<th style=width:6% scope=col><span style=display:none>1</span></th>
											<th style=width:55% scope=col><span style=display:none>$name</span></th>
								            <th  style=width:10% scope=col>B</th>
											<th  style=width:10% scope=col>R</th>
											<th  style=width:10% scope=col>M</th>
											<th  style=width:15% scope=col>N/A</th>
										</tr>
									</thead>
									<tbody>";
									for ($i=8; $i <= count($list[$mat]) ; $i++) {
								    	$concept = $list[$mat][$i];
								    	$matrix = $matrixNames[$mat][$i];
								    	echo "<tr class=alt>
											<td class=first_col>$i</td> 
								    		<td class=second_col>$concept</td>";
								    	for ($j=1; $j < 5; $j++) {
								    		if(isset($row2[$matrix]) && $row2[$matrix]==$j){
								    			$check[$j] = "checked";
								    		}
								    		else {
								    			$check[$j] = "";
								    		} 
							            	echo "<td><label style= display:none for=element_3_$j>$loptions[$j]</label><input id=element$j name=$elNames[$mat][$i] type=radio value=$j $check[$j]/></td>";
								    	}
								    	echo "</tr>";
					   					$k++;
					   					if ($k==2) {
									   	 	break;
									    }
				   					}
							}
							if ($mat > 5) {
								echo "<table>
									<thead>
										<tr style=height:20px>
											<th style=width:6% scope=col><span style=display:none>1</span></th>
											<th style=width:55% scope=col><span>$name</span></th>
								            <th  style=width:10% scope=col>B</th>
											<th  style=width:10% scope=col>R</th>
											<th  style=width:10% scope=col>M</th>
											<th  style=width:15% scope=col>N/A</th>
										</tr>
									</thead>
									<tbody>";
									for ($i=1; $i <= count($list[$mat]) ; $i++) {
								    	$concept = $list[$mat][$i];
								    	$matrix = $matrixNames[$mat][$i];
								    	echo "<tr class=alt>
											<td class=first_col>$i</td> 
								    		<td class=second_col>$concept</td>";
								    	for ($j=1; $j < 5; $j++) {
								    		if(isset($row2[$matrix]) && $row2[$matrix]==$j){
								    			$check[$j] = "checked";
								    		}
								    		else {
								    			$check[$j] = "";
								    		} 
							            	echo "<td><label style= display:none for=element_3_$j>$loptions[$j]</label><input id=element$j name=$elNames[$mat][$i] type=radio value=$j $check[$j]/></td>";
								    	}
								    	echo "</tr>";
				   					}
							}
						}
						?>			
							</tbody>
						</table>
					</div>
				</div>
				<div class="row-1">
					<h3>OBSERVACIONES:<br>(Anote el número correspondiente del ítem en cada caso)</h3>
				</div>
				<div class="row-2">
					<div class="col-6" style="float:left; padding-right:5px; border-right:1px solid black">
						<?php
						require('lists.php');
						foreach ($names as $mat => $name) {
							if ($mat < 5) {
								$comment= $comNames[$mat];
								$comments= $row2[$comment];
								echo "<div class=col-12>
									<div class=col-12 style=text-align:center>
										<h3 style=font-weight:bold>$name:</h3>
									</div>
									<div id=comments class=col-12>
										<h3>$comments</h3>
									</div>
									</div>";
								}		
						}
						?>
					</div>
					<div class="col-6" style="padding-left:5px">
						<?php
						require('lists.php');
						foreach ($names as $mat => $name) {
							if ($mat > 4) {
								$comment= $comNames[$mat];
								$comments= $row2[$comment];
								echo "<div class=col-12>
									<div class=col-12 style=text-align:center>
										<h3 style=font-weight:bold>$name:</h3>
									</div>
									<div id=comments class=col-12>
										<h3>$comments</h3>
									</div>
									</div>";
								}		
						}
						?>
					</div>
				</div>
				<div class="row-3">
					<div id="mf_sigpad_7">
						<div class="mf_sig_wrapper medium">
					         <canvas class="mf_canvas_pad" width="309" height="129"></canvas>
					         <input type="hidden" name="output" id="output" class="output"/>
				        </div>
				        <script type="text/javascript">
							$(function(){
								var sigpad_options_7 = {
					               drawOnly : false,
					               displayOnly: true,
					               clear: '.element_7_clear',
					               bgColour: '#fff',
					               penColour: '#000',
					               output: '#output',
					               lineTop: 95,
					               lineMargin: 10,
					               validateFields: false
					        	};
					        	var sigpad_data_7 = <?php echo $row2['signature']?>;
					      		$('#mf_sigpad_7').signaturePad(sigpad_options_7).regenerate(sigpad_data_7);
							});
						</script>
					</div>
					<div class="col-12">
						<h3 style="text-align:center">Firma y sello del taller</h3>
					</div>
				</div>
				<div class="footer">
					<div class="row-4">
						<div class="col-12">
							<h3>NOTA: El peritaje constituye una revisión exclusiva de los ítems relacionados. Cualquier daño no aparente detectado posterior a dicha revisión, no es responsabilidad del taller</h3>
						</div>
					</div>
					<div class="row-5">
						<div class="col-12">
							<h3>Carrera 22 N. 76-57 | Bogotá - Colombia | 2117943 - 2119290<br>www.servitalleres.com | contacto@servitalleres.com</h3>
						</div>
					</div>	
				</div>
			</div>
			<?php
			}
			file_put_contents('printp.html', ob_get_contents());
			?>
			</div>
			<div style="margin: 10px 10px;">
			<?php $doc3 = $doc2;?>
				<form name="fpdf" id= "fpdf" method="post" action="print_pdf.php">
					<th width='60' align='center'>
						<input type="submit" name="pdf" value="Imprimir en PDF">
						<input type="hidden" name="doc3" value="<?php echo $doc3;?>" >
					</th>
				</form>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
     			$("#fpdf").submit();
			});
			</script>
	</body>
</html>