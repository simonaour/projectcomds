
<?php
require_once('../pages/Identifier.php');
$idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0;
if (isset($_POST['submit'])) {
    $etat_comm = isset($_POST['etat_comm']) ? $_POST['etat_comm'] : "";
    $servname = "localhost";
    $dbname = "aremo";
    $user = "root";
    $pass = "";

    try {
        $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $sth = $dbco->prepare("UPDATE Commandes SET etat_comm=? WHERE id_commande=?");
        $params = array($etat_comm, $idCoum);

            $sth->execute($params);

           
            $count = $sth->rowCount();
            header('location:../pagelowla/commandat.php');
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    ?>
   