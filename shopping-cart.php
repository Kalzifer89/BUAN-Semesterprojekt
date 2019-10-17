<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Shopping Cart Seite        //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

include "core/header.php";

if(isset($_COOKIE["LoggedIn"]))
{
  include "core/shopping_cart_controller.php";
}
else {
  include "core/login_field.php";
}

include "core/footer.php";

 ?>
