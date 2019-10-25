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
$UmsatzMonat = 0;
$Boni = 0;
$GehaltMonat = 0;

//Monat holen wenn nicht vorhanden auf 1 setzen
if (isset($_POST['month'])) {
  $Monat = $_POST['month'];
}else {
  $Monat = 1;
}
//Jahr Holen wenn nicht vorhanden auf 2019 setzen
if (isset($_POST['year'])) {
  $Year = $_POST['year'];
}else {
  $Year = 2019;
}

//Monate Auflösen
$MonatName[1] = "Januar";
$MonatName[2] = "Feburar";
$MonatName[3] = "März";
$MonatName[4] = "April";
$MonatName[5] = "Mai";
$MonatName[6] = "Juni";
$MonatName[7] = "Juli";
$MonatName[8] = "August";
$MonatName[9] = "September";
$MonatName[10] = "Oktober";
$MonatName[11] = "November";
$MonatName[12] = "Dezember";

//Abfragen der Bestellungen
$DatenbankAbfrageBestellungen= "SELECT * FROM orders WHERE userID = '$userID'";
$BestellungenArray = mysqli_query ($db_link, $DatenbankAbfrageBestellungen);
//Abfragen der Boni nach Monat
$DatenbankAbfrageMonatsBestellungen= "SELECT * FROM orders WHERE MONTH(orderDate) = '$Monat' AND YEAR(orderDate) = '$Year'";
$MonatsBestellungenArray = mysqli_query ($db_link, $DatenbankAbfrageMonatsBestellungen);

 ?>

 <main class="page faq-page">
     <section class="clean-block clean-faq dark">
         <div class="container">
             <div class="block-heading">
                 <h2 class="text-info">Account Management</h2>
                 <p>Hier können sie ihren Account Managen.</p>
             </div>
             <div class="block-content">
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
                                           //Berechnen der Beträge
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
                    <h3>Gehaltsabrechnung</h3>
                    <form method="post" action="account.php">
                        <div class="form-group"><label>Wahl des Monates:</label><select class="form-control" name="month"><optgroup label="Monatsauswahl"><option value="1" selected>Januar</option><option value="2">Feburar</option><option value="3">März</option><option value="4">April</option><option value="5">Mai</option><option value="6">Juni</option><option value="7">Julie</option><option value="8">August</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Dezember</option></optgroup></select></div>
                        <div class="form-group"><label>Wahl des Jahres:</label><select class="form-control"name="year"><optgroup label="Jahreswahl"><option value="2020" >2020</option><option value="2019" selected>2019</option><option value="2018">2018</option></optgroup></select></div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Berechnen</button></div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo $MonatName[$Monat]; echo" - "; echo $Year?></th>
                                    <th>Wert</th>
                                </tr>
                            </thead>
                            <?php
                            if (mysqli_num_rows ($MonatsBestellungenArray) > 0)
                                {
                                  while ($zeile = mysqli_fetch_array($MonatsBestellungenArray))
                                   {
                                     //Variabeln zuordnen
                                     $orderID = $zeile['orderID'];
                                     //Abfrage der Items und Preise
                                     $DatenbankAbfrageItems= "SELECT * FROM items, products WHERE orderID = '$orderID' AND items.productID = products.productID";
                                     $ItemArray = mysqli_query ($db_link, $DatenbankAbfrageItems);
                                     //Ausgabe der items
                                     while ($zeile2 = mysqli_fetch_array($ItemArray))
                                      {
                                        //Berechnen der Beträge
                                        $Gesamtpreis = $Gesamtpreis + $zeile2['productQuantity'] * $zeile2['productPrice'];
                                        $UmsatzMonat = $UmsatzMonat + $Gesamtpreis;
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
                               <td><b><?php echo $UmsatzMonat; ?>€</b></td>
                             </tr>
                              <?php //Boni Berechnung
                                    if ($UmsatzMonat >= 1000) {
                                      $Boni = 500;
                                    }
                                    elseif ($UmsatzMonat >= 3000) {
                                      $Boni = 1000;
                                    }elseif ($UmsatzMonat >= 3000) {
                                      $Boni = 1500;
                                    }
                                    $GehaltMonat = $UmsatzMonat + $Boni;
                               ?>
                             <tr>
                               <td><b>Boni auf Umsatz:</b></td>
                               <td><b><?php echo $Boni; ?>€</b></td>
                             </tr>
                             <tr>
                               <td><b>Gesamtes Gehalt:</b></td>
                               <td><u><b><?php echo $GehaltMonat; ?>€</b></u></td>
                             </tr>
                            </tbody>
                        </table>
                    </div>
             </div>
         </div>
     </section>
 </main>
