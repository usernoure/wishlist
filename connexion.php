<?php

// Connection au serveur
try {
    $dns = 'mysql:host=localhost;dbname=wishlist';
    $utilisateur = 'root';
    $motDePasse = 'root';
    $connexion = new PDO( $dns, $utilisateur, $motDePasse );
    $connexion->query("SET NAMES utf8");
} catch ( Exception $e ) {
    echo "Connection à  MySQL impossible : ", $e->getMessage();
    die();
}
?>