<?php


require_once("connexiondb.php");










?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />

    <title>Nouveau Compte</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
</head>

<body>



    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Veuillez saisir les données du nouveau compte</div>
            <div class="panel-body">
                <form method="post" action="insertUser.php">
                    <div class="col-12">
                        <div class="input-group has-validation">
                            <label for="email">Email</label>
                            <input type="email" name="email" autocomplete="off" placeholder="tapez votre email"
                                class="form-control">


                            <label for="pwd">Mot de passe</label>
                            <input type="password" name="pwd" autocomplete="new-password"
                                placeholder="Entrez le mot de passe(le mdp doit contenir au minimum 4 caractères)"
                                class="form-control">


                            <label for="login_user">Login</label>
                            <input type="text" name="login_user" autocomplete="off" placeholder="Entrer votre login"
                                minlength="4" class="form-control">
                        </div>
                    </div>





                    <button type="submit" class="btn btn-primary"> Créer le compte</button>
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