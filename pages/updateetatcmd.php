<?php
    require_once('Identifier.php');
    $idCoum = isset($_GET['idCoum']) ? $_GET['idCoum'] : 0; 
    if(isset($_GET['submit'])){
        $etat_comm = isset($_GET['etat_comm']) ? $_GET['etat_comm'] : "";
        $servname = "localhost"; $dbname = "aremo"; $user = "root"; $pass = "";
        
        try{
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            $sth = $dbco->prepare("
              UPDATE Commandes
              SET etat_comm=?
              WHERE id_commande=?
            ");
            $params = array($etat_comm,$idCoum);
            
            $sth->execute($params);
            
            
            $count = $sth->rowCount();
            header('location:../pagelowla/commandat.php');
        }
              
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    ?>