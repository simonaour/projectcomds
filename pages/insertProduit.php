<?php

    require_once('connexiondb.php');

$NomP = isset($_POST['NomP']) ? $_POST['NomP'] : "";
$nomC = isset($_POST['nomC']) ? $_POST['nomC'] : "all";
$prixP = isset($_POST['prixP']) ? $_POST['prixP'] : 0;
$description_du_produit = isset($_POST['description_du_produit']) ? $_POST['description_du_produit'] : 0;


$requete = "INSERT INTO produits(nom_produit, catégorie_produit, prix_produit ,description_du_produit) VALUES (?, ?,?, ?)";
$params = array($NomP, $nomC, $prixP , $description_du_produit);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/produis.php');

?>
