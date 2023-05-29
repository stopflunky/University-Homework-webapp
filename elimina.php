<?php 

	require_once 'dbconfig.php';


	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));


	$titolo = mysqli_real_escape_string($conn, $_GET['q']);

	$query = "DELETE FROM articles WHERE titolo = '".$titolo."'";

	$res = mysqli_query($conn, $query);

?>