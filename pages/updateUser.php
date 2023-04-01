<?php

    require_once('connexiondb.php');
$id_utilisateur = isset($_POST['id_utilisateur']) ? $_POST['id_utilisateur'] : 0;
$login_user = isset($_POST['login_user']) ? $_POST['login_user'] : 0;
$email = isset($_POST['email']) ? $_POST['email'] : 0;
$role_user = isset($_POST['role_user']) ? $_POST['role_user'] : 0;


$requete = "UPDATE utilisateurs SET login_user=?, email=?, role_user=? WHERE id_utilisateur=?";
$params = array($login_user, $email, $role_user, $id_utilisateur);

$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/utilisateurs.php');

?>
