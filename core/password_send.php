<?php


//Übergabe der Post Daten an Variablen
if (isset($_POST['mail'])) {
  $mail = $_POST['mail'];
  $secretquestion = $_POST['secretquestion'];
  $answer = $_POST['answer'];
}

//Code Übernommen von http://codepad.org/UL8k4aYK Funktion im ein Sicheres Zufallspasswort zu erstellen
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

//Zufallspasswort im Klartext und Verschlüsselt Speichern
$newpasswordClear = randomPassword();
$newpassword =  md5($newpasswordClear);


//Überprüfen ob alle Felder ausgefüllt sind
if (isset($_POST['mail']))
{
  if( empty ($_POST['mail']) or empty ($_POST['secretquestion']) or empty ($_POST['answer']) or empty ($_POST['newpassword']) )
    {
      $PassworResetFehlermeldung ="Sie haben nicht alle erforderlichen Felder ausgefüllt / You dont fill out every necessery Field.";
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
            //Neue Zugangsdaten verschicken, entscheiden ob Deutsch oder Englisch
            if ([$_COOKIE['language']] = 0) {
              $name = "ISchool User";
              $betreff = "Ihr neues iShool Password";
              $mail = $mail;
              $text = "Vielen Dank das sie ein neues Password angefordert haben. Ihr neues Password lautet ".$newpasswordClear;
              $from = "dontreplay@ischool.com";
            }
            else {
              $name = "ISchool User";
              $betreff = "You New iSchool Password";
              $mail = $mail;
              $text = "Thanks for ordering an New iSchool Password. Your new Password is: ".$newpasswordClear;
              $from = "dontreplay@ischool.com";
            }
            //Email Versenden.
            mail($mail, $betreff, $text, $from);
            //Meldung ausgeben
            $PassworResetFehlermeldung ="Sie haben ihr Passwort erfolgreich geändert, bitte schauen sie in ihre Mails. / You Changed your Password Sucessfully. Please read you Mails.";
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
