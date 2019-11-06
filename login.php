<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Login Seite                 //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

include './language/login_lang.php';
//Einbinden vom Captcha Skriot
include "core/captcha.php";
//Einbinden vom Header Skript
include "core/header.php";
//Einbinden vom Login Controll Skript
include "core/login_controller.php";
//Aufrufen der Captcha Funktion
anzeige(); captcha();

                //Wenn der User Eingelogt ist Auslog Dialog Anzeigen
                if (isset($_COOKIE["LoggedIn"]))
                {
                  echo "    <main class=\"page login-page\">\n";
                  echo "        <section class=\"clean-block clean-form dark\">\n";
                  echo "            <div class=\"container\">";
                                  echo "<div class=\"block-heading\">\n";
                                  echo "    <h2 class=\"text-info\">Log In</h2>\n";
                                  echo "    <p>".$loginlang[$_COOKIE['language']][11]."</p>\n";
                                  echo "</div>";
                                  echo "<form action=\"login.php\" method=\"post\">\n";
                                  echo "  <input type=\"hidden\" name=\"ausloggen\" value=\"1\">\n";
                                  echo "<div class=\"form-group\"><label for=\"name\">".$loginlang[$_COOKIE['language']][12]."</label>";
                                  echo "  <button class=\"btn btn-primary btn-block\" type=\"submit\">Log out</button>\n";
                                  echo "</form>";
                  echo "          </div>\n";
                  echo "      </section>\n";
                  echo "  </main>\n";

                }
                else {
                  //Wenn der User Nicht einglogt ist, Einlog Maske zeigen
                  include "core/login_field.php";
                }

 include "core/footer.php" ?>
