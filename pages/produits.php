<?php

require_once("connexiondb.php");
require_once('Identifier.php');

$NomP = isset($_GET['NomP']) ? $_GET['NomP'] : "";
$nomC = isset($_GET['nomC']) ? $_GET['nomC'] : "all";

$requeteCati = "SELECT DISTINCT catégorie_produit FROM produits";



if ($nomC == "all") {
    $requete = "SELECT * FROM Produits WHERE nom_produit LIKE '%$NomP%' order BY id_produit ";

} elseif ($NomP == "") {
    $requete = "SELECT * FROM Produits WHERE catégorie_produit LIKE '$nomC' order BY id_produit";

} else {
    $requete = "SELECT * FROM Produits WHERE nom_produit LIKE '%$NomP%' AND catégorie_produit = '$nomC' order BY id_produit";


}

$resultatCati = $pdo->query($requeteCati);
$resultat = $pdo->query($requete);







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <title>Gestion des produits</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
</head>

<body>

    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher des produits</div>
            <div class="panel-body">
                <form method="get" action="produits.php" class="form-inline">
                    <div class="form-group">
                        <label for="name">Nom du Produit :</label>
                        <input value="<?php echo $NomP ?>" type="text" name="NomP"
                            placeholder="Entrer le nom du produit" class="form-control">
                    </div>
                    &nbsp;
                    <label for="nomC">Nom de la catégorie</label>
                    &nbsp;
                    <select name="nomC" class="form-control" value="<?php if (isset($_POST['$nomC'])) {
                        echo $_POST['$nomC'];
                    } ?>" onchange="this.form.submit()">
                        <option value="all">
                            Toutes les catégories
                        </option>
                        <?php while ($produit = $resultatCati->fetch()) { ?>
                            <option value="<?php echo $produit['catégorie_produit'] ?>">
                                <?php echo $produit['catégorie_produit'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    &nbsp;

                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"></span> &nbsp Chercher ...
                    </button>
                    &nbsp&nbsp
                    <br>
                    <br>
                    <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                        <a href="nouveauproduit.php" class="btn btn-primary stretched-link">
                            <span class="glyphicon glyphicon-plus"> </span> &nbsp Nouveau Produit
                        </a>

                    <?php } ?>


                    &nbsp&nbsp

                    <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                        <a href="nouvellecatégorie.php" class="btn btn-warning  stretched-link">
                            <span class="glyphicon glyphicon-plus"> </span> &nbsp Nouvelle catégorie
                        </a>
                    <?php } ?>

                </form>
            </div>
        </div>

        <div class="panel panel-primary ">
            <div class="panel-heading">Listes de produits </div>
            <div class="panel-body">




                <?php while ($produits = $resultat->fetch()) { ?>

                    <p class="card test"  style="width: 25rem;">
                        <div class="card-body">
                            <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                                <h5 class="title">
                                    <?php echo $produits['id_produit'] ?>
                                </h5>
                            <?php } ?>
                            <h3 class="card-title">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo $produits['nom_produit'] ?>
                                <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                                    (
                                    <?php echo $produits['catégorie_produit'] ?>)
                                <?php } ?>
                            </h3>
                            <p class="card-text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo $produits['description_du_produit'] ?>
                            </p>
                            <h4>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo $produits['prix_produit'] ?> &nbsp; DH
                            </h4>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a
                                href="nouvelleCommande.php?idP=<?php echo $produits['id_produit'] ?>"
                                class="btn btnnv stretched-link">
                                <span> Nouvelle Commande</span>
                            </a>
                            <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a
                                    href="editerproduit.php?idP=<?php echo $produits['id_produit'] ?>">
                                    <img class="imghorloge" src="../images/icons8-crayon-48.png" alt="#">
                                </a>
                            <?php } ?>
                            <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                                <a href="deleteproduit.php?idP=<?php echo $produits['id_produit'] ?>"
                                    onclick="return confirm('Si vous supprimez ce produit , tous ces commandes seront supprimées')">
                                    <img class="imghorloge" src="../images/icons8-poubelle-50.png" alt="#">
                                </a>
                            <?php } ?>
                        </div>
                    </p>



                <?php } ?>













            </div>
        </div>
    </div>
    </div>



</body>

</html>