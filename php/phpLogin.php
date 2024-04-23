<?php
    include "../connexion.php" ;
    session_start();

    
    $login = $_REQUEST['login'];
    $mdp = $_REQUEST['mdp'];
    $remenber = $_REQUEST['rememberme'];
    
   

    if (!empty($login)&&!empty($mdp)){

        $requete="SELECT * FROM utilisateur WHERE identifiant='$login' AND mot_de_passe='".md5($mdp)."'";
        $table = $connexion->query($requete);
        $ligne = $table->fetch();

        if(isset($ligne['identifiant']) && isset($ligne['Mot_de_passe'])){
            $_SESSION['login'] = $login;
            $_SESSION['admin'] = $ligne['isAdmin'];
            if(isset($remenber)) {
	            setcookie('login',$login,time()+365*24*3600,null,null,false,true);                   
	            setcookie('mdp',$mdp,time()+365*24*3600,null,null,false,true);
                    $_SESSION['error'] ="";
                    header('Location:../accueilUilisateur.php');
	         }
            header('Location:../accueilUtilisateur.php');
            
        }else{
            $_SESSION['error'] = "Identifiant ou mot de passe incorrecte.";
            unset($_SESSION['login']);
            header('Location:..\pageConnexion.php');
        }
    
    }else{
        $_SESSION['error'] = "Identifiant ou mot de passe vide.";
        unset($_SESSION['login']);
        header('Location:..\pageConnexion.php');
        
    }
?>
