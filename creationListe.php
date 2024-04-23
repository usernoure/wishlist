<?php
session_start();

include "inc.header.php";
?>

<body class="grid-1">
<div class="row nav-row">
    <div class="col-xs-12 column-1">
        <a class="link-text nav-link current" href="deconnexion.php" title="Deconnexion">Déconnexion</a>
        <?php
        if($_SESSION['admin'] == '1'){
            ?><a class="link-text nav-link" href="backoffice.php" title="BO">BackOffice</a> <?php
        }
        ?>
        <a class="link-text nav-link" href="accueilUtilisateur.php" title="Profil">Profil</a>
        <a class="link-text nav-link current" href="index.php" title="Accueil">Accueil</a><a href="#" class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
        <div class="container-fluid nav-container"></div>
    </div>
</div>
<?php include "verificationConnexion.php";?>
<h2 class="text-xs-center" style="color: #eaebed; margin-top: 8px">Créer une liste de cadeau</h2>
<div class="row rocket" style="padding-top: 140px">
    <div class="col-xs-12">
        <div class="container-fluid container-1">
            <form class="form-container form-container-1" action="php/phpCreationListe.php" method="post">
                <div class="container-fluid container-9 " style="padding-left: 25%">
                    <div class="container-fluid padding-bot">
                        <input class="text-xs-center" id="nomliste" type="text" name="nom" onblur="testNomListe()" placeholder="Nom de la liste" style="width: 70%" required>
                    </div>
                    <div class="container-fluid padding-bot">
                        <textarea class="text-xs-center" id="description" name="description" rows="5" cols="33" placeholder="Description" style="width: 70%"></textarea>
                    </div>
                    <div class="container-fluid">
                        <input class="text-xs-center" type="date" name="date"  value="<?php echo date("Y-m-d");?>" style="width: 70%"><br>
                    </div>
                    <br>
                </div>
                <button type="submit" id="submit" class="btn">Créer une liste</button>
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