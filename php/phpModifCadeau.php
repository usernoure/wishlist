<?php

    include "../verificationConnexion.php";
    require "../connexion.php";
    
    $id = $_REQUEST['id'];
    $nom = $_REQUEST['nom'];
    $prix = $_REQUEST['prix'];
    $quantite = $_REQUEST['quantité'];
    $photo = $_REQUEST['photo'];
    $url = $_REQUEST['url'];
    
    
    $sql = "UPDATE cadeau SET Nom_Cadeau ='".$nom."', Prix = '".$prix."', Quantité ='".$quantite."',Photo = '".$photo."',URL ='".$url."'  Where Id_Cadeau ='".$id."'";
    $connexion ->exec($sql);
    
    header("location: http://localhost/ListeCadeau/afficheCadeau.php?var=".$id);
    