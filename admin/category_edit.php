<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Admin Bearbeiten            //
// Ersteller    : Sven Krumbeck              //
// Stand        : 31.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Session Starten
session_start();

include '../config/config.php';
//User ID Holen
$userID = $_GET["userID"];

//User aus Datenbank holen
$DatenbankAbfrageUser = "SELECT * FROM categorys WHERE categoryID = '$userID'";
$UserArray = mysqli_query ($db_link, $DatenbankAbfrageUser);

//Variablen Übergeben
while ($zeile = mysqli_fetch_array($UserArray))
 {
   $categoryNameDE = $zeile['categoryNameDE'];
   $categoryNameENG = $zeile['categoryNameENG'];
   $locked = $zeile['locked'];
 }

 //Wenn Userdaten geändert worden sind
 if (isset($_POST['edit'])) {
   $categoryNameDE = $_POST['categoryNameDE'];
   $categoryNameENG = $_POST['categoryNameENG'];
   $locked = $_POST['locked'];

   $DatenbankUpdateUser = "UPDATE categorys SET categoryNameDE = '$categoryNameDE', categoryNameENG = '$categoryNameENG', locked = '$locked' WHERE categoryID = '$userID'";
   $UserArray = mysqli_query ($db_link, $DatenbankUpdateUser);

   $UserFehlermeldung = "Sie haben die Daten erfolgreich geändert.";
 }

include 'core/header.php';

//Seite nur eingelogt Anzeigen
if (!isset($_SESSION['LoggedInAdmin']))
{
  exit("Sie können diese Seite nicht einzelnd aufrufen.");
}
 ?>

 <div class="container-fluid">
    <h3 class="text-dark mb-4">Kategorie Verwaltung</h3>
    <?php if (isset($UserFehlermeldung))
    {
      echo "<script type=\"text/javascript\">\n";
      echo "alert(\"$UserFehlermeldung\");\n";
      echo "</script>";
    } ?>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Kategorie Bearbeiten</p>
        </div>
        <div class="card-body">
             <form method="post" target="_self">
                 <div class="form-group"><label for="email">Kategorie Name Deutsch:</label><input class="form-control item" type="text" id="email" name="categoryNameDE" value="<?php echo $categoryNameDE ?>"></div>
                 <div class="form-group"><label for="password">Kategorie Name Englisch</label><input class="form-control item" type="text" id="password" name="categoryNameENG" value="<?php echo $categoryNameENG ?>"></div>
                 <div class="form-group"><label>Locked:</label></br><select name="locked"><optgroup label="Lock Status">
                   <?php
                   if ($locked == 1) {
                     echo "<option value=\"1\" selected>Locked</option>";
                     echo "<option value=\"0\">Unlocked</option>";
                   }else {
                     echo "<option value=\"0\" selected>Unlocked</option>";
                     echo "<option value=\"1\" >Locked</option>";
                   }
                    ?>
                 </optgroup></select></div>
                   <input type="hidden" name="edit" value="1">
                 <button class="btn btn-primary btn-block" type="submit">Ändern</button></form>
               </div>
           </div>
       </div>


<?php include 'core/footer.php' ?>
