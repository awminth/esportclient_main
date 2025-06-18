<!-- header -->
<?php
include("../config.php");
include(root . "master/header.php");

$getAmount = getint("SELECT Balance FROM tblplayer WHERE UserName = ?", [$_SESSION["esportclient_username"]]);
?>
<h3 class="text-center mt-4" style="color: white;">Contact Us</h3>
<!-- Warning Message -->
<div class="text-success px-3 py-2 m-3 mt-4 mb-4"
    style="background-color: #3d3f3c; border-radius: 8px;text-align:center;">
    The following Viber and Telegram groups are 24/7 support groups providing services for HITUPMM.
</div>
<!-- Contacts card: Border -->
<div class="card m-3 bgactive">
    <div class="row p-4 text-center">
        <div class="col-6">
            <!-- Circle icon + label -->
            <a href="<?= roothtml.'wallet/topup.php'?>">
                <!-- Replace 'fa-star' with your desired logo -->
                <img src="<?= roothtml.'lib/images/viber.jpg'?>" alt="viber" class="rounded"
                    style="height:80px;width:80px;">
                <div class="mainwallet-label">VIBER</div>
            </a>
        </div>
        <div class="col-6">
            <!-- Circle icon + label -->
            <a href="<?= roothtml.'wallet/withdraw.php'?>">
                <!-- Replace 'fa-star' with your desired logo -->
                <img src="<?= roothtml.'lib/images/tele.webp'?>" alt="telegram" class="rounded"
                    style="height:80px;width:80px;">
                <div class="mainwallet-label">TELEGRAM</div>
            </a>
        </div>
    </div>
</div>
<!-- footer -->
<?php
include(root . "master/footer.php");
?>

<script>
$(document).ready(function() {

    let isVisible = true;

    document.getElementById("toggleBalance").addEventListener("click", function() {
        const icon = document.getElementById("eyeIcon");
        const balance = document.getElementById("balanceText");

        if (isVisible) {
            icon.classList.remove("ci-eye-off");
            icon.classList.add("ci-eye");
            balance.innerHTML = "BALANCE -  " + <?= $getAmount ?> + " Ks";
        } else {
            icon.classList.remove("ci-eye");
            icon.classList.add("ci-eye-off");
            balance.innerHTML = "BALANCE   •••••••••";
        }

        isVisible = !isVisible;
    });

    $(document).on("click", "#btnlogout", function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?php echo roothtml . 'index_action.php' ?>",
            data: {
                action: 'logout'
            },
            success: function(data) {
                location.href = "<?= roothtml . 'index.php' ?>";
            }
        });
    });

    $(document).on("click", "#loginfirst", function(e) {
        e.preventDefault();
        location.href = "<?= roothtml . 'login/login.php' ?>";
    });
});
</script>