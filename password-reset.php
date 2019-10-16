<?php include "core/header.php" ?>
<?php include "core/password_reset.php" ?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Passwort vergessen</h2>
                <?php if (isset($PassworResetFehlermeldung))
                {
                  echo "<script type=\"text/javascript\">\n";
                  echo "alert(\"$PassworResetFehlermeldung\");\n";
                  echo "</script>";
                } ?>
                <p>Sie haben ihr Passwort vergessen? Kein Problem, geben sie hier einfach die Antwort auf ihre Geheimfrage ein und setzen sich ein neues Passwort.</p>
            </div>
            <form action="password-reset.php" method="post">
                <div class="form-group"><label for="mail">Email Adresse:</label><input type="email" class="form-control" name="mail" /></div>
                <div class="form-group"><label for="secretquestion">Geheim Frage:</label><select class="form-control" name="secretquestion"><optgroup label="Secret Question"><option value="School" selected>Wie lautet der Name ihrer ersten Schule?</option><option value="Animal">Wie lautet der Name ihres ersten Haustiers?</option><option value="Hospital">Wie heißt das Krankenhaus in dem Sie geboren wurden?</option></optgroup></select></div>
                <div class="form-group"><label for="answer">Antwort:</label><input type="password" class="form-control" name="answer" /></div>
        <div class="form-group"><label for="password">Neues Passwort:</label><input type="password" class="form-control" name="newpassword" /></div><button class="btn btn-primary btn-block" type="submit">Log In</button></form>
        </div>
    </section>
</main>
<?php include "core/footer.php" ?>
