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
 }

 //Wenn Userdaten geändert worden sind
 if (isset($_POST['edit'])) {

   $registername = $_POST['registername'];
   $registermail = $_POST['registermail'];
   if (isset($_POST['registerpassword'])) {
        $registerpassword = md5($_POST['registerpassword']);
   }
   $secretquestion = $_POST['secretquestion'];
    if (isset($_POST['answer'])) {
      $answer = $_POST['answer'];
    }
   $salution = $_POST['salution'];
   $surname = $_POST['surname'];
   $mainname = $_POST['mainname'];
   $telephone = $_POST['telephone'];
   $street = $_POST['street'];
   $housenr = $_POST['housenr'];
   $postcode = $_POST['postcode'];
   $city= $_POST['city'];
   $country= $_POST['country'];

   $DatenbankUpdateUser = "UPDATE users SET userName = '$registername', userMail = '$registermail', userPassword = '$registerpassword', userSalution = '$salution', userSurname = '$surname', userMainname = '$mainname', userTelephone = '$telephone', userStreet = '$street', userHousenr = '$housenr', userPostcode = '$postcode', userCity = '$city' WHERE userID = '$userID'";
   $UserArray = mysqli_query ($db_link, $DatenbankUpdateUser);
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
                 <div class="form-group"><label for="name">Land:</label><select class="form-control" name="country"><optgroup label="country"><option value="1" selected>Deutschland</option><option value="2">Frankreich</option><option value="3">Spanien</option><option value>Dänemark</option></optgroup></select></div>
                   <input type="hidden" name="edit" value="1">
                 <button class="btn btn-primary btn-block" type="submit">Ändern</button></form>
               </div>
           </div>
       </div>


<?php include 'core/footer.php' ?>
