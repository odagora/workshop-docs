<?php

include ('../info.php'); //Database connection

$errors_array = array_filter($errors);

 if (isset($_POST['submit'])) {

 	//Header information of print_p.php 
 	$day = $_POST['day'];
 	$month = $_POST['month'];
 	$year = $_POST['year'];
 	$firstname1 = mysql_real_escape_string(htmlspecialchars($_POST['firstname1']));
 	$lastname1 = mysql_real_escape_string(htmlspecialchars($_POST['lastname1']));
 	$firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
 	$lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));
 	$idnumber = mysql_real_escape_string(htmlspecialchars($_POST['idnumber']));
 	$phone = mysql_real_escape_string(htmlspecialchars($_POST['phone']));
 	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
 	@$make = $_POST['cat'];
 	@$line = $_POST['subcat'];
 	$model = mysql_real_escape_string(htmlspecialchars($_POST['model']));
 	$license = mysql_real_escape_string(htmlspecialchars($_POST['license']));
 	$mileage = mysql_real_escape_string(htmlspecialchars($_POST['mileage']));
 	
 	//Sanitize names and lastnames to store in database properly
 	$firstname1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($firstname1))));
 	$lastname1 = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($lastname1))));
 	$firstname = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($firstname))));
	$lastname = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($lastname))));

 	require('lists.php');
 	
 	foreach ($names as $mat => $name) {
	 	//Matrix 1 information of print_p.php (A-Exterior)
	 	for ($i=1; $i <= count($list[1]) ; $i++) {
	 		@$$matrixNames[$mat][$i] = $_POST['matrix_1'][$i];
		}

		//Matrix 2 information of print_cc.php (B-Interior)
	 	for ($j=1; $j <= count($list[2]) ; $j++) {
	 		@$$matrixNames[$mat][$j] = $_POST['matrix_2'][$j];
		}

		//Matrix 3 information of print_cc.php (C-Interior)
	  	for ($k=1; $k <= count($list[3]) ; $k++) {
	 		@$$matrixNames[$mat][$k] = $_POST['matrix_3'][$k];
		}

		//Matrix 4 information of print_cc.php (D-Motor)
	  	for ($l=1; $l <= count($list[4]) ; $l++) {
	 		@$$matrixNames[$mat][$l] = $_POST['matrix_4'][$l];
		}

		//Matrix 5 information of print_cc.php (E-Electricidad)
	  	for ($m=1; $m <= count($list[5]) ; $m++) {
	 		@$$matrixNames[$mat][$m] = $_POST['matrix_5'][$m];
		}

		//Matrix 6 information of print_cc.php (F-Suspension/direccion)
	  	for ($n=1; $n <= count($list[6]) ; $n++) {
	 		@$$matrixNames[$mat][$n] = $_POST['matrix_6'][$n];
		}

		//Matrix 7 information of print_cc.php (G-Caja y transmision)
	   	for ($o=1; $o <= count($list[7]) ; $o++) {
	 		@$$matrixNames[$mat][$o] = $_POST['matrix_7'][$o];
		}

		//Matrix 8 information of print_cc.php (H-Otros)
	   	for ($p=1; $p <= count($list[8]) ; $p++) {
	 		@$$matrixNames[$mat][$p] = $_POST['matrix_8'][$p];
		}
	}

	//Footer information of print_cc.php
	$comment1 = $_POST['comment1'];
	$comment2 = $_POST['comment2'];
	$comment3 = $_POST['comment3'];
	$comment4 = $_POST['comment4'];
	$comment5 = $_POST['comment5'];
	$comment6 = $_POST['comment6'];
	$comment7 = $_POST['comment7'];
	$comment8 = $_POST['comment8'];
	

	//Comments sanitizing for storing in database properly
	//1. Make everything lowercase and then make the first letter if the entire string capitalized
	$comment1 = ucfirst(strtolower($comment1));
	$comment2 = ucfirst(strtolower($comment2));
	$comment3 = ucfirst(strtolower($comment3));
	$comment4 = ucfirst(strtolower($comment4));
	$comment5 = ucfirst(strtolower($comment5));
	$comment6 = ucfirst(strtolower($comment6));
	$comment7 = ucfirst(strtolower($comment7));
	$comment8 = ucfirst(strtolower($comment8));

	//2. Run the function to capitalize every letter after a full-stop (period).
	$comment1 = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'), $comment1);
	$comment2 = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'), $comment2);
	$comment3 = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'), $comment3);
	$comment4 = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'), $comment4);
	$comment5 = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'), $comment5);
	$comment6 = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'), $comment6);
	$comment7 = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'), $comment7);
	$comment8 = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'), $comment8);

	//Signature information of print_cc.php
	$signature = filter_input(INPUT_POST, 'output', FILTER_UNSAFE_RAW);

	// Create some other pieces of information about the user
    //  to confirm the legitimacy of their signature
    $sig_hash = sha1($signature);
    $created = time();
    $ip = $_SERVER['REMOTE_ADDR'];

	if (!empty($errors_array)) {
		echo "<form method=post action='index.php'>";
	}
	else{
		mysql_query("INSERT document2 SET day='$day', 
										 month='$month', 
										 year='$year',
										 firstname1='$firstname1', 
										 lastname1='$lastname1',
										 firstname='$firstname', 
										 lastname='$lastname', 
										 idnumber='$idnumber',
										 phone='$phone',
										 email='$email', 
										 make='$make',
										 type='$line',
										 model='$model', 
										 license='$license',
										 mileage='$mileage',
										 m1_el1='$m1_el1',
										 m1_el2='$m1_el2',	 
										 m1_el3='$m1_el3',
										 m1_el4='$m1_el4',
										 m1_el5='$m1_el5',
										 m1_el6='$m1_el6',
										 m1_el7='$m1_el7',
										 m1_el8='$m1_el8',
										 m1_el9='$m1_el9',
										 m1_el10='$m1_el10',
										 m1_el11='$m1_el11',
										 m1_el12='$m1_el12',
										 m1_el13='$m1_el13',
										 m1_el14='$m1_el14',
										 m1_el15='$m1_el15',
										 m1_el16='$m1_el16',
										 m1_el17='$m1_el17',
										 m1_el18='$m1_el18',
										 m1_el19='$m1_el19',
										 m1_el20='$m1_el20',
										 m1_el21='$m1_el21',
										 m1_el22='$m1_el22',
										 m1_el23='$m1_el23',
										 m1_el24='$m1_el24',
										 m1_el25='$m1_el25',
										 m1_el26='$m1_el26',
										 m1_el27='$m1_el27',
										 m2_el1='$m2_el1',
										 m2_el2='$m2_el2',	 
										 m2_el3='$m2_el3',
										 m2_el4='$m2_el4',
										 m2_el5='$m2_el5',
										 m2_el6='$m2_el6',
										 m2_el7='$m2_el7',
										 m2_el8='$m2_el8',
										 m2_el9='$m2_el9',
										 m2_el10='$m2_el10',
										 m2_el11='$m2_el11',
										 m2_el12='$m2_el12',
										 m2_el13='$m2_el13',
										 m2_el14='$m2_el14',
										 m2_el15='$m2_el15',
										 m2_el16='$m2_el16',
										 m2_el17='$m2_el17',
										 m2_el18='$m2_el18',
										 m2_el19='$m2_el19',
										 m2_el20='$m2_el20',
										 m2_el21='$m2_el21',
										 m2_el22='$m2_el22',
										 m3_el1='$m3_el1',
										 m3_el2='$m3_el2',	 
										 m3_el3='$m3_el3',
										 m3_el4='$m3_el4',
										 m3_el5='$m3_el5',
										 m3_el6='$m3_el6',
										 m3_el7='$m3_el7',
										 m3_el8='$m3_el8',
										 m3_el9='$m3_el9',
										 m3_el10='$m3_el10',
										 m3_el11='$m3_el11',
										 m3_el12='$m3_el12',
										 m3_el13='$m3_el13',
										 m4_el1='$m4_el1',
										 m4_el2='$m4_el2',	 
										 m4_el3='$m4_el3',
										 m4_el4='$m4_el4',
										 m4_el5='$m4_el5',
										 m4_el6='$m4_el6',
										 m4_el7='$m4_el7',
										 m4_el8='$m4_el8',
										 m4_el9='$m4_el9',
										 m4_el10='$m4_el10',
										 m4_el11='$m4_el11',
										 m4_el12='$m4_el12',
										 m4_el13='$m4_el13',
										 m4_el14='$m4_el14',
										 m4_el15='$m4_el15',
										 m5_el1='$m5_el1',
										 m5_el2='$m5_el2',	 
										 m5_el3='$m5_el3',
										 m5_el4='$m5_el4',
										 m5_el5='$m5_el5',
										 m5_el6='$m5_el6',
										 m5_el7='$m5_el7',
										 m5_el8='$m5_el8',
										 m5_el9='$m5_el9',
										 m6_el1='$m6_el1',
										 m6_el2='$m6_el2',	 
										 m6_el3='$m6_el3',
										 m6_el4='$m6_el4',
										 m6_el5='$m6_el5',
										 m6_el6='$m6_el6',
										 m6_el7='$m6_el7',
										 m6_el8='$m6_el8',
										 m6_el9='$m6_el9',
										 m6_el10='$m6_el10',
										 m6_el11='$m6_el11',
										 m6_el12='$m6_el12',
										 m6_el13='$m6_el13',
										 m6_el14='$m6_el14',
										 m6_el15='$m6_el15',
										 m6_el16='$m6_el16',
										 m6_el17='$m6_el17',
										 m6_el18='$m6_el18',
										 m6_el19='$m6_el19',
										 m6_el20='$m6_el20',
										 m6_el21='$m6_el21',
										 m6_el22='$m6_el22',
										 m6_el23='$m6_el23',
										 m6_el24='$m6_el24',
										 m7_el1='$m7_el1',
										 m7_el2='$m7_el2',	 
										 m7_el3='$m7_el3',
										 m7_el4='$m7_el4',
										 m7_el5='$m7_el5',
										 m7_el6='$m7_el6',
										 m7_el7='$m7_el7',
										 m7_el8='$m7_el8',
										 m7_el9='$m7_el9',
										 m7_el10='$m7_el10',
										 m8_el1='$m8_el1',
										 m8_el2='$m8_el2',
										 m8_el3='$m8_el3',
										 m8_el4='$m8_el4',
										 m8_el5='$m8_el5',
										 comment1='$comment1',
										 comment2='$comment2',
										 comment3='$comment3',
										 comment4='$comment4',
										 comment5='$comment5',
										 comment6='$comment6',
										 comment7='$comment7',
										 comment8='$comment8',
										 signature= '$signature',
										 sig_hash= '$sig_hash',
										 ip= '$ip',
										 created= '$created'
										 ")
 		or die(mysql_error());
		
		header("location: print_p.php");
	}
}
// var_dump($errors_array);
?>