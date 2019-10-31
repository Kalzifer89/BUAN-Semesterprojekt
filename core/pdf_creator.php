<?php
///////////////////////////////////////////////
// Semeterproject - ECIN                     //
// Fachbereich Medien FH-Kiel - 4. Semester  //
// Beschreibung : PDF Export                 //
// Ersteller    : Sven Krumbeck              //
// Stand        : 25.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////

$UserID = $_COOKIE['UserID'];

$DatenbankAbfrageUserDaten = "SELECT * FROM users WHERE userID = '$userID'";
$UserArray = mysqli_query ($db_link, $DatenbankAbfrageUserDaten);

while ($zeile = mysqli_fetch_array($UserArray))
 {
   $rechnungs_empfaenger =
   $zeile['userSurname']." ".$zeile['userMainname']."
   ".$zeile['userStreet']." ".$zeile['userHouseNr']."
   ".$zeile['userPostcode']." ".$zeile['userCity'];
   $pdfName = "Gehaltsabrechnung_".$_COOKIE['UserName']."_".$Monat.".pdf";
 }

 $rechnungs_header = '
 IShool Online Shop
 Sven Krumbeck
 www.svens-blog.de';

$rechnungs_datum = date("d.m.Y");
$pdfAuthor = "iSchool Shop";

$rechnungs_footer = "Bitte bewahren sie die Gehaltsabrechnung gut auf, sie könnten sie später nochmal benötigen.";

//////////////////////////// Inhalt des PDFs als HTML-Code \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


// Erstellung des HTML-Codes. Dieser HTML-Code definiert das Aussehen eures PDFs.
// tcpdf unterstützt recht viele HTML-Befehle. Die Nutzung von CSS ist allerdings
// stark eingeschränkt.

$html = '
<table cellpadding="5" cellspacing="0" style="width: 100%; ">
	<tr>
		<td>'.nl2br(trim($rechnungs_header)).'</td>
	   <td style="text-align: right">
 '.$rechnungs_datum.'<br>
		</td>
	</tr>

	<tr>
		 <td style="font-size:1.3em; font-weight: bold;">
<br><br>
Gehaltsabrechnung
<br>
		 </td>
	</tr>


	<tr>
		<td colspan="2">'.nl2br(trim($rechnungs_empfaenger)).'</td>
	</tr>
</table>
<br><br><br>
<b style="text-align: center;">Sie haben im '.$MonatName[$Monat].' Insgesamt '.$UmsatzMonat.'€ Umsatz erzielt. Deswegen wir ihnen ein Bonus von '.$Boni.'€ gezahlt. Insgesamt verdienten sie '.$GehaltMonat.'€.</b> <br>
';

if ($Boni > 0) {
  $html .= '<img src="../assets/img/statistikkreis.png" width="800px;">';
}

$html .= '
<h2 style="text-align: center;">Gehaltsabrechnung '.$MonatName[$Monat].'</h2>

<table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">
	<tr style="background-color: #cccccc; padding:5px;">
		<td style="text-align: center;"><b>Datum</b></td>
		<td style="text-align: center;"><b>Waren</b></td>
		<td><b>Wert</b></td>
	</tr>';

$html .= $TabelleBestellungen;


      $html .='
      <tr>
        <td><b>Gesamt Umsatz:</b></td>
        <td></td>
        <td><b>'.$UmsatzMonat.'€</b></td>
      </tr>';

             if ($UmsatzMonat >= 1000) {
               $Boni = 500;
             }
             elseif ($UmsatzMonat >= 3000) {
               $Boni = 1000;
             }elseif ($UmsatzMonat >= 3000) {
               $Boni = 1500;
             }
             $GehaltMonat = $UmsatzMonat + $Boni;

  $html .='
      <tr>
        <td><b>Boni auf Umsatz:</b></td>
        <td></td>
        <td><b>'.$Boni.'€</b></td>
      </tr>
      <tr>
        <td><b>Gesamtes Gehalt:</b></td>
        <td></td>
        <td><u><b>'.$GehaltMonat.'€</b></u></td>
      </tr>
     </tbody>';

$html .="</table><br><br><br>";

$html .= nl2br($rechnungs_footer);

$_SESSION['html'] = $html;
$_SESSION['pdfname'] = $pdfName;
 ?>
