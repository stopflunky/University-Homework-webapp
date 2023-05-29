<?php

	
	require_once 'dbconfig.php';
	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

	$query = "SELECT * FROM articles";

	$res = mysqli_query($conn, $query);

	$count = 0;

	$arr = array();

	while ($row = mysqli_fetch_assoc($res)) {
			
		if($count < 10){

			$temparr = array(
			'id' => $row['id'],
			'titolo' => $row['titolo']);

			array_push($arr, $temparr);

			$count += 1;
		}
	}
	mysqli_close($conn);
	echo json_encode($arr);

?>