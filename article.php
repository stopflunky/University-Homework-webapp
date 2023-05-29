<?php
		
	$flg = 0;
	include 'auth.php';
	if(checkAuth()){
		echo "<script src=\"menuArticle.js\" defer=\"true\"></script>";
		$flg = 1;
	}


	if(!empty($_POST['username']) && !empty($_POST['password']) && $flg == 0){
		
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
				echo('sei connesso');
				echo "<script src=\"menuArticle.js\" defer=\"true\"></script>";
				$str = "Location: article.php?q=";
				$str .= $_GET['q'];
				header($str);
				exit;
			}

		}

		else if(isset($_POST['username']) || isset($_POST['password'])){
			$error = "Inserisci username o password";
			echo ($error);
		}

}

?>



<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style.css?ts=<?=time()?>&quot">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Roboto&family=Wix+Madefor+Text&display=swap" rel="stylesheet">

	<title>Articolo</title>

</head>
<body>

	<header id="header">
		<img id="logo" src="logo.jpg">
		<form name="login" id="login" method="post">
			<a href="home.php">Home</a>
			<input type="text" class="Log-inFormItems" placeholder="username" name="username">
			<input type="password" class="Log-inFormItems" placeholder="password" name="password">
			<input type="submit" id="submit" value="Log-in">
			<a href="signup.php">Registrati</a>
		</form>

	</header>

	<section id="article">
		<h3><?php print_r($_GET['q'])?></h3>
		<pre id="paragraph">
			<?php
				require_once 'dbconfig.php';

				$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
				$titolo = mysqli_real_escape_string($conn, $_GET['q']);

				$query = "SELECT * FROM articles WHERE titolo = '".$titolo."'";

				$res = mysqli_query($conn, $query);

				$row = mysqli_fetch_assoc($res);

				print_r($row['contenuto']);
		
				mysqli_close($conn);
			?>
		</pre>
	</section>

	<footer id="footer">
		<p> Queste pagine sono state create da Dragos</p>
	</footer>

</body>
</html>