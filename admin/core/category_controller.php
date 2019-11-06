<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Category Verwaltung             //
// Ersteller    : Sven Krumbeck              //
// Stand        : 06.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

$DatenbankAbfrageUser = "SELECT * FROM categorys";
$UserArray = mysqli_query ($db_link, $DatenbankAbfrageUser);
//Ausgabe der items

 ?>

 <div class="container-fluid">
    <h3 class="text-dark mb-4">Kategory Verwaltung</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Kategorien im System</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>NameDE</th>
                            <th>NameENG</th>
                            <th>Bearbeiten</th>
                            <th>Gesperrt</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($zeile = mysqli_fetch_array($UserArray))
                       {
                         echo "<tr>";
                           echo "<td>".$zeile['categoryNameDE']."</td>\n";
                           echo "<td>".$zeile['categoryNameENG']."</td>\n";
                           echo "<td>";
                           print "<a href=\"category_edit.php?userID=".$zeile['categoryID']."\" class=\"btn btn-warning btn-icon-split\">\n";
                           print "  <span class=\"icon text-white-50\">\n";
                           print "   <i class=\"fas fa-exclamation-triangle\"></i>\n";
                           print "  </span>\n";
                           print "  <span class=\"text\">Bearbeiten</span>\n";
                           print " </a>";
                           echo "</td>";
                           if ($zeile['locked'] == 1) {
                             echo "<td>";
                             print "<a href=\"category_edit.php?userID=".$zeile['categoryID']."\" class=\"btn btn-danger btn-icon-split\">\n";
                             print "  <span class=\"icon text-white-50\">\n";
                             print "   <i class=\"fas fa-trash\"></i>\n";
                             print "  </span>\n";
                             print "  <span class=\"text\">Locked</span>\n";
                             print " </a>";
                             echo "</td>";
                           }
                           else {
                             echo "<td>";
                             print "<a href=\"category_edit.php?userID=".$zeile['categoryID']."\" class=\"btn btn-success btn-icon-split\">\n";
                             print "  <span class=\"icon text-white-50\">\n";
                             print "   <i class=\"fas fa-check\"></i>\n";
                             print "  </span>\n";
                             print "  <span class=\"text\">Unlocked</span>\n";
                             print " </a>";
                             echo "</td>";
                           }
                        echo "</tr>";
                       }
                       ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>NameDE</strong></td>
                            <td><strong>NameENG</strong></td>
                            <td><strong>Bearbeiten</strong></td>
                            <td><strong>Gesperrt</strong></td>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
