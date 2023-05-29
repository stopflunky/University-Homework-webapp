<?php
	
	include 'auth.php';

	$flg = 0;


	if(checkAuth()){
		
		echo "<script src=\"menuHome.js\" defer=\"true\"></script>";
		$flg = 1;
	}

	

	if(!empty($_POST['username']) && !empty($_POST['password']) && $flg == 0){
		// qui dentro preparo la query e poi la spedisco
		$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

		$username = mysqli_escape_string($conn, $_POST['username']);
		$query = "SELECT * FROM users WHERE username = '".$username."'";
		$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if(mysqli_num_rows($res) > 0){

			$entry = mysqli_fetch_assoc($res);

			if(password_verify($_POST['password'], $entry['password'])){
				
				$_SESSION['username'] = $entry['username'];
				$_SESSION['user_id'] = $entry['id'];
				mysqli_free_result($res);
				mysqli_close($conn);
				echo "<script src=\"menuHome.js\" defer=\"true\"></script>";
				header("Location: home.php");
				exit;
			}

		}

		else if(isset($_POST['username']) || isset($_POST['password'])){
			echo ($error);
		}

	}



?>








<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css?ts=<?=time()?>&quot">
	<script type="text/javascript" src="home.js" defer="true"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Roboto&family=Wix+Madefor+Text&display=swap" rel="stylesheet">


</head>
<body>


	<header id="header">
		<img id="logo" src="logo.jpg">
		<form name="login" id="login" method="post">
			<input type="text" class="Log-inFormItems" placeholder="username" name="username">
			<input type="password" class="Log-inFormItems" placeholder="password" name="password">
			<input type="submit" id="submit" value="Log-in">
			<a href="signup.php">Registrati</a>
		</form>

	</header>


	<section id="presentation">
		<h2>WrittenByYou</h2>
		<pre id="paragraph">Benvenuti nel nostro sito web, il luogo in cui l'informazione prende vita! Siamo orgogliosi di presentarvi una varietà di articoli coinvolgenti e informativi su una vasta gamma di argomenti. Che tu sia un appassionato di scienza, un amante della cultura, un aspirante chef o un curioso viaggiatore, qui troverai sicuramente qualcosa di interessante per soddisfare la tua sete di conoscenza.
		</pre>
		<h3>registrati per scrivere</h3>
	</section>
	<section id="main">
			
		
		<div class="content">
			<h2>Ecco qui nella home una lista di 10 articoli</h2>
			

		</div>

	</section>
	<footer id="footer">
		<p> Queste pagine sono state create da Dragos</p>
	</footer>
</body>
</html>
