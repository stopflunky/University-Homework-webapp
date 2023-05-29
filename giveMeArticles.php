<?php

	require_once 'dbconfig.php';
	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

	$query = "SELECT * FROM articles";

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