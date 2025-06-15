<!-- header -->
<?php
include("../config.php");
include(root . "master/header.php");

$getAmount = getint("SELECT Balance FROM tblplayer WHERE UserName = ?", [$_SESSION["esportclient_username"]]);
?>
<h3 class="text-center mt-4" style="color: white;">Wallet
    <span id="toggleBalance" style="font-size: 18px;padding-left:10px;"><i id="eyeIcon" class="ci-eye-off"></i></span>
</h3>
<p id="balanceText" class="text-center mt-4 mb-5" style="color: white;">BALANCE •••••••••</p>
<!-- Contacts card: Border -->
<div class="card m-3 bgactive">
    <div class="row p-4 text-center">
        <div class="col-4">
            <!-- Circle icon + label -->
            <a href="<?= roothtml.'wallet/topup.php'?>">
                <div class="mainwallet-circle">
                    <!-- Replace 'fa-star' with your desired logo -->
                    <i class="ci-money-bag"></i>
                </div>
                <div class="mainwallet-label">TOPUP</div>
            </a>
        </div>
        <div class="col-4">
            <!-- Circle icon + label -->
            <a href="">
                <div class="mainwallet-circle">
                    <!-- Replace 'fa-star' with your desired logo -->
                    <i class="ci-dollar"></i>
                </div>
                <div class="mainwallet-label">WITHDRAW</div>
            </a>
        </div>
        <div class="col-4">
            <!-- Circle icon + label -->
            <a href="">
                <div class="mainwallet-circle">
                    <!-- Replace 'fa-star' with your desired logo -->
                    <i class="ci-view-list"></i>
                </div>
                <div class="mainwallet-label">HISTORY</div>
            </a>
        </div>
    </div>

</div>
<ul class="list-group p-3" style="cursor: pointer;">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>
            <i class="ci-money-bag me-2 text-danger"></i>
            ‌Top Up Guide
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>
            <i class="ci-dollar mt-n1 me-2 text-danger"></i>
            Withdraw Guide
        </span>
    </li>
</ul>
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