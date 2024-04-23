<?php
session_start();



$idlist = $_REQUEST['idlist'];
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
        <a class="link-text nav-link" href="accueilUtilisateur.php" title="Profil"><span class="text-link-text-2">Profil</span></a>
        <a href="#" class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
        <div class="container-fluid nav-container"></div>
    </div>
</div>
<?php include "verificationConnexion.php";?>
<h2 class="text-xs-center" style="color: #eaebed; margin-top: 8px"></h2>
<div class="row rocket">
    <div class="col-xs-12">
        <div class="container-fluid">
            <form action="php/phpCreationCadeau.php" method="post">
                Nom du cadeau :* <input id="nomcadeau" type="text" name="nom" onblur="" required><br>
                Prix :* <input type="number" id="prix" name="prix" min="0,01" step="0.01" required>€<br>
                Quantité :* <input type="number" id="quantité" value="1" name="quantité" min="1"><br>
                L'URL d'une photo : <input type="text" name="photo" placeholder="URL"><br>
                L'URL du cadeau : <input type="text" name="url"><br><br>
                <input type="text" name="idlist" value="<?php echo $idlist; ?>"hidden>
                <input type="submit" id="submit" value="Ajout d'un cadeau"><br>
            </form>
            <form action="afficheliste.php">
                <input type="submit" value="Retour" >
                <input type="text" name="var" value="<?php echo $idlist ?>" hidden>
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
<script type="text/javascript" src="js/js.js"></script>
<script src="dist/clipboard.min.js"></script>
<script type="text/javascript" src="js/achete.js"></script>
</body>
</html>