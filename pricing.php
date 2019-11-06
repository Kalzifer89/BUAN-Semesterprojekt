<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Preis Tabelle              //
// Ersteller    : Sven Krumbeck              //
// Stand        : 06.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////
 ?>
<?php include "core/header.php" ?>
<!-- Sprachswitch einbinden -->
<?php include "language/pricing_lang.php" ?>
    <main class="page pricing-table-page">
        <section class="clean-block clean-pricing dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><?php echo $pricinglang [$_COOKIE['language']][1]; ?></h2>
                    <p><?php echo $pricinglang [$_COOKIE['language']][2]; ?></p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 col-lg-4">
                        <div class="clean-pricing-item">
                            <div class="heading">
                                <h3>BASIC</h3>
                            </div>
                            <p><?php echo $pricinglang [$_COOKIE['language']][3]; ?></p>
                            <div class="features">
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][4]; ?>:&nbsp;</span><span><?php echo $pricinglang [$_COOKIE['language']][5]; ?></span></h4>
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][6]; ?>&nbsp;</span><span><?php echo $pricinglang [$_COOKIE['language']][7]; ?></span></h4>
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][8]; ?>:&nbsp;</span><span><?php echo $pricinglang [$_COOKIE['language']][9]; ?></span></h4>
                            </div>
                            <div class="price">
                                <h4>500€</h4>
                            </div><button class="btn btn-outline-primary btn-block" type="button"><?php echo $pricinglang [$_COOKIE['language']][10]; ?></button></div>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="clean-pricing-item">
                            <div class="ribbon"><span>Best Value</span></div>
                            <div class="heading">
                                <h3>PRO</h3>
                            </div>
                            <p><?php echo $pricinglang [$_COOKIE['language']][11]; ?><br></p>
                            <div class="features">
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][12]; ?>:</span><span>&nbsp;<?php echo $pricinglang [$_COOKIE['language']][13]; ?></span></h4>
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][14]; ?>&nbsp;</span><span><?php echo $pricinglang [$_COOKIE['language']][15]; ?></span></h4>
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][16]; ?>&nbsp;</span><span><?php echo $pricinglang [$_COOKIE['language']][17]; ?></span></h4>
                            </div>
                            <div class="price">
                                <h4>1000€<br></h4>
                            </div><button class="btn btn-primary btn-block" type="button"><?php echo $pricinglang [$_COOKIE['language']][18]; ?></button></div>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="clean-pricing-item">
                            <div class="heading">
                                <h3>PREMIUM</h3>
                            </div>
                            <p><?php echo $pricinglang [$_COOKIE['language']][19]; ?></p>
                            <div class="features">
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][20]; ?>:&nbsp;</span><span><?php echo $pricinglang [$_COOKIE['language']][21]; ?></span></h4>
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][22]; ?>&nbsp;</span><span>&nbsp;<?php echo $pricinglang [$_COOKIE['language']][23]; ?></span></h4>
                                <h4><span class="feature"><?php echo $pricinglang [$_COOKIE['language']][24]; ?>:&nbsp;</span><span><?php echo $pricinglang [$_COOKIE['language']][25]; ?></span></h4>
                            </div>
                            <div class="price">
                                <h4>1500€<br></h4>
                            </div><button class="btn btn-outline-primary btn-block" type="button"><?php echo $pricinglang [$_COOKIE['language']][26]; ?></button></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php include "core/footer.php" ?>
