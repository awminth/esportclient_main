<?php
include("../config.php");
include(root . "master/header.php");
?>

<div class="container">
    <div class="row pt-3">
        <div class="col-3">
            <h4 class=" m-4" style="color: white;">
                <a href="<?= roothtml . 'profile/mainprofile.php' ?>"><i class="ci-reply"></i>
                </a>
            </h4>
        </div>
        <div class="col-9">
            <h3 class="mt-4" style="color: white;">Change Password</h3>
        </div>
    </div>
</div>

<div align="center" class="m-3">
    <form class="pt-3" id="frmchangepwd" method="POST">
        <input type="hidden" name="action" value="changepwd" />
        <div class="input-group mb-2">
            <span class="input-group-text fw-medium aligntxt">New Pwd</span>
            <input class="form-control" type="password" placeholder="New Password" name="newpwd" required>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text fw-medium aligntxt">Retype Pwd</span>
            <input class="form-control" type="password" placeholder="Retype New Password" name="retypenewpwd" required>
        </div>

        <!-- Warning Message -->
        <div class="text-danger px-3 py-2 mb-3" style="background-color: #ffe6e6; border-radius: 8px;text-align:left;">
            To protect against fraud, never share your PIN with anyone.
            Even service staff are not authorized to ask for your PIN. If someone does, it is a scam.
        </div>
        <!-- Login Button -->
        <div class="d-grid mt-4">
            <button type="submit" class="btn login-btn">Submit</button>
        </div>
    </form>
</div>

<!-- jQuery -->
<script src="<?= roothtml . 'lib/jquery/jquery.min.js' ?>"></script>
<!-- Sweet Alarm -->
<link href="<?= roothtml . 'lib/sweet/sweetalert.css' ?>" rel="stylesheet" />
<script src="<?= roothtml . 'lib/sweet/sweetalert.min.js' ?>"></script>
<script src="<?= roothtml . 'lib/sweet/sweetalert.js' ?>"></script>
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
}
$(document).ready(function() {

    $("#frmchangepwd").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "post",
            url: "<?php echo roothtml.'profile/mainprofile_action.php' ?>",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) {
                    swal({
                        title: "Success",
                        text: "Change successful! ",
                        icon: "success",
                        buttons: false,
                    });
                    swal.close();
                    location.href = "<?=roothtml.'profile/mainprofile.php'?>"
                } 
                else if (data == 2) {
                    swal("Error", "Invalid Password", "error");
                }
                else if (data == 0) {
                    swal("Warning!","Please retype your password.","warning");
                } 
                else {
                    // Show any other unexpected output as error
                    swal("Error", "Change Pwd failed: " + data, "error");
                }
            }
        });
    });
});
</script>