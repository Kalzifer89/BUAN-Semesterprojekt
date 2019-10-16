<?php

//Übergabe der Post Daten an Variablen
if (isset($_POST['mail'])) {
  $mail = $_POST['mail'];
  $secretquestion = $_POST['secretquestion'];
  $answer = $_POST['answer'];
  $newpassword =  md5($_POST['newpassword']);
}

//Überprüfen ob alle Felder ausgefüllt sind
if (isset($_POST['mail']))
{
  if( empty ($_POST['mail']) or empty ($_POST['secretquestion']) or empty ($_POST['answer']) or empty ($_POST['newpassword']) )
    {
      $PassworResetFehlermeldung ="Sie haben nicht alle erforderlichen Felder ausgefüllt";
    }
  }

if (isset($_POST['mail']))
{
  //Wenn alle Felder ausgefüllt sind Checken ob user Existiert
  $DatenbankMailCheck = "SELECT userMail FROM users WHERE userMail = '$mail'";
  $Prüfung = mysqli_query ($db_link, $DatenbankMailCheck);
  if (mysqli_num_rows ($Prüfung ) > 0)
      {
        //Checken ob die Geheimfrage richtig ist
        $DatenbankGeheimfrageCheck = "SELECT userSecretQuestion FROM users WHERE userSecretQuestion = '$secretquestion'";
        $Prüfung2 = mysqli_query ($db_link, $DatenbankGeheimfrageCheck);
        if (mysqli_num_rows ($Prüfung2 ) > 0)
        {
            //Checken ob die Antwort richtig ist
          $DatenbankAntwortCheck = "SELECT userAnswer FROM users WHERE userAnswer = '$answer'";
          $Prüfung3 = mysqli_query ($db_link, $DatenbankAntwortCheck);
          if (mysqli_num_rows ($Prüfung3 ) > 0)
          {
            //Den neuen User in die Datenbank eintragen
            $DatenbankPWAendern = "UPDATE users SET userPassword = '$newpassword' WHERE userMail = '$mail';";
            $PasswortArray = mysqli_query ($db_link, $DatenbankPWAendern);
            $PassworResetFehlermeldung ="Sie haben ihr Passwort erfolgreich geändert, bitte loggen sie sich ein.";
            echo "<meta http-equiv=\"refresh\" content=\"2; URL=login.php\">";
          }
          else {
            $PassworResetFehlermeldung ="Ihre Daten sind leider nicht Korrekt";
          }
        }
        else {
          $PassworResetFehlermeldung ="Ihre Daten sind leider nicht Korrekt";
        }
      }
      else {
        $PassworResetFehlermeldung ="Ihre Daten sind leider nicht Korrekt";
      }
    }

?>
