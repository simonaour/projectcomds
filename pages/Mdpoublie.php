<?php
require_once('connexiondb.php');
require_once('fonctions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <link rel="stylesheet" href="../css/get.css">
</head>
<body>
    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">
                <h4 style="text-align:center;">Réinitialisation du mot de passe</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="updateoubliemdp.php">

                    <div class="form-group">
                        <label for="email">Entrez votre adresse email</label>
                        <input type="email" name="email" placeholder="Entrer votre adresse email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="newpwd">Entrez le nouveau mot de passe</label>
                        <input type="password" name="newpwd" placeholder="Entrer le nouveau mot de passe" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Réinitialiser</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
