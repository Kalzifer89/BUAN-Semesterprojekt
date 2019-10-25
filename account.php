<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : account Mangement           //
// Ersteller    : Sven Krumbeck              //
// Stand        : 25.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////


 //Session Starten für Einkaufskorb
 session_start();

 include "core/header.php";

 if(isset($_COOKIE["LoggedIn"]))
 {
   include "core/account_controller.php";
 }
 else {
   include "core/login_field.php";
 }

 include "core/footer.php";
 ?>
