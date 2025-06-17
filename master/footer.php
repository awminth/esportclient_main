<!-- Footer-->
</main>
<!-- Toolbar for handheld devices (Marketplace)-->
<div class="bg-dark">
    <div class="d-table table-layout-fixed w-100">
        <a class="d-table-cell handheld-toolbar-item <?php echo (curlink == 'index.php')?'bgactive' : '' ?>"
            href="<?= roothtml . 'index.php' ?>">
            <span class="handheld-toolbar-icon text-danger"><i class="ci-home"></i></span>
            <span class="handheld-toolbar-label text-white">Home</span>
        </a>
        <?php if (isset($_SESSION["esportclient_username"])) { ?>
        <a class="d-table-cell handheld-toolbar-item <?php echo (curlink == 'mainwallet.php' || 
        curlink == 'topupkpay.php' || curlink == 'topupwave.php' || curlink == 'withdrawkpay.php' || 
        curlink == 'withdrawwave.php' || curlink == 'history.php')?'bgactive' : '' ?>"
            href="<?= roothtml . 'wallet/mainwallet.php' ?>">
            <span class="handheld-toolbar-icon text-danger"><i class="ci-coins"></i>
            </span>
            <span class="handheld-toolbar-label text-white">Wallet</span>
        </a>
        <?php } ?>
        <a class="d-table-cell handheld-toolbar-item <?php echo (curlink == 'mainprofile.php' || 
        curlink == "changepassword.php")?'bgactive' : '' ?>"
            href="<?= roothtml . 'profile/mainprofile.php' ?>">
            <span class="handheld-toolbar-icon text-danger"><i class="ci-user"></i></span>
            <span class="handheld-toolbar-label text-white">Profile</span>
        </a>
        <a class="d-table-cell handheld-toolbar-item" href="<?=roothtml.'service/service.php'?>">
            <span class="handheld-toolbar-icon text-danger"><i class="ci-support"></i>
            </span>
            <span class="handheld-toolbar-label text-white">Service</span>
        </a>
    </div>
</div>
<!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span
        class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up">
    </i></a>
<!-- Vendor scrits: js libraries and plugins-->
<script src="<?= roothtml . 'lib/vendor/bootstrap/dist/js/bootstrap.bundle.min.js' ?>"></script>
<script src="<?= roothtml . 'lib/vendor/simplebar/dist/simplebar.min.js' ?>"></script>
<script src="<?= roothtml . 'lib/vendor/tiny-slider/dist/min/tiny-slider.js' ?>"></script>
<script src="<?= roothtml . 'lib/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js' ?>"></script>
<!-- Main theme script-->
<script src="<?= roothtml . 'lib/js/theme.min.js' ?>"></script>
<!-- jQuery -->
<script src="<?= roothtml . 'lib/jquery/jquery.min.js' ?>"></script>
<!-- Sweet Alarm -->
<link href="<?= roothtml . 'lib/sweet/sweetalert.css' ?>" rel="stylesheet" />
<script src="<?= roothtml . 'lib/sweet/sweetalert.min.js' ?>"></script>
<script src="<?= roothtml . 'lib/sweet/sweetalert.js' ?>"></script>
</body>

</html>