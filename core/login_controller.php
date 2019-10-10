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

 ?>
