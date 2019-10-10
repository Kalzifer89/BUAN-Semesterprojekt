<?php

if (isset($_POST['name'])) {
  //Umwandeln in Variablen für Mysql und Passwort Verschlüsselung
  $Username = $_POST['name'];
  $Passwort = md5($_POST['passwort']);
  //Datenbank Abfrage nach Benutzername
  $DatenbankAbfrageUser = "SELECT userName FROM users WHERE userName LIKE '$Username'";
  $UserArray = mysqli_query ($db_link, $DatenbankAbfrageUser);
  //Datenbank Abfrage nach Passwort
  $DatenbankAbfragePasswort = "SELECT UserPassword FROM users WHERE UserPassword LIKE '$Passwort';";
  $PasswortArray = mysqli_query ($db_link, $DatenbankAbfragePasswort);
  //Abfrage nach User ID //
  $DatenbankAbfrageUserID = "SELECT userID,userAdmin,userMail FROM users WHERE userName LIKE '$Username'";
  $UserIDArray = mysqli_query ($db_link, $DatenbankAbfrageUserID);
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
      setcookie("LoggedIn", "True", 0);
      //username setzen
      setcookie("UserName", "$Username",0);
      //User ID an Coockie Übergeben
      while ($zeile2 = mysqli_fetch_array($UserIDArray))
               {
                 setcookie("UserID", $zeile2['userID'], 0);
                 setcookie("isAdmin", $zeile2['userAdmin'], 0);
                 setcookie("UserMail", $zeile2['userMail'], 0);
               }
      echo "<meta http-equiv=\"refresh\" content=\"1; URL=index.php\">";
    }
}
else {
  $Fehlermeldung = "Bitte loggen sie sich ein.";
}

 ?>
