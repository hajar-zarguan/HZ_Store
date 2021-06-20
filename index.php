<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<script> window.location.replace(\"login.php\"); </script>";
    }

    if(isset($_REQUEST['add'])) {
        if(isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'],"product_id");
            if(in_array($_REQUEST['product_id'],$item_array_id)) {
                echo "<script>alert('produit déja dans le panier')</script>";
                echo "<script>window.location='index.php'</script>";
            }else {
                $count = count($_SESSION['cart']);
                $item_array = array (
                    'product_id'=>$_REQUEST['product_id']
                );
                $_SESSION['cart'][$count] = $item_array;
            }
        }else {
            $item_array = array (
                'product_id'=>$_REQUEST['product_id']
            );
            $_SESSION['cart'][0] = $item_array;
        }
    }

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
              <li class="dropdown">
                <a href="catalog.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Autres <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="product.php">Produit</a></li>
                  <li><a href="cart.php">Carte</a></li>
                
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


    <header>
      <div class="carousel" data-count="3" data-current="2">
        <!-- <button class="btn btn-control"></button> -->

        <div class="items">
          <div class="item" data-marker="1">
            <img src="assets/img/carousel/bckg.jpg" alt="Background" class="background"/>

            <div class="content">
              <div class="outside-content">
                <div class="inside-content">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-12 align-center">
                        <h1>Nouveaux ordinateurs portables incroyables</h1>
                        <p> léger et puissant</p>
                        <a href="./catalog/">Plus d'ordinateurs portables ></a>
                        <br><br>
                      </div>
                      <div class="col-sm-6 col-sm-offset-3 align-center">
                        <img src="assets/img/carousel/newlaptops.jpg" alt="Laptops"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item active" data-marker="2">
            <img src="assets/img/carousel/bckg.jpg" alt="Background" class="background"/>

            <div class="content">
              <div class="outside-content">
                <div class="inside-content">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-8 col-sm-offset-2 align-center">
                        <img src="assets/img/carousel/surfaces.jpg" alt="Surface Pro"/>
                      </div>
                      <div class="col-sm-12 align-center">
                        <h1>HZ STORE</h1>
                        <p>L'ordinateur portable est livré avec une puce Intel i5 et 8 Go de RAM.</p>
                        <a href="./catalog/"> voir plus></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item" data-marker="3">
            <img src="assets/img/carousel/bckg.jpg" alt="Background" class="background"/>

            <div class="content">
              <div class="outside-content">
                <div class="inside-content">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-5 col-sm-offset-1 align-center">
                        <img src="assets/img/carousel/ipadair2.jpg" alt="iPad Air 2" class="hidden-xs hidden-sm"/>
                        <img src="assets/img/carousel/ipadair2m.jpg" alt="iPad Air 2" class="hidden-md hidden-lg"/>
                      </div>
                      <div class="col-sm-4 align-left">
                        <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                        <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                        <h1>Appareils de luxe</h1>
                        <br>
                        
                        <p>
                          Montres de luxe, tablettes professionnelles et 3D touch : comment Apple compte garder une longueur d'avance sur le mobile.
                           En ce qui concerne les derniers iPhones de la marque, la plus grande excitation n'est pas concentrée sur l'ajout d'un appareil de couleur or rose mais sur les nouveaux capteurs tactiles 3D.
                           </p>
                        <a href="./blog/item-photo.html">voir l'article ></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <ul class="markers">
          <li data-marker="1"><img src="assets/img/carousel/newlaptops.jpg" alt="Background"/></li>
          <li data-marker="2" class="active"><img src="assets/img/carousel/surfaces.jpg" alt="Background"/></li>
          <li data-marker="3"><img src="assets/img/carousel/ipadair2.jpg" alt="Background"/></li>
        </ul>
      </div>
    </header>
    <br><br>

    <div class="container">
      <div class="row">
        <div class="col-sm-3 align-center">
          <a href="./blog/">
            <img src="assets/img/tiles/blog.jpg" alt="Blog" class="image"/>
          </a>
          <br><br>

          <a href="./blog/">Titres des blogs</a>
        </div>
        <div class="col-sm-3 align-center">
          <a href="#video" data-gallery="#video" data-source="vimeo" data-id="110691368" data-id="110691368" data-title="Apple iPad Air" data-description="So capable, you won’t want to put it down. So thin and light, you won’t have to.">
            <img src="assets/img/tiles/video-apple.jpg" alt="New devices" class="image"/>
          </a>
          <br><br>

          <a href="#video" data-gallery="#video" data-source="vimeo" data-id="110691368" data-title="Apple iPad Air" data-description="So capable, you won’t want to put it down. So thin and light, you won’t have to.">New apple diveces</a>
        </div>
        <div class="col-sm-3 align-center">
          <a href="#video" data-gallery="#video" data-source="youtube" data-id="6g-ZIm0wge4" data-title="Best New Dell Laptops" data-description="Best of dell's laptops that you can consider buying in 2016. 4 Laptops are featured in the video and all of them has equal importance and there is no order that #1 is better than #2">
            <img src="assets/img/tiles/video-dell.jpg" alt="Del XPS" class="image"/>
          </a>
          <br><br>

          <a href="#video" data-gallery="#video" data-source="youtube" data-id="6g-ZIm0wge4" data-title="Best New Dell Laptops" data-description="Best of dell's laptops that you can consider buying in 2016. 4 Laptops are featured in the video and all of them has equal importance and there is no order that #1 is better than #2">Brend new DELL XPS</a>
        </div>
        <div class="col-sm-3 align-center">
          <a href="./blog/">
            <img src="assets/img/tiles/gallery.jpg" alt="Gallery" class="image"/>
          </a>
          <br><br>
          
          <a href="./blog/">voir tous nos produits</a>
        </div>
      </div>
    </div>
    <br><br>


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
    <script src="assets/js/carousel.js"></script>
    <script src="assets/js/carousel-recommendation.js"></script>
    
  </body>
</html>