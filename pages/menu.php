
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/get.css">
<link rel="stylesheet" href="../images/barca.png">

<?php 
require_once('Identifier.php');
 ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
    <div class="navbar-header">
        
        <a href="../index.php" class="navbar-brand">
            Gestion des commandes </a>
</div>
    <ul class="nav navbar-nav">
    <?php if ($_SESSION['utilisateurs']['role_user']=='ADMIN') { ?>
        <li><a href="commandes.php">Les commandes</a> </li>
        <?php    } ?>
        <li><a href="produits.php">Les produits</a> </li>
        <?php if ($_SESSION['utilisateurs']['role_user']=='ADMIN') { ?>
        <li><a href="utilisateurs.php">Les utilisateurs</a> </li>
        <?php     } ?>
    </ul>   
    <ul class="nav navbar-nav navbar-right">
        <li><a href="editerutilisateurs.php?id_utilisateur=<?php echo $_SESSION['utilisateurs']['id_utilisateur'] ?>"><i class="glyphicon glyphicon-ok-circle"></i>&nbsp;  <?php echo $_SESSION['utilisateurs']['login_user']  ?></a>  </li>
        <li><a href="sedeconnecter.php"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp; Se déconnecter</a> </li>

    </ul>   
    
</div>
</nav>

