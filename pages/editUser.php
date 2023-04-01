<?php


    require_once('connexiondb.php');
$id_utilisateur = isset($_GET['id_utilisateur']) ? $_GET['id_utilisateur'] : 0;




$requeteUser = "SELECT * FROM utilisateurs WHERE id_utilisateur=$id_utilisateur";
$resultatUser = $pdo->query($requeteUser);
$utilisateurs = $resultatUser->fetch();
$login_user = $utilisateurs['login_user'];
$email = $utilisateurs['email'];
$role_user = $utilisateurs['role_user'];





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <title>Edition d'un tilisateur</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
    



</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Edition de l'utilisateur 
                
            </div>
            <div class="panel-body">
                <form method="post" action="updateUser.php" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="id_utilisateur">id : <?php echo $id_utilisateur ?></label>
                        <input    type="hidden" name="id_utilisateur" value="<?php echo $id_utilisateur ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="login_user">Login</label>
                        <input type="text" name="login_user" value="<?php echo $login_user ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $email ?>"  class="form-control">
                    </div>
                    <div class="form-group">
                       <select name="role_user" class="form-control">
                        <option value="ADMIN" <?php if($role_user=="ADMIN") echo "selected"  ?> >ADMINISTRATEUR</option>
                        <option value="VISITEUR" <?php if($role_user=="VISITEUR") echo "selected"  ?>>VISITEUR</option>
                        
                       </select>
                    </div>
                    
                    
                        
                        <hr>

                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span> &nbsp;Enregistrer ...
                        </button>
                        &nbsp &nbsp
                        <a href="editpwd.php?id_utilisateur=<?php echo $utilisateurs['id_utilisateur'] ?>">Changer le mot de passe</a>
                </form>
</div>






</body>

</html>







</body>

</html>