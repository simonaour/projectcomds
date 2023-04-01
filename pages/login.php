<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
    <link rel="icon" type="image/png" href="../images/barca.png" />
</head>

<body>



</div>
    <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
        <div class="panel panel-primary margetop">
            <div class="panel-heading">Se connecter :</div>
            <div class="panel-body">
                <form method="post" action="seConnecter.php" class="form">

                    <?php if (!empty($erreurLogin)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $erreurLogin ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="email">Adresse Email :</label>
                        <input type="text" name="email" placeholder="Email adress" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="pwd">Mot de passe :</label>
                        <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" />
                    </div>

                    <div class="form-group">

                        
                         
                         <a href="nouveauUser.php"><span class="btn btn-warning">Créer un compte</span></a>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-log-in"></span>
                        Se connecter 
                    </button>
                    &nbsp;
                    
                </form>
            </div>
        </div>
    </div>
</body>

</HTML>