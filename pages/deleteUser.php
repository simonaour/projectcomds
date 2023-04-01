

<?php

    require_once('connexiondb.php');

$id_utilisateur = isset($_GET['id_utilisateur']) ? $_GET['id_utilisateur'] : 0;



    $requete = "DELETE FROM utilisateurs WHERE id_utilisateur=?";
    $params = array($id_utilisateur);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);
    header('location:../pagelowla/utilisateurs.php');


    

?>
