<?php

require_once('Identifier.php');
require_once('connexiondb.php');
$id_utilisateur = isset($_GET['id_utilisateur']) ? $_GET['id_utilisateur'] : 0;





$requete = "SELECT * FROM utilisateurs  WHERE  id_utilisateur='$id_utilisateur'";
$resultat = $pdo->query($requete);
$utilisateurs = $resultat->fetch();

$login_user = $utilisateurs['login_user'];
$email = $utilisateurs['email'];





?>

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <title>Edition de l'utilisateur</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
    <script src="telechargerfile.js" defer></script>



</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Edition de l'utilisateur </div>
            <div class="panel-body">
                <form method="post" action="updateUtilisateur.php">

                    <div class="form-group">
                        <label for="id_utilisateur">id de l'utilisateur : <?php echo $id_utilisateur ?></label>
                        <input  type="hidden" name="id_utilisateur" value="<?php echo $id_utilisateur ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="login_user">Login :</label>
                        <input type="text" name="login_user" value="<?php echo $login_user ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $email ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <a href="editpwd.php">Changer Le mot de passe</a>
                    </div>


                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span> &nbsp;Enregistrer ...
                    </button>
                </form>
            </div>






</body>

</html>







</body>

</html>