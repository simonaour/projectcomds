<?php 
require_once('Identifier.php');
require_once('connexiondb.php');
$id_utilisateur=$_SESSION['utilisateurs']['id_utilisateur'];

$oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";
$newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";
 $requete=" SELECT * FROM utilisateurs WHERE id_utilisateur=$id_utilisateur AND pwd='$oldpwd' ";


 $resultat=$pdo->prepare($requete);

 $resultat->execute();
 $msg="";
 if($resultat->fetch()){

    $requete="UPDATE utilisateurs SET pwd=? WHERE id_utilisateur=? ";
    $params=array($newpwd ,$id_utilisateur );
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    $msg="<div class='alert alert-success'><strong>Félicitations!!!</strong> Votre mot de passe est modifié avec succés</div>";
    header("refresh:1;url=../pagelowla/pages-login.php");
 }
 else{
    $msg="Echec!! Votre ancien mot de passe est incorrect";
    header("refresh:1;url=".$_SERVER['HTTP_REFERER']);
 }
 echo $msg;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit du mot de passe</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
</head>
<body>
    
</body>
</html>