<?php
include("../config.php");
include(root . "master/header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <h4 class=" m-4" style="color: white;"><a href="<?= roothtml . 'wallet/mainwallet.php' ?>"><i
                        class="ci-reply"></i></a></h4>
        </div>
        <div class="col-8">
            <h3 class=" m-4" style="color: white;">Withdraw</h3>
        </div>
    </div>
</div>

<!-- Steps based on media tabs -->
<ul class="nav nav-tabs media-tabs nav-justified p-4">
    <li class="nav-item" style="cursor: pointer;" id="btnpayment" data-payment="kpay">
        <div class="nav-link">
            <div class="d-flex align-items-center">
                <div class="media-tab-media"><img src="<?= roothtml . 'lib/images/kpay.png' ?>" alt=""></div>
                <div class="ps-3">
                    <h6 class="media-tab-title text-nowrap text-light mb-0">KBZPay</h6>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item" style="cursor: pointer;" id="btnpayment" data-payment="wave">
        <div class="nav-link">
            <div class="d-flex align-items-center">
                <div class="media-tab-media"><img src="<?= roothtml . 'lib/images/wave.png' ?>" alt=""></div>
                <div class="ps-3">
                    <h6 class="media-tab-title text-light text-nowrap mb-0">WavePay</h6>
                </div>
            </div>
        </div>
    </li>
</ul>

<!-- jQuery -->
<script src="<?= roothtml . 'lib/jquery/jquery.min.js' ?>"></script>
<script>
$(document).ready(function() {

    $(document).on("click", "#btnpayment", function(e) {
        e.preventDefault();
        var payment = $(this).data("payment");
        if (payment == "kpay") {
            location.href = "<?= roothtml . 'wallet/withdrawkpay.php' ?>";
        } else {
            location.href = "<?= roothtml . 'wallet/withdrawwave.php' ?>";
        }
    });
});
</script>