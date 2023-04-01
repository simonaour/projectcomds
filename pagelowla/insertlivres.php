<?php

    require_once('../pages/connexiondb.php');

$NomP = isset($_POST['NomP']) ? $_POST['NomP'] : "";
$nomC = isset($_POST['nomC']) ? $_POST['nomC'] : "Livres";
$prixP = isset($_POST['prixP']) ? $_POST['prixP'] : 0;
$description_du_produit = isset($_POST['description_du_produit']) ? $_POST['description_du_produit'] : 0;
$nbr_pages = isset($_POST['nbr_pages']) ? $_POST['nbr_pages'] : "";


$requete = "INSERT INTO produits(nom_produit, catégorie_produit, prix_produit ,description_du_produit,nbr_pages) VALUES (?, ?,?, ?,?)";
$params = array($NomP, $nomC, $prixP , $description_du_produit,$nbr_pages);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/produislivres.php');

?>
