<?php
require_once('../pages/connexiondb.php');

$NomP = isset($_POST['NomP']) ? $_POST['NomP'] : "";
$nomC = isset($_POST['nomC']) ? $_POST['nomC'] : "Tricots";
$prixP = isset($_POST['prixP']) ? $_POST['prixP'] : 0;
$description_produit = isset($_POST['description_du_produit']) ? $_POST['description_du_produit'] : 0;
$taille = isset($_POST['taille']) ? $_POST['taille'] : "";

if ($pdo) {
    try {
        $requete = "INSERT INTO produits(nom_produit, catégorie_produit, prix_produit, description_du_produit, taille) VALUES (?, ?, ?, ?, ?)";
        $params = array($NomP, $nomC, $prixP, $description_produit, $taille);
        $resultat = $pdo->prepare($requete);
        $resultat->execute($params);
        header('location:../pagelowla/produistricots.php');
    } catch (PDOException $e) {
        echo "Une erreur est survenue lors de l'exécution de la requête : " . $e->getMessage();
    }
} else {
    echo "La connexion à la base de données a échoué";
}
?>
