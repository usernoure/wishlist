<?php 
    session_start();
    require "connexion.php";
    
    $id = $_REQUEST['var'];
    
    $sql = "SELECT * FROM cadeau where Id_Cadeau ='".$id."'";
    $table = $connexion->query($sql);
    $row = $table->fetch();

    include "inc.header.php";
?>
<body class="grid-1">
<div class="row nav-row">
    <div class="col-xs-12 column-1">
        <a class="link-text nav-link" href="deconnexion.php" title="Deconnexion">Déconnexion</a>
        <?php
        if($_SESSION['admin'] == '1'){
            ?><a class="link-text nav-link" href="backoffice.php" title="BO">BackOffice</a> <?php
        }
        ?>
        <a class="link-text nav-link current" href="accueilUtilisateur.php" title="Profil"><span class="text-link-text-2">Profil</span></a>
        <a class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
        <div class="container-fluid nav-container">

        </div>
    </div>
</div>
<?php include "verificationConnexion.php"; ?>
<div class="row welcome-row">
    <div class="col-xs-12 welcome-column">
        <h1 class="heading-text-7">Cadeau : </h1>
        <h4 class="heading-1"><?php echo $row['Nom_Cadeau'];?></h4>
    </div>
</div>
<div class="row rocket">
    <div class="col-xs-12">
        <div class="container-fluid row-xs-6">
            <div class="col-xs-12 tableau-cadeau">
                <img class="center" src="<?php echo $row['Photo'];?>" width="100px" height="100px">
                <h2><?php echo $row['Nom_Cadeau'];?></h2>
                <h4 class="heading-1">Prix : <?php echo $row['Prix'] ?>€</h4>
                <h4 class="heading-1">Quantité : <?php echo $row['Quantité'] ?></h4>
                <h4 class="heading-1">Prix total : <?php echo $row['Prix']*$row['Quantité'] ?>€</h4>
                <h4 class="heading-1">Url : <?php if(!$row['URL'] == ""){ echo "<a href='".$row['URL']."''>Lien cadeau";}else{ echo "<aucun lien>";} ?></h4>
            </div>
            <form action="modifCadeau.php">
                <input type="submit" value="Modifier">
                <input type="text" value="<?php echo $id;?>" name="id" hidden>
            </form>
            <form action="supprCadeau.php">
                <input type="text" value="<?php echo $id;?>" name="idcadeau" hidden>
                <input type="submit" value="Supprimer">
            </form>
            <input type="button" value="Retour" onclick="window.history.back()">
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
