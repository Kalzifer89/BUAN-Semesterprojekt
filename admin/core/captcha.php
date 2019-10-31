<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Captcha Generator           //
// Ersteller    : Sven Krumbeck              //
// Stand        : 11.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

session_start();

//Funktion zum Ständig neuen Zerugen von Captcha Zahlen
function anzeige()
{
  // zwei zufällige Zahlen ermitteln -------
  $_SESSION['wert1'] = rand(0,10);
  $_SESSION['wert2'] = rand(0,10);
  // Berechnung des Ergebnisses ------------
  $_SESSION['ergebnis'] = $_SESSION['wert1'] + $_SESSION['wert2'];
}

//Funktion zum Erzeugen eines Captcha Bildes
function captcha()
{
  $bild = imagecreate(420, 70);
  $hg = imagecolorallocate ($bild,255,255,255);
  $vg = imagecolorallocate ($bild,0,0,0);
  $font = realpath('../assets/fonts/Glass.ttf');
  imagefill($bild,0,0,$hg);
  $Bildtext = $_SESSION['wert1']."+".$_SESSION['wert2']."=?";
  imagettftext($bild, 40, 0, 100, 50, $vg, $font, $Bildtext);
  imagepng($bild, "../assets/img/captchaadmin.png");
}
?>
