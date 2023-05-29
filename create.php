<?php
	
	
	require_once 'auth.php';
	if(!$userdid = checkAuth()){
		echo('Errore, uscita in corso');
		header("Location: home.php");
		exit;
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Roboto&family=Wix+Madefor+Text&display=swap" rel="stylesheet">

	<script type="text/javascript" src="create.js" defer></script>


	<title>Crea</title>
</head>
<body>


	<header id="header">
			
			<img id="logo" src="logo.jpg">

			<div class="options">
				<div>
					<a href="home.php">Home</a>	
				</div>
				<div>
					<a href="raccolta.php">Articoli</a>	
				</div>
				<div>
					<a href="profilo.php">Profile</a>
				</div>
				<div>
					<a href="logout.php">Logout</a>
				</div>
			</div>

	</header>


	<section id="createArticle">
		<p>Questa è la pagina di creazione articolo</p>
		<form name="form" id="formArticle" method="post">

				
			<input type="text" id="articleTitle" name="titolo" placeholder="Inserisci un titolo">
			<textarea id="articleContent" name="contenuto" placeholder="Inserisci il contenuto" rows="20" cols="90"></textarea>
			<input id="send" type="submit" value="Inserisci" name="submit">

		</form>
	</section>


	<footer id="footer">
		<p> Queste pagine sono state create da Dragos</p>
	</footer>


</body>
</html>

