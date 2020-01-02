<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für shoppingcart //
// Ersteller    : Sven Krumbeck              //
// Stand        : 17.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Sprachswitch einbinden
include './language/payment_lang.php';

//Variable Initaltisieren
$gesamtpreis = 0;
$Counter = 0;

//Array Durchgehen und Möglicherweise Geänderte Anzahl aus dem Warenkorb Aktualisieren.
$shoppingcart = $_SESSION['shoppingcart'];
foreach ($_SESSION['shoppingcart'] as $product_ID)
{
  //Speichern von Der Product ID
  $ArrayProductID = $product_ID['productID'];
  //Zusammenbauen der POST Variable
  $String = "price_".$product_ID['productID'];
  //Post Variable Speichen.
  $NeueAnzahl = $_POST[$String];
  //Neue Anzahl schreiben
  $shoppingcart[$Counter]['productAmount'] = $NeueAnzahl;

  //Wenn in Product 0 mal im Warenkorb ist Array Zeile Löschen
  if ($shoppingcart[$Counter]['productAmount'] < 1) {
    unset ($shoppingcart[$Counter]);
    unset ($shoppingcart[$Counter]['productAmount']);
  }

  //Counter erhöhen
  $Counter ++;
}

  //Array Neu Durchnummeren
  $shoppingcart = array_values($shoppingcart);
  $_SESSION['shoppingcart'] = $shoppingcart;


 ?>
<main class="page payment-page">
    <section class="clean-block payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"><?php echo $paymentlang[$_COOKIE['language']][1]; ?></h2>
                <p><?php echo $paymentlang[$_COOKIE['language']][2]; ?></p>
            </div>
            <form action="order_completed.php" method="post">
                <div class="products">
                    <h3 class="title"><?php echo $paymentlang[$_COOKIE['language']][3]; ?></h3>
                    <?php
                    foreach ($_SESSION['shoppingcart'] as $product_ID)
                    {
                      echo "                    <div class=\"item\"><span class=\"price\">".$product_ID['productPrice']."€</span>\n";
                      echo "                        <p class=\"item-name\">".$product_ID['productAmount']." x ".$product_ID['productNameDE']."</p>\n";
                      echo "                        <p class=\"item-description\">".$paymentlang[$_COOKIE['language']][6]."</p>\n";
                      echo "                    </div>";

                      $gesamtpreis = $gesamtpreis + $product_ID['productPrice'] * $product_ID['productAmount'];
                    }
                    ?>
                    <div class="total"><span>Total</span><span class="price"><?php echo $gesamtpreis; ?>€</span></div>
                </div>
                <div class="card-details">
                    <h3 class="title"><?php echo $paymentlang[$_COOKIE['language']][4]; ?></h3>
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
                            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" <?php  if (empty($shoppingcart)) {echo "disabled";} ?>><?php echo $paymentlang[$_COOKIE['language']][5]; ?></button></div>
                            <input type="hidden" name="payed" value="1">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
