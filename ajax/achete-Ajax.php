<?php

include '../connexion.php';

    $req= "UPDATE `cadeau` SET `Acheté` = '".$_REQUEST['value']."' WHERE `cadeau`.`Id_Cadeau` = '".$_REQUEST['id']."'";
    $table = $connexion->prepare($req);
    $table->execute();
    
    $req1= "UPDATE `cadeau` SET `identifiant` = '".$_REQUEST['identifiant']."' WHERE `cadeau`.`Id_Cadeau` = '".$_REQUEST['id']."'";
    $table1 = $connexion->prepare($req1);
    $table1->execute();

?>