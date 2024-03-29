<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Hauptseite                  //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////
 ?>

<!-- Header einbinden -->
<?php include "core/header.php" ?>
<!-- Sprachswitch einbinden -->
<?php include "language/index_lang.php" ?>

    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image:url(&quot;assets/img/tech/image4.jpg&quot;);color:rgba(9, 162, 255, 0.85);">
            <div class="text">
                <h2><?php echo $indexlang [$_COOKIE['language']][1]; ?></h2>
                <p><?php echo $indexlang [$_COOKIE['language']][2]; ?></p><button class="btn btn-outline-light btn-lg" type="button"><?php echo $indexlang [$_COOKIE['language']][3]; ?></button></div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Info</h2>
                    <p><?php echo $indexlang [$_COOKIE['language']][4]; ?></p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><img class="img-thumbnail" src="assets/img/brooke-cagle-g1Kr4Ozfoac-unsplash.jpg"></div>
                    <div class="col-md-6">
                        <h3><?php echo $indexlang [$_COOKIE['language']][5]; ?></h3>
                        <div class="getting-started-info">
                            <p><?php echo $indexlang [$_COOKIE['language']][6]; ?></p>
                        </div><button class="btn btn-outline-primary btn-lg" type="button"><?php echo $indexlang [$_COOKIE['language']][7]; ?></button></div>
                </div>
            </div>
        </section>
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Features</h2>
                    <p><?php echo $indexlang [$_COOKIE['language']][8]; ?></p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4>Bootstrap 4</h4>
                        <p><?php echo $indexlang [$_COOKIE['language']][9]; ?></p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                        <h4><?php echo $indexlang [$_COOKIE['language']][10]; ?></h4>
                        <p><?php echo $indexlang [$_COOKIE['language']][11]; ?></p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                        <h4>Responsive</h4>
                        <p><?php echo $indexlang [$_COOKIE['language']][12]; ?></p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                        <h4><?php echo $indexlang [$_COOKIE['language']][13]; ?></h4>
                        <p><?php echo $indexlang [$_COOKIE['language']][14]; ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Screenshot</h2>
                    <p><?php echo $indexlang [$_COOKIE['language']][15]; ?></p>
                </div>
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/scenery/image1.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/scenery/image4.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/scenery/image6.jpg" alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                            data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><?php echo $indexlang [$_COOKIE['language']][16]; ?></h2>
                    <p><?php echo $indexlang [$_COOKIE['language']][17]; ?></p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/pirat_sven2245-1000x667.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Sven Krumbeck</h4>
                                <p class="card-text"><?php echo $indexlang [$_COOKIE['language']][18]; ?></p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar2.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar3.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Martina Mustermann</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include "core/footer.php" ?>
