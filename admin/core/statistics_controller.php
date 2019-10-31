<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Statistik Startseite        //
// Ersteller    : Sven Krumbeck              //
// Stand        : 31.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Variablen Deklarieren
$Gesamtpreis = 0;
$Gesamtpreis2 = 0;
$UmsatzMonat = 0;
$Monatspreis[0] = 0;
$Year = 2019;
$Gesamtbestellungen = 0;

//Abfrage Gesamt Umsatz
//Abfrage der Items und Preise
$DatenbankAbfrageItems= "SELECT * FROM items, products WHERE items.productID = products.productID";
$ItemArray = mysqli_query ($db_link, $DatenbankAbfrageItems);
//Ausgabe der items
while ($zeile2 = mysqli_fetch_array($ItemArray))
 {
   //Berechnen der Beträge
   $Gesamtpreis = $Gesamtpreis + $zeile2['productQuantity'] * $zeile2['productPrice'];
 }

 //Abfrage der Gesamtumsätze nach Monate
for ($i=0; $i < 13 ; $i++) {
  $Monat = $i;
  //Abfragen der Boni nach Monat
  $DatenbankAbfrageMonatsBestellungen= "SELECT * FROM orders WHERE MONTH(orderDate) = '$Monat' AND YEAR(orderDate) = '$Year'";
  $MonatsBestellungenArray = mysqli_query ($db_link, $DatenbankAbfrageMonatsBestellungen);

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
              $Gesamtpreis2 = $Gesamtpreis2 + $zeile2['productQuantity'] * $zeile2['productPrice'];
              $Monatspreis[$i] = $Gesamtpreis2;
            }
            $UmsatzMonat = $UmsatzMonat + $Gesamtpreis2;
            $Gesamtpreis2 = 0;
          }
      }
  $Monatspreis[$i] = $UmsatzMonat;
  $UmsatzMonat = 0;
}

//Abfrage der Anzahl der $BestellungenArray
$DatenbankAbfrageBestellungen= "SELECT * FROM orders";
$BestellungenArray = mysqli_query ($db_link, $DatenbankAbfrageBestellungen);

while ($zeile = mysqli_fetch_array($BestellungenArray))
 {
   $Gesamtbestellungen = $Gesamtbestellungen +1;
 }

 ?>

 <div class="container-fluid">
     <div class="d-sm-flex justify-content-between align-items-center mb-4">
         <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a></div>
     <div class="row">
         <div class="col-md-6 col-xl-3 mb-4">
             <div class="card shadow border-left-primary py-2">
                 <div class="card-body">
                     <div class="row align-items-center no-gutters">
                         <div class="col mr-2">
                             <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Gesamtumsatz</span></div>
                             <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $Gesamtpreis; ?>€</span></div>
                         </div>
                         <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-xl-3 mb-4">
             <div class="card shadow border-left-warning py-2">
                 <div class="card-body">
                     <div class="row align-items-center no-gutters">
                         <div class="col mr-2">
                             <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Bestellungen</span></div>
                             <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $Gesamtbestellungen;?></span></div>
                         </div>
                         <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-lg-7 col-xl-8">
             <div class="card shadow mb-4">
                 <div class="card-header d-flex justify-content-between align-items-center">
                     <h6 class="text-primary font-weight-bold m-0">Einnahmen Übersicht 2019</h6>
                 </div>
                 <div class="card-body">
                    <canvas data-bs-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;,&quot;September&quot;,&quot;Oktober&quot;,&quot;November&quot;,&quot;Dezember&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;<?php echo $Monatspreis[1]; ?>&quot;,&quot;<?php echo $Monatspreis[2]; ?>&quot;,&quot;<?php echo $Monatspreis[3]; ?>&quot;,&quot;<?php echo $Monatspreis[4]; ?>&quot;,&quot;<?php echo $Monatspreis[5]; ?>&quot;,&quot;<?php echo $Monatspreis[6]; ?>&quot;,&quot;<?php echo $Monatspreis[7]; ?>&quot;,&quot;<?php echo $Monatspreis[8]; ?>&quot;,&quot;<?php echo $Monatspreis[9]; ?>&quot;,&quot;<?php echo $Monatspreis[10]; ?>&quot;,&quot;<?php echo $Monatspreis[11]; ?>&quot;,&quot;<?php echo $Monatspreis[12]; ?>&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}]}}}" style="display: block; width: 439px; height: 160px;" width="878" height="320" class="chartjs-render-monitor"></canvas>         </div>
                  </div>
     </div>
 </div>
</div>
</div>
