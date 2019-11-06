<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Produkte Erstellen        //
// Ersteller    : Sven Krumbeck              //
// Stand        : 06.11.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////
include '../config/config.php';

 //Wenn Daten geändert worden sind
 if (isset($_POST['edit'])) {

   if( empty ($_POST['adminName']) or empty ($_POST['adminPassword']) ) {
     $UserFehlermeldung = "Sie haben nicht alle Notwendigen Felder ausgefüllt.";
   }
   else {
     $adminName = $_POST['adminName'];
     $adminPassword =  md5($_POST['adminPassword']);
     $DatenbankUpdateProducts = "INSERT INTO admins (adminName, adminPassword) VALUES ('$adminName', '$adminPassword')";
     $ProductsArray = mysqli_query ($db_link, $DatenbankUpdateProducts);

     $UserFehlermeldung = "Sie haben die Daten erfolgreich geändert.";
   }
 }
 ?>

 <div class="container-fluid">
    <h3 class="text-dark mb-4">Admin Mangement</h3>
    <?php if (isset($UserFehlermeldung))
    {
      echo "<script type=\"text/javascript\">\n";
      echo "alert(\"$UserFehlermeldung\");\n";
      echo "</script>";
    } ?>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Neuer Admin</p>
        </div>
        <div class="card-body">
          <form method="post" target="_self">
              <div class="form-group"><label>Admin Name:</label><input type="text" class="form-control" name="adminName"/></div>
              <div class="form-group"><label>Admin Passwort:</label><input type="password" class="form-control" name="adminPassword"/></div>
              <input type="hidden" name="edit" value="1">
              <button class="btn btn-primary btn-block" type="submit">Eintragen</button></form>
          </form>
               </div>
           </div>
       </div>
