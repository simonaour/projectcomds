 <?php if(isset($_SESSION['utilisateurs'])) {
require_once('connexiondb.php');

$idCoum = isset($_POST['idCoum']) ? $_POST['idCoum'] : 0;
$idP = isset($_POST['idP']) ? $_POST['idP'] : 0;
$Nomprore = isset($_POST['Nomprore']) ? $_POST['Nomprore'] : '';
$Dcomm = isset($_POST['Dcomm']) ? $_POST['Dcomm'] : 0;
$Tcomm = isset($_POST['Tcomm']) ? $_POST['Tcomm'] : 0;
$Ntele = isset($_POST['Ntele']) ? $_POST['Ntele'] : 0;


$requete = "UPDATE commandes SET id_commande=?, id_produit=?, nom_proprietaire_commande=?, date_commande=?, total_commande=?, numero_telephone=? WHERE id_commande=?";
$params = array($idCoum ,$Nomprore, $Dcomm, $Tcomm, $Ntele, $idP, $idCoum);

$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:../pagelowla/commandat.php');
}
else{
    header('location:../pagelowla/pages-login.php');
}
?>