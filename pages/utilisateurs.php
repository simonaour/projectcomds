<?php
require_once("connexiondb.php");
require_once('Identifier.php');

$login_user = isset($_GET['login_user']) ? $_GET['login_user'] : "";

$requeteFindLogin = "SELECT * FROM utilisateurs WHERE login_user LIKE '%$login_user%' ";

$resultatUtilisateurs = $pdo->query($requeteFindLogin);




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../images/barca.png" />
  <title>Gestion des utilisateurs</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/get.css">
  <script src="changecolorconfirmé.js" defer></script>

</head>

<body>
  <?php include("menu.php"); ?>
  <div class="container">
    <div class="panel panel-success margetop">
      <div class="panel-heading">Rechercher des utlisateurs</div>
      <div class="panel-body">
        <form method="get" action="utilisateurs.php" class="form-inline">
          <div class="form-group">
            <input value="<?php echo $login_user ?>" type="text" name="login_user" placeholder="Login" class="form-control" >
            <br><br>
          </div>
          &nbsp;
          <br>
          <button type="submit" class="btn btn-success .marginright ">
            <span class="glyphicon glyphicon-search"></span> &nbsp; Chercher ...
          </button>
          &nbsp&nbsp
        </form>
        <br>
        <br>
      </div>
    </div>

    <div class="panel panel-primary ">
      <div class="panel-heading">Listes des utilisateurs </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered ">
          <thead class="thead-dark">
            <tr class="pop">
              <th>login</th>
              <th>email</th>
              <th>role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($utilisateurs = $resultatUtilisateurs->fetch()) { ?>
              <tr class="<?php echo $utilisateurs['etat']==1?'success':'danger' ?>"   >
                <td>
                  <?php echo $utilisateurs['login_user'] ?>
                </td>
                <td>
                  <?php echo $utilisateurs['email'] ?>
                </td>
                <td>
                  <?php echo $utilisateurs['role_user'] ?>
                </td>
                <td>
                  <a href="editUser.php?id_utilisateur=<?php echo $utilisateurs['id_utilisateur'] ?>">
                    <img class="imghorloge" src="../images/icons8-crayon-48.png" alt="#">
                  </a>
                  <a href="deleteUser.php?id_utilisateur=<?php echo $utilisateurs['id_utilisateur'] ?>"
                    onclick="return confirm('Etes vous sur de vouloir supprimer cette utilisateur')">
                    <img class="imghorloge" src="../images/icons8-poubelle-50.png" alt="#">
                  </a>
                  <a href="activerUser.php?id_utilisateur=<?php echo $utilisateurs['id_utilisateur'] ?>&etat=<?php echo $utilisateurs['etat'] ?>">
                  <?php 
                  if($utilisateurs['etat']==1)
                      echo'<span class="glyphicon glyphicon-remove" ></span>';
                  else 
                  echo'<span class="glyphicon glyphicon-ok"></span>';
                  
                  
                  ?>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
