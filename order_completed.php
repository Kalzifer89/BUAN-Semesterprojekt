<?php
///////////////////////////////////////////////
// Semesterproject - BUAN                     //
// Fachbereich Medien FH-Kiel - 5. Semester  //
// Beschreibung : Auftragsbestätigung        //
// Ersteller    : Sven Krumbeck              //
// Stand        : 25.10.19                   //
// Version      : 1.0                        //
///////////////////////////////////////////////
 ?>

<!-- Header einbinden -->
<?php include "core/header.php" ?>

<!-- Order Logic einbinen -->
<?php include "core/order_controller.php" ?>


<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
          <div class="block-heading">
              <h2 class="text-info">Einkauf erfolgreich</h2>
              <p>Ihr Einkauf wurde erfolgreich bestätigt, sie erhalten die Ware in kürze.</p>
          </div>
          <form action="catalog-page.php" method="post">
              <button class="btn btn-primary btn-block" type="submit">Zurück zum Shop</button>
            </form>
          </div>
      </section>
  </main>

<?php include "core/footer.php" ?>
