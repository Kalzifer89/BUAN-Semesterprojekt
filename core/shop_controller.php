<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für de SHOP     //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Kategorien Abfragen
$DatenbankAbfrageCategorys= "SELECT * FROM categorys";
$CategoryArray = mysqli_query ($db_link, $DatenbankAbfrageCategorys);

//Filter Ausspielen
if (isset($_POST['filter'])) {

  if (isset($_POST['category']) && isset($_POST['price']) ) {
    $Category = $_POST['category'];
    $Price = $_POST['price'];
    $DatenbankAbfrageProdukte= "SELECT * FROM products WHERE locked = 0 AND productCategoryID = '$Category' AND productPrice = '$Price'";
  } elseif (isset($_POST['price'])) {
    $Price = $_POST['price'];
    $DatenbankAbfrageProdukte= "SELECT * FROM products WHERE locked = 0 AND productPrice = '$Price'";
  }elseif (isset($_POST['category'])) {
    $Category = $_POST['category'];
    $DatenbankAbfrageProdukte= "SELECT * FROM products WHERE locked = 0 AND productCategoryID = '$Category'";
  }else {
    $DatenbankAbfrageProdukte= "SELECT * FROM products WHERE locked = 0";
  }
  $ProdukctArray = mysqli_query ($db_link, $DatenbankAbfrageProdukte);
}

else {
  //Alle Produkte Abfragen
  $DatenbankAbfrageProdukte= "SELECT * FROM products WHERE locked = 0";
  $ProdukctArray = mysqli_query ($db_link, $DatenbankAbfrageProdukte);
}

 ?>



 <main class="page catalog-page">
     <section class="clean-block clean-catalog dark">
         <div class="container">
             <div class="block-heading">
                 <h2 class="text-info">SHOP</h2>
                 <p>Hier sehen sie welche Artikel sie kaufen können.</p>
             </div>
             <div class="content">
                 <div class="row">
                     <div class="col-md-3">
                         <div class="d-none d-md-block">
                           <form method="post" target="_self" class="blankform">
                             <div class="filters">
                                 <div class="filter-item">
                                     <h3>Kategorien</h3>
                                     <?php
                                     while ($zeile = mysqli_fetch_array($CategoryArray))
                                         {
                                           echo "<div class=\"form-check\"><input class=\"form-check-input\" type=\"radio\" id=\"formCheck-1\" name=\"category\" value=\"".$zeile['categoryID']."\"><label class=\"form-check-label\" for=\"formCheck-1\">".$zeile['categoryNameDE']."</label></div>";
                                         }
                                      ?>
                                 </div>
                                 <div class="filter-item">
                                     <h3>Preis</h3>
                                     <div class="form-check"><input class="form-check-input" type="radio" name="price" value ="50"  id="formCheck-5"><label class="form-check-label" for="formCheck-5">50</label></div>
                                     <div class="form-check"><input class="form-check-input" type="radio" name="price" value ="100" id="formCheck-6"><label class="form-check-label" for="formCheck-6">100</label></div>
                                     <div class="form-check"><input class="form-check-input" type="radio" name="price" value ="150" id="formCheck-7"><label class="form-check-label" for="formCheck-7">150</label></div>
                                     <div class="form-check"><input class="form-check-input" type="radio" name="price" value ="200" id="formCheck-7"><label class="form-check-label" for="formCheck-7">200</label></div>
                                 </div>
                                 <input type="hidden" name="filter" value="1">
                                 <button type="submit" name="Filter">Filtern</button>
                               </form>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-9">
                         <div class="products">
                             <div class="row no-gutters">
                               <?php
                               while ($zeile = mysqli_fetch_array($ProdukctArray))
                                   {
 echo "                                 <div class=\"col-12 col-md-6 col-lg-4\">\n";
 echo "                                     <div class=\"clean-product-item\">\n";
 echo "                                         <div class=\"image\"><a href=\"product-page.php?produktID=".$zeile['productID']."\"><img class=\"img-fluid d-block mx-auto\" src=\"assets/img/uploads/".$zeile['productImage']."\"></a></div>\n";
 echo "                                         <div class=\"product-name\"><a href=\"product-page.php?produktID=".$zeile['productID']."\">".$zeile['productNameDE']."</a></div>\n";
 echo "                                         <div class=\"about\">\n";
 echo "                                             <div class=\"price\">\n";
 echo "                                                 <h3>".$zeile['productPrice']."€</h3>\n";
 echo "                                             </div>\n";
 echo "                                         </div>\n";
 echo "                                     </div>\n";
 echo "                                 </div>";
                                    }
                                 ?>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </main>
