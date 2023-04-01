<?php

if(isset($_SESSION['utilisateurs'])) {
    require_once('../pages/connexiondb.php');

$NomProre = isset($_POST['NomProre']) ? $_POST['NomProre'] : "INSAISI";
$idCoum = isset($_POST['idCoum']) ? $_POST['idCoum'] : "";
$Tcomm = isset($_POST['Tcomm']) ? $_POST['Tcomm'] : "INSAISI";
$Ntele = isset($_POST['Ntele']) ? $_POST['Ntele'] : "INSAISI";
$idP = isset($_POST['idP']) ? $_POST['idP'] : "INSAISI";
$NomP = isset($_POST['NomP']) ? $_POST['NomP'] : 0;
$adresse_comm = isset($_POST['adresse_comm']) ? $_POST['adresse_comm'] : "";
$etat_comm = isset($_POST['etat_comm']) ? $_POST['etat_comm'] : "en attente";
$nbr_pages = isset($_POST['nbr_pages']) ? $_POST['nbr_pages'] : "";

$requete = "INSERT INTO commandes(id_commande, etat_comm, adresse_comm, nom_proprietaire_commande, total_commande, numero_telephone,nbr_pages, id_produit) VALUES (?,?, ?, ?, ?, ?, ?, ?)";
$params = array($idCoum, $etat_comm, $adresse_comm, $NomProre, $Tcomm, $Ntele,$nbr_pages, $idP);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:commandatlivres.php');
}
else{
    header('location:../pagelowla/pages-login.php');
}

?>
