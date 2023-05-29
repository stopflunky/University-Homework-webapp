<?php

	require_once 'auth.php';

	echo($_SESSION['username']);

	if(!empty($_POST['titolo']) && !empty($_POST['contenuto'])){
		$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
		$title = mysqli_real_escape_string($conn, $_POST['titolo']);
		$content = mysqli_real_escape_string($conn, $_POST['contenuto']);
		$author = mysqli_real_escape_string($conn, $_SESSION['username']);
		$query = "INSERT INTO articles (titolo, contenuto, writtenBy) VALUES ('".$title."', '".$content."' , '".$author."')";
		$res = mysqli_query($conn, $query);
		mysqli_close($conn);

	}
	else{
		echo("No buenoooo");
	}

?>