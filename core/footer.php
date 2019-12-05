<?php include "language/menu_lang.php" ?>
<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5><?php echo $menulang [$_COOKIE['language']][7]; ?></h5>
                <ul>
                    <li><a href="login.php"><?php echo $menulang [$_COOKIE['language']][8]; ?></a></li>
                    <li><a href="registration.php"><?php echo $menulang [$_COOKIE['language']][9]; ?></a></li>
                    <li><a href="password_forgotten.php"><?php echo $menulang [$_COOKIE['language']][10]; ?></a></li>
                    <li><a href="password-reset.php"><?php echo $menulang [$_COOKIE['language']][22]; ?></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5><?php echo $menulang [$_COOKIE['language']][11]; ?></h5>
                <ul>
                    <li><a href="index.php"><?php echo $menulang [$_COOKIE['language']][12]; ?></a></li>
                    <li><a href="pricing.php"><?php echo $menulang [$_COOKIE['language']][13]; ?></a></li>
                    <li><a href="contact-us.php"><?php echo $menulang [$_COOKIE['language']][14]; ?></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5><?php echo $menulang [$_COOKIE['language']][15]; ?></h5>
                <ul>
                    <li><a href="catalog-page.php"><?php echo $menulang [$_COOKIE['language']][16]; ?></a></li>
                    <li><a href="shopping-cart.php"><?php echo $menulang [$_COOKIE['language']][17]; ?></a></li>
                    <li><a href="account.php"><?php echo $menulang [$_COOKIE['language']][18]; ?></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5><?php echo $menulang [$_COOKIE['language']][19]; ?></h5>
                <ul>
                    <li><a href="admin/index.php"><?php echo $menulang [$_COOKIE['language']][20]; ?></a></li>
                    <li><a href="admin/login.php"><?php echo $menulang [$_COOKIE['language']][21]; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2019 Sven Krumbeck</p>
    </div>
</footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/baguetteBox.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>
