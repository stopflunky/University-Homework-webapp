<?php

	$apiKey = '36762088-ccba8e7a5be8530f1bd67994a';

	
	$keywords = $_GET['q'];

	
	$url = 'https://pixabay.com/api/?key=' . $apiKey . '&q=' . urlencode($keywords);

	$ch = curl_init();

	
	curl_setopt($ch, CURLOPT_URL, $url);

	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	
	$response = curl_exec($ch);

	
	curl_close($ch);

	
	$data = json_decode($response);



	$count = 0;
	$arr = array();






	if ($data->totalHits > 0) {
    
    foreach ($data->hits as $image) {
        
        if($count < 7){
        	
        	array_push($arr, $image->webformatURL);
        	$count += 1;
        } else {
        	break;
        }
        
    }
    } else {
    echo 'Nessuna immagine trovata.';
}

	echo json_encode($arr);

?>