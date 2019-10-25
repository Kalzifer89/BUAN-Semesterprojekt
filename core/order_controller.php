<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller Bestellungen     //
// Ersteller    : Sven Krumbeck              //
// Stand        : 25.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Session fortsetzen
session_start();

//Variablen Bereitstellen
$userID = $_COOKIE['UserID'];
$timestamp = time();
$orderDate = date("Y-m-d", $timestamp);
echo $orderDate;
//Überprüfen ob bezahlt wurde
if (isset($_POST['payed'])) {

  //Neue Bestellung in Bestell Datenbank eintragen
  $DatenbankAuftragErstellen = "INSERT INTO orders (userID, orderDate) VALUES ('$userID','$orderDate')";
  $Auftragsarray = mysqli_query ($db_link, $DatenbankAuftragErstellen);

  //OrderID herausfinden
  $DatenbankAbfrageOrderID = "SELECT orderID FROM orders WHERE orderDate LIKE '$orderDate'";
  $OrderIDArray = mysqli_query ($db_link, $DatenbankAbfrageOrderID);
  while ($zeile = mysqli_fetch_array($OrderIDArray))
           {
            $orderID = $zeile['orderID'];
           }

  //Daten aus Session auslesen und in Datenbank schreiben
  foreach ($_SESSION['shoppingcart'] as $product)
      {
        $product_ID = $product['productID'];
        $product_Quantity = $product['productAmount'];

        $DatenbankItemErstellen = "INSERT INTO items (orderID, productID, productQuantity) VALUES ('$orderID','$product_ID','$product_Quantity')";
        $ItemArray = mysqli_query ($db_link, $DatenbankItemErstellen);
      }

  //Warenkorb in Session leeren
  session_destroy();

}


?>
