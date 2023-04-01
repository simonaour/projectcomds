<?php

    require_once('../pages/connexiondb.php');

$NomP = isset($_POST['NomP']) ? $_POST['NomP'] : "";
$nomC = isset($_POST['nomC']) ? $_POST['nomC'] : "Montres";
$prixP = isset($_POST['prixP']) ? $_POST['prixP'] : 0;
$description_du_produit = isset($_POST['description_du_produit']) ? $_POST['description_du_produit'] : 0;
$Matièere = isset($_POST['Matièere']) ? $_POST['Matièere'] : "";
$poids = isset($_POST['poids']) ? $_POST['poids'] : "";


$requete = "INSERT INTO produits(nom_produit, catégorie_produit, prix_produit ,description_du_produit,Matièere,Poids) VALUES (?,?, ?,?, ?,?)";
$params = array($NomP, $nomC, $prixP , $description_du_produit,$Matièere,$poids);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/produismontres.php');

?>
