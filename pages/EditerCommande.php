<?php
if(isset($_SESSION['utilisateurs'])) {
    require_once('connexiondb.php');
$idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0;
$idP = isset($_GET['idP']) ? $_GET['idP'] : 0;
$Nomprore = isset($_GET['Nomprore']) ? $_GET['Nomprore'] : '';
$Dcomm = isset($_GET['Dcomm']) ? $_GET['Dcomm'] : '';
$Tcomm = isset($_GET['Tcomm']) ? $_GET['Tcomm'] : '';
$NomP = isset($_GET['$NomP']) ? $_GET['$NomP'] : '';
$Ntele = isset($_GET['$Ntele']) ? $_GET['$Ntele'] : '';
$prixP = isset($_GET['$prixP']) ? $_GET['$prixP'] : '';



$requete = "SELECT p.id_produit , p.nom_produit ,  c.date_commande , c.total_commande , c.nom_proprietaire_commande , p.prix_produit , c.numero_telephone
FROM commandes c , produits p WHERE p.id_produit=c.id_produit and c.id_commande='$idCoum'";
$resultatConfir = $pdo->query($requete);
$commandes = $resultatConfir->fetch();
$idP = $commandes['id_produit'];
$Nomprore = $commandes['nom_proprietaire_commande'];
$Dcomm = $commandes['date_commande'];
$Tcomm = $commandes['total_commande'];
$NomP = $commandes['nom_produit'];
$Ntele = $commandes['numero_telephone'];
$prixP = $commandes['prix_produit'];

}
else{
    header('location:../pagelowla/pages-login.php');
}



?>

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <title>Edition de la commande</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
    <script src="telechargerfile.js" defer></script>



</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Edition de la commande N
                <?php echo $idCoum ?>
            </div>
            <div class="panel-body">
                <form method="post" action="updateCommande.php" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="idCoum">id de la commande :</label>
                        <input disabled type="text" name="idCoum" value="<?php echo $idCoum ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="idP">id du produit :</label>
                        <input type="text" name="idP" value="<?php echo $idP ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Nomprore">Proprietaire de la commande</label>
                        <input type="text" name="Nomprore" value="<?php echo $Nomprore ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Dcomm">Date de Commande</label>
                        <input type="text" name="Dcomm" value="<?php echo $Dcomm ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Tcomm">Totale Commande</label>
                        <input type="text" name="Tcomm" value="<?php echo $Tcomm ?>" class="form-control">
                    </div>
                   
                        <div class="form-group">
                            <label for="Ntele"> Numéro Télephone </label>
                            <input type="text" name="Ntele" value="<?php echo $Ntele ?>" class="form-control">
                        </div>
                        
                        <hr>

                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span> &nbsp;Enregistrer ...
                        </button>
                </form>
</div>






</body>

</html>







</body>

</html>