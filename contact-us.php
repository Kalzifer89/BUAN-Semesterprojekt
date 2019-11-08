<?php include "core/header.php" ?>
<!-- Sprachswitch einbinden -->
<?php include "language/contact_lang.php" ?>

<?php

if (empty($_POST['name']) or empty($_POST['betreff']) or empty($_POST['mail']) or empty($_POST['text'])) {
  $Fehlermeldung = "Sie haben nicht alle erforderlichen Felder ausgefüllt";
} else {
  $name = $_POST['name'];
  $betreff = $_POST['betreff'];
  $mail = $_POST['mail'];
  $text = $_POST['text'];
  $from = "dontreplay@ischool.com";

  mail($mail, $betreff, $text, $from);

  $Fehlermeldung = "Ihre Nachricht wurde erfolgreich verschickt.";
}
 ?>

    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><?php echo $contactlang [$_COOKIE['language']][1]; ?></h2>
                    <?php if (isset($Fehlermeldung) and isset($_POST['sended']) )
                    {
                      echo "<script type=\"text/javascript\">\n";
                      echo "alert(\"$Fehlermeldung\");\n";
                      echo "</script>";
                    } ?>
                    <p><?php echo $contactlang [$_COOKIE['language']][2]; ?></p>
                </div>
                <form action="contact-us.php" method="post">
                    <div class="form-group"><label><?php echo $contactlang [$_COOKIE['language']][3]; ?></label><input class="form-control" type="text" name="name"></div>
                    <div class="form-group"><label><?php echo $contactlang [$_COOKIE['language']][4]; ?></label><input class="form-control" type="text" name="betreff"></div>
                    <div class="form-group"><label><?php echo $contactlang [$_COOKIE['language']][5]; ?></label><input class="form-control" type="email" name="mail"></div>
                    <div class="form-group"><label><?php echo $contactlang [$_COOKIE['language']][6]; ?></label><textarea class="form-control" name="text"></textarea></div>
                    <input type="hidden" name="sended" value="1">
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit"><?php echo $contactlang [$_COOKIE['language']][7]; ?></button></div>
                </form>
            </div>
        </section>
    </main>
    <?php include "core/footer.php" ?>
