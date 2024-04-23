<?php
   //Value des requetes de la page CreateAccount dans les variables
    require '../connexion.php';
    session_start();

    $prenom = $_REQUEST['prenom'];
    $nom = $_REQUEST['nom'];
    $jnai = $_REQUEST['jnai'];
    $mnai = $_REQUEST['mnai'];
    $anai = $_REQUEST['anai'];
    $login = $_REQUEST['email'];
    $mdp = $_REQUEST['mdp'];
    $mdp2 = $_REQUEST['mdp2'];
    
    $sql="select * from utilisateur where identifiant='".$login."'";

    $table=$connexion->query($sql);
    $ligne=$table->fetch();
    var_dump($sql);
    
    if($mdp == $mdp2){
        if($ligne['identifiant'] == $login){
           // identifiant déja existant
            header("location: ..\pageInscription.php"); 
        }else{
            $sqlinsert = "INSERT INTO utilisateur VALUES('".$login."','".$nom."','".$prenom."','".$anai."-".$mnai."-".$jnai."','".md5($mdp)."',CURRENT_DATE(),0)";
            $connexion->exec($sqlinsert);
            header('Location:..\pageConnexion.php');
            var_dump($sqlinsert);
            session_destroy();
        }
    }else{
        header('Location:..\pageInscription.php');
    }
        
    
    
    
    
    