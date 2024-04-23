<?php

include "../verificationConnexion.php";
require "../connexion.php";
$id = $_REQUEST['id'];
$idliste = $_REQUEST['idliste'];

$sql = "DELETE FROM cadeau WHERE Id_Cadeau ='".$id."'";
$connexion ->exec($sql); 
header("location: http://localhost/ListeCadeau/afficheListe.php?var=".$idliste);
