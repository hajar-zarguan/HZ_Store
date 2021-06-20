<?php 

 session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> H_Z Store &middot; Hajar Zarguan</title>
    <meta name="description" content="Zarguan Hajar dev node js project - E-Commerce Bootstrap - express js">
    <meta name="keywords" content="H_Z Store, hajar zarguan, Glsid, e-commerce bootstrap project, dev bootstrap , node js template, e-commerce,  Zarguan Hajar">
    <meta name="author" content="Hajar Zarguan">
    <meta NAME="Revisit-After" CONTENT="5 days">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png">
    <!-- UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link href="assets/css/carousel-recommendation.css" rel="stylesheet">
    <link href="assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

  </head>
  <body>
    
    <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../"> <img src="favicon.png" ></a>
          </div>

          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Accueil</a></li>
              <li><a href="catalog.php">Nos produits</a></li>
              <li class="dropdown">
                <a href="catalog.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Autres <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="product.php">Produit</a></li>
                  <li><a href="cart.php">Carte</a></li>
                  <li><a href="contacts.php">Contact</a></li>
                </ul>
              </li>
            </ul>
   <ul class="nav navbar-nav navbar-right">
              <?php
             
    if (!isset($_SESSION['username'])) {
        echo '<li><a href="login.php"> <i class="ion-android-person"></i>Authentification</a></li>
              <li class="active"><a href="signup.php">Inscription</a></li>';
    }
    else  echo '<li><a href="signout.php"> <i class="ion-android-person"></i>se deconnecter </a></li>
              <li class="active"><a href="cart.php">Bonjour '.$_SESSION['username'].'</a></li>';

?>
            </ul>
          </div>
        </div>
    </nav>


    <hr class="offset-md">

    <div class="box">
      <div class="container">
          <h1>Panier</h1>
          <hr class="offset-sm">
      </div>
    </div>
    <hr class="offset-md">


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="checkout-cart">
                      <div class="content">



      
  <?php

  if(isset($_SESSION['cart']))
  {
  if (!$connect = mysqli_connect("localhost", "root", "")) {
                exit("Desolé, Connexion a localhost impossible");  }
            if (!mysqli_select_db($connect, 'newbdd')) {
                exit("Desolé, l'acces a la base boutique impossible");    }
            $data = mysqli_query($connect, "SELECT * FROM produits");
            $product_id = array_column($_SESSION['cart'], 'product_id');
            while ($ligne = mysqli_fetch_row($data)) {
                foreach ($product_id as $id) {
                    if ($ligne[0] == $id) {
                echo " <div class=\"media\">
            <div class=\"media-left\">
              <a href=\"#\">
                <img class=\"media-object\" src=".$ligne[4]." alt=\"HP Chromebook 11\"/>
              </a>
            </div>
            <div class=\"media-body\">
              <h2 class=\"h4 media-heading\">".$ligne[1]."</h2>
              <label>".$ligne[2]."</label>
              <p class=\"prix\">".$ligne[3]."</p>
            </div>
            <div class=\"controls\">
              <div class=\"input-group\">
                <span class=\"input-group-btn\">
                  <button class=\"btn btn-default btn-sm\" type=\"button\" data-action=\"minus\"><i class=\"ion-minus-round\"></i></button>
                </span>
                <input type=\"text\" class=\"form-control input-sm\" placeholder=\"Qty\" value=\"1\" readonly=\"\">
                <span class=\"input-group-btn\">
                  <button class=\"btn btn-default btn-sm\" type=\"button\" data-action=\"plus\"><i class=\"ion-plus-round\"></i></button>
                </span>
              </div><!-- /input-group -->

              <a href=\"#remove\"> <i class=\"ion-trash-b\"></i> supprimer </a>
            </div>
          </div>";
}
}} }else echo "<div class=\"media\">
            <div class=\"media-left\">
            Aucun produits dans le panier
            </div></div>";
        
           ?>





                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-4">
              <hr class="offset-md visible-sm">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <h2 class="no-margin">Votre panier</h2>
                    <hr class="offset-md">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <p>  <?php 
                            if(isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "$count";
                            }else {
                                echo "0";
                            }
                        ?></p>
                            </div>
                            <div class="col-xs-6">
                                <p><b>$1499</b></p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <h3 class="no-margin">Totale</h3>
                            </div>
                            <div class="col-xs-6">
                                <h3 class="no-margin">$1499</h3>
                            </div>
                        </div>
                    </div>
                    <hr class="offset-md">

                    <a href="../checkout/" class="btn btn-primary btn-lg justify"><i class="ion-android-checkbox-outline"></i>&nbsp;&nbsp; voir l'ordre </a>
                    <hr class="offset-md">

                    <p>Payez votre commande de la manière la plus pratique</p>
                    <div class="payment-icons">
                      <img src="assets/img/payments/icon-paypal.svg" alt="paypal">
                      <img src="assets/img/payments/icon-visa.svg" alt="visa">
                      <img src="assets/img/payments/icon-mc.svg" alt="mc">
                      <img src="assets/img/payments/icon-discover.svg" alt="discover">
                      <img src="assets/img/payments/icon-ae.svg" alt="ae">
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">

    <footer>
      <div class="about">
        <div class="container">
          <div class="row">
            <hr class="offset-md">

            <div class="col-xs-6 col-sm-4" style="padding-left: 220px;">
              <div class="item">
                <i class="ion-ios-telephone-outline"></i>
                <h1>24/7 support<br> <span>gratuit</span></h1>
              </div>
            </div>
            <div class="col-xs-6 col-sm-4 " style="padding-left :100px;" >
              <div class="item">
                <i class="ion-ios-star-outline"></i>
                <h1>Des prix <br><span> raisonnables</span></h1>
              </div>
            </div>
            <div class="col-xs-6 col-sm-4" >
              <div class="item">
                <i class="ion-ios-loop"></i>
                <h1> Remboursement intégral <br> <span>garantie</span> </h1>
              </div>
            </div>

            <hr class="offset-md">
          </div>
        </div>
      </div>

      <div class="subscribe">
        <div class="container align-center">
            <hr class="offset-md">

            <h1 class="h3 upp">Rejoignez notre newsletter</h1>
            <p>Obtenez plus d'informations et recevez des remises spéciales sur nos produits.</p>
            <hr class="offset-sm">

            <form action="index.php" method="post">
              <div class="input-group">
                <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary"> S'abonner <i class="ion-android-send"></i> </button>
                </span>
              </div><!-- /input-group -->
            </form>
            <hr class="offset-lg">
            <hr class="offset-md">

            <div class="social">
              <a href="#"><i class="ion-social-facebook"></i></a>
              <a href="#"><i class="ion-social-twitter"></i></a>
              <a href="#"><i class="ion-social-googleplus-outline"></i></a>
              <a href="#"><i class="ion-social-instagram-outline"></i></a>
              <a href="#"><i class="ion-social-linkedin-outline"></i></a>
              <a href="#"><i class="ion-social-youtube-outline"></i></a>
            </div>


            <hr class="offset-md">
            <hr class="offset-md">
        </div>
      </div>


      <div class="container">
        <hr class="offset-md">

        <div class="row menu">
          <div class="col-sm-3 col-md-2">
            <h1 class="h4">Information <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

            <div class="list-group">
              <a href="#" class="list-group-item">apropos</a>
              <a href="#" class="list-group-item">Terms</a>
              <a href="#" class="list-group-item">livraison</a>
            </div>
          </div>
          <div class="col-sm-3 col-md-2">
            <h1 class="h4">Products <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

            <div class="list-group">
              <a href="#" class="list-group-item">Ordinateurs portables</a>
              <a href="#" class="list-group-item">Tablettes</a>
              <a href="#" class="list-group-item">Serveurs</a>
            </div>
          </div>
          <div class="col-sm-3 col-md-2">
            <h1 class="h4">Support <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

            <div class="list-group">
              <a href="#" class="list-group-item">Returns</a>
              <a href="#" class="list-group-item">FAQ</a>
              <a href="contacts.html" class="list-group-item">Contacts</a>
            </div>
          </div>
     
          <div class="col-sm-3 col-md-3 col-md-offset-1 align-right hidden-sm hidden-xs">
            <h1 class="h4">HZ STORE, </h1>

              <address>
                Casablanca Suite 800<br>
                <abbr title="Phone">P:</abbr> +212 615 88 50 41
              </address>

              <address>
                <strong>Support</strong><br>
                <a href="mailto:#">h.zarguan_etu@enset-media.ac.ma</a>
              </address>

          </div>
        </div>
      </div>

      <hr>

      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-9 payments">
            <p>Payez votre commande de la manière la plus pratique</p>

            <div class="payment-icons">
              <img src="assets/img/payments/paypal.svg" alt="paypal">
              <img src="assets/img/payments/visa.svg" alt="visa">
              <img src="assets/img/payments/master-card.svg" alt="mc">
              <img src="assets/img/payments/discover.svg" alt="discover">
              <img src="assets/img/payments/american-express.svg" alt="ae">
            </div>
            <br>

          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="Modal-SignIn" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h4 class="modal-title">Rejoignez nous gratuitement</h4>
                  <br>

                  <form class="join" action="index.php" method="post">
                    <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                    <br>
                    <input type="password" name="password" value="" placeholder="Password" required="" class="form-control" />
                    <br>

                    <button type="submit" class="btn btn-primary btn-sm">Join</button>
                    <a href="#">Terms ></a>

                    <br><br>
                    <p>
                      En créant un compte, vous pourrez faire vos achats plus rapidement, être au courant de l'état d'une commande et suivre les commandes que vous avez déjà passées.   </p>
                  </form>
                </div>
                <div class="col-sm-6">
                  <h4 class="modal-title">s'inscrire</h4>
                  <br>

                  <form class="signin" action="index.php" method="post">
                    <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                    <br>
                    <input type="password" name="password" value="" placeholder="Password" required="" class="form-control" />
                    <br>

                    <button type="submit" class="btn btn-primary btn-sm">s'inscrire</button>
                    <a href="#forgin-password" data-action="Forgot-Password">mot de passe oublier ?? ></a>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Modal-ForgotPassword" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h4 class="modal-title">mot de passe oublier?</h4>
                  <br>

                  <form class="join" action="index.php" method="post">
                    <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                    <br>

                    <button type="submit" class="btn btn-primary btn-sm">Continue</button>
                    <a href="#Sign-In" data-action="Sign-In">Back ></a>
                  </form>
                </div>
                <div class="col-sm-6">
                  <br><br>
                  <p>
                    Saisissez l'adresse e-mail associée à votre compte. Cliquez sur Soumettre pour que votre mot de passe vous soit envoyé par e-mail.     </p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Modal-Gallery" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
            <h4 class="modal-title">titre</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-latest.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/core.js"></script>
    <script src="assets/js/checkout.js"></script>
    <script src="assets/js/catalog.js"></script>

    <script type="text/javascript" src="assets/js/jquery-ui-1.11.4.js"></script>
    <script type="text/javascript" src="assets/js/jquery.ui.touch-punch.js"></script>

  </body>
</html>