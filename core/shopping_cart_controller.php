<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für shoppingcart //
// Ersteller    : Sven Krumbeck              //
// Stand        : 17.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

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
    if (empty($imWarenkorb)) {
     echo "im Warenkorb ist leer";
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
                <h2 class="text-info">Warenkorb</h2>
                <p>Hier sehen sie die Waren in ihrem Warenkorb.</p>
            </div>
            <div class="content">
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                          <?php
                          foreach ($_SESSION['shoppingcart'] as $product_ID)
                              {
echo "  <div class=\"product\">";

echo "                                <div class=\"row justify-content-center align-items-center\">\n";
echo "                                    <div class=\"col-md-3\">\n";
echo "                                        <div class=\"product-image\"><img class=\"img-fluid d-block mx-auto image\" src=\"assets/img/tech/".$product_ID['productImage']."\"></div>\n";
echo "                                    </div>\n";
echo "                                    <div class=\"col-md-5 product-info\"><a class=\"product-name\" href=\"#\">".$product_ID['productNameDE']."</a>\n";
echo "                                        <div class=\"product-specs\">\n";
echo "                                            <div><span>Display: </span><span class=\"value\">5 inch</span></div>\n";
echo "                                            <div><span>RAM: </span><span class=\"value\">4GB</span></div>\n";
echo "                                            <div><span>Memory: </span><span class=\"value\">32GB</span></div>\n";
echo "                                        </div>\n";
echo "                                    </div>\n";
echo "                                    <div class=\"col-6 col-md-2 quantity\"><label class=\"d-none d-md-block\" for=\"quantity\">Anzahl</label><input type=\"number\" id=\"number\" class=\"form-control quantity-input\" value=\"".$product_ID['productAmount']."\"></div>\n";
echo "                                    <div class=\"col-6 col-md-2 price\"><span>".$product_ID['productPrice']."€</span></div>\n";
echo "                                </div>\n";
echo "                            </div>";
// Gesamtsumme Ausrechnen
$gesamtpreis = $gesamtpreis + $product_ID['productPrice'];
                            }
                          ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Gesamt:</h3>
                            <h4><span class="text">Zwischensumme</span><span class="price"><?php echo $gesamtpreis; ?>€</span></h4>
                            <h4><span class="text">Nachlass</span><span class="price">$0</span></h4>
                            <h4><span class="text">Versand</span><span class="price">$0</span></h4>
                            <h4><span class="text">Total</span><span class="price"><?php echo $gesamtpreis; ?>€</span></h4><button class="btn btn-primary btn-block btn-lg" type="button">Bezahlen</button></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
