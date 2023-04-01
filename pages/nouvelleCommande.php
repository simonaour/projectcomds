<?php

    require_once('connexiondb.php');


$idP = isset($_GET['idP']) ? $_GET['idP'] : "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $NomProre = isset($_POST['NomProre']) ? ($_POST['NomProre']) : "";
    $Tcomm = isset($_POST['Tcomm']) ? ($_POST['Tcomm']) : 0;
    $Ntele = isset($_POST['Ntele']) ? ($_POST['Ntele']) : "";
    $etat_comm = isset($_POST['etat_comm']) ? $_POST['etat_comm'] : "en attente";
    $adresse_comm = isset($_POST['adresse_comm']) ? $_POST['adresse_comm'] : "";


    $stmt = $pdo->prepare("INSERT INTO commandes(id_commande,etat_comm , nom_proprietaire_commande,adresse_comm,total_commande,numero_telephone,id_produit) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$idCoum, $etat_comm, $NomProre, $adresse_comm, $Tcomm, $Ntele, $idP]);


    header('Location:../pagelowla/index.php');


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <title>Nouvelle Commande</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop">
            <div class="panel-heading">Veuillez saisir les données de la nouvelle commande</div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="idP">l'id du produit</label>
                        <input type="text" value="<?php echo $idP ?>" name="idP" placeholder="Entrer l'id du produit"
                            class="form-control" readonly>
                    </div>


                    <div class="form-group">
                        <label for="NomProre">le nom et le prenom</label>
                        <input type="text" name="NomProre" placeholder="Entrer le nom" class="form-control">
                    </div>
                    
                    <label for="Tcomm">le totale de produit</label>
                    <br>
                    <div class="btn btn-warning frer " id="decrease" onclick="decreaseValue()" value="Decrease Value"><span class="	glyphicon glyphicon-minus"></span></div>
                    &nbsp; <input class="fo " type="text" name="Tcomm" placeholder="Entrer le totale" id="number" value="1" />
                    &nbsp;
                    <div class="btn btn-warning frer id="increase" onclick="increaseValue()" value="Increase Value"><span class="glyphicon glyphicon-plus"></span></div>


                    <div class="form-group">
                        <br>
                        <label for="adresse_comm">l'Adresse</label>
                        <input type="text" name="adresse_comm" placeholder="Entrer l'adresse" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Ntele">le numéro de telephone</label>
                        <input type="tel" name="Ntele" placeholder="Entrer le numero de telephone" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span> &nbsp Enregistrer ...
                    </button>
                    &nbsp&nbsp
                </form>
            </div>
        </div>
    </div>
    <script>
        function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
    </script>
</body>

</html>