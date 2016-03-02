<?php 

$bdd = new PDO('mysql:host=127.0.0.1;dbname=formulaire','root', 'Integra0@@');

if(isset($_POST['inscription']))
{
    if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        echo "<p> ok </p>";
    }
    else
    {
        $erreur = "Tous les champs doivent être remplis";
        echo "<a href='index.html'> Retour </a>";
    }
}

?>

