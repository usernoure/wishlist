<?php
include "verificationConnexion.php";
require "connexion.php";

$get = $_REQUEST['var'];
$identifiant = $_SESSION["login"];

$sql = "SELECT * FROM liste where Id_Liste =".$get;
$table = $connexion ->query($sql);
$ligne = $table->fetch();

$sql2 = "SELECT * FROM utilisateur where identifiant='".$ligne['identifiant']."'";
$table2 = $connexion ->query($sql2);
$ligne2 = $table2->fetch();
if(!$ligne['Id_Liste']){
    header("location: Homepage.php");
}

$sql2="SELECT count(*) FROM liste l, cadeau c WHERE c.Id_Liste=l.Id_Liste AND l.identifiant='".$_SESSION["login"]."' AND l.Id_Liste=".$ligne["Id_Liste"].";";
$nbarticles = $connexion ->query($sql2);
$nbarticles = $nbarticles->fetch();

$bool = null;
if ($ligne['identifiant'] === $_SESSION["login"]){
    $bool = true;
}else{
    $bool = false;
}
include "inc.header.php";
?>

<body class="grid-1">
<div class="row nav-row">
    <div class="col-xs-12 column-1">
        <a class="link-text nav-link current" href="deconnexion.php" title="Deconnexion">Déconnexion</a>
        <a class="link-text nav-link" href="accueilUtilisateur.php" title="Profil">Mes listes</a>
        <a href="#" class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
        <div class="container-fluid nav-container"></div>
    </div>
</div>

<!-- Affichage liste-->
<div class="row rocket" style="padding : 0 0 0 0; min-height: 80vh; padding-top: 5vh">
    <div class="col-xs-12">
        <div class="container-fluid" align="center">
            <a class="btn btn-light" onclick="window.history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
        </div>
    </div>


    <div class="col-xs-12 text-xs-center">
        <div class="container-fluid" align="center" style="width: fit-content">

            <table class='table table-bordered' style="width: 40vh;background-color: #eaebed; float: left; margin-left: 5px ">
                <thead style="background-color: #adbdff;">
                <tr>
                    <th rowspan="2" style="border-color: #adbdff; border-bottom: black; padding: 5% 5% 5% 5%"><i class="fa fa-list-alt fa-7x" style=" color: #eaebed"></i></th>
                    <th colspan="2" class="text-xs-left" style="border-color: #adbdff; width: 100%"><h2 style="color: #eaebed"><?php echo $ligne['Nom_Liste']; ?></h2></th>
                </tr>
                <tr>
                    <td colspan="2" style="color: #eaebed; border-color: #adbdff; border-bottom: black" class="text-xs-left"><?php echo date("d/m/Y", strtotime($ligne['Date_expiration'])); ?></td>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td colspan="3" style="border-color: black;"><?php echo $nbarticles[0]?> cadeau(x)</td>
                </tr>
                <tr>
                    <td colspan="3">Liste :</td>
                </tr>
                <?php
                $requete = "SELECT * FROM cadeau where Id_Liste =".$get;
                $table3 = $connexion ->query($requete);

                while($row = $table3->fetch()) {
                ?>
                <tr>
                    <td style="width: 100%"><a id='checkbox<?php echo $row['Id_Cadeau']?>' href='afficheCadeau.php?var=<?php echo $row['Id_Cadeau'] ?>'><?php echo $row['Nom_Cadeau'] ?></td>
                    <td><?php echo $row['Prix'] ?> €</td>
                    <td><input type="checkbox" id="<?php echo $row['Id_Cadeau']?>" name='achete' values="<?php echo $row['Id_Cadeau']?>" onclick=achete(this.id,'<?php echo $identifiant ?>')
                        <?php if ($row['Acheté'] == 1 && $row['identifiant'] != $_SESSION["login"]){
                            echo "disabled='disabled'";
                        }
                        if ($row['Acheté'] == 1){
                            echo "checked='checked'";
                        } ?>
                        >
                        <?php if ($row['Acheté'] == 1 ){
                            echo "<span id='span".$row['Id_Cadeau']."'>Acheté</span>";
                        } ?>
                    </td>
                </tr>
                <?php } ?>
                <?php if($bool == true){?>
                <tr>
                    <td colspan="3">
                        <form action="ajoutCadeau.php" method="post">
                            <input type="text" name="idlist" value="<?php echo $get?>" hidden><br>
                            <input type="submit" value="+">
                        </form>
                    </td>
                </tr>
                <?php }
                ?>

                <?php
                if($bool == true){
                ?>
                <tr>
                    <td colspan="3" style="padding: 0 0 0 0">
                        <form action='supprListe.php'>
                            <input type=text name='id' value=<?php echo $get ?> hidden>
                            <input type=text name='nom' value='<?php echo $ligne['Nom_Liste']?>' hidden>
                            <input type='submit' class="btn btn-dark" style="background-color: black; color: #eaebed; border-radius: 0; width: 100%; height: 100%" value='Supprimer'>
                        </form>
                    </td>
                </tr>
                <?php }?>
                </tbody>
            </table>

            <?php
            if($bool == true){
            ?>
            <div>
                <input type="text"  id="partager" value="http://localhost/WishList/afficheliste.php?var=<?php echo $ligne['Id_Liste']?>">
                <button class="copier" data-clipboard-action="copy" data-clipboard-target="#partager"><i class="fa fa-copy"></i></button>
            </div>
            <?php }?>
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

</body>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script src="dist/clipboard.min.js"></script>
<script type="text/javascript" src="js/achete.js"></script>
<script>
    var clipboard = new ClipboardJS('.copier');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
</script>
</html>