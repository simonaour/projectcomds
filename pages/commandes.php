<?php
require_once('Identifier.php');

if (isset($_SESSION['utilisateurs'])) {
require_once('connexiondb.php');




$NomPropre = isset($_GET['NomPropre']) ? $_GET['NomPropre'] : "";
$nomC = isset($_GET['nomC']) ? $_GET['nomC'] : "all";
$NomP = isset($_GET['NomP']) ? $_GET['NomP'] : "";
$idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0;
$etat_comm = isset($_GET['etat_comm']) ? $_GET['etat_comm'] : "";
$Dcomm = isset($_GET['Dcomm']) ? $_GET['Dcomm'] : "";
$adresse_comm = isset($_GET['adresse_comm']) ? $_GET['adresse_comm'] : "";







$requeteProduit = "SELECT DISTINCT catégorie_produit FROM produits";

if ($nomC == "all") {
    $requetePropre = "SELECT p.id_produit,c.etat_comm,c.adresse_comm, p.nom_produit, c.id_commande,p.catégorie_produit,c.numero_telephone, c.nom_proprietaire_commande, p.prix_produit , c.date_commande, c.total_commande
    FROM produits p, commandes c WHERE p.id_produit = c.id_produit AND  c.nom_proprietaire_commande LIKE '%$NomPropre%' AND c.etat_comm LIKE '%$etat_comm%' AND p.nom_produit LIKE '%$NomP%'  order by id_commande";
} elseif
($NomP != " " and $NomPropre != " " and $etat_comm != " ") {
    $requetePropre = "SELECT p.id_produit, c.etat_comm,c.adresse_comm,p.nom_produit,p.catégorie_produit,c.numero_telephone, c.id_commande, c.nom_proprietaire_commande,p.prix_produit, c.date_commande, c.total_commande
    FROM produits p, commandes c WHERE p.id_produit = c.id_produit AND  p.catégorie_produit = '$nomC' ";
} else {
    $requetePropre = "SELECT p.id_produit,c.etat_comm,c.adresse_comm, c.id_commande,p.catégorie_produit,c.nom_proprietaire_commande,p.prix_produit , c.numero_telephone, c.date_commande, c.total_commande
    FROM produits p, commandes c WHERE p.id_produit = c.id_produit AND c.nom_proprietaire_commande LIKE '%$NomPropre%' AND p.catégorie_produit = '$nomC' AND c.etat_comm LIKE '%$etat_comm%' AND p.nom_produit LIKE '%$NomP%' order by id_commande";
}

$resultatProduit = $pdo->query($requeteProduit);
$resultatComm = $pdo->query($requetePropre);
} else {
header('location:../pagelowla/pages-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="../images/barca.png" />
<title>Gestion des commandes</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/get.css">
<script src="changecolorconfirmé.js" defer></script>

</head>

<body>
<?php include("menu.php"); ?>

<div class="container">
    <div class="panel panel-success margetop">
        <div class="panel-heading">Rechercher des commandes</div>
        <div class="panel-body">
            <form method="get" action="commandes.php" class="form-inline">
                <div class="form-group">
                    <label for="name">Catégorie du produit :</label>
                    <select name="nomC" class="form-control" value="<?php if (isset($_POST['$nomC'])) {
                        echo $_POST['$nomC'];
                    } ?>" onchange="this.form.submit()">
                        <option value="all">
                            Toutes les catégories
                        </option>
                        <?php while ($produit = $resultatProduit->fetch()) { ?>
                            <option value="<?php echo $produit['catégorie_produit'] ?>">
                                <?php echo $produit['catégorie_produit'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    &nbsp;
                    <label for="name">Proprietaire de la commande : </label>
                    &nbsp;
                    <input value="<?php echo $NomPropre ?>" type="text" name="NomPropre" placeholder="Entrer le nom"
                        class="form-control">
                    <br><br>
                    <div>
                        <label for="name"> Etat de la commande : </label>
                        &nbsp;
                        <input value="<?php echo $etat_comm ?>" type="text" name="etat_comm"
                            placeholder="Entrer l'etat de la commande" class="form-control">


                        &nbsp; &nbsp;
                        <label for="name">Nom produit :</label>
                        <input value="<?php echo $NomP ?>" type="text" name="NomP" placeholder="Entrer le nom"
                            class="form-control">
                    </div>
                    &nbsp;
                    <br>
                    
                    <button type="submit" class="btn btn-success .marginright ">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; Chercher ...
                    </button>
                    &nbsp&nbsp


            </form>
            <br>
            <br>
        </div>
    </div>
</div>

<div class="panel panel-primary ">
    <div class="panel-heading">Listes des commandes </div>
    <div class="panel-body">


        <table class="table table-striped table-bordered ">
            <thead class="thead-dark">
                <tr class="pop">
                    <th>id-cmd</th>
                    <th>propriétaire</th>
                    <th>nom-pro</th>
                    <th>Prix</th>
                    <th>Tél</th>
                    <th>Adresse</th>
                    <th>date</th>
                    <th>total</th>



                    <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                        <th>Status</th>
                        <th>Download</th>
                        <th>Etat</th>
                        <th>Actions</th>
                    <?php } ?>







                </tr>
            </thead>
            <tbody>




                <?php while ($commandes = $resultatComm->fetch()) { ?>
                    <tr>
                        <td>
                            <?php echo $commandes['id_commande'] ?>
                        </td>
                        <td>
                            <?php echo $commandes['nom_proprietaire_commande'] ?>
                        </td>
                        <td>
                            <?php echo $commandes['nom_produit'] ?>
                        </td>
                        <td>
                            <?php echo $commandes['prix_produit'] ?>
                        </td>
                        <td>
                            <?php echo $commandes['numero_telephone'] ?>
                        </td>
                        <td>
                            <?php echo $commandes['adresse_comm'] ?>
                        </td>


                        <td>
                            <?php echo $commandes['date_commande'] ?>
                        </td>
                        <td>
                            <?php echo $commandes['total_commande'] ?>

                            <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                            <td>

                                ➔
                                <?php echo $commandes['etat_comm'] ?>
                            </td>
                        <?php } ?>
                        </td>
                        <?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
                            <td>
                                <button type="submit" class="btn buttontele"><a class="downloadlink"
                                        href="commandeconfirmé.php?idCoum=<?php echo $commandes['id_commande'] ?>">Download</a></button>
                            </td>




                            <td>
                                <a href="etttttcommande.php?idCoum=<?php echo $commandes['id_commande'] ?>">
                                    <img class="imghorloge" src="../images/vld.png" alt="#"></a>



                                <a href="rrrrrcommande.php?idCoum=<?php echo $commandes['id_commande'] ?>">
                                    <img class="imghorloge" src="../images/refusé.png" alt="#"></a>



                                <a href="injoignablecommande.php?idCoum=<?php echo $commandes['id_commande'] ?>">
                                    <img class="imghorloger" src="../images/icons8-horloge.gif" alt="#"></a>
                                <a href="confirmelivrecommande.php?idCoum=<?php echo $commandes['id_commande'] ?>">
                                    <img class="imghorloge" src="../images/icons8-expédié-48.png" alt="#"></a>

                            </td>

                            <td>

                                <a href="deleteCommande.php?idCoum=<?php echo $commandes['id_commande'] ?>"
                                    onclick="return confirm('Etes vous sur de vouloir supprimer la commande')">
                                    <img class="imghorloge" src="../images/icons8-poubelle-50.png" alt="#"></a>
                                </a>
                            </td>
                        <?php } ?>


                    </tr>




                <?php } ?>


                </tr>

            </tbody>
            </thead>

        </table>
    </div>
</div>
</div>
</div>










</body>

</html>