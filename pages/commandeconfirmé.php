<?php

    require_once('connexiondb.php');

$idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0;

$Nomprore = isset($_GET['Nomprore']) ? $_GET['Nomprore'] : '';
$Dcomm = isset($_GET['Dcomm']) ? $_GET['Dcomm'] : '';
$Tcomm = isset($_GET['Tcomm']) ? $_GET['Tcomm'] : '';
$NomP = isset($_GET['$NomP']) ? $_GET['$NomP'] : '';
$Ntele = isset($_GET['$Ntele']) ? $_GET['$Ntele'] : '';
$prixP = isset($_GET['$prixP']) ? $_GET['$prixP'] : '';
$etat_comm = isset($_GET['$etat_comm']) ? $_GET['$etat_comm'] : '';
$adresse_comm = isset($_GET['adresse_comm']) ? $_GET['adresse_comm'] : "";



$requete = "SELECT p.id_produit , p.nom_produit ,c.adresse_comm,  c.date_commande ,c.etat_comm, c.total_commande , c.nom_proprietaire_commande , p.prix_produit , c.numero_telephone
FROM commandes c , produits p WHERE p.id_produit=c.id_produit and c.id_commande='$idCoum'";
$resultatConfir = $pdo->query($requete);
$commandes = $resultatConfir->fetch();
$idP = $commandes['id_produit'];
$Nomprore = $commandes['nom_proprietaire_commande'];
$Dcomm = $commandes['date_commande'];
$Tcomm = $commandes['total_commande'];
$NomP =$commandes['nom_produit'];
$Ntele = $commandes['numero_telephone'];
$prixP = $commandes['prix_produit'];
$etat_comm = $commandes['etat_comm'];
$adresse_comm = $commandes['adresse_comm'];




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.jpg" />
    <title>Confirmation de la commande</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
    <script src="telechargerfile.js" defer></script>



</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Télecharger les données de la commande N <?php echo $idCoum  ?></div>
            <div class="panel-body">
            <div class="form-group">
                    <label for="idCoum">id de la commande : <?php echo $idCoum ?></label>
                    
                </div>

                <div class="form-group">
                    <label for="idP">Le nom du produit :</label>
                    <input disabled type="text" name="idP" value="<?php echo $NomP ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Nomprore">Proprietaire de la commande</label>
                    <input disabled  type="text" name="Nomprore" value="<?php echo $Nomprore ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Dcomm">Date de Commande</label>
                    <input disabled type="text" name="Dcomm" value="<?php echo $Dcomm ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Tcomm">Totale Commande</label>
                    <input disabled type="text" name="Tcomm" value="<?php echo $Tcomm ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Tcomm">Prix</label>
                    <input disabled type="text" name="Tcomm" value="<?php echo $prixP ?>" class="form-control">
               <br>
                <div class="form-group">
                    <label for="Tcomm"> Numéro Télephone </label>
                    <input disabled type="text" name="Tcomm" value="<?php echo $Ntele ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="adresse_comm"> Aresse de livraison </label>
                    <input disabled type="text" name="adresse_comm" value="<?php echo $adresse_comm ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="etat_comm">Etat de la commande : <?php echo $etat_comm ?> </label>
                   
                </div>
                <hr>







                <div class="form-group">
                    <textarea  class="form-control" spellcheck="false" placeholder="Enter something to save" required>
➔ Nom produit :  <?php echo $NomP ?> 
➔ Proprietaire de la commande  : <?php echo $Nomprore ?>

➔ Prix : <?php echo $prixP ?>

➔ Numéro de Téléphone : <?php echo $Ntele ?>

➔ Adresse de Livraison : <?php echo $adresse_comm ?>

➔ Date de Commande : <?php echo $Dcomm ?> 
➔ Totale Commande :<?php echo $Tcomm ?>

➔ Etat de la commande : <?php echo $etat_comm ?>
    </textarea>
                    <br>
                    <div class="file-options">
                        <div class="option file-name">
                            <label>File name</label>



                            <input class="form-control" type="text" spellcheck="false" placeholder="Enter file name">
                        </div>
                        <div class="option save-as">
                            <label>Save as</label>
                            <div class="select-menu">
                                <select class="form-control">
                                    <option value="text/plain">Text File (.txt)</option>
                                    <option value="application/vnd.ms-excel">Excel (.xls)</option>
                                    <option value="application/msword">Doc File (.doc)</option>
                                    <option value="application/vnd.ms-powerpoint">PPT File (.ppt)</option>
                                    <option value="application/pdf">PDF File (.pdf)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="save-btn form-control" type="button">Save As Text File</button>
                    <br>
                </div>
</body>

</html>







</body>

</html>