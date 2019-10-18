<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Seite für de SHOP          //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Session Starten für Einkaufskorb
session_start();

include "core/header.php";

  if (isset($_COOKIE["LoggedIn"]))
  {
    include "core/payment_controller.php";
  }
else {
  include "core/login_field.php";
}


include "core/footer.php"
?>
