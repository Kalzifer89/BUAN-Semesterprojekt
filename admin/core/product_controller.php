<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Produkte Verwaltung        //
// Ersteller    : Sven Krumbeck              //
// Stand        : 05.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

$DatenbankAbfrageProdukte = "SELECT * FROM products";
$ProdukteArray = mysqli_query ($db_link, $DatenbankAbfrageProdukte);
//Ausgabe der items

 ?>

 <div class="container-fluid">
    <h3 class="text-dark mb-4">Product Mangement</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Products in System</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Product Name DE</th>
                            <th>Product Name ENG</th>
                            <th>Product Prize</th>
                            <th>Bearbeiten</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($zeile = mysqli_fetch_array($ProdukteArray))
                       {
                         echo "<tr>";
                           echo "<td>".$zeile['productNameDE']."</td>\n";
                           echo "<td>".$zeile['productNameENG']."</td>\n";
                           echo "<td>".$zeile['productPrice']."€</td>\n";
                           echo "<td>";
                           print "<a href=\"product_edit.php?productID=".$zeile['productID']."\" class=\"btn btn-warning btn-icon-split\">\n";
                           print "  <span class=\"icon text-white-50\">\n";
                           print "   <i class=\"fas fa-exclamation-triangle\"></i>\n";
                           print "  </span>\n";
                           print "  <span class=\"text\">Bearbeiten</span>\n";
                           print " </a>";
                           echo "</td>";
                        echo "</tr>";
                       }
                       ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>Product Name DE</th>
                          <th>Product Name ENG</th>
                          <th>Product Prize</th>
                          <th>Bearbeiten</th>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
 ?>
