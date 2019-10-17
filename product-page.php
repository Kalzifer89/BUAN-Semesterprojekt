<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Produkt Detail Seite    //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

include "core/header.php";

if(isset($_COOKIE["LoggedIn"]))
{
  include "core/product_page_controller.php";
}
else {
  include "core/login_field.php";
}

include "core/footer.php";
?>
