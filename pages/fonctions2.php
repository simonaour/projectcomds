<?php 


function rechechelog($login_user){
   global $pdo;
    $requete = $pdo->prepare("SELECT *  FROM utilisateurs WHERE login_user=?");
    $requete->execute(array($login_user));
    return $requete->rowCount();
}

?>