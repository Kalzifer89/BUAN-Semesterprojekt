<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Buissness Anwendungen im Internet</title>
    <meta name="description" content="Das Semester Projekt">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <!-- Wenn Darkmode Cookie gesetzt ist, Darkmode CSS Laden -->
    <?php
      if( isset(($_COOKIE['darkmode'])))
      {
        echo "<link rel=\"stylesheet\" href=\"assets/css/darkmode.css\">";
      }
    ?>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">iSchool</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pricing.php">Bonus</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="product-page.php">Product</a></li> -->
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="payment-page.php">Payment</a></li> -->
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="shopping-cart.php">Shopping Cart</a></li> -->

                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Login</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="registration.php">Register</a></li> -->
                    <li class="nav-item" role="presentation"><a class="nav-link" href="catalog-page.php">Shop</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="account.php">Account</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="shopping-cart.php" ><img src="assets/img/shoppingcart.png" width="20"></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#" onclick="SpracheDE()"><img src="assets/img/Download%20(2).png" width="20"></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#" onclick="SpracheEN()"><img src="assets/img/britishflag.jpg" width="20"></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link switch" href="#" onclick="Darkmode()"><img src="assets/img/contrast-circle-512.png" width="20"></a></li>
                </ul>
            </div>
        </div>
        <noscript>Bitte Java Skript Aktivieren / Please Activiate Java Script</noscript>
    </nav>
    <!-- Andere Dateien Inlcudieren -->
    <?php include "config/config.php" ?>
    <?php include "language/index_lang.php" ?>
