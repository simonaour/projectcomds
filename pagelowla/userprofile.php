<?php

require_once('../pages/Identifier.php');
require_once('../pages/connexiondb.php');
$id_utilisateur = isset($_GET['id_utilisateur']) ? $_GET['id_utilisateur'] : 0;





$requete = "SELECT * FROM utilisateurs  WHERE  id_utilisateur='$id_utilisateur'";
$resultat = $pdo->query($requete);
$utilisateurs = $resultat->fetch();

$login_user = $utilisateurs['login_user'];
$email = $utilisateurs['email'];
$nomprenom_user = $utilisateurs['nomprenom_user'];






?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PrixVado / Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="../images/barca.png">
  <link rel="stylesheet" href="../pages/ooo.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/mnicss.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/mnicss.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../pagelowla/index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">PrixVado</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="../pagelowla/index.php">
  <input type="text" name="query" value="" placeholder="Search" title="Enter search keyword">
  <?php
  if(isset($_POST['query']) && $_POST['query'] == "produits"){
    header('location:produis.php');
    exit;
  }
  elseif(isset($_POST['query']) && $_POST['query'] == "commandes"){
    header('location:commandat.php');
    exit;
  }
  elseif(isset($_POST['query']) && $_POST['query'] == "add catégorie"){
    header('location:addcategorie.php');
    exit;
  }
  elseif(isset($_POST['query']) && $_POST['query'] == "add produit"){
    header('location:addproduit.php');
    exit;
  }
  ?>
  <button type="submit" title="Search"><i class="bi bi-search"></i></button>
</form>


  </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="userprofile.php?id_utilisateur=<?php echo $_SESSION['utilisateurs']['id_utilisateur'] ?>">  
<img src="../pagelowla/assets/img/userincoonu.jpeg" alt="Profile" class="rounded-circle">
  &nbsp;
  &nbsp;
  <span > <?php echo $_SESSION['utilisateurs']['role_user']  ?></span>
</a>



  <li>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
<?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>
<li class="nav-item">
  <a class="nav-link " href="index.php">
    <i class="bi bi-grid"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Dashboard Nav -->
<?php } ?>
<?php if ($_SESSION['utilisateurs']['role_user'] == 'VISITEUR') { ?>
<li class="nav-item">
  <a class="nav-link " href="index.php">
    <i class="bi bi-grid"></i>
    <span>Les Produits</span>
  </a>
</li><!-- End Dashboard Nav -->
<?php } ?>
<?php if ($_SESSION['utilisateurs']['role_user'] == 'ADMIN') { ?>

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Produits</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="produislivres.php">
        <i class="bi bi-circle"></i><span>Les Livres</span>
      </a>
    </li>
    <li>
      <a href="produissabot.php">
        <i class="bi bi-circle"></i><span>Sabots Medicales</span>
      </a>
    </li>
    <li>
      <a href="produismontres.php">
        <i class="bi bi-circle"></i><span>Les Montres</span>
      </a>
    </li>
    <li>
      <a href="produistricots.php">
        <i class="bi bi-circle"></i><span>Les Tricots</span>
      </a>
    </li>
   







  </ul>
</li><!-- End Components Nav -->
<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#commandes-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="commandes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="commandatlivres.php">
        <i class="bi bi-circle"></i><span>Commandes : Livres</span>
      </a>
    </li>
    <li>
      <a href="commandatsabot.php">
        <i class="bi bi-circle"></i><span> Commandes : Sabots Medicales</span>
      </a>
    </li>
    <li>
      <a href="commandatmontres.php">
        <i class="bi bi-circle"></i><span> Commandes : Les Montres</span>
      </a>
    </li>
    <li>
      <a href="commandattricots.php">
        <i class="bi bi-circle"></i><span> Commandes : Les Tricots</span>
      </a>
    </li>
   







  </ul>
</li><!-- End Components Nav -->
  
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Add Produit</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="addnewlivre.php">
            <i class="bi bi-circle"></i><span>Add New (Livres)</span>
          </a>
        </li>
        <li>
          <a href="addnewsabot.php">
            <i class="bi bi-circle"></i><span>Add New (Sabots)</span>
          </a>
        </li>
        <li>
          <a href="addnewmontres.php">
            <i class="bi bi-circle"></i><span>Add New (Montres)</span>
          </a>
        </li>
        <li>
          <a href="addnewtricots.php">
            <i class="bi bi-circle"></i><span>Add New (Tricots)</span>
          </a>
        </li>
       


      </ul>
    </li><!-- End Forms Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#cat-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Add Catégorie</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="cat-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="addcategorie.php">
            <i class="bi bi-circle"></i><span>Add Catégorie</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Tous les produits</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="produis.php">
            <i class="bi bi-circle"></i><span>T-produits</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tabla-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Tous les commandes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tabla-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="commandat.php">
            <i class="bi bi-circle"></i><span>T-commandes</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <?php } ?>



    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed"
        href="userprofile.php?id_utilisateur=<?php echo $_SESSION['utilisateurs']['id_utilisateur'] ?>">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.php">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.php">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->





    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-dash-circle"></i>
        <span>Error 404</span>
      </a>
    </li><!-- End Error 404 Page Nav -->


    <li class="nav-item"></li>
    <a class="nav-link collapsed" href="../pages/sedeconnecter.php">
      <i class="bi bi-box-arrow-right"></i>
      <span>Sign Out</span>
    </a>
    </li>


  </ul>

</aside><!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../pagelowla/index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              
              <h2 name="nomprenom_user" ><?php echo $nomprenom_user  ?></h2>
              <br>
              
              
              
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div name="nomprenom_user" class="col-lg-9 col-md-8"><?php echo $nomprenom_user ?></div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">Morocco</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div name="email" class="col-lg-9 col-md-8"><?php echo $email ?></div>
                  </div>

                </div>
                <div class="main" style="margin-right:50px;float:right;transform:translateY(-160px);">
  <div class="up">
    <button class="card1">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px" fill-rule="nonzero" class="instagram"><g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8,8)"><path d="M11.46875,5c-3.55078,0 -6.46875,2.91406 -6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078 -2.91406,-6.46875 -6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266 -1.99609,4.46875 -4.46875,4.46875h-9.0625c-2.47266,0 -4.46875,-1.99609 -4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0 -0.90625,0.40234 -0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391 -0.40234,-0.90625 -0.90625,-0.90625zM16,10c-3.30078,0 -6,2.69922 -6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078 -2.69922,-6 -6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266 -1.77734,4 -4,4c-2.22266,0 -4,-1.77734 -4,-4c0,-2.22266 1.77734,-4 4,-4z"></path></g></g></svg>
    </button>
    <button class="card2">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px" class="twitter"><path d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429"></path></svg>
    </button>
  </div>
  <div class="down">
    <button class="card3">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px" class="github">    <path d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051 c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526 c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769 c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962c-3.996-0.411-5.903-2.399-5.903-5.098 c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9 c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594 c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734 c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z"></path></svg>
    </button>
    <button class="card4">
      <svg height="30px" width="30px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" class="discord"><path d="M40,12c0,0-4.585-3.588-10-4l-0.488,0.976C34.408,10.174,36.654,11.891,39,14c-4.045-2.065-8.039-4-15-4s-10.955,1.935-15,4c2.346-2.109,5.018-4.015,9.488-5.024L18,8c-5.681,0.537-10,4-10,4s-5.121,7.425-6,22c5.162,5.953,13,6,13,6l1.639-2.185C13.857,36.848,10.715,35.121,8,32c3.238,2.45,8.125,5,16,5s12.762-2.55,16-5c-2.715,3.121-5.857,4.848-8.639,5.815L33,40c0,0,7.838-0.047,13-6C45.121,19.425,40,12,40,12z M17.5,30c-1.933,0-3.5-1.791-3.5-4c0-2.209,1.567-4,3.5-4s3.5,1.791,3.5,4C21,28.209,19.433,30,17.5,30z M30.5,30c-1.933,0-3.5-1.791-3.5-4c0-2.209,1.567-4,3.5-4s3.5,1.791,3.5,4C34,28.209,32.433,30,30.5,30z"></path></svg>
    </button>
  </div>
</div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="../pages/updateUtilisateur.php">

                    <div class="form-group">
                       
                        <input  type="hidden" name="id_utilisateur" value="<?php echo $id_utilisateur ?>"
                            class="form-control">
                    </div>
                    <br>

                    
                    

                    
                  <form>

                   
                      

                    <div class="row mb-3">
                      <label for="nomprenom_user" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nomprenom_user" value="<?php echo $nomprenom_user ?>"  type="text" class="form-control" id="nomprenom_user" >
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" value="<?php echo $email ?>"  type="email" class="form-control" id="email" >
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="login_user" class="col-md-4 col-lg-3 col-form-label">Login</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="login_user" value="<?php echo $login_user ?>"  type="text" class="form-control" id="nomprenom_user" >
                      </div>
                    </div>
                    

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="../pages/updatepwd.php">

                    <div class="row mb-3">
                      <label for="oldpwd" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                      <input class="form-control oldpass"  type="password" name="oldpwd" ><i class="glyphicon glyphicon-eye-open showoldpass clickable"></i>
                      </div>
                     <br>
                     <br>
                     <div class="row mb-3">
                      <label for="newpwd" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                      <input class="form-control newpass"  type="password" name="newpwd" ><i class="glyphicon glyphicon-eye-open showoldpass clickable"></i>
                      </div>

                    

                    <br><br>
<br><br>
                    <div class="text-center">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span> Change Password
                    </button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Prixvado</span></strong
      >. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>