<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für shoppingcart //
// Ersteller    : Sven Krumbeck              //
// Stand        : 17.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Language Array Includieren
include './language/shoppingcart_lang.php';
//Variable Initaltisieren
$gesamtpreis = 0;

// Nur Ausführen wenn ein Produkt hinzugefügt wurde
if (isset($_POST['productID'])) {
  //Produkt ID Übernehmen
  $productID = $_POST['productID'];
  //Produkt aus Datenbank Holen
  $DatenbankAbfrageProdukte= "SELECT * FROM products WHERE productID='$productID'";
  $ProductsArray = mysqli_query ($db_link, $DatenbankAbfrageProdukte);
  //Daten Zuweisen
  while ($zeile = mysqli_fetch_array($ProductsArray))
      {
        $productID = $zeile['productID'];
        $productNameDE = $zeile['productNameDE'];
        $productNameENG = $zeile['productNameENG'];
        $productDescriptionDE = $zeile['productDescriptionDE'];
        $productDescriptionENG = $zeile['productDescriptionENG'];
        $productImage = $zeile['productImage'];
        $productCategoryID = $zeile['productCategoryID'];
        $productPrice = $zeile['productPrice'];
      }
  //Session Abfragen oder erstellen wenn nicht vorhanden
  if (isset($_SESSION['shoppingcart']))
  {
    //Schauen ob Produkt schon im Einkaufskorb liegt
    $shoppingcart = $_SESSION['shoppingcart'];
    $imWarenkorb = array_search($productID, array_column($_SESSION['shoppingcart'], 'productID'));
    if ($imWarenkorb > -1) {
     $shoppingcart = $_SESSION['shoppingcart'];
     $shoppingcart[$imWarenkorb]['productAmount'] = $shoppingcart[$imWarenkorb]['productAmount'] + 1;
     $_SESSION['shoppingcart'] = $shoppingcart;
    }
    else
    {
      //Wenn vorhanden neues Objekt in Array schreiben
      $shoppingcart = $_SESSION['shoppingcart'];
      $newObject = array('productID' => $productID, 'productNameDE' => $productNameDE,'productNameENG' =>  $productNameENG,'productAmount' => 1,'productPrice' => $productPrice,'productImage' =>  $productImage);
      array_push($shoppingcart, $newObject);
      $_SESSION['shoppingcart'] = $shoppingcart;
    }
  }
  else {
    //Wenn nicht vorhanden Arary erstellen und in Session speichern
    $shoppingcart = array
    (
    $newObject = array('productID' => $productID, 'productNameDE' => $productNameDE,'productNameENG' =>  $productNameENG,'productAmount' => 1,'productPrice' => $productPrice,'productImage' =>  $productImage)
    );
    $_SESSION['shoppingcart'] = $shoppingcart;
  }
}


?>

<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"><?php echo $shoppingcartlang[$_COOKIE['language']][1]; ?></h2>
                <p><?php echo $shoppingcartlang[$_COOKIE['language']][2]; ?></p>
            </div>
            <div class="content">
              <form class="" action="payment-page.php" method="post">
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                          <?php
                          if (!empty($_SESSION['shoppingcart'])) {
                          foreach ($_SESSION['shoppingcart'] as $product_ID)
                              {
echo "  <div class=\"product\">";

echo "                                <div class=\"row justify-content-center align-items-center\">\n";
echo "                                    <div class=\"col-md-3\">\n";
echo "                                        <div class=\"product-image\"><img class=\"img-fluid d-block mx-auto image\" src=\"assets/img/uploads/".$product_ID['productImage']."\"></div>\n";
echo "                                    </div>\n";
echo "                                    <div class=\"col-md-5 product-info\"><a class=\"product-name\" href=\"product-page.php?produktID=".$product_ID['productID']."\">".$product_ID['productNameDE']."</a>\n";
echo "                                        <div class=\"product-specs\">\n";
echo "                                            <div>".$shoppingcartlang[$_COOKIE['language']][9]."</div>\n";
echo "                                        </div>\n";
echo "                                    </div>\n";
echo "                                    <div class=\"col-6 col-md-2 quantity\"><label class=\"d-none d-md-block\" for=\"quantity\">Anzahl:</label><input type=\"number\" name=\"price_".$product_ID['productID']."\" id=\"number\" class=\"form-control quantity-input\" value=\"".$product_ID['productAmount']."\" name=\"productID".$product_ID['productID']."\"></div>\n";
echo "                                    <div class=\"col-6 col-md-2 price\"><span>".$product_ID['productPrice']."€</span></div>\n";
echo "                                </div>\n";
echo "                            </div>";


// Gesamtsumme Ausrechnen
$gesamtpreis = $gesamtpreis + $product_ID['productPrice'] * $product_ID['productAmount'];
                            }
                            // code...
                          }
                          else {
                            echo "<h4>".$shoppingcartlang[$_COOKIE['language']][10]."</h4>";
                          }
                          ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3><?php echo $shoppingcartlang[$_COOKIE['language']][3]; ?>:</h3>
                            <h4><span class="text"><?php echo $shoppingcartlang[$_COOKIE['language']][4]; ?></span><span class="price"><?php echo $gesamtpreis; ?>€</span></h4>
                            <h4><span class="text"><?php echo $shoppingcartlang[$_COOKIE['language']][5]; ?></span><span class="price">0€</span></h4>
                            <h4><span class="text"><?php echo $shoppingcartlang[$_COOKIE['language']][6]; ?></span><span class="price">0€</span></h4>
                            <h4><span class="text"><?php echo $shoppingcartlang[$_COOKIE['language']][7]; ?></span><span class="price"><?php echo $gesamtpreis; ?>€</span></h4>
                            <button class="btn btn-primary btn-block btn-lg" type="submit"<?php if (empty($_SESSION['shoppingcart'])) {echo "disabled";} ?> ><?php echo $shoppingcartlang[$_COOKIE['language']][8]; ?></button></div>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </section>
</main>
