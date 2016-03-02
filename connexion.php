<?php

session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=formulaire','root', ''); // inserer le mot de passe de la bdd

if(isset($_POST['connexionConnect']))
{
	$mailConnect = htmlspecialchars($_POST['mailConnect']);
	$mdpConnect = sha1($_POST['mdpConnect']);
	if(!empty($mailConnect) AND !empty($mdpConnect))
	{
		$req = $bdd->prepare("SELECT * FROM Personnage WHERE mail = ? AND mdp = ?");
		$req->execute(array($mailConnect, $mdpConnect));

		//Condition qui compte le nombre de ranger dans la bdd pour s'assurer que le mdp correspond au mail enregistré.
		$userExist = $req->rowCount();

		if($userExist == 1)
		{
			// Recuperation des information dans la bdd pour les manipuler dans la session.
		 	$userInfo = $req->fetch();

		 	// Definition des informations de la session.
		 	$_SESSION['id'] = $userInfo['id'];
		 	$_SESSION['pseudo'] = $userInfo['pseudo'];
		 	$_SESSION['mail'] = $userInfo['mail'];

		 	// Redirection vers une autre page.
		 	header("Location: accueil.php?id=".$_SESSION['id']);
		}
		else
		{
			$erreur = "Mauvais mail ou mot de passe";
		} 
	}
	else
	{
		$erreur = "Remplir tous les champs";
	}
}

?>

<!-- Start HTML -->
<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8">
			<title> Connexion php </title>
			<link type="text/css" rel="stylesheet" href="css/main2.css" />
		</head>

		<body>

			<header class="titre">
				<h1> Connexion </h1>
			</header>

			<main class="contain">
				<h3> Connexion </h3>

				<!-- Start form -->
				<form action="" method="POST">
					<input name="mailConnect" type="email" placeholder="mail" /> <br>
					<input type="password" name="mdpConnect" placeholder="Mot de passe" /> <br> <br>
					<input name="connexionConnect" type="submit" value="Connexion" />
				</form>
				<!-- End form -->

			</main>

			<!-- event if an element is wrong -->
			<section class="erreur">
					<?php
						if (isset($erreur))
						{
							echo $erreur;
						}
					?>

			</section>

			<footer class="footer">
				<p> -- Horsell -- </p>
			</footer>
		</body>

	</html>