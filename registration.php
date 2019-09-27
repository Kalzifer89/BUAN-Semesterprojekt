<?php include "core/header.php" ?>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Registration</h2>
                    <p>Bitte erstellen sie einen Account:</p>
                </div>
                <form>
                    <div class="form-group"><label for="name">Name</label><input class="form-control item" type="text" id="name"></div>
                    <div class="form-group"><label for="password">Passwort</label><input class="form-control item" type="password" id="password"></div>
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email"></div><button class="btn btn-primary btn-block" type="submit">Anmelden</button>
                    <small>Du hast dein Passwort vergessen?<a href="registration.php"> Hier</a> wird dir geholfen</small>
                  </form>
            </div>
        </section>
    </main>
<?php include "core/footer.php" ?>
