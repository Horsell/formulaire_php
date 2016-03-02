<?php 

$bdd = new PDO('mysql:host=127.0.0.1;dbname=formulaire','root', ''); // inserer le mot de passe de la bdd

if(isset($_POST['inscription']))
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
        $pseudolength = strlen($pseudo);

        if($pseudolength <= 15)
        {
                if($mail == $mail2)
                {
                    if($mdp == $mdp2)
                    {
                        $insertMembre = $bdd->prepare('INSERT INTO Personnage (pseudo, mail, mdp) VALUES(?, ?, ?)');
                        $insertMembre->execute(array($pseudo, $mail, $mdp));
                        $erreur = "Votre compte a bien été crée.";
                    }
                    else
                    {
                        $erreur = "Vos mots de passe ne correspondent pas.";
                    }
                }
            else
            {
                $erreur = "Vos adresses mail ne correspondent pas.";
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas depasser 15 caractere";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être remplis";


    }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> Formulaire PHP </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main2.css">
    </head>
    <body>
        <header class="titre"> 
            <h1> Inscription </h1>
        </header>

                    <!--    Start form    -->
        <section class="contain">
            <h3> Formulaire d'inscription </h3>
            <form action="" method="POST">
                <input placeholder="Pseudo" name="pseudo" autocomplete="off"  required/> <br>
                <input type="email" placeholder="Email@exemple.com" name="mail" autocomplete="off" required> <br>
                <input type="email" placeholder="Confirmer votre adresse email" name="mail2" autocomplete="off" required> <br>
                <br>

                <input type="password" placeholder="Mot de passe" name="mdp" autocomplete="off" required> <br>
                <input type="password" placeholder="Confirmer votre mot de passe" name="mdp2" autocomplete="off" required> <br>
                <input type="submit" value="Valider" name="inscription"/>
            </form>
        </section>
                    <!--    End Form    -->
        <section class="erreur">
            <?php
            if(isset($erreur))
            {
                echo "<font color='red'>" . $erreur . "</font>";
            }

            ?>
        </section>

        <footer class="footer ">
            <p> -- Horsell -- </p>
        </footer>

    </body>
</html>
