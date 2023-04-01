<?php
session_start();
require_once('Identifier.php');
require_once('connexiondb.php');

if(isset($_SESSION['utilisateurs']['id_utilisateur'])){
  $id_utilisateur=$_SESSION['utilisateurs']['id_utilisateur'];
}else{
  
  header('Location: ../pagelowla/pages-login.php');
  
}

$newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"newpass";

$requete = "UPDATE utilisateurs SET pwd=? WHERE id_utilisateur=? ";
$params=array($newpwd ,$id_utilisateur );

$resultat = $pdo->prepare($requete);
$resultat->execute($params);


header('Location: ../pagelowla/pages-login.php');
exit();
?>
