<?php

    include '../connexion.php';

    $req= "select identifiant from utilisateur where identifiant='".$_REQUEST['Value']."'";
    $table = $connexion->query($req);
    $ligne = $table->fetch();
    echo $ligne['identifiant'];
