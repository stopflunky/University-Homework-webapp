<?php

	require_once 'dbconfig.php';

	if(!isset($_GET['q'])){
		echo('Errore, uscita in corso');
		exit;

	}


	

	$conn = mysqli_connect($dbconfig['host'], $dbconfig['name'], $dbconfig['user'], $dbconfig['password']);

	$username = mysqli_real_escape_string($conn, $_GET['q']);

	$query = "SELECT username FROM users WHERE username = '$username'";
	$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

	echo json_encode(array('exists' => mysqli_num_rows($res) >0 ? true : false));

	mysqli_close($conn);

?>
