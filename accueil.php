<?php

session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=formulaire','root', ''); // inserer le mot de passe de la bdd

?>

<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8">
			<title> Page de connexion php </title>
			<link type="text/css" rel="stylesheet" href="css/main2.css" />
		</head>

		<body>

			<header class="titre">
				<h1> Bienvenue ! </h1>
			</header>
			<main class="contain">
				<p> Connexion établie <?php echo $_SESSION['pseudo'] ;?> </p>
			</main>

			<footer class="footer">
				<p> -- Horsell -- </p>
			</footer>
		</body>

	</html>