

<?php

session_start();
if(isset($_SESSION['utilisateurs'])) {





require_once('connexiondb.php');
$idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0;



    $requete = "DELETE FROM commandes WHERE id_commande=?";
    $params = array($idCoum);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);
    header('location:../pagelowla/commandat.php');
 }
    else{
        header('location:../pagelowla/pages-login.php');
    }

    

?>
