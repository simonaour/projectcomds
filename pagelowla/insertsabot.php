<?php

    require_once('../pages/connexiondb.php');

$NomP = isset($_POST['NomP']) ? $_POST['NomP'] : "";
$nomC = isset($_POST['nomC']) ? $_POST['nomC'] : "Sabots";
$prixP = isset($_POST['prixP']) ? $_POST['prixP'] : 0;
$description_du_produit = isset($_POST['description_du_produit']) ? $_POST['description_du_produit'] : 0;
$pointure = isset($_POST['pointure']) ? $_POST['pointure'] : "36 - 37 - 38 - 39 - 40";


$requete = "INSERT INTO produits(nom_produit, catégorie_produit, prix_produit ,description_du_produit,pointure) VALUES (?, ?,?, ?,?)";
$params = array($NomP, $nomC, $prixP , $description_du_produit,$pointure);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/produissabot.php');

?>
