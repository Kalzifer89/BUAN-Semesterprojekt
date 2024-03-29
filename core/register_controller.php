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
  $answer = $_POST['questionanswer'];
  $salution = $_POST['salution'];
  $surname = $_POST['surname'];
  $mainname = $_POST['mainname'];
  $telephone = $_POST['telephone'];
  $street = $_POST['street'];
  $housenr = $_POST['housenr'];
  $postcode = $_POST['postcode'];
  $city = $_POST['city'];
  $country = $_POST['country'];
}

//Bei Erfolgreichen Login Login Cookie Erstellen ansonsten Fehlermeldung
//Überprüfung ob alle Felder ausgefüllt sinde
if (isset($_POST['registrieren']))
{
  if( empty ($_POST['registername']) or empty ($_POST['registermail']) or empty ($_POST['registerpassword']) or empty ($_POST['secretquestion']) or empty ($_POST['questionanswer']) or empty ($_POST['salution']) or empty ($_POST['surname'])
  or empty ($_POST['mainname']) or empty ($_POST['telephone']) or empty ($_POST['street']) or empty ($_POST['housenr']) or empty ($_POST['postcode']) or empty ($_POST['city']) or empty ($_POST['country']) )
    {
      $RegisterFehlermeldung ="Sie haben nicht alle erforderlichen Felder ausgefüllt / You dont fill out all necessery Fields";
    }
    else {
          //Überprüfen ob User schon exiistiert
      $username = $_POST['registername'];
      $DatenbankUserCheck = "SELECT userName FROM users WHERE userName = '$username'";
      $Prüfung = mysqli_query ($db_link, $DatenbankUserCheck);
      if (mysqli_num_rows ($Prüfung ) > 0)
          {
            $RegisterFehlermeldung = "Leider gibt es schon einen User mit gleichem Namen, wählen sie bitte einen anderen. / There is allrey a User with your Name, please Choose an other one.";
          }
      else {
            $RegisterFehlermeldung ="Sie haben einen neuen Nutzer anglegt, aber der Admin muss sie noch Freischalten. / You Created a New User but the Admin need to Unlock you.";
            //Den neuen User in die Datenbank eintragen
            $DatenbankRegistierungUser = "INSERT INTO users (userName, userMail, userPassword, userSecretQuestion, userSalution, userAnswer, userSurname, userMainname, userTelephone, userStreet, userHousenr, userPostcode, userCity, userCountry, locked) VALUES
             ('$registername','$registermail','$registerpassword','$secretquestion', '$answer','$salution','$surname' , '$mainname' , '$telephone', '$street', '$housenr', '$postcode', '$city', '$country', 1)";
            $UserArray = mysqli_query ($db_link, $DatenbankRegistierungUser);
            echo "<meta http-equiv=\"refresh\" content=\"2; URL=login.php\">";
      }
    }
  }
 ?>
