<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Seite für de SHOP          //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

include "core/header.php";

  if (isset($_COOKIE["LoggedIn"]))
  {
    echo "    <main class=\"page login-page\">\n";
    echo "        <section class=\"clean-block clean-form dark\">\n";
    echo "            <div class=\"container\">";
    include "core/shop_controller.php";
    echo    "</div>";
    echo "</section>";
    echo"</main>";
  }
else {
  include "core/login_field.php";
}


include "core/footer.php"
?>
