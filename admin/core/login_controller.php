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
  $DatenbankAbfrageUser = "SELECT adminName FROM admins WHERE adminName LIKE '$Username'";
  $UserArray = mysqli_query ($db_link, $DatenbankAbfrageUser);
  //Datenbank Abfrage nach Passwort
  $DatenbankAbfragePasswort = "SELECT adminPassword FROM admins WHERE adminPassword LIKE '$Passwort';";
  $PasswortArray = mysqli_query ($db_link, $DatenbankAbfragePasswort);
  //Abfrage nach User ID //
  $DatenbankAbfrageUserID = "SELECT adminID FROM admins WHERE adminName LIKE '$Username'";
  $UserIDArray = mysqli_query ($db_link, $DatenbankAbfrageUserID);
}

// Den Captcha resetten bzw nicht resetten
// Aufruf der CAPTCHA-Funktion -------------
if (!isset($_SESSION['LoggedInAdmin'])) {
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
      $Fehlermeldung ="Namen fehlt";
    }
    //ÜBerprüfung ob Passwort ausgefüllt ist
    elseif (empty ($_POST['passwort'])) {
      $Fehlermeldung ="Passwort fehlt";
    }
    elseif (mysqli_num_rows ($UserArray) == 0) {
      $Fehlermeldung ="Benutzername nicht in Datenbank";
    }
    elseif (mysqli_num_rows ($PasswortArray) == 0) {
      $Fehlermeldung ="Passwort nicht in Datenbank";
    }
    elseif (empty($_POST['captcha'])) {
      $Fehlermeldung ="Das Ergebnis muss eingeben werden";
    }
    elseif($_POST['captcha'] !=$_SESSION['ergebnis']) {
      $Fehlermeldung ="Ergebnis ist Falsch";
      }
    else {
      $Fehlermeldung ="Sie sind erfolgreich eingelogt";
      //Eingelogt setzen
      $_SESSION['LoggedInAdmin'] = 1;
      //username setzen
      $_SESSION['UserNameadmin'] = $Username;
      //User ID an Coockie Übergeben
      while ($zeile2 = mysqli_fetch_array($UserIDArray))
               {
                 $_SESSION['userIDAdmin'] = $zeile2['adminID'];
               }
      echo "<meta http-equiv=\"refresh\" content=\"1; URL=index.php\">";
    }
}
// else {
//   $Fehlermeldung = "Bitte loggen sie sich ein.";
// }
?>
