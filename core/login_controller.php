<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Controller für LoggedIn     //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

//Bei Klick auf Logout Buttion den Login Coockie Löschen
if( isset($_POST['ausloggen']))
      {
          setcookie("LoggedIn", "", time() -3600);
          setcookie("UserName", "",time() -3600);
          setcookie("UserID", "",time() -3600);
          setcookie("isAdmin", "",time() -3600);
          setcookie("UserMail", "",time() -3600);
          //Am Ende hier alle Coockies die erstellt wurden einmal killen
          session_destroy();
          echo "<meta http-equiv=\"refresh\" content=\"1; URL=index.php\">";
      }

//Wenn das Anmelde Formular Ausgefüllt wurde, die Datenbank Abfrage anstoßen
if (isset($_POST['name'])) {
  //Umwandeln in Variablen für Mysql und Passwort Verschlüsselung
  $Username = $_POST['name'];
  $Passwort = md5($_POST['passwort']);
  //Datenbank Abfrage nach Benutzername
  $DatenbankAbfrageUser = "SELECT userName FROM users WHERE userName LIKE '$Username' AND locked = 0";
  $UserArray = mysqli_query ($db_link, $DatenbankAbfrageUser);
  //Datenbank Abfrage nach Passwort
  $DatenbankAbfragePasswort = "SELECT UserPassword FROM users WHERE UserPassword LIKE '$Passwort';";
  $PasswortArray = mysqli_query ($db_link, $DatenbankAbfragePasswort);
  //Abfrage nach User ID //
  $DatenbankAbfrageUserID = "SELECT userID,userMail FROM users WHERE userName LIKE '$Username'";
  $UserIDArray = mysqli_query ($db_link, $DatenbankAbfrageUserID);
}

// Den Captcha resetten bzw nicht resetten
// Aufruf der CAPTCHA-Funktion -------------
if (!isset($_COOKIE['LoggedIn'])) {
  if(!isset($_POST['name']) && !isset($_POST['registername']) )
  {
    $_SESSION['name'] = "";
    $_SESSION['captcha'] = "";
    $_SESSION['ergebnis'] = "";
    anzeige();
    captcha();
  }
}


//Bei Erfolgreichen Login Login Cookie Erstellen ansonsten Fehlermeldung
//Überprüfung ob Name und Passwort ausgefüllt sind
if(isset($_POST['Anmelden'])){
  if(empty ($_POST['name']) && empty ($_POST['passwort']))
    {
      $Fehlermeldung ="Namen und Passwort fehlen";
    }
    //Überprüfung ob Name Ausgefüllt ist
    elseif (empty ($_POST['name'])) {
      $Fehlermeldung ="Namen fehlt / Name not Found";
    }
    //ÜBerprüfung ob Passwort ausgefüllt ist
    elseif (empty ($_POST['passwort'])) {
      $Fehlermeldung ="Passwort fehlt / Password wrong";
    }
    elseif (mysqli_num_rows ($UserArray) == 0) {
      $Fehlermeldung ="Benutzername nicht in Datenbank / Username not in Database";
    }
    elseif (mysqli_num_rows ($PasswortArray) == 0) {
      $Fehlermeldung ="Passwort nicht in Datenbank / Password not in Database";
    }
    elseif (empty($_POST['captcha'])) {
      $Fehlermeldung ="Das Ergebnis muss eingeben werden / The Result must be Entered.";
    }
    elseif($_POST['captcha'] !=$_SESSION['ergebnis']) {
      $Fehlermeldung ="Ergebnis ist Falsch / The Result is wrong";
      }
    else {
      $Fehlermeldung ="Sie sind erfolgreich eingelogt / You are sucessfully logged in";
      //Eingelogt setzen
      setcookie("LoggedIn", "True", 0);
      //username setzen
      setcookie("UserName", "$Username",0);
      //User ID an Coockie Übergeben
      while ($zeile2 = mysqli_fetch_array($UserIDArray))
               {
                 setcookie("UserID", $zeile2['userID'], 0);
                 setcookie("UserMail", $zeile2['userMail'], 0);
               }
      echo "<meta http-equiv=\"refresh\" content=\"1; URL=index.php\">";
    }
}
// else {
//   $Fehlermeldung = "Bitte loggen sie sich ein.";
// }

 ?>
