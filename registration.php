<?php include "core/header.php" ?>
<?php include "core/register_controller.php" ?>
<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Registration</h2>
                <p>Bitte erstellen sie einen Account:</p>
                <?php if (isset($RegisterFehlermeldung))
                {
                  echo "<script type=\"text/javascript\">\n";
                  echo "alert(\"$RegisterFehlermeldung\");\n";
                  echo "</script>";
                } ?>
            </div>
            <form method="post" target="_self">
                <h4>Zugangsdaten</h4>
                <div class="form-group"><label for="email">Benutzername:</label><input class="form-control item" type="text" id="email" name="registername"></div>
                <div class="form-group"><label for="email">Email:</label><input class="form-control item" type="email" id="email" name="registermail"></div>
                <div class="form-group"><label for="password">Passwort:</label><input class="form-control item" type="password" id="password" name="registerpassword"></div>
                <div class="form-group"><label for="password">Geheimfrage:</label><select class="form-control" name="secretquestion"><optgroup label="Secret Question"><option value="School" selected>Wie lautet der Name ihrer ersten Schule?</option><option value="Animal">Wie lautet der Name ihres ersten Haustiers?</option><option value="Hospital">Wie heißt das Krankenhaus in dem Sie geboren wurden?</option></optgroup></select></div>
                <div class="form-group"><label for="password">Antwort:</label><input type="text" class="form-control" name="questionanswer" /></div>
                <h4>Angaben zu Person</h4>
                <div class="form-group"><label>Anrede:</label><select class="form-control" name="salution"><option value="Herr" selected="">Herr</option><option value="Frau">Frau</option><option value="Inter">Inter / Divers</option></select></div>
                <div class="form-group"><label for="name">Vorname:</label><input class="form-control item" type="text" id="name" name="surname"></div>
                <div class="form-group"><label for="name">Nachname:</label><input class="form-control item" type="text" id="name" name="mainname"></div>
                <div class="form-group"><label for="name">Telefon:</label><input class="form-control item" type="text" id="name" name="telephone"></div>
                <h4>Rechnungsanschrift</h4>
                <div class="form-group"><label for="name">Straße:</label><input class="form-control item" type="text" id="name" name="street"></div>
                <div class="form-group"><label for="name">Hausnummer:</label><input class="form-control item" type="text" id="name" name="housenr"></div>
                <div class="form-group"><label for="name">Postleitzahl:</label><input class="form-control item" type="text" id="name" name="postcode"></div>
                <div class="form-group"><label for="name">Ort:</label><input class="form-control item" type="text" id="name" name="city"></div>
                <div class="form-group"><label for="name">Land:</label><select class="form-control" name="country"><optgroup label="country"><option value="1" selected>Deutschland</option><option value="2">Frankreich</option><option value="3">Spanien</option><option value>Dänemark</option></optgroup></select></div>
                  <input type="hidden" name="registrieren" value="1">
                <button class="btn btn-primary btn-block" type="submit">Registrieren</button></form>
        </div>
    </section>
</main>
<?php include "core/footer.php" ?>
