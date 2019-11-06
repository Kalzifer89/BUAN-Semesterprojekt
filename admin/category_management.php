<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Category Management           //
// Ersteller    : Sven Krumbeck              //
// Stand        : 06.11.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Session Starten
session_start();

include "core/header.php";

if (isset($_SESSION['LoggedInAdmin']))
{
  include "core/category_controller.php";
}
else {
  echo "Bitte einloggen.";
}

include "core/footer.php";
?>
