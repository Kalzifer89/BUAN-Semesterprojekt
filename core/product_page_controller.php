<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für Produktseite //
// Ersteller    : Sven Krumbeck              //
// Stand        : 17.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

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
                 <h2 class="text-info">Produkt Seite</h2>
                 <p>Hier erfahren sie mehr über ihr ausgewählter Produkt.</p>
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
                                 <h3><?php echo $productNameDE;?></h3>
                                 <div class="price">
                                     <h3><?php echo $productPrice;?>€</h3>
                                 </div>
                                 <form class="shoppingcart" action="shopping-cart.php" method="post">
                                   <input type="hidden" name="productID" value="<?php echo $productID;?>">
                                   <button class="btn btn-primary" type="submit"><i class="icon-basket"></i>Zum Einkaufswagen</button>
                                 </form>
                                 <div class="summary">
                                     <p><?php echo $productDescriptionDE;?></p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </main>
