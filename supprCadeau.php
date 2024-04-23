<?php
include "verificationConnexion.php";
require "connexion.php";

$id = $_REQUEST['idcadeau'];
$sql = "SELECT * FROM cadeau where Id_Cadeau ='".$id."'";
$table = $connexion ->query($sql);
$row = $table->fetch();

include "inc.header.php";
?>

<body class="grid-1">
<div class="row nav-row">
    <div class="col-xs-12 column-1">
        <a class="link-text nav-link" href="accueilUtilisateur.php" title="Profil">Profil</a>
        <?php
        if($_SESSION['admin'] == '1'){
            ?><a class="link-text nav-link" href="backoffice.php" title="BO">BackOffice</a> <?php
        }
        ?>
        <a class="link-text nav-link current" href="accueil.php" title="Accueil">Accueil</a><a href="#" class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
        <div class="container-fluid nav-container"></div>
    </div>
</div>
<div class="row rocket">
    <div class="col-xs-12">
        <div class="container-fluid">
            <?php echo "Voulez vous vraiment supprimer le cadeau <strong>".$row['Nom_Cadeau']."</strong> ?";?>
            <form action="php/phpsupprCadeau.php" method="post">
                <input hidden type="text" name="id" value="<?php echo $id?>">
                <input hidden type="text" name="idliste" value="<?php echo $row['Id_Liste']?>">
                <input type="submit" value="Oui">
                <input type="button" value="Non" onclick="window.history.back()">
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
<script type="text/javascript" src="js/js.js"></script>
<script src="dist/clipboard.min.js"></script>
<script type="text/javascript" src="js/achete.js"></script>
</html>