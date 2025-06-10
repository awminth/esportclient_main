<footer class="container">
    <!-- Bottom Navigation -->
    <nav class="mybottom-nav">
        <div class="container d-flex justify-content-around text-center p-0">
            <!-- Nav items များ -->
            <div class="nav-item mynav-item">
                <a class="nav-link mynav-link <?= (curlink == 'home.php') ? 'active' : '' ?>"
                    href="<?=roothtml.'setup/home.php'?>">
                    <div class="icon-circle">
                        <i class="bi bi-bank"></i>
                    </div>
                    <span>Home</span>
                </a>
            </div>
            <div class="nav-item mynav-item">
                <a class="nav-link mynav-link <?= (curlink == 'wallet.php') ? 'active' : '' ?>"
                    href="<?=roothtml.'setup/wallet.php'?>">
                    <div class="icon-circle">
                        <i class="bi bi-credit-card-2-back"></i>
                    </div>
                    <span>Wallet</span>
                </a>
            </div>
            <div class="nav-item mynav-item">
                <a class="nav-link mynav-link <?= (curlink == 'profile.php') ? 'active' : '' ?>"
                    href="<?=roothtml.'setup/profile.php'?>">
                    <div class="icon-circle">
                        <i class="bi bi-people"></i>
                    </div>
                    <span>Profile</span>
                </a>
            </div>
        </div>
    </nav>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?=roothtml.'assets/vendor/apexcharts/apexcharts.min.js'?>"></script>
<script src="<?=roothtml.'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
<script src="<?=roothtml.'assets/vendor/chart.js/chart.umd.js'?>"></script>
<script src="<?=roothtml.'assets/vendor/echarts/echarts.min.js'?>"></script>
<script src="<?=roothtml.'assets/vendor/quill/quill.js'?>"></script>
<script src="<?=roothtml.'assets/vendor/simple-datatables/simple-datatables.js'?>"></script>
<script src="<?=roothtml.'assets/vendor/tinymce/tinymce.min.js'?>"></script>
<script src="<?=roothtml.'assets/vendor/php-email-form/validate.js'?>"></script>

<!-- Template Main JS File -->
<script src="<?=roothtml.'assets/js/main.js'?>"></script>

<!-- jQuery -->
<script src="<?php echo roothtml.'lib/plugins/jquery/jquery.min.js' ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo roothtml.'lib/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo roothtml.'lib/dist/js/adminlte.min.js' ?>"></script>
<!-- Select2 -->
<script src="<?php echo roothtml.'lib/plugins/select2/js/select2.full.min.js' ?>"></script>


<script>
$(document).ready(function() {
    $(document).on("click", "#btnrefresh", function(e) {
        e.preventDefault();
        window.location.href = "<?=roothtml.'setup/home.php'?>";
    });
});
</script>

</body>

</html>