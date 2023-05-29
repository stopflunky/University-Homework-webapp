
<?php


require_once 'dbconfig.php';


if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['confirm-password']) && !empty($_POST['allow'])){ 																	

		$error = array();
		$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

		

		if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])){
			
			$error[] = "Username non valido";
		} else{
			

			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$query = "SELECT username FROM users WHERE username = '$username'";
			$res = mysqli_query($conn, $query);
			if(mysqli_num_rows($res) > 0){
				$error[] = "Username già utilizzato"; 
			}

		}


		if(strlen($_POST['password']) < 8){
			$error[] = "Caratteri insufficienti";
		}

		if(strcmp($_POST['password'], $_POST['confirm-password']) != 0){
			$error[] = "Le due password non coincidono";
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error[] = "Email non valida";
		} else{
			$email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
			$query = "SELECT email FROM users WHERE email = '$email'";
			$res = mysqli_query($conn, $query);
			if(mysqli_num_rows($res) > 0){
				$error[] = "Email già utilizzata";
			}
		}


		if(count($error) == 0){
			echo('tutto bene ora trasmetto');
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$surname = mysqli_real_escape_string($conn, $_POST['surname']);

			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$password = password_hash($password, PASSWORD_BCRYPT);

			$query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username','$password','$name','$surname','$email')";

			if(mysqli_query($conn, $query)){
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['user_id'] = mysqli_insert_id($conn);
				mysqli_close($conn);
				header("Location: home.php");
				exit;
			} else{
				$error[] = "Errore di connessione al database";
			}

		}

		mysqli_close($conn);

} else{
	$error = "Riempi tutti i campi"; 
}

?>












<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign-up</title>

	<link rel="stylesheet" type="text/css" href="style.css?ts=<?=time()?>&quot">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Roboto&family=Wix+Madefor+Text&display=swap" rel="stylesheet">

	<script src="signup.js" defer></script>

</head>
<body>
	<section id="signup">
		
		<img id="logo" src="logo.jpg">

		<h4>Pagina di registrazione</h4>

		<form name="signup" id="signupForm" method="post" autocomplete="off">


			<div class="name">
				<label for="name">Nome</label>
				<input class="items" type="text" name="name" <?php if(isset($_POST['name'])){echo "value=".$_POST['name'];} ?>>
				<div><span>Inserire nome</span></div>
			</div>

			<div class="surname">
				<label for="surname">Cognome</label>
				<input class="items" type="text" name="surname" <?php if(isset($_POST['surname'])){echo "value=".$_POST['surname'];} ?>>
				<div>  <span>Inserire Cognome</span></div>
			</div>

			<div class="username">
				<label for="username">Username</label>
				<input class="items" type="text" name="username" <?php if(isset($_POST['username'])){echo "value=".$_POST['username'];} ?>>
				<div>  <span>Nome utente sbagliato</span></div>
			</div>

			<div class="email">
				<label for="email">email</label>
				<input class="items" type="text" name="email" <?php if(isset($_POST['email'])){echo "value=".$_POST['email'];} ?>>
				<div><span>indrizzo email non valido</span></div>
			</div>

			<div class="password">
				<label for="password">password</label>
				<input class="items" type="password" name="password" <?php if(isset($_POST['password'])){echo "value=".$_POST['password'];} ?>>
				<div>  <span>Inserire almeno 8 caratteri</span></div>
			</div>

			<div class="confirm-password">
				<label for="confirm-password">confirm password</label>
				<input class="items" type="password" name="confirm-password" <?php if(isset($_POST['confirm-password'])){echo "value=".$_POST['confirm-password'];} ?>>
				<div>  <span>Le password non coincidono</span></div>
			</div>

			<div class="allow">
				<input type="checkbox" name="allow" value="1" <?php if(isset($_POST['allow'])){echo "value=".$_POST['allow'] ? "checked":"";} ?>>
				<label for="allow">Accetta i termini e condizioni per proseguire</label>
			</div>

			<div class="submit">
				<input type="submit" id="submit" name="submit" value="Registrati">
			</div>

		</form>

		<div class="signup"> Hai già un account? <a href="home.php">Accedi</a></div>

	</section>

	<footer id="footer">
		<p> Queste pagine sono state create da Dragos</p>
	</footer>
</body>
</html>