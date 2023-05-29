<?php 

	

	include 'auth.php';

	if(!$userdid = checkAuth()){
		echo('Errore, uscita in corso');
		header("Location: home.php");
		exit;
	}

 ?>


 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Roboto&family=Wix+Madefor+Text&display=swap" rel="stylesheet">

	<script type="text/javascript" src="menu.js" defer = "true"></script>
	<script type="text/javascript" src="raccolta.js" defer = "true"></script>

 	<title>Articoli</title>
 </head>
 <body>
 	
 	<header id="header">
 		<img id="logo" src="logo.jpg">
 	</header>


 	<section id="articles">
 		<!-- Devo fare 2 file molto simili a quelli che abbiamo fatto per la home -->
 		<h3>Questa è la pagina tutto vengono raccolti tutti gli articoli</h3>
 		<div class="content">
 				


 		</div>

 	</section>


 	<footer id="footer">
		<p> Queste pagine sono state create da Dragos</p>
	</footer>
	
 </body>
 </html>