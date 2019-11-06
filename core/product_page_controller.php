<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für Produktseite //
// Ersteller    : Sven Krumbeck              //
// Stand        : 17.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Sprachswitch einbinden
include './language/product_lang.php';

//Variable aus URL Erstellen
$productID = $_GET["produktID"];
//Produkte Abfragen
$DatenbankAbfrageProdukte= "SELECT * FROM products WHERE productID='$productID'";
$ProdukctArray = mysqli_query ($db_link, $DatenbankAbfrageProdukte);
//Produkt in Variablen Übergeben
while ($zeile = mysqli_fetch_array($ProdukctArray))
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

 ?>

 <main class="page product-page">
     <section class="clean-block clean-product dark">
         <div class="container">
             <div class="block-heading">
                 <h2 class="text-info"><?php echo $productlang[$_COOKIE['language']][1]; ?></h2>
                 <p><?php echo $productlang[$_COOKIE['language']][2]; ?></p>
             </div>
             <div class="block-content">
                 <div class="product-info">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="gallery">
                                 <div class="sp-wrap"><a href="assets/img/uploads/<?php echo $productImage;?>"><img class="img-fluid d-block mx-auto" src="assets/img/uploads/<?php echo $productImage;?>"></a></div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="info">
                                 <h3><?php if ($_COOKIE['language'] == 0) {echo $productNameDE;}else {echo $productNameENG;}?></h3>
                                 <div class="price">
                                     <h3><?php echo $productPrice;?>€</h3>
                                 </div>
                                 <form class="shoppingcart" action="shopping-cart.php" method="post">
                                   <input type="hidden" name="productID" value="<?php echo $productID;?>">
                                   <button class="btn btn-primary" type="submit"><i class="icon-basket"></i><?php echo $productlang[$_COOKIE['language']][3]; ?></button>
                                 </form>
                                 <div class="summary">
                                     <p><?php if ($_COOKIE['language'] == 0) {echo $productDescriptionDE;}else {echo $productDescriptionENG;}?></p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </main>
