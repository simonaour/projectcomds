<?php
require_once('../pages/Identifier.php');
require_once('../pages/connexiondb.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PrixVado Add Produit</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="../images/barca.png">

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

<li class="nav-item">
  <a class="nav-link " href="index.php">
    <i class="bi bi-grid"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Dashboard Nav -->

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
          <a href="addnewtricots.php" class="active">
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
      <h1>Add new Tricot</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../pagelowla/index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Add New Tricot</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="panel panel-primary margetop ">
            <div class="panel-heading"></div>
            <div class="panel-body">
            <form method="post" action="../pagelowla/inserttricot.php" >
                
           
                    <div class="form-group">
                        <label for="NomP">Nom du tricot</label>
                        <input  type="text" name="NomP" placeholder="Entrer le nom du tricot" class="form-control">
                    </div>
                    <br>
                    
                    <div class="form-group">
                    <label for="nomC">Nom de la catégorie</label>
                    &nbsp;
                    <input disabled  type="text" name="nomC" value="Tricots"  class="form-control">
                    &nbsp;
                    <br>
                    <label for="prixP">Le prix du tricot </label>
                    <br>
                    <input class="form-control" type="text" name="prixP" placeholder="entrer le prix">
                    <br>
                    <label for="taille">Taille</label>
                    <br>
                    <input class="form-control" type="text" name="taille" placeholder="entrer la taille du tricot">
                    <br>
                    
                
                    <label for="description_du_produit">Description du tricot</label>
                    <br>
                    <input  class="form-control" type="text" name="description_du_produit" placeholder="entrer la description du tricot">
                    <br>
                    
                    
                    
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span> &nbsp Enregistrer ...
                    </button>
                    &nbsp&nbsp
                    <br>
                    <br>
                    </div>
                
                </form>
            </div>
        </div>
    </div>

    </div>
              
              

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