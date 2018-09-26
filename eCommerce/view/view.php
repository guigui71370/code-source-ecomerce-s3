<html class="no-js">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $pagetitle; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/raleway-webfont.css" />
    <link rel="stylesheet" href="./assets/css/plugins.css" />
    <link rel="stylesheet" href="./assets/css/responsive.css" />
    <link rel="icon" type="image/png" href="./assets/images/flavicon.png" />
    <script src="./assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</html>    
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img id="logo" src="./assets/images/logo_1.png" alt="ToucheLand" /></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class=""><a href="index.php">Home</a></li>
                    <li class=""><a href="index.php?action=readAll&controller=Marque">Marques</a></li>
                    <li class=""><a href="index.php?action=readAll&controller=Modele&nomMarque=">Modeles</a></li>
                    
                    <?php
                    echo $_SESSION["footer"];
                    ?>
                    
                </ul>
            </div>
        </div>
        
        <?php
        echo $_SESSION["conection"];
        ?>
        
    </nav>
    
    <?php
    $filepath = File::build_path(array("view", $controller, "$view.php"));
    require $filepath;
    ?>

    <footer id="footer" class="sections footer different-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-first-content">
                        <div class="logo"><img src="./assets/images/logo_1.png" alt="ToucheLand"/></div>
                        <p>L'ensemble de nos partenaires assure une qualité exemplaire</p>
                        <p>Tous nos produits sont garantis 6 mois de plus que la garantie marque</p>
                        <h4>Partenaire Particulier</h4>
                        <a href="http://webinfo.iutmontp.univ-montp2.fr/~didiera/eCommerce/index.php"><img alt="logo" id="logoOmega" src="http://webinfo.iutmontp.univ-montp2.fr/~didiera/eCommerce/view/images/LogoPNG.png"/></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-mid-content">
                        <h4>Recent Posts</h4>
                        <div class="post">
                            <div class="post-item">
                                <h6>11 Novembre 2017</h6>
                                <a href="">Ouverture de notre site en béta</a>
                            </div>
                        </div>
                        <div class="post">
                            <div class="post-item">
                                <h6>30 Novembre 2017</h6>
                                <a href="">Vous pouvez enfin créer un compte</a>
                            </div>
                        </div>
                        <div class="post">
                            <div class="post-item">
                                <h6>Jour de l'examin</h6>
                                <a href="#">Ouverture du site en officiel, champagne à volonté</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-mid-content">
                        <h4>Posts Tweeter</h4>

                        <div class="post">
                            <div class="post-item">
                                <h6>11 novembre 2017</h6>
                                <a href="">Venez visiter pour la première fois notre site</a>
                            </div>
                        </div>
                        <div class="post">
                            <div class="post-item">
                                <h6>30 novembre 2017</h6>
                                <a href="">test</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-last-content">
                        <h4>Adresse</h4>
                        <p>Notre adresse est de type adresse francaise avec une rue, un numéro de rue, un code postal, une ville et un pays. Vous venez d'apprendre quelque chose d'essenciel</p>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>99 Avenue d'Occitanie, 34090 Montpellier</p>
                            <p><i class="fa fa-phone"></i>+33 707070707</p>
                            <p><i class="fa fa-envelope"></i>nePasUtiliser@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="scroll-top">
        <div class="scrollup">
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <footer class="copyright-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright text-center">
                        <p>Made with <i class="fa fa-heart"></i> by <a target="_blank" href="http://bootstrapthemes.co"> Bootstrap Themes </a>2016. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>		
    </footer>
    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>