<?php

    require_once('connexiondb.php');
    

$id_utilisateur = isset($_POST['id_utilisateur']) ? $_POST['id_utilisateur'] : 0;
$login_user = isset($_POST['login_user']) ? $_POST['login_user'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";


$requete = "UPDATE utilisateurs SET login_user=?, email=? WHERE id_utilisateur=?";
$params = array($login_user, $email,$id_utilisateur);

$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/pages-login.php');




?>
