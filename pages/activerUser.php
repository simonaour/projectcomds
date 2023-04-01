<?php
session_start();
if(isset($_SESSION['utilisateurs'])) {
require_once('connexiondb.php');


$id_utilisateur = isset($_GET['id_utilisateur']) ? $_GET['id_utilisateur'] : 0;
$etat = isset($_GET['etat']) ? $_GET['etat'] : 0;

if($etat==1)
    $newEtat=0;
else 
    $newEtat=1;

$requete = "UPDATE utilisateurs SET etat=? WHERE id_utilisateur=?";
$params = array($newEtat,$id_utilisateur );

$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/utilisateurs.php');
}
else{
    header('location:../pagelowla/pages-login.php');
}
?>
