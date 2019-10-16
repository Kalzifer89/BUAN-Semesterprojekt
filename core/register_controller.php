<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für Registrierung//
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

if (isset($_POST['registername'])) {
  $registername = $_POST['registername'];
  $registermail = $_POST['registermail'];
  $registerpassword = md5($_POST['registerpassword']);
  $secretquestion = $_POST['secretquestion'];
  $answer = $_POST['answer'];
  $salution = $_POST['salution'];
  $surname = $_POST['surname'];
  $mainname = $_POST['mainname'];
  $telephone = $_POST['telephone'];
  $street = $_POST['street'];
  $housenr = $_POST['housenr'];
  $postcode = $_POST['postcode'];
  $city= $_POST['city'];
  $country= $_POST['country'];
}

//Bei Erfolgreichen Login Login Cookie Erstellen ansonsten Fehlermeldung
//Überprüfung ob alle Felder ausgefüllt sinde
if (isset($_POST['registrieren']))
{
  if( empty ($_POST['registername']) or empty ($_POST['registermail']) or empty ($_POST['registerpassword']) or empty ($_POST['secretquestion']) or empty ($_POST['questionanswer']) or empty ($_POST['salution']) or empty ($_POST['surname'])
  or empty ($_POST['mainname']) or empty ($_POST['telephone']) or empty ($_POST['street']) or empty ($_POST['housenr']) or empty ($_POST['postcode']) or empty ($_POST['city']) or empty ($_POST['country']) )
    {
      $RegisterFehlermeldung ="Sie haben nicht alle erforderlichen Felder ausgefüllt";
    }
    else {
          //Überprüfen ob User schon exiistiert
      $username = $_POST['registername'];
      $DatenbankUserCheck = "SELECT userName FROM users WHERE userName = '$username'";
      $Prüfung = mysqli_query ($db_link, $DatenbankUserCheck);
      if (mysqli_num_rows ($Prüfung ) > 0)
          {
            $RegisterFehlermeldung = "Leider gibt es schon einen User mit gleichem Namen, wählen sie bitte einen anderen.";
          }
      else {
            $RegisterFehlermeldung ="Sie sind erfolgreich eingelogt, bitte melden sie sich jetzt an.";
            //Den neuen User in die Datenbank eintragen
            $DatenbankRegistierungUser = "INSERT INTO users (userName, userMail, userPassword, userSalution, userSurname, userMainname, userTelephone, userStreet, userHousenr, userPostcode, userCity) VALUES
             ('$registername','$registermail','$registerpassword','$salution','$surname' , '$mainname' , '$telephone', '$street', '$housenr', '$postcode', '$city')";
            $UserArray = mysqli_query ($db_link, $DatenbankRegistierungUser);
            echo "<meta http-equiv=\"refresh\" content=\"2; URL=login.php\">";
      }
    }
  }
 ?>
