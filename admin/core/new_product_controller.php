<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Produkte Erstellen        //
// Ersteller    : Sven Krumbeck              //
// Stand        : 31.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////
include '../config/config.php';

$productNameDE = "";
$productNameENG = "";
$productDescriptionDE = "";
$productDescriptionENG = "";
$productImage = "";
$productCategoryID = "";
$productPrice = "";



 //Kategorien Abfragen
 $DatenbankAbfrageKategorien = "SELECT * FROM categorys";
 $KategorientArray = mysqli_query ($db_link, $DatenbankAbfrageKategorien);

 //Wenn Daten geändert worden sind
 if (isset($_POST['edit'])) {

   $productNameDE = $_POST['productNameDE'];
   $productNameENG = $_POST['productNameENG'];
   $productDescriptionDE = $_POST['productDescriptionDE'];
   $productDescriptionENG = $_POST['productDescriptionENG'];
   $productCategoryID = $_POST['productCategoryID'];
   $productPrice = $_POST['productPrice'];
   $productImage = $_FILES['productImage']['name'];

   move_uploaded_file($_FILES['productImage']['tmp_name'], '../assets/img/'.$_FILES['productImage']['name']);

   $DatenbankUpdateProducts = "INSERT INTO products (productNameDE, productNameENG, productDescriptionDE, productImage, productCategoryID, productPrice ) VALUES ('$productNameDE', '$productNameENG', '$productDescriptionDE', '$productImage', '$productCategoryID', '$productPrice')";
   $ProductsArray = mysqli_query ($db_link, $DatenbankUpdateProducts);
 }
 ?>

 <div class="container-fluid">
    <h3 class="text-dark mb-4">Product Mangement</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">New Product</p>
        </div>
        <div class="card-body">
          <form method="post" target="_self" enctype="multipart/form-data">
              <div class="form-group"><label>Product Name DE:</label><input type="text" class="form-control" name="productNameDE" value="<?php echo $productNameDE; ?>" /></div>
              <div class="form-group"><label>Product Name EN:</label><input type="text" class="form-control" name="productNameENG" value="<?php echo $productNameENG; ?>" /></div>
              <div class="form-group"><label>Product Image:</label></br><input type="file" accept="image/*" name="productImage" /></div>
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
