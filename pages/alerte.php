<!DOCTYPE html>
<?php
if(isset($_SESSION['utilisateurs'])) {
    require_once('connexiondb.php');
 $message = isset($_GET['message']) ? $_GET['message'] : "Erreur";
}
else{
    header('location:login.php');
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/barca.png" />
    
    <title>Alerte</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/get.css">
</head>

<body>

    <?php include("menu.php"); ?>

    <div class="container">
        <div class="panel panel-danger margetop">
            <div class="panel-heading"> <h4>Erreur :</h4> </div>
            <div class="panel-body">
                <h3><?php echo $message ?></h3>
                <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour</a></h4>
            </div>
        </div>



    </div>




</body>

</html>