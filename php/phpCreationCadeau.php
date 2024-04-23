<?php
    session_start();
    include "../verificationConnexion.php";
    require "../connexion.php";
        $nom = $_REQUEST['nom'];
        $prix = $_REQUEST['prix'];
        $quantite = $_REQUEST['quantité'];
        $photo = $_REQUEST['photo'];
        $url = $_REQUEST['url'];
        $idlist = $_REQUEST['idlist'];
        $identifiant = $_SESSION["login"];
        $timestamp = date_create();
        $alphabet="abcdefghijklmnopqrstuvwxyz";
        $lettre=$alphabet[rand(0,25)];
        $lettre2=$alphabet[rand(0,25)];

        
    $sql = "INSERT into cadeau Values('".$lettre.uniqid(rand ()).$lettre2."','".$nom."','".$prix."',".$quantite.",'".$photo."','".$url."',0,".$idlist.",'".$identifiant."')";
    var_dump($sql);
    $table = $connexion ->exec($sql);
    header("location: ..\afficheListe.php?var=$idlist");

?>
