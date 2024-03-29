<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : User Bearbeiten            //
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
$DatenbankAbfrageUser = "SELECT * FROM users WHERE  userID = '$userID'";
$UserArray = mysqli_query ($db_link, $DatenbankAbfrageUser);

//Variablen Übergeben
while ($zeile = mysqli_fetch_array($UserArray))
 {
   $userName = $zeile['userName'];
   $userMail = $zeile['userMail'];
   $userSecretQuestion = $zeile['userSecretQuestion'];
   $userStreet = $zeile['userStreet'];
   $userSalution = $zeile['userSalution'];
   $userSurname = $zeile['userSurname'];
   $userMainname = $zeile['userMainname'];
   $userTelephone = $zeile['userTelephone'];
   $userHouseNr = $zeile['userHouseNr'];
   $userPostcode = $zeile['userPostcode'];
   $userCity = $zeile['userCity'];
   $userCountry = $zeile['userCountry'];
   $locked = $zeile['locked'];
 }

 //Wenn Userdaten geändert worden sind
 if (isset($_POST['edit'])) {

   $registername = $_POST['registername'];
   $registermail = $_POST['registermail'];
   if (isset($_POST['registerpassword'])) {
        $registerpassword = md5($_POST['registerpassword']);
   }
   $secretquestion = $_POST['secretquestion'];
    if (isset($_POST['questionanswer'])) {
      $answer = $_POST['questionanswer'];
    }
   $salution = $_POST['salution'];
   $surname = $_POST['surname'];
   $mainname = $_POST['mainname'];
   $telephone = $_POST['telephone'];
   $street = $_POST['street'];
   $housenr = $_POST['housenr'];
   $postcode = $_POST['postcode'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $locked = $_POST['locked'];

   $DatenbankUpdateUser = "UPDATE users SET userName = '$registername', userMail = '$registermail', userPassword = '$registerpassword', userSecretQuestion = '$secretquestion', userAnswer = '$answer',  userSalution = '$salution', userSurname = '$surname', userMainname = '$mainname', userTelephone = '$telephone', userStreet = '$street', userHousenr = '$housenr', userPostcode = '$postcode', userCity = '$city', userCountry = '$country', locked = '$locked' WHERE userID = '$userID'";
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
    <h3 class="text-dark mb-4">User Verwaltung</h3>
    <?php if (isset($UserFehlermeldung))
    {
      echo "<script type=\"text/javascript\">\n";
      echo "alert(\"$UserFehlermeldung\");\n";
      echo "</script>";
    } ?>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">User Bearbeiten</p>
        </div>
        <div class="card-body">
             <form method="post" target="_self">
                 <h4>Zugangsdaten</h4>
                 <div class="form-group"><label for="email">Benutzername:</label><input class="form-control item" type="text" id="email" name="registername" value="<?php echo $userName ?>"></div>
                 <div class="form-group"><label for="email">Email:</label><input class="form-control item" type="email" id="email" name="registermail" value="<?php echo $userMail ?>"></div>
                 <div class="form-group"><label for="password">Passwort:</label><input class="form-control item" type="password" id="password" name="registerpassword" ></div>
                 <div class="form-group"><label for="password">Geheimfrage:</label><select class="form-control" name="secretquestion"><optgroup label="Secret Question"><option value="School" selected>Wie lautet der Name ihrer ersten Schule?</option><option value="Animal">Wie lautet der Name ihres ersten Haustiers?</option><option value="Hospital">Wie heißt das Krankenhaus in dem Sie geboren wurden?</option></optgroup></select></div>
                 <div class="form-group"><label for="password">Antwort:</label><input type="text" class="form-control" name="questionanswer" /></div>
                 <h4>Angaben zu Person</h4>
                 <div class="form-group"><label>Anrede:</label><select class="form-control" name="salution"><option value="Herr" selected="">Herr</option><option value="Frau">Frau</option><option value="Inter">Inter / Divers</option></select></div>
                 <div class="form-group"><label for="name">Vorname:</label><input class="form-control item" type="text" id="name" name="surname" value="<?php echo $userSurname ?>"></div>
                 <div class="form-group"><label for="name">Nachname:</label><input class="form-control item" type="text" id="name" name="mainname" value="<?php echo $userMainname ?>"></div>
                 <div class="form-group"><label for="name">Telefon:</label><input class="form-control item" type="text" id="name" name="telephone" value="<?php echo $userTelephone ?>"></div>
                 <h4>Rechnungsanschrift</h4>
                 <div class="form-group"><label for="name">Straße:</label><input class="form-control item" type="text" id="name" name="street" value="<?php echo $userStreet ?>"></div>
                 <div class="form-group"><label for="name">Hausnummer:</label><input class="form-control item" type="text" id="name" name="housenr" value="<?php echo $userHouseNr ?>"></div>
                 <div class="form-group"><label for="name">Postleitzahl:</label><input class="form-control item" type="text" id="name" name="postcode" value="<?php echo $userPostcode ?>"></div>
                 <div class="form-group"><label for="name">Ort:</label><input class="form-control item" type="text" id="name" name="city" value="<?php echo $userCity ?>"></div>
                 <div class="form-group"><label for="name">Land:</label><select class="form-control" name="country">
                   <optgroup label="country">
                     <option value="1" <?php if ($userCountry == 1) {echo "selected";} ?>>Deutschland</option>
                     <option value="2" <?php if ($userCountry == 2) {echo "selected";} ?>>Frankreich</option>
                     <option value="3" <?php if ($userCountry == 3) {echo "selected";} ?>>Spanien</option>
                     <option value="4" <?php if ($userCountry == 4) {echo "selected";} ?>>Dänemark</option>
                   </optgroup></select></div>
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
