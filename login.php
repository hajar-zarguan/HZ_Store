<?php
    ob_start();
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
            <li><a href="contacts.php">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.php"> <i class="ion-android-person"></i>Authentification</a></li>
              <li class="active"><a href="signup.php">Inscription</a></li>
            </ul>
          </div>
        </div>
    </nav>


    <hr class="offset-lg hidden-xs">
    <hr class="offset-md">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
          <h1 class="align-center">Devenir un client</h1>
          <br>
          <form class="signin" action="login.php" method="post" >
            <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
            <br>
            <input type="password" name="password" value="" placeholder="Password" required="" class="form-control" />
            <br>

            <button type="submit" class="btn btn-primary" name ="connecte">s'authontifier</button>
            <a href="#forgin-password" data-action="Forgot-Password" class="xs-margin">R??cup??ration de mot de passe ></a>
            <br><br>

            <p>
              Si vous avez d??j?? un compte chez nous, veuillez vous connecter.
            </p>
            <hr class="offset-xs">

            <a href="#facebook" class="btn btn-facebook"> <i class="ion-social-facebook"></i>  Se connecter avec Facebook </a>
            <hr class="offset-sm">

            <p>
              Vous n'avez pas de compte ? Cr??ez-en un maintenant??! <a href="signup.html"> Inscription > </a>
            </p>

          </form>
        </div>
      </div>
    </div>

      
                        <?php
                            if (isset($_POST['connecte'])) {
                                $email = trim($_POST['email']);
                                $password = trim($_POST['password']);
                                if (!$connect = mysqli_connect("localhost", "root", "")) {
                                    exit("Desol??, Connexion a localhost impossible");
                                }
                                if (!mysqli_select_db($connect, 'newbdd')) {
                                    exit("Desol??, l'acces a la base boutique impossible");
                                }
                                $data = mysqli_query($connect, "SELECT * FROM utilisateur");
                                if ($data) {
                                    while ($ligne = mysqli_fetch_row($data)) {
                                        if ($email == $ligne[2] && $password == $ligne[3]) {
                                            session_start();
                                            $_SESSION['id_user'] = $ligne[0];
                                            $_SESSION['username'] = $ligne[1];
                                            $_SESSION['email'] = $ligne[2];
                                            echo "<script> window.location.replace(\"index.php\"); </script>";
                                            exit;
                                        }
                                    }
                                    echo "<script>alert(\"Email ou password incorrect\")</script>";
                                    exit;
                                }

                            }
                            ?>

    <br><br>
    <br class="hidden-xs">
    <br class="hidden-xs">










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
                <h1> Remboursement int??gral <br> <span>garantie</span> </h1>
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
            <p>Obtenez plus d'informations et recevez des remises sp??ciales sur nos produits.</p>
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
            <p>Payez votre commande de la mani??re la plus pratique</p>

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
                      En cr??ant un compte, vous pourrez faire vos achats plus rapidement, ??tre au courant de l'??tat d'une commande et suivre les commandes que vous avez d??j?? pass??es.   </p>
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
                    Saisissez l'adresse e-mail associ??e ?? votre compte. Cliquez sur Soumettre pour que votre mot de passe vous soit envoy?? par e-mail.     </p>
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
    <script src="assets/js/catalog.js"></script>

    <script type="text/javascript" src="assets/js/jquery-ui-1.11.4.js"></script>
    <script type="text/javascript" src="assets/js/jquery.ui.touch-punch.js"></script>

  </body>
</html>