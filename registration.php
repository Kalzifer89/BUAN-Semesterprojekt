<?php
include "core/header.php";
include "core/register_controller.php";
include 'language/registration_lang.php';
?>

<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"><?php echo $registerlang[$_COOKIE['language']][1]; ?></h2>
                <p><?php echo $registerlang[$_COOKIE['language']][2]; ?></p>
                <?php if (isset($RegisterFehlermeldung))
                {
                  echo "<script type=\"text/javascript\">\n";
                  echo "alert(\"$RegisterFehlermeldung\");\n";
                  echo "</script>";
                } ?>
            </div>
            <form method="post" target="_self">
                <h4><?php echo $registerlang[$_COOKIE['language']][3]; ?></h4>
                <div class="form-group"><label for="email"><?php echo $registerlang[$_COOKIE['language']][4]; ?></label><input class="form-control item" type="text" id="email" name="registername"></div>
                <div class="form-group"><label for="email"><?php echo $registerlang[$_COOKIE['language']][5]; ?></label><input class="form-control item" type="email" id="email" name="registermail"></div>
                <div class="form-group"><label for="password"><?php echo $registerlang[$_COOKIE['language']][6]; ?></label><input class="form-control item" type="password" id="password" name="registerpassword"></div>
                <div class="form-group"><label for="password"><?php echo $registerlang[$_COOKIE['language']][30]; ?></label><select class="form-control" name="secretquestion"><optgroup label="Secret Question"><option value="School" selected><?php echo $registerlang[$_COOKIE['language']][7]; ?></option><option value="Animal"><?php echo $registerlang[$_COOKIE['language']][8]; ?></option><option value="Hospital"><?php echo $registerlang[$_COOKIE['language']][9]; ?></option></optgroup></select></div>
                <div class="form-group"><label for="password"><?php echo $registerlang[$_COOKIE['language']][10]; ?></label><input type="text" class="form-control" name="questionanswer" /></div>
                <h4><?php echo $registerlang[$_COOKIE['language']][11]; ?></h4>
                <div class="form-group"><label><?php echo $registerlang[$_COOKIE['language']][12]; ?></label><select class="form-control" name="salution"><option value="Herr" selected=""><?php echo $registerlang[$_COOKIE['language']][13]; ?></option><option value="Frau"><?php echo $registerlang[$_COOKIE['language']][14]; ?></option><option value="Inter"><?php echo $registerlang[$_COOKIE['language']][15]; ?></option></select></div>
                <div class="form-group"><label for="name"><?php echo $registerlang[$_COOKIE['language']][16]; ?></label><input class="form-control item" type="text" id="name" name="surname"></div>
                <div class="form-group"><label for="name"><?php echo $registerlang[$_COOKIE['language']][17]; ?></label><input class="form-control item" type="text" id="name" name="mainname"></div>
                <div class="form-group"><label for="name"><?php echo $registerlang[$_COOKIE['language']][18]; ?></label><input class="form-control item" type="text" id="name" name="telephone"></div>
                <h4><?php echo $registerlang[$_COOKIE['language']][19]; ?></h4>
                <div class="form-group"><label for="name"><?php echo $registerlang[$_COOKIE['language']][20]; ?></label><input class="form-control item" type="text" id="name" name="street"></div>
                <div class="form-group"><label for="name"><?php echo $registerlang[$_COOKIE['language']][21]; ?></label><input class="form-control item" type="text" id="name" name="housenr"></div>
                <div class="form-group"><label for="name"><?php echo $registerlang[$_COOKIE['language']][22]; ?></label><input class="form-control item" type="text" id="name" name="postcode"></div>
                <div class="form-group"><label for="name"><?php echo $registerlang[$_COOKIE['language']][23]; ?></label><input class="form-control item" type="text" id="name" name="city"></div>
                <div class="form-group"><label for="name"><?php echo $registerlang[$_COOKIE['language']][24]; ?></label><select class="form-control" name="country"><optgroup label="country"><option value="1" selected><?php echo $registerlang[$_COOKIE['language']][25]; ?></option><option value="2"><?php echo $registerlang[$_COOKIE['language']][26]; ?></option><option value="3"><?php echo $registerlang[$_COOKIE['language']][27]; ?></option><option value="4"><?php echo $registerlang[$_COOKIE['language']][28]; ?></option></optgroup></select></div>
                  <input type="hidden" name="registrieren" value="1">
                <button class="btn btn-primary btn-block" type="submit"><?php echo $registerlang[$_COOKIE['language']][29]; ?></button></form>
        </div>
    </section>
</main>
<?php include "core/footer.php" ?>
