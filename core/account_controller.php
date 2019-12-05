<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Account Controller         //
// Ersteller    : Sven Krumbeck              //
// Stand        : 25.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

include './language/account_lang.php';

//Variabeln bereitstellen
$userID = $_COOKIE['UserID'];
$Gesamtpreis = 0;
$Umsatz = 0;
$UmsatzMonat = 0;
$Boni = 0;
$GehaltMonat = 0;
$ProduktNamen = "";
$TabelleBestellungen = "";

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
$MonatName[1] = "Januar / January";
$MonatName[2] = "Feburar / Feburary";
$MonatName[3] = "März / March";
$MonatName[4] = "April / April";
$MonatName[5] = "Mai / May";
$MonatName[6] = "Juni / June";
$MonatName[7] = "Juli / July ";
$MonatName[8] = "August / August";
$MonatName[9] = "September / September";
$MonatName[10] = "Oktober / October";
$MonatName[11] = "November / November";
$MonatName[12] = "Dezember / December";

//Abfragen der Bestellungen
$DatenbankAbfrageBestellungen= "SELECT * FROM orders WHERE userID = '$userID'";
$BestellungenArray = mysqli_query ($db_link, $DatenbankAbfrageBestellungen);
//Abfragen der Boni nach Monat
$DatenbankAbfrageMonatsBestellungen= "SELECT * FROM orders WHERE MONTH(orderDate) = '$Monat' AND YEAR(orderDate) = '$Year' AND userID = '$userID' ";
$MonatsBestellungenArray = mysqli_query ($db_link, $DatenbankAbfrageMonatsBestellungen);


 ?>

 <main class="page faq-page">
     <section class="clean-block clean-faq dark">
         <div class="container">
             <div class="block-heading">
                 <h2 class="text-info"><?php echo $accountlang[$_COOKIE['language']][1]; ?></h2>
                 <p><?php echo $accountlang[$_COOKIE['language']][2]; ?></p>
             </div>
             <div class="block-content">
                     <h3><?php echo $accountlang[$_COOKIE['language']][3]; ?></h3>
                     <div class="table-responsive">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th><?php echo $accountlang[$_COOKIE['language']][4]; ?></th>
                                     <th><?php echo $accountlang[$_COOKIE['language']][5]; ?></th>
                                     <th><?php echo $accountlang[$_COOKIE['language']][6]; ?></th>
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
                                           //Sammeln der Produktnamen
                                           $ProduktNamen = $ProduktNamen.$zeile2['productNameDE'].", ";
                                         }

                                       echo "<tr>\n";
                                         echo "<td>".$zeile['orderDate']."</td>\n";
                                         echo "<td>".$ProduktNamen."</td>\n";
                                         echo "<td>".$Gesamtpreis."€</td>\n";
                                       echo "</tr>";

                                       $Umsatz = $Umsatz + $Gesamtpreis;
                                       $Gesamtpreis = 0;
                                       $ProduktNamen = "";
                                      }
                                   }
                                ?>
                                <tr>
                                  <td><b><?php echo $accountlang[$_COOKIE['language']][7]; ?></b></td>
                                  <td> </td>
                                  <td><b><?php echo $Umsatz; ?>€</b></td>
                                </tr>
                             </tbody>
                         </table>
                     </div>
                    <h3><?php echo $accountlang[$_COOKIE['language']][8]; ?></h3>
                    <form method="post" action="account.php">
                        <div class="form-group"><label><?php echo $accountlang[$_COOKIE['language']][9]; ?></label><select class="form-control" name="month"><optgroup label="Monatsauswahl"><option value="1" selected>Januar</option><option value="2">Feburar</option><option value="3">März</option><option value="4">April</option><option value="5">Mai</option><option value="6">Juni</option><option value="7">Julie</option><option value="8">August</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Dezember</option></optgroup></select></div>
                        <div class="form-group"><label><?php echo $accountlang[$_COOKIE['language']][10]; ?></label><select class="form-control"name="year"><optgroup label="Jahreswahl"><option value="2020" >2020</option><option value="2019" selected>2019</option><option value="2018">2018</option></optgroup></select></div>
                        <div class="form-group">
                            <div class="form-check"><input type="checkbox" class="form-check-input" id="formCheck-1" name="PDFExport" value="1" /><label class="form-check-label" for="formCheck-1">PDF Export</label></div>
                        </div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit"><?php echo $accountlang[$_COOKIE['language']][11]; ?></button></div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo $MonatName[$Monat]; echo" - "; echo $Year?></th>
                                    <th><?php echo $accountlang[$_COOKIE['language']][12]; ?></th>
                                    <th><?php echo $accountlang[$_COOKIE['language']][13]; ?></th>
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
                                        $ProduktNamen = $ProduktNamen.$zeile2['productNameDE'].", ";
                                      }

                                    //HTML Output Aufzeichnen
                                    ob_start();

                                    echo "<tr>\n";
                                      echo "<td>".$zeile['orderDate']."</td>\n";
                                      echo "<td>".$ProduktNamen."</td>\n";
                                      echo "<td>".$Gesamtpreis."€</td>\n";
                                    echo "</tr>";

                                    //Aufzeichnung in Variable Speichern
                                    $TabelleBestellungen = $TabelleBestellungen.ob_get_contents();

                                    //Aufzeichnung Beenden
                                    ob_end_flush();

                                    $UmsatzMonat = $UmsatzMonat + $Gesamtpreis;
                                    $Gesamtpreis = 0;
                                    $ProduktNamen = "";
                                   }
                                }
                             ?>
                             <tr>
                               <td><b><?php echo $accountlang[$_COOKIE['language']][14]; ?></b></td>
                               <td></td>
                               <td><b><?php echo $UmsatzMonat; ?>€</b></td>
                             </tr>
                              <?php //Boni Berechnung
                                    if ($UmsatzMonat > 0 && $UmsatzMonat <= 1000) {
                                      $Boni = 500;
                                    }
                                    elseif ($UmsatzMonat > 0 && $UmsatzMonat <= 3000) {
                                      $Boni = 1000;
                                    }elseif ($UmsatzMonat > 0 && $UmsatzMonat >= 3000) {
                                      $Boni = 1500;
                                    }else {
                                      $Boni = 0;
                                    }
                                    $GehaltMonat = 3000 + $Boni;
                               ?>
                             <tr>
                               <td><b><?php echo $accountlang[$_COOKIE['language']][15]; ?></b></td>
                               <td></td>
                               <td><b><?php echo $Boni; ?>€</b></td>
                             </tr>
                             <tr>
                               <td><b><?php echo $accountlang[$_COOKIE['language']][19]; ?></b></td>
                               <td></td>
                               <td><b>3000€</b></td>
                             </tr>
                             <tr>
                               <td><b><?php echo $accountlang[$_COOKIE['language']][16]; ?></b></td>
                               <td></td>
                               <td><u><b><?php echo $GehaltMonat; ?>€</b></u></td>
                             </tr>
                            </tbody>
                        </table>
                    </div>

                    <?php include 'graphic_controller.php'; ?>

                    <?php if (isset($_POST['PDFExport'])){
                      include 'pdf_creator.php';
                      echo "<h3>PDF Ansicht</h3>";
                      echo "<a target=\"_blank\" href=\"./core/pdf_exporter.php\">Hier finden sie ihre PDF</a>";
                    }; ?>

             </div>
         </div>
     </section>
 </main>
