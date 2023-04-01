<?php

    require_once('connexiondb.php');
    

$idP = isset($_POST['idP']) ? $_POST['idP'] : 0;
$NomP = isset($_POST['NomP']) ? $_POST['NomP'] : "";
$nomC = isset($_POST['nomC']) ? $_POST['nomC'] : "";
$prixP = isset($_POST['prixP']) ? $_POST['prixP'] : "";
$description_du_produit = isset($_POST['description_du_produit']) ? $_POST['description_du_produit'] : "";

$requete = "UPDATE produits SET nom_produit=?,description_du_produit=?, catégorie_produit=?, prix_produit=? WHERE id_produit=?";
$params = array($NomP,$description_du_produit, $nomC, $prixP, $idP);

$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/produis.php');




?>
