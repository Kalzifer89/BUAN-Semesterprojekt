<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Account Controller         //
// Ersteller    : Sven Krumbeck              //
// Stand        : 25.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Variabeln bereitstellen
$userID = $_COOKIE['UserID'];
$Gesamtpreis = 0;
$Umsatz = 0;
//Abfragen der Bestellungen
$DatenbankAbfrageBestellungen= "SELECT * FROM orders WHERE userID = '$userID'";
$BestellungenArray = mysqli_query ($db_link, $DatenbankAbfrageBestellungen);


 ?>

 <main class="page faq-page">
     <section class="clean-block clean-faq dark">
         <div class="container">
             <div class="block-heading">
                 <h2 class="text-info">Account Management</h2>
                 <p>Hier können sie ihren Account Managen.</p>
             </div>
             <div class="block-content">
                 <div class="faq-item">
                     <h3>Bestellungen</h3>
                     <div class="table-responsive">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th>Datum</th>
                                     <th>Wert</th>
                                 </tr>
                             </thead>
                             <tbody>
                               <?php
                               if (mysqli_num_rows ($BestellungenArray) > 0)
                                   {
                                     while ($zeile = mysqli_fetch_array($BestellungenArray))
                                      {
                                        //Variabeln zuordnen
                                        $orderID = $zeile['orderID'];
                                        //Abfrage der Items und Preise
                                        $DatenbankAbfrageItems= "SELECT * FROM items, products WHERE orderID = '$orderID' AND items.productID = products.productID";
                                        $ItemArray = mysqli_query ($db_link, $DatenbankAbfrageItems);
                                        //Ausgabe der items
                                        while ($zeile2 = mysqli_fetch_array($ItemArray))
                                         {
                                           $Gesamtpreis = $Gesamtpreis + $zeile2['productQuantity'] * $zeile2['productPrice'];
                                           $Umsatz = $Umsatz + $Gesamtpreis;
                                         }
                                       echo "<tr>\n";
                                         echo "<td>".$zeile['orderDate']."</td>\n";
                                         echo "<td>".$Gesamtpreis."€</td>\n";
                                       echo "</tr>";
                                       $Gesamtpreis = 0;
                                      }
                                   }
                                ?>
                                <tr>
                                  <td><b>Gesamt Umsatz:</b></td>
                                  <td><b><?php echo $Umsatz; ?>€</b></td>
                                </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="faq-item">
                     <h3>Boni</h3>
                 </div>
                 <div class="faq-item"></div>
             </div>
         </div>
     </section>
 </main>
