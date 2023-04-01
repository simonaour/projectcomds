<?php

    require_once('connexiondb.php');

$id_utilisateur = isset($_POST['id_utilisateur']) ? $_POST['id_utilisateur'] : "";
$login_user = isset($_POST['login_user']) ? $_POST['login_user'] : "inconnu";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";
$role_user = isset($_POST['role_user']) ? $_POST['role_user'] : 'VISITEUR';
$etat = isset($_POST['etat']) ? $_POST['etat'] : 1;


$msg="Felicitaions";
$requete = "INSERT INTO utilisateurs(login_user, email, pwd,role_user,etat) VALUES (?, ?, ?,?,?)";
$params = array($login_user, $email, $pwd,$role_user,$etat);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);
echo $msg;



header('location:../pagelowla/pages-login.php');

?>
