<!DOCTYPE html>
<html>

<head>
    <title>Etat de la commande</title>
    <link rel="icon" type="image/png" href="../images/barca.png" />

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
    <meta charset='utf-8'>
</head>

<body>
    <?php
    require_once('Identifier.php');
    $idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0;
    if (isset($_GET['submit'])) {
        $etat_comm = isset($_GET['etat_comm']) ? $_GET['etat_comm'] : "";
        $servname = "localhost";
        $dbname = "aremo";
        $user = "root";
        $pass = "";

        try {
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //On prépare la requête et on l'exécute
            $sth = $dbco->prepare("
              UPDATE Commandes
              SET etat_comm=?
              WHERE id_commande=?
            ");
            $params = array($etat_comm, $idCoum);

            $sth->execute($params);

            //On affiche le nombre d'entrées mise à jour
            $count = $sth->rowCount();
            header('location:../pagelowla/commandant.php');
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    ?>
    <div class="container">
        <div class="panel panel-success margetop">
            <div class="panel-heading"> Modification de l'etat</div>
            <div class="panel-body">
                <form method="GET" class="form-inline">
                    <label hidden for="idCoum">ID Commande:</label>
                    <input type="text" name="idCoum" id="idCoum" value="<?php echo $idCoum ?>" hidden>
                    <br><br>
                    <label for="etat_comm">Etat de la commande:</label>
                    &nbsp;
                    <input type="text" class="form-control" value="Injoignable" name="etat_comm" id="etat_comm">
                    <br><br>
                    <button type="submit" name="submit" value="Soumettre" class="btn btn-success"> Soumettre
                </form>
                
                
            </div>
        </div>
    </div>
</body>

</html>