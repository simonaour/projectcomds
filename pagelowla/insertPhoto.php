<?php
require_once('../pages/Identifier.php');
require_once('../pages/connexiondb.php');

$id_utilisateur = isset($_GET['id_utilisateur']) ? $_GET['id_utilisateur'] : 0;

if (isset($_FILES['photo_user'])) {
    $photo_user = $_FILES['photo_user']['name'];
    $temp_file = $_FILES['photo_user']['tmp_name'];
    $folder = "../images/";

    if (move_uploaded_file($temp_file, $folder . $photo_user)) {
        $requete = "UPDATE utilisateurs SET photo_user = ? WHERE id_utilisateur = ?";
        $params = array($photo_user, $id_utilisateur);
        $resultat = $pdo->prepare($requete);
        $resultat->execute($params);

        header('location:userprofile.php');
    } else {
        echo "Erreur lors de l'upload de l'image";
    }
}
?>