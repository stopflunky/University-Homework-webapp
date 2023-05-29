<?php
	
	
	require_once 'auth.php';

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

	<script type="text/javascript" src="profile.js" defer = "true"></script>


	<title>Profile</title>
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
					<a href="create.php">Crea</a>	
				</div>
				<div>
					<a href="logout.php">Logout</a>
				</div>
			</div>

	</header>

	<section id="profile">
		<div id="img">
			<img id="profile-img" src="">
		</div>
		<div id="selectProfileImage" class="hidden">
			<form name="formForSelectingImage" id="formForSelectingImage">
				<input type="text" id="search" name="search" placeholder="cerca un'immaggine">
				<button>Cerca</button>
			</form>
		</div>
		<div id="personal_information">

			<div class="info" id="divNome">
				<span class="label" id="spanNome">Nome</span>
			</div>
			<div class="info" id="divCognome">
				<span class="label" id="spanCognome">Cognome</span>
			</div>
			<div class="info" id="divUsername">
				<span class="label" id="spanUsername">username</span>
			</div>
			<div class="info" id="divEmail">
				<span class="label" id="spanEmail">Email</span>
			</div>
		</div>
		<div>
			<div class="info" id="divBtnArticoli">
				<div id="showFileDiv">

					<a href="" id="btn">Articoli</a>
					<img id="arrow" src="arrow.png">

				</div>
			</div>
			<div id="articoliProfilo">
				
			</div>
		</div>


	</section>

	<footer id="footer">
		<p> Queste pagine sono state create da Dragos</p>
	</footer>




</body>
</html>