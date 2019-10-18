<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für shoppingcart //
// Ersteller    : Sven Krumbeck              //
// Stand        : 17.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Variable Initaltisieren
$gesamtpreis = 0;

 ?>
<main class="page payment-page">
    <section class="clean-block payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Bezahlung</h2>
                <p>Bitte bezahlen sie ihre Produkte.</p>
            </div>
            <form>
                <div class="products">
                    <h3 class="title">Kasse</h3>
                    <?php
                    foreach ($_SESSION['shoppingcart'] as $product_ID)
                    {
                      echo "                    <div class=\"item\"><span class=\"price\">".$product_ID['productPrice']."€</span>\n";
                      echo "                        <p class=\"item-name\">".$product_ID['productAmount']." x ".$product_ID['productNameDE']."</p>\n";
                      echo "                        <p class=\"item-description\">Lorem ipsum dolor sit amet</p>\n";
                      echo "                    </div>";

                      $gesamtpreis = $gesamtpreis + $product_ID['productPrice'] * $product_ID['productAmount'];
                    }
                    ?>
                    <div class="total"><span>Total</span><span class="price"><?php echo $gesamtpreis; ?>€</span></div>
                </div>
                <div class="card-details">
                    <h3 class="title">Kredit Karten Details</h3>
                    <div class="form-row">
                        <div class="col-sm-7">
                            <div class="form-group"><label for="card-holder">Card Holder</label><input class="form-control" type="text" placeholder="Card Holder" value="Staatskasse"></div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group"><label>Expiration date</label>
                                <div class="input-group expiration-date"><input class="form-control" type="text" placeholder="MM" value="69"><input class="form-control" type="text" placeholder="YY" value="2020"></div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group"><label for="card-number">Card Number</label><input class="form-control" type="text" id="card-number" placeholder="Card Number" value="0190 6666666"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group"><label for="cvc">CVC</label><input class="form-control" type="text" id="cvc" placeholder="CVC" value="666"></div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Weiter</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
