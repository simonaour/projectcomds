



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    <title>Edition de mot de passe</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
    <script src="telechargerfile.js" defer></script>
    <script src="../js/monjs.js" defer></script>



</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading">Edition du mot de passe </div>
            <div class="panel-body">
                <form method="post" action="updatepwd.php">

                    <div class="form-group">
                        <label for="oldpwd"> Ancien mot de passe :</label>
                        <input class="oldpass"  type="password" name="oldpwd" size="20"><i class="glyphicon glyphicon-eye-open showoldpass clickable"></i>
                    </div>
                    <div class="form-group">
                        <label for="newpwd"> Nouveau mot de passe :</label>
                        <input class="newpass"  type="password" name="newpwd" 
                            size="20"> <i class="glyphicon glyphicon-eye-open shownewpass clickable"></i>
                    </div>

                    

                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span> &nbsp;Changer Mot de passe ...
                    </button>
                </form>
            </div>






</body>

</html>







</body>

</html>