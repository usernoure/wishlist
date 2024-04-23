<?php

include "../verificationConnexion.php";
require "../connexion.php";
$get = $_REQUEST['id'];

$sql = "DELETE FROM liste WHERE Id_liste ='".$get."'";
$connexion ->exec($sql); 
header("location: ../accueilUtilisateur.php");