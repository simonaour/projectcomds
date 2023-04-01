<?php 

function rechercheemail($email)
{
    global $pdo;
    $requete = $pdo->prepare("SELECT *  FROM utilisateurs WHERE email=?");
    $requete->execute(array($email));
    return $requete->rowCount();
}

?>