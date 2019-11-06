<?php include './language/login_lang.php' ?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
          <div class="block-heading">
              <h2 class="text-info">Log In</h2>
              <p><?php echo $loginlang [$_COOKIE['language']][1]; ?></p>
              <script type="text/javascript">
                alert("<?php echo $Fehlermeldung ?>");
              </script>
          </div>
          <form action="login.php" method="post">
              <div class="form-group"><label for="name"><?php echo $loginlang [$_COOKIE['language']][2]; ?></label><input class="form-control item" type="text" id="email" name="name"></div>
              <div class="form-group"><label for="passwort"><?php echo $loginlang [$_COOKIE['language']][3]; ?></label><input class="form-control" type="password" id="password" name="passwort"></div><img class="captcha" src="assets/img/captcha.png">
              <div class="form-group"><label><?php echo $loginlang [$_COOKIE['language']][4]; ?></label><input class="form-control" type="text" id="captcha" name="captcha"></div>
              <div class="form-group">
              </div><button class="btn btn-primary btn-block" type="submit">Log In</button>
              <small><?php echo $loginlang [$_COOKIE['language']][5]; ?><a href="registration.php"><?php echo $loginlang [$_COOKIE['language']][6]; ?></a> <?php echo $loginlang [$_COOKIE['language']][7]; ?></br></small>
              <small><?php echo $loginlang [$_COOKIE['language']][8]; ?> <a href="password-reset.php"><?php echo $loginlang [$_COOKIE['language']][9]; ?> </a><?php echo $loginlang [$_COOKIE['language']][10]; ?></small>
              <input type="hidden" name="Anmelden" value="1">
            </form>
          </div>
      </section>
  </main>
