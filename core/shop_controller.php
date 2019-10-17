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

//Alle Produkte Abfragen
$DatenbankAbfrageProdukte= "SELECT * FROM products";
$ProdukctArray = mysqli_query ($db_link, $DatenbankAbfrageProdukte);
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
                             <div class="filters">
                                 <div class="filter-item">
                                     <h3>Kategorien</h3>
                                     <?php
                                     while ($zeile = mysqli_fetch_array($CategoryArray))
                                         {
                                           echo "<div class=\"form-check\"><input class=\"form-check-input\" type=\"checkbox\" id=\"formCheck-1\"><label class=\"form-check-label\" for=\"formCheck-1\">".$zeile['categoryNameDE']."</label></div>";
                                         }
                                      ?>
                                 </div>
                                 <div class="filter-item">
                                     <h3>Preis</h3>
                                     <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">50</label></div>
                                     <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">100</label></div>
                                     <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">150</label></div>
                                     <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">200</label></div>
                                 </div>
                             </div>
                         </div>
                         <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filters<i class="icon-arrow-down filter-caret"></i></a>
                             <div class="collapse"
                                 id="filters">
                                 <div class="filters">
                                     <div class="filter-item">
                                         <h3>Kategorien</h3>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Phones</label></div>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Laptops</label></div>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">PC</label></div>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Tablets</label></div>
                                     </div>
                                     <div class="filter-item">
                                         <h3>Brands</h3>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Samsung</label></div>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Apple</label></div>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">HTC</label></div>
                                     </div>
                                     <div class="filter-item">
                                         <h3>OS</h3>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Android</label></div>
                                         <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                                     </div>
                                 </div>
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
 echo "                                         <div class=\"image\"><a href=\"product-page.php?produktID=".$zeile['productID']."\"><img class=\"img-fluid d-block mx-auto\" src=\"assets/img/tech/".$zeile['productImage']."\"></a></div>\n";
 echo "                                         <div class=\"product-name\"><a href=\"product-page.php?produktID=".$zeile['productID']."\">".$zeile['productNameDE']."</a></div>\n";
 echo "                                         <div class=\"about\">\n";
 echo "                                             <div class=\"rating\"><img src=\"assets/img/star.svg\"><img src=\"assets/img/star.svg\"><img src=\"assets/img/star.svg\"><img src=\"assets/img/star-half-empty.svg\"><img src=\"assets/img/star-empty.svg\"></div>\n";
 echo "                                             <div class=\"price\">\n";
 echo "                                                 <h3>".$zeile['productPrice']."€</h3>\n";
 echo "                                             </div>\n";
 echo "                                         </div>\n";
 echo "                                     </div>\n";
 echo "                                 </div>";
                                    }
                                 ?>

                             </div>
                             <nav>
                                 <ul class="pagination">
                                     <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                 </ul>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </main>
