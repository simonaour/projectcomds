
<?php
require_once('Identifier.php');

require_once("connexiondb.php");


$nomC = isset($_GET['nomC']) ? $_GET['nomC'] : "all";

$requeteCati = "SELECT DISTINCT catégorie_produit FROM produits";




$resultatCati = $pdo-> query($requeteCati);







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />

    <title>Nouveau Produit</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
</head>

<body>

    <?php include("menu.php"); ?>

    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Veuillez saisir les données du nouveau produit</div>
            <div class="panel-body">
            <form method="post" action="insertProduit.php" >
                    <div class="form-group">
                        <label for="NomP">le nom du produit</label>
                        <input  type="text" name="NomP" placeholder="Entrer le nom du produit" class="form-control">
                    </div>
                    
                    <div class="form-group">
                    <label for="nomC">Nom de la catégorie</label>
                    &nbsp;
                    <select name="nomC" class="form-control" value="<?php if (isset($_POST['$nomC'])) {
                            echo $_POST['$nomC'];
                        } ?>" >
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
                    <br>
                    <label for="prixP">Le prix du produit :</label>
                    <br>
                    <input class="form-control" type="text" name="prixP" placeholder="entrer le prix">
                    <br> <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span> &nbsp Enregistrer ...
                    </button>
                    &nbsp&nbsp
                    <br>
                    <br>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

</body>

</html>