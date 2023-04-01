<?php
require_once('../pages/Identifier.php');

if (isset($_SESSION['utilisateurs'])) {
    require_once('../pages/connexiondb.php');




    $NomPropre = isset($_GET['NomPropre']) ? $_GET['NomPropre'] : "";
    $nomC = isset($_GET['nomC']) ? $_GET['nomC'] : "all";
    $NomP = isset($_GET['NomP']) ? $_GET['NomP'] : "";
    $idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0;
    $etat_comm = isset($_GET['etat_comm']) ? $_GET['etat_comm'] : "";
    $Dcomm = isset($_GET['Dcomm']) ? $_GET['Dcomm'] : "";
    $adresse_comm = isset($_GET['adresse_comm']) ? $_GET['adresse_comm'] : "";
    $ville_comm = isset($_GET['ville_comm']) ? $_GET['ville_comm'] : "";
    $pays_comm = isset($_GET['pays_comm']) ? $_GET['pays_comm'] : "";







    $requeteProduit = "SELECT DISTINCT catégorie_produit FROM produits";

    if ($nomC == "all") {
        $requetePropre = "SELECT p.id_produit,c.etat_comm,c.adresse_comm,c.pays_comm, p.nom_produit,c.ville_comm, c.id_commande,p.catégorie_produit,c.numero_telephone, c.nom_proprietaire_commande, p.prix_produit , c.date_commande, c.total_commande
    FROM produits p, commandes c WHERE p.id_produit = c.id_produit AND  c.nom_proprietaire_commande LIKE '%$NomPropre%' AND c.etat_comm LIKE '%$etat_comm%' AND p.nom_produit LIKE '%$NomP%'  order by id_commande";
    } elseif
    ($NomP != " " and $NomPropre != " " and $etat_comm != " ") {
        $requetePropre = "SELECT p.id_produit, c.etat_comm,c.adresse_comm,p.nom_produit,c.pays_comm,p.catégorie_produit,c.ville_comm,c.numero_telephone, c.id_commande, c.nom_proprietaire_commande,p.prix_produit, c.date_commande, c.total_commande
    FROM produits p, commandes c WHERE p.id_produit = c.id_produit AND  p.catégorie_produit = '$nomC' ";
    } else {
        $requetePropre = "SELECT p.id_produit,c.etat_comm,c.adresse_comm, c.id_commande,c.pays_comm,p.catégorie_produit,c.ville_comm,c.nom_proprietaire_commande,p.prix_produit , c.numero_telephone, c.date_commande, c.total_commande
    FROM produits p, commandes c WHERE p.id_produit = c.id_produit AND c.nom_proprietaire_commande LIKE '%$NomPropre%' AND p.catégorie_produit = '$nomC' AND c.etat_comm LIKE '%$etat_comm%' AND p.nom_produit LIKE '%$NomP%' order by id_commande";
    }

    $resultatProduit = $pdo->query($requeteProduit);
    $resultatComm = $pdo->query($requetePropre);
} else {
    header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>PrixVado / Commandes</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../images/barca.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/mnicss.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/mnicss.css" rel="stylesheet" />


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
                <img src="assets/img/logo.png" alt="" />
                <span class="d-none d-lg-block">PrixVado</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="../pagelowla/index.php">
                <input type="text" name="query" value="" placeholder="Search" title="Enter search keyword">
                <?php
                if (isset($_POST['query']) && $_POST['query'] == "produits") {
                    header('location:produis.php');
                    exit;
                } elseif (isset($_POST['query']) && $_POST['query'] == "commandes") {
                    header('location:commandat.php');
                    exit;
                } elseif (isset($_POST['query']) && $_POST['query'] == "add catégorie") {
                    header('location:addcategorie.php');
                    exit;
                } elseif (isset($_POST['query']) && $_POST['query'] == "add produit") {
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
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->



                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0"
                        href="userprofile.php?id_utilisateur=<?php echo $_SESSION['utilisateurs']['id_utilisateur'] ?>">
                        <img src="../pagelowla/assets/img/userincoonu.jpeg" alt="Profile" class="rounded-circle">
                        &nbsp;
                        &nbsp;
                        <span>
                            <?php echo $_SESSION['utilisateurs']['role_user'] ?>
                        </span>
                    </a>



                <li>
                    <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

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
            <h1>Telecharger une commande</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pagelowla/index.php">Home</a></li>
                    <li class="breadcrumb-item">Components</li>
                    <li class="breadcrumb-item active">Telecharger une commande</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <?php

        require_once('../pages/connexiondb.php');

        $idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0;

        $Nomprore = isset($_GET['Nomprore']) ? $_GET['Nomprore'] : '';
        $Dcomm = isset($_GET['Dcomm']) ? $_GET['Dcomm'] : '';
        $Tcomm = isset($_GET['Tcomm']) ? $_GET['Tcomm'] : '';
        $NomP = isset($_GET['$NomP']) ? $_GET['$NomP'] : '';
        $Ntele = isset($_GET['$Ntele']) ? $_GET['$Ntele'] : '';
        $prixP = isset($_GET['$prixP']) ? $_GET['$prixP'] : '';
        $etat_comm = isset($_GET['$etat_comm']) ? $_GET['$etat_comm'] : '';
        $adresse_comm = isset($_GET['adresse_comm']) ? $_GET['adresse_comm'] : "";
        $ville_comm = isset($_GET['ville_comm']) ? $_GET['ville_comm'] : "";
        $pays_comm = isset($_GET['pays_comm']) ? $_GET['pays_comm'] : "";



        $requete = "SELECT p.id_produit , p.nom_produit ,c.adresse_comm,c.ville_comm,c.pays_comm,  c.date_commande ,c.etat_comm, c.total_commande , c.nom_proprietaire_commande , p.prix_produit , c.numero_telephone
FROM commandes c , produits p WHERE p.id_produit=c.id_produit and c.id_commande='$idCoum'";
        $resultatConfir = $pdo->query($requete);
        $commandes = $resultatConfir->fetch();
        $idP = $commandes['id_produit'];
        $Nomprore = $commandes['nom_proprietaire_commande'];
        $Dcomm = $commandes['date_commande'];
        $Tcomm = $commandes['total_commande'];
        $NomP = $commandes['nom_produit'];
        $Ntele = $commandes['numero_telephone'];
        $prixP = $commandes['prix_produit'];
        $etat_comm = $commandes['etat_comm'];
        $adresse_comm = $commandes['adresse_comm'];
        $ville_comm = $commandes['ville_comm'];
        $pays_comm = $commandes['pays_comm'];




        ?>


        <div class="panel-heading">Telecharger une commande</div>
        <div class="panel panel-primary ">
            <br>
            <div class="card top-selling overflow-auto">
                <div class="container">
                    <div class="panel panel-primary margetop ">
                        <div class="panel-heading">Télecharger les données de la commande N :
                            <?php echo $idCoum ?>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <br><br>
                                <label for="idCoum">id de la commande :
                                    <?php echo $idCoum ?>
                                </label>

                            </div>
                            <br>

                            <div class="form-group">
                                <label for="idP">Le nom du produit :</label>
                                <input disabled type="text" name="idP" value="<?php echo $NomP ?>" class="form-control">
                            </div><br>
                            <div class="form-group">
                                <label for="Nomprore">Proprietaire de la commande</label>
                                <input disabled type="text" name="Nomprore" value="<?php echo $Nomprore ?>"
                                    class="form-control">
                            </div><br>
                            <div class="form-group">
                                <label for="Dcomm">Date de Commande</label>
                                <input disabled type="text" name="Dcomm" value="<?php echo $Dcomm ?>"
                                    class="form-control">
                            </div><br>
                            <div class="form-group">
                                <label for="pays_comm">Pays</label>
                                <input disabled type="text" name="pays_comm" value="<?php echo $pays_comm ?>"
                                    class="form-control">
                            </div><br>
                            <div class="form-group">
                                <label for="ville_comm">Date de Commande</label>
                                <input disabled type="text" name="ville_comm" value="<?php echo $ville_comm ?>"
                                    class="form-control">
                            </div><br>
                            <div class="form-group">
                                <label for="Tcomm">Totale Commande</label>
                                <input disabled type="text" name="Tcomm" value="<?php echo $Tcomm ?>"
                                    class="form-control">
                            </div><br>
                            <div class="form-group">
                                <label for="Tcomm">Prix</label>
                                <input disabled type="text" name="Tcomm" value="<?php echo $prixP ?>"
                                    class="form-control">
                                <br><br>
                                <div class="form-group">
                                    <label for="Tcomm"> Numéro Télephone </label>
                                    <input disabled type="text" name="Tcomm" value="<?php echo $Ntele ?>"
                                        class="form-control">
                                </div><br>
                                <div class="form-group">
                                    <label for="adresse_comm"> Aresse de livraison </label>
                                    <input disabled type="text" name="adresse_comm" value="<?php echo $adresse_comm ?>"
                                        class="form-control">
                                </div><br>
                                <div class="form-group">
                                    <label for="etat_comm">Etat de la commande :
                                        <?php echo $etat_comm ?>
                                    </label>

                                </div><br>
                                <hr>







                                <div class="form-group">
                                    <textarea class="form-control" spellcheck="false"
                                        placeholder="Enter something to save" required>
➔ Nom produit :  <?php echo $NomP ?> 
➔ Proprietaire de la commande  : <?php echo $Nomprore ?>

➔ Prix : <?php echo $prixP ?>

➔ Numéro de Téléphone : <?php echo $Ntele ?>

➔ Adresse de Livraison : <?php echo $adresse_comm ?>

➔ Ville de Livraison : <?php echo $ville_comm ?>

➔ Pays de Livraison : <?php echo $pays_comm ?>

➔ Date de Commande : <?php echo $Dcomm ?> 
➔ Totale Commande :<?php echo $Tcomm ?>

➔ Etat de la commande : <?php echo $etat_comm ?>
    </textarea>
                                    <br>
                                    <div class="file-options">
                                        <div class="option file-name">
                                            <label>File name</label>



                                            <input class="form-control" type="text" spellcheck="false"
                                                placeholder="Enter file name">
                                        </div>
                                        <div class="option save-as">
                                            <label>Save as</label>
                                            <div class="select-menu">
                                                <select class="form-control">
                                                    <option value="text/plain">Text File (.txt)</option>
                                                    <option value="application/vnd.ms-excel">Excel (.xls)</option>
                                                    <option value="application/msword">Doc File (.doc)</option>
                                                    <option value="application/vnd.ms-powerpoint">PPT File (.ppt)
                                                    </option>
                                                    <option value="application/pdf">PDF File (.pdf)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="save-btn form-control" type="button">Save As Text File</button>
                                    <br>
                                </div>


                            </div>
                            <script>
                                const textarea = document.querySelector("textarea"),
                                    fileNameInput = document.querySelector(".file-name input"),
                                    selectMenu = document.querySelector(".save-as select"),
                                    saveBtn = document.querySelector(".save-btn");



                                selectMenu.addEventListener("change", () => {
                                    let selectedFormat = selectMenu.options[selectMenu.selectedIndex].text;
                                    saveBtn.innerText = `Save As ${selectedFormat.split(" ")[0]} File`;
                                });


                                saveBtn.addEventListener("click", () => {
                                    const blob = new Blob([textarea.value], { type: selectMenu.value });
                                    const fileUrl = URL.createObjectURL(blob);
                                    const link = document.createElement("a");
                                    link.download = fileNameInput.value;
                                    link.href = fileUrl;
                                    link.click();
                                });


                            </script>






                            <br>



                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
        <br>
        <br>
        </div>
        </div>
        </div>




        </div>
        </div>
        </div>
        </div>
        </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Prixvado</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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