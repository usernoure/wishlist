<?php
require "connexion.php";

include "inc.header.php";
session_start();
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
        <a href="#" class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
      <div class="container-fluid nav-container"></div>
    </div>
  </div>
  <?php include "verificationConnexion.php";?>

  <h2 class="text-xs-center" style="color: #eaebed; margin-top: 8px">Listes</h2>

  <div class="row rocket" style="padding : 0 0 0 0; min-height: 80vh; padding-top: 5vh">
    <div class="col-xs-12 text-xs-center">
      <div class="container-fluid" align="center" style="width: fit-content">
          <div style="margin-bottom: 5%"><a class="btn btn-primary" href="creationListe.php" style="background-color: rgb(200,71,111); border: none;">Créer une liste</a></div>

          <?php

          $sql="SELECT * FROM `liste` WHERE identifiant ='".$_SESSION["login"]."'";
          $table = $connexion ->query($sql);
          $ligne = $table->fetch();
          if(!isset($ligne['Nom_Liste'])){
              echo "<p>Vous n'avez pas de liste</p>";
          }else{
              $table2 = $connexion ->query($sql);
              while($ligne = $table2->fetch()) {
                  $sql2="SELECT count(*) FROM liste l, cadeau c WHERE c.Id_Liste=l.Id_Liste AND l.identifiant='".$_SESSION["login"]."' AND l.Id_Liste=".$ligne["Id_Liste"].";";
                  $nbarticles = $connexion ->query($sql2);
                  $nbarticles = $nbarticles->fetch();
                  ?>
                  <table class='table table-bordered' style="width: 40vh;background-color: #eaebed; float: left; margin-left: 5px ">
                      <thead style="background-color: #adbdff;">
                      <tr>
                          <th rowspan="2" style="border-color: #adbdff; border-bottom: black; padding: 5% 5% 5% 5%"><i class="fa fa-list-alt fa-7x" style=" color: #eaebed"></i></th>
                          <th class="text-xs-left" style="border-color: #adbdff; width: 100%"><h2 style="color: #eaebed"><?php echo $ligne['Nom_Liste']; ?></h2></th>
                      </tr>
                      <tr>
                          <td style="color: #eaebed; border-color: #adbdff; border-bottom: black" class="text-xs-left"><?php echo date("d/m/Y", strtotime($ligne['Date_expiration'])); ?></td>
                      </tr>
                      </thead>

                      <tbody>
                      <tr>
                          <td colspan="2" style="border-color: black;"><?php echo $nbarticles[0]?> cadeau(x)</td>
                      </tr>
                      <tr>
                          <td colspan="2"></td>
                      </tr>
                      <tr>
                          <td colspan="2" style="padding: 0 0 0 0"><a class="btn btn-dark" href="afficheListe.php?var=<?php echo $ligne['Id_Liste']; ?>" style="background-color: black; color: #eaebed; border-radius: 0; width: 100%; height: 100%">Consulter la liste</a></td>
                      </tr>
                      </tbody>
                  </table>
              <?php
                }
          }
          ?>

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