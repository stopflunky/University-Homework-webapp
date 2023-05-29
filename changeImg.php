<?php
	
	require_once 'auth.php';

	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

	$imgSrc = mysqli_real_escape_string($conn, $_GET['q']);
	$username = mysqli_real_escape_string($conn, $_SESSION['username']);


	$query = "UPDATE users SET picprofile = '".$imgSrc."' WHERE username = '".$username."'";

	$res = mysqli_query($conn, $query);


?>