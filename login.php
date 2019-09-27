<?php include "core/header.php" ?>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Log In</h2>
                    <p>Bitte melden sie sich hier mit ihren Login Daten an.</p>
                </div>
                <form>
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email"></div>
                    <div class="form-group"><label for="password">Passwort</label><input class="form-control" type="password" id="password"></div><img class="captcha" src="assets/img/images.png">
                    <div class="form-group"><label>Captcha</label><input class="form-control" type="text"></div>
                    <div class="form-group">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Erinnere dich</label></div>
                    </div><button class="btn btn-primary btn-block" type="submit">Log In</button>
                    <small>Du hast noch keinen Account? <a href="registration.php">Regiestriere</a> dich jetzt! </small>
                  </form>

            </div>
        </section>
    </main>
  <?php include "core/footer.php" ?>
