<?php
session_start();
require_once('connexiondb.php');

$email = isset($_POST['email']) ? $_POST['email'] : "";

$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";

$requete = "SELECT id_utilisateur,login_user,email,role_user,etat  FROM utilisateurs WHERE email='$email' AND  pwd = '$pwd'";

$resultat = $pdo->query($requete);

if ($utilisateurs = $resultat->fetch()) {

    if ($utilisateurs['etat'] == 1) {

        $_SESSION['utilisateurs'] = $utilisateurs;
        header("location:../pagelowla/index.php");

    } else {

        $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur";
        header("location:../pagelowla/pages-login.php");
    }
} else {
    $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Email ou mot de passe incorrecte!!!";
    header("location:../pagelowla/pages-login.php");
}

?>