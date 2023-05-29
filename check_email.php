<?php

	require_once 'dbconfig.php';
	

	if(!isset($_GET['q'])){
		echo("Errore, uscita in corso");
		exit;
	}




	$conn = mysqli_connect($dbconfig['host'], $dbconfig['name'], $dbconfig['user'], $dbconfig['password']);
	$email = mysqli_real_escape_string($conn, $_GET['q']);


	$query = "SELECT email FROM users WHERE email = '$email'";
	$res = mysqli_query($conn, $query);


	echo json_decode(array("exists" => mysqli_num_rows($res) > 0 ? true : false));

	
	mysqli_close($conn);	


?>