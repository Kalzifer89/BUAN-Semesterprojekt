<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Grafische Ausgabe         //
// Ersteller    : Sven Krumbeck              //
// Stand        : 30.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

if ($Boni > 0) {
  //Bild Erstellen
  //Grundsätzliche Bild Eigenschaften
  $bild = imagecreate(600, 300);
  $hg = imagecolorallocate($bild,255,255,255);
  $vg = imagecolorallocate ($bild,0,0,0);
  $rot = imagecolorallocate ($bild,255,0,0);
  $gruen = imagecolorallocate ($bild,0,255,0);
  $blau = imagecolorallocate ($bild,0,0,255);
  $weiß = imagecolorallocate ($bild,255,255,255);
  imagefill($bild,0,0,$hg);
  imagestring($bild,10,450,30,"Legende",$vg);
  imagestring($bild,10,420,60,"Basis Gehalt",$vg);
  imagestring($bild,10,420,90,"Boni",$vg);
  imagefilledrectangle ($bild , 400, 60 , 415 , 75 , $gruen );
  imagefilledrectangle ($bild , 400, 90 , 415 , 105 , $rot );

  //Prozentrechnung für ein Kreis Diagramm
  //Berechnung Gesamtwert von 100%
  $Gesamtwert = $GehaltMonat;
  // 1% vom Kreis sind wieviele Grad
  $grad_je_prozent = 360 / 100;

  //Berechnung Prozent Kreisegement 1
  $prozentwert1 = $UmsatzMonat / $Gesamtwert * 100;
  //Ende des ersten Kreisegements
  $ende_kreissegment_1 = $grad_je_prozent *$prozentwert1;
  //Zeichnen
  imagefilledarc($bild, 200, 150,250, 250, 0,$ende_kreissegment_1 , $gruen, IMG_ARC_PIE);

  // Kreissegment 2
  //Berechnung Anfang
  $anfang_kreissegment_2 = $grad_je_prozent * $prozentwert1;
  //Berechnung Prozent Kreisegement 2
  $prozentwert2 = $Boni / $Gesamtwert * 100;
  //Berechnung Ende
  $ende_kreissegment_2 = $grad_je_prozent * ($prozentwert1 + $prozentwert2);
  imagefilledarc($bild, 200, 150,250, 250, $anfang_kreissegment_2,$ende_kreissegment_2 , $rot, IMG_ARC_PIE);

  //Ausgeben
  imagepng($bild, "./assets/img/statistikkreis.png");

  echo "<h3>Grafische Aufbereitung</h3>\n";
  echo "<div id=\"flex\">\n";
  echo "  <img src=\"./assets/img/statistikkreis.png\">\n";
  echo "</div>";

}
else {
  echo "<h3>Grafische Aufbereitung</h3>\n";
  echo "Leider keine Boni in diesem Monat.";

}


 ?>
