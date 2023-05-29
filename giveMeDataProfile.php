<?php
	
	require_once 'dbconfig.php';
	require_once 'auth.php';

	if(!$userdid = checkAuth()){
		echo('Errore, uscita in corso');
		header("Location: home.php");
		exit;
	}


	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn)); 

	

	$username = $_SESSION['username'];

	$query = "SELECT * FROM users WHERE username = '$username'";

	$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($res);
	

	$arr = array(
	'name' => $row['name'],
	'surname' => $row['surname'],
	'username' => $row['username'],
	'email' => $row['email'],
	'picprofile' => $row['picprofile']
	);

	echo json_encode($arr);
	mysqli_close($conn);
?>