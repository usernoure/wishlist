<?php
require "connexion.php";
include "inc.header.php";
session_start();
?>
<body class="grid-1">
<div class="row nav-row">
    <div class="col-xs-12 column-1">
        <a class="link-text nav-link" href="deconnexion.php" title="Deconnexion">Déconnexion</a>
        <a class="link-text nav-link current" href="accueilUtilisateur.php" title="Profil"><span class="text-link-text-2">Profil</span></a><a href="#" class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
        <div class="container-fluid nav-container"></div>
    </div>
</div>
<?php include "verificationConnexion.php";?>
<div class="row rocket">
    <div class="col-xs-12">
        <div class="container-fluid">

<?php

    if($_SESSION['admin'] != 1){
        header("Location: PageLogin.php");
    }
    /////////// LISTE ////////////////
    $sqlliste = "SELECT * FROM liste";
    $sqlcount = "SELECT count(*) as 'count' FROM liste";
    $table = $connexion->query($sqlliste);
    $table2 = $connexion->query($sqlcount);
    $ligne2 = $table2->fetch();
    echo "Nombre de listes : ".$ligne2['count']."<br>";

    echo "<select name='liste' id='liste'>;";
    echo "<option value=''>--Listes--</option>";
    while($ligne = $table->fetch()){
        echo "<option value=''>".$ligne['Id_Liste']."</option>";
    }
    echo "</select><br>";
    //////////////FIN LISTE////////////////

    //////////// UTILISATEUR //////////////
    $sqluser = "SELECT * FROM utilisateur";
    $sqlcount = "SELECT count(*) as 'count' FROM utilisateur";
    $table = $connexion->query($sqluser);
    $table2 = $connexion->query($sqlcount);
    $ligne2 = $table2->fetch();

    echo "Nombre d'utilisateurs : ".$ligne2['count']."<br>";

    echo "<select name='liste' id='liste'>;";
    echo "<option value=''>--Utilisateurs--</option>";
    while($ligne = $table->fetch()){
        echo "<option value=''>".$ligne['identifiant']."</option>";
    }
    echo "</select><br>";
    //////////////FIN UTILISATEUR//////////////////

    /////////////CADEAU/////////////////////

    $sqlcadeau = "SELECT * FROM cadeau";
    $sqlcount = "SELECT count(*) as 'count' FROM cadeau";
    $table = $connexion->query($sqlcadeau);
    $table2 = $connexion->query($sqlcount);
    $ligne2 = $table2->fetch();
    echo "Nombre de cadeaux : ".$ligne2['count']."<br>";

    echo "<select name='cadeau' id='cadeau'>;";
    echo "<option value=''>--Cadeau--</option>";
    while($ligne = $table->fetch()){
        echo "<option value=''>".$ligne['Id_Cadeau']."</option>";
    }
    echo "</select><br>";
    /////////////////FIN CADEAU/////////////////////

    ///////////////INSCRIPTION DU MOIS///////////////
    ;
    $sqlinscription = "SELECT * FROM utilisateur where MONTH(Date_Inscription) = MONTH('".date('Y-m-d')."') and YEAR(Date_Inscription) =  YEAR('".date('Y-m-d')."')";
    $sqlcount ="SELECT count(*) as 'count' FROM utilisateur where MONTH(Date_Inscription) = MONTH('".date('Y-m-d')."') and YEAR(Date_Inscription) =  YEAR('".date('Y-m-d')."')";
    $table = $connexion->query($sqlinscription);
    $table2 = $connexion->query($sqlcount);
    $ligne2 = $table2->fetch();
    echo "Nombre d'utilisateur du mois : ".$ligne2['count']."<br>";

    echo "<select name='mont_user' id='mont_user'>;";
    echo "<option value=''>--Utilisateur/Mois--</option>";
    while($ligne = $table->fetch()){
        echo "<option value=''>".$ligne['identifiant']."</option>";
    }
    echo "</select><br>";

    ?>
        <br>
        <form action="accueilUtilisateur.php" method="POST">
            <button type="submit">Retour</button>
        </form>
        </div>
    </div>
</div>
<footer class="row footer-row">
    <div class="col-xs-12">
        <div class="subgrid footer-subgrid">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-sm-6">
                    <h4 class="footer-heading"><a title="" href="" class="heading-text-1"></a><a title="" href="" class="heading-text-8">Réseaux sociaux</a>
                    </h4>
                    <div class="rule small orange">
                        <hr>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h4 class="footer-heading"><a title="" href="" class="heading-text-2"></a><a title="" href="" class="heading-text-9">Mentions Légales</a>
                    </h4>
                    <div class="rule small orange">
                        <hr>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 col-sm-6">
                    <h4 class="footer-heading"><a title="" href="" class="heading-text-5"></a><a title="" href="" class="heading-text-10">Conditions Générales d'Utilisation</a>
                    </h4>
                    <div class="rule small orange">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/outofview.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
