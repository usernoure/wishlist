<?php

if(isset($_SESSION["login"])){
    echo "Connecté en tant que : ".$_SESSION["login"]."<br><br>";
}else{
    header('Location: pageConnexion.php');
}