<?php
include("../config.php");
include(root . "master/header.php");
?>

<div class="container">
    <div class="row pt-3">
        <div class="col-5">
            <h4 class=" m-4" style="color: white;"><a href="<?= roothtml . 'wallet/withdraw.php' ?>"><i
                        class="ci-reply"></i></a></h4>
        </div>
        <div class="col-7">
            <img src="<?=roothtml.'lib/images/kpay.png'?>" alt="" class="rounded-circle"
                style="width: 70px;height:auto;">
        </div>
    </div>
</div>


<div align="center" class="m-3">
    <form class="pt-3" id="frmwithdrawkpay" method="POST">
        <input type="hidden" name="action" value="withdrawkpay" />
        <div class="input-group mb-2">
            <span class="input-group-text fw-medium">Kpay Name</span>
            <input class="form-control" type="text" placeholder="Kpay Name" name="kpayname" required>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text fw-medium">Kpay No</span>
            <input class="form-control" type="number" placeholder="Kpay Number" name="kpayno" required>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text fw-medium">Amount</span>
            <input id="amountInput" class="form-control" type="number" placeholder="Amount" name="amount" required>

        </div>
        <div class="container border-top">
            <div class="row mt-3">
                <div class="col-4 mb-2"><button type="button"
                        class="btn btn-outline-success w-100 amount-btn">5000</button></div>
                <div class="col-4 mb-2"><button type="button"
                        class="btn btn-outline-success w-100 amount-btn">10000</button></div>
                <div class="col-4 mb-2"><button type="button"
                        class="btn btn-outline-success w-100 amount-btn">50000</button></div>
                <div class="col-4 mb-2"><button type="button"
                        class="btn btn-outline-success w-100 amount-btn">100000</button></div>
                <div class="col-4 mb-2"><button type="button"
                        class="btn btn-outline-success w-100 amount-btn">300000</button></div>
                <div class="col-4 mb-2"><button type="button"
                        class="btn btn-outline-success w-100 amount-btn">500000</button></div>
            </div>
        </div>

        <!-- Login Button -->
        <div class="d-grid mt-4">
            <button type="submit" class="btn login-btn">Submit</button>
        </div>
    </form>
    <!-- </div> -->
</div>
<!-- jQuery -->
<script src="<?= roothtml . 'lib/jquery/jquery.min.js' ?>"></script>
<!-- Sweet Alarm -->
<link href="<?= roothtml . 'lib/sweet/sweetalert.css' ?>" rel="stylesheet" />
<script src="<?= roothtml . 'lib/sweet/sweetalert.min.js' ?>"></script>
<script src="<?= roothtml . 'lib/sweet/sweetalert.js' ?>"></script>
<script>
function copyKpay() {
    const kpayNumber = document.getElementById("kpay-number").innerText;
    navigator.clipboard.writeText(kpayNumber).then(function() {
        const tooltip = document.getElementById("copy-tooltip");
        tooltip.style.display = "block";

        setTimeout(function() {
            tooltip.style.display = "none";
        }, 1500);
    }, function(err) {
        alert("Failed to copy: " + err);
    });
}
$(document).ready(function() {
    $('.amount-btn').click(function() {
        var value = $(this).text();
        $('#amountInput').val(value);
    });

    $("#frmwithdrawkpay").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "post",
            url: "<?php echo roothtml.'wallet/mainwallet_action.php' ?>",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) {
                    swal({
                        title: "Success",
                        text: "Withdraw successful! Redirecting...",
                        icon: "success",
                        buttons: false,
                        timer: 2000 // 2 seconds
                    });

                    setTimeout(function() {
                        location.href =
                        "<?php echo roothtml.'wallet/mainwallet.php' ?>";
                    }, 2000);
                } 
                else if (data == 0) {
                    swal("Error", "Invalid kpayname or kpayno", "error");
                } 
                else if(data == 2){
                    swal("warning", "Not Enough Balance", "warning");
                }
                else {
                    // Show any other unexpected output as error
                    swal("Error", "Withdraw failed: " + data, "error");
                    //alert(data);
                }
            }
        });
    });
});
</script>