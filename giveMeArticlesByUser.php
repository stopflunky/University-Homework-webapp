<?php

	require_once 'dbconfig.php';

	require_once 'auth.php';

	
	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

	$user = $_SESSION['username'];
	$query = "SELECT * FROM articles WHERE writtenBy = '".$user."'";

	$res = mysqli_query($conn, $query);

	$arr = array();

	while ($row = mysqli_fetch_assoc($res)) {
			

			$temparr = array(
			'id' => $row['id'],
			'titolo' => $row['titolo']);

			array_push($arr, $temparr);
		
	}
	mysqli_close($conn);
	echo json_encode($arr);

?>