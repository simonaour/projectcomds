<?php

    require_once('connexiondb.php');


$idP = isset($_GET['idP']) ? $_GET['idP'] : 0;

$requete = "SELECT * FROM produits WHERE id_produit = $idP";
$requeteCipi= "SELECT DISTINCT catégorie_produit FROM produits ";

$resultatCipi = $pdo->query($requeteCipi);
$resultat = $pdo->query($requete);

$produit = $resultat->fetch();
$NomP = $produit['nom_produit'];
$nomC = $produit['catégorie_produit'];
$prixP = $produit['prix_produit'];
$description_du_produit = $produit['description_du_produit'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <title>Edition d'un Produit</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
</head>
<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Edition du produit</div>
            <div class="panel-body">
                <form method="post" action="updateProduit.php">
                    <div class="form-group">
                        <label for="idP">L'id du produit : <?php echo $idP ?></label>
                        <input type="hidden" name="idP" value="<?php echo $idP ?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="NomP">Le nom du produit</label>
                        <input type="text" name="NomP" value="<?php echo $NomP ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description_du_produit">Description du produit</label>
                        <input type="text" name="description_du_produit" value="<?php echo $description_du_produit ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomC">Nom de la catégorie</label>
                        &nbsp;
                        <select name="nomC" class="form-control">
                            <option value="all">
                                Toutes les catégories
                            </option>
                            <?php while ($produitCipi = $resultatCipi->fetch()) { ?>
                                <option value="<?php echo $produitCipi['catégorie_produit'] ?>"
                                    <?php if ($nomC == $produitCipi['catégorie_produit']) { echo "selected"; } ?>>
                                    <?php echo $produitCipi['catégorie_produit'] ?>
                                </option>
                            <?php } ?>
                        </select>
                        &nbsp;
                    </div>
                    <div class="form-group">
                        <label for="prixP">Le prix du produit :</label>
                        <br>
                        <input class="form-control" type="text" name="prixP" value="<?php echo $prixP ?>" placeholder="Entrer le prix">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span> &nbsp;Enregistrer ...
                    </button>
                    &nbsp;&nbsp;
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
