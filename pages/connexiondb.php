<?php
try {
    
    $pdo = new PDO("mysql:host=localhost;dbname=aremo", "root", "");
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
?>