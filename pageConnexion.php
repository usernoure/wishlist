<!DOCTYPE html>
<html lang="la">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="generator" content="Responsive Bootstrap Builder 2.5.308">
  <title>WishList</title>
  <link rel="stylesheet" href="css/bootstrap4.min.css">
  <link rel="stylesheet" href="css/wireframe-theme.min.css">
  <link rel="icon" href="./images/Logo64x64.png" type="image/png">
  <script>document.createElement( "picture" );</script>
  <script class="picturefill" async="async" src="js/picturefill.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:b%7CRoboto+Condensed:400,b">
</head>

<body class="grid-1">
  <div class="row nav-row">
    <div class="col-xs-12 column-1">
        <a class="link-text nav-link" href="pageConnexion.php" title="Se connecter"><span class="text-link-text-2">Se connecter</span></a>
      <a class="link-text nav-link" href="pageInscription.php" title="S'inscrire">S'inscrire</a>
      <a class="link-text nav-link current" href="index.php" title="Accueil">Accueil</a>
        <a href="#" class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
    </div>
  </div>
  <div class="row wecome-row">
    <div class="col-xs-12 welcome-column">
      <h1><span class="heading-text-11">se connecter</span>
      </h1>
    </div>
  </div>
  <div class="row rocket">
    <div class="col-xs-12">
      <div class="container-fluid container-1">
        <form class="form-container form-container-1" action="php/phpLogin.php" method="post">
          <div class="container-fluid">
            <h2 class="heading-2">Accés au compte</h2>
          </div>
          <div class="container-fluid container-9">
            
            <div class="container-fluid container-5"><input value="<?php if(isset($_COOKIE['login'])){echo $_COOKIE['login'];}?>" name="login" type="text" class="input-7" placeholder="Email">
            </div>
            <div class="container-fluid container-7"><input value="<?php if(isset($_COOKIE['mdp'])){echo $_COOKIE['mdp'];}?>" name="mdp" type="password" class="input-8" placeholder="Mot de passe">
            </div>
              <br>
              <?php
              session_start();
              if(!isset($_SESSION['error'])){
                  $_SESSION['error'] = "";
              }
              echo $_SESSION['error'];
              $_SESSION['error'] = "";

              ?>
			<input type="checkbox" name="rememberme" id="remembercheckbox" /><label for="remembercheckbox">Se souvenir de moi</label>
			
          </div><button type="submit" class="btn">Se connecter</button>
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