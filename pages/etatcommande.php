<?php

require_once("connexiondb.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <link rel="stylesheet" href="../css/get.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>

</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher des commandes</div>
            <div class="panel-body">
                <form method="get" action="etttttcommande.php">
                    <div class="form-group">
                        <label for="etat_comm">Etat de la commande</label>
                        <input type="text" name="etat_comm" placeholder="Entrer l'etat" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span> &nbsp Poursuivre ...
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</body>

</html>
