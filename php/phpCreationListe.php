<?php
    session_start();
    include "../connexion.php";
    $nomliste = $_REQUEST['nom'];
    $description = $_REQUEST['description'];
    $date = $_REQUEST['date'];
    $regex = '/[A-Za-z0-9àéèêë]/';
    $timestamp = date_create();
    // Verifie si la date d'expiration est bien supérieur au jour actuel
    
    if($date < date("Y-m-d")){
        header("location: http://localhost/ListeCadeau/creationListe");
    }
    if(!preg_match($regex,$nomliste)){
        header("location: http://localhost/ListeCadeau/creationListe");
    }
    
    $sql="INSERT into liste VALUES('".date_timestamp_get($timestamp)."','".$nomliste."','".$description."','".$date."','".$_SESSION['login']."')";
    $connexion->query($sql);
    
    header("location: ../accueilUtilisateur.php");
    
    
    
    