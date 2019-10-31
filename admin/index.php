<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Admin Bereich Startseite   //
// Ersteller    : Sven Krumbeck              //
// Stand        : 31.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Session Starten
session_start();

include "core/header.php";

if (isset($_SESSION['LoggedInAdmin']))
{
  include "core/statistics_controller.php";
}
else {
  echo "Bitte einloggen.";
}

include "core/footer.php";
