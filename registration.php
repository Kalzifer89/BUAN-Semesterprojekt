<?php include "core/header.php" ?>
<?php include "core/register_controller.php" ?>
<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Registration</h2>
                <p>Bitte erstellen sie einen Account:</p>
                <script type="text/javascript">
                  alert("<?php echo $RegisterFehlermeldung ?>");
                </script>
            </div>
            <form method="post" target="_self">
                <h4>Zugangsdaten</h4>
                <div class="form-group"><label for="email">Benutzername:</label><input class="form-control item" type="text" id="email" name="registername"></div>
                <div class="form-group"><label for="email">Email:</label><input class="form-control item" type="email" id="email" name="registermail"></div>
                <div class="form-group"><label for="password">Passwort:</label><input class="form-control item" type="password" id="password" name="registerpassword"></div>
                <h4>Angaben zu Person</h4>
                <div class="form-group"><label>Anrede:</label><select class="form-control" name="salution"><option value="Herr" selected="">Herr</option><option value="Frau">Frau</option><option value="Inter">Inter / Divers</option></select></div>
                <div class="form-group"><label for="name">Vorname:</label><input class="form-control item" type="text" id="name" name="surname"></div>
                <div class="form-group"><label for="name">Nachname:</label><input class="form-control item" type="text" id="name" name="mainname"></div>
                <div class="form-group"><label for="name">Telefon:</label><input class="form-control item" type="text" id="name" name="telephone"></div>
                <h4>Rechnungsanschrift</h4>
                <div class="form-group"><label for="name">Straße:</label><input class="form-control item" type="text" id="name" name="street"></div>
                <div class="form-group"><label for="name">Hausnummer:</label><input class="form-control item" type="text" id="name" name="housenr"></div>
                <div class="form-group"><label for="name">Postleitzahl:</label><input class="form-control item" type="text" id="name" name="postcode"></div>
                <input type="hidden" name="registrieren" value="1">
                <div class="form-group"><label for="name">Ort:</label><input class="form-control item" type="text" id="name" name="city"></div><button class="btn btn-primary btn-block" type="submit">Registrieren</button></form>
        </div>
    </section>
</main>
<?php include "core/footer.php" ?>
