<!DOCTYPE html>
<html lang="fr">

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
    <div class="col-xs-12 column-1"><a href="#" class="responsive-picture logo" title="Logo wishlist"><picture><!--[if IE 9]><video style="display: none;"><![endif]--><source srcset="./images/Logo64x64.png" media="(min-width: 1200px)"><source srcset="./images/Logo64x64.png" media="(min-width: 576px)"><!--[if IE 9]></video><![endif]--><img alt="logo wishlist" src="./images/Logo64x64.png"></picture></a>
      <div class="container-fluid nav-container">
        <a class="link-text nav-link" href="pageConnexion.php" title="Se connecter">Se connecter</a>
        <a class="link-text nav-link" href="pageInscription.php" title="S'inscrire"><span class="text-link-text-2">S'inscrire</span>
        </a>
        <a class="link-text nav-link current" href="index.php" title="Accueil">Accueil</a>
      </div>
    </div>
  </div>
  <div class="row wecome-row">
    <div class="col-xs-12 welcome-column">
      <h1><span class="heading-text-11">Inscription</span>
      </h1>
    </div>
  </div>
  <div class="row rocket">
    <div class="col-xs-12">
      <div class="container-fluid container-1">
        <form class="form-container form-container-1" action="php/phpcreateaccount.php" method="post">
          <div class="container-fluid">
            <h2 class="heading-2">Créer votre compte
            </h2>
          </div>
          <div class="container-fluid container-9">
            <div class="container-fluid container-2"><input id="prenom" value="" name="prenom" type="text" class="input-2" placeholder="Prénom" onblur="testALL()" required >
            </div>
            <div class="container-fluid container-4"><input id="nom" value="" name="nom" type="text" class="input-6" placeholder="Nom" onblur="testALL()" required >
            </div>
            <div id="divemail" class="container-fluid container-5"><input id="email" value="" name="email" type="text" class="input-7" placeholder="Email" onblur="getRecherche()" required >
            </div>
            <div class="container-fluid container-6"><input id="jour" value="" name="jnai" type="text" class="input-3" placeholder="jj" onblur="testALL()" size="2" maxlength="2" required><input id="mois" value="" name="mnai" type="text" class="input-4" placeholder="mm" onblur="testALL()" size="2" maxlength="2" required ><input id="annee" value="" name="anai" type="text" class="input-5" placeholder="aaaa" onblur="testALL()" size="4" maxlength="4" required>
            </div>
              <div class="container-fluid container-7"><input id="mdp1" value="" name="mdp" type="password" class="input-8" placeholder="Mot de passe" onblur="testALL()" required><img id="img" src="Images/oeilferme.png" onclick="changeMdp()">
            </div>
            <div id="divmdp" class="container-fluid container-8"><input id="mdp2" value="" name="mdp2" type="password" class="input-9" placeholder="Confirmation mot de passe" onblur="testALL()" required>
            </div>
          </div><button id="submit" type="submit" class="btn" data-callback-before="testALL" disabled="true" >S'inscrire</button>
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
</body>
</html>