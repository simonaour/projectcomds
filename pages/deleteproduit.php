

<?php

session_start();
if(isset($_SESSION['utilisateurs'])) {



require_once('connexiondb.php');

$idP = isset($_GET['idP']) ? $_GET['idP'] : 0;



    $requete = "DELETE FROM produits WHERE id_produit=?";
    $params = array($idP);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);
    header('location:../pagelowla/produis.php');
}
else{
    header('location:../pagelowla/pages-login.php');
}


?>




