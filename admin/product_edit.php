<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Produkte Bearbeiten         //
// Ersteller    : Sven Krumbeck              //
// Stand        : 31.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////


//Session Starten
session_start();

include '../config/config.php';

//User ID Holen
$productID = $_GET["productID"];

//User aus Datenbank holen
$DatenbankAbfrageProdukt = "SELECT * FROM products WHERE  productID = '$productID' ";
$ProduktArray = mysqli_query ($db_link, $DatenbankAbfrageProdukt);

//Variablen Übergeben
while ($zeile = mysqli_fetch_array($ProduktArray))
 {
   $productNameDE = $zeile['productNameDE'];
   $productNameENG = $zeile['productNameENG'];
   $productDescriptionDE = $zeile['productDescriptionDE'];
   $productDescriptionENG = $zeile['productDescriptionENG'];
   $productImage = $zeile['productImage'];
   $productCategoryID = $zeile['productCategoryID'];
   $productPrice = $zeile['productPrice'];
 }

 //Kategorien Abfragen
 $DatenbankAbfrageKategorien = "SELECT * FROM categorys";
 $KategorientArray = mysqli_query ($db_link, $DatenbankAbfrageKategorien);

 //Wenn Daten geändert worden sind
 if (isset($_POST['edit'])) {

   $productNameDE = $_POST['productNameDE'];
   $productNameENG = $_POST['productNameENG'];
   $productDescriptionDE = $_POST['productDescriptionDE'];
   $productDescriptionENG = $_POST['productDescriptionENG'];
   $productImage = $_POST['productImage'];
   $productCategoryID = $_POST['productCategoryID'];
   $productPrice = $_POST['productPrice'];

   $DatenbankUpdateProducts = "UPDATE products SET productNameDE = '$productNameDE', productNameENG = '$productNameENG', productDescriptionDE = '$productDescriptionDE', productImage = '$productImage', productCategoryID = '$productCategoryID', productPrice = '$productPrice' WHERE  productID = '$productID'";
   $ProductsArray = mysqli_query ($db_link, $DatenbankUpdateProducts);
 }

include 'core/header.php';

//Seite nur eingelogt Anzeigen
if (!isset($_SESSION['LoggedInAdmin']))
{
  exit("Sie können diese Seite nicht einzelnd aufrufen.");
}
 ?>

 <div class="container-fluid">
    <h3 class="text-dark mb-4">Product Mangement</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Edit Product</p>
        </div>
        <div class="card-body">
          <form method="post" target="_self">
              <div class="form-group"><label>Product Name DE:</label><input type="text" class="form-control" name="productNameDE" value="<?php echo $productNameDE; ?>" /></div>
              <div class="form-group"><label>Product Name EN:</label><input type="text" class="form-control" name="productNameENG" value="<?php echo $productNameENG; ?>" /></div>
              <div class="form-group"><label>Product Image:</label><input type="text" class="form-control" name="productImage" value="<?php echo $productImage; ?>" /></div>
              <div class="form-group"><label>Product Description DE:</label><textarea class="form-control" name="productDescriptionDE" rows="10"><?php echo $productDescriptionDE; ?></textarea></div>
              <div class="form-group"><label>Product Description ENG:</label><textarea class="form-control" name="productDescriptionENG" rows="10"><?php echo $productDescriptionENG; ?></textarea></div>
              <div class="form-group"><label>Prize:</label><input type="number" name="productPrice" value="<?php echo $productPrice; ?>" class="form-control" /></div>
              <div class="form-group"><label>Product Category: </label><select name="productCategoryID"><optgroup label="Categorys">
                <?php
                while ($zeile = mysqli_fetch_array($KategorientArray))
                 {

                   if ($productCategoryID == $zeile['categoryID']) {
                     echo "<option value=\"".$zeile['categoryID']."\" selected>".$zeile['categoryNameDE']." / ".$zeile['categoryNameENG']." </option>";
                   }else {
                     echo "<option value=\"".$zeile['categoryID']."\" selected>".$zeile['categoryNameDE']." / ".$zeile['categoryNameENG']." </option>";
                   }
                 }
                 ?>
              </optgroup></select></div>
              <input type="hidden" name="edit" value="1">
              <button class="btn btn-primary btn-block" type="submit">Ändern</button></form>
          </form>
               </div>
           </div>
       </div>

<?php include 'core/footer.php' ?>
