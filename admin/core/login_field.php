<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
          <div class="block-heading">
              <h2 class="text-info">Log In</h2>
              <p>Bitte melden sie sich hier mit ihren Login Daten an.</p>
              <script type="text/javascript">
                alert("<?php echo $Fehlermeldung ?>");
              </script>
          </div>
          <form action="login.php" method="post">
              <div class="form-group"><label for="name">Username</label><input class="form-control item" type="text" id="email" name="name"></div>
              <div class="form-group"><label for="passwort">Passwort</label><input class="form-control" type="password" id="password" name="passwort"></div><img class="captcha" src="../assets/img/captchaadmin.png">
              <div class="form-group"><label>Captcha</label><input class="form-control" type="text" id="captcha" name="captcha"></div>
              <div class="form-group">
              </div><button class="btn btn-primary btn-block" type="submit">Log In</button>
              <input type="hidden" name="Anmelden" value="1">
            </form>
          </div>
      </section>
  </main>
