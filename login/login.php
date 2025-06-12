<?php
include("../config.php");
include(root.'master/header.php');
?>

<div class="loginbody">
    <div class="login-card">
        <!-- Profile Icon -->
        <div class="text-center">
            <div class="profile-circle mx-auto">
                <img src="<?=roothtml.'lib/images/loginlogo.png'?>" alt="Login Logo" class="img-fluid" />
            </div>
        </div>

        <form class="mt-5 pt-3" id="frmlogin" method="POST">
            <input type="hidden" name="action" value="login" />
            <!-- Email -->
            <div class="form-group mb-3">
                <i class="ci-user form-icon"></i>
                <input type="text" class="form-control ps-5" placeholder="Username" required name="username" />
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <i class="ci-locked form-icon"></i>
                <input type="password" class="form-control ps-5" placeholder="Password" required name="password" />
            </div><br>

            <!-- Login Button -->
            <div class="d-grid">
                <button type="submit" class="btn login-btn">LOGIN</button>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                don't have an account yet? <a href="#">Sign up now</a>
            </div>
        </form>
    </div>
</div>

<!-- jQuery -->
<script src="<?= roothtml.'lib/jquery/jquery.min.js' ?>"></script>
<!-- Sweet Alarm -->
<link href="<?= roothtml.'lib/sweet/sweetalert.css' ?>" rel="stylesheet" />
<script src="<?= roothtml.'lib/sweet/sweetalert.min.js' ?>"></script>
<script src="<?= roothtml.'lib/sweet/sweetalert.js' ?>"></script>
<script>
$(document).ready(function() {

    $("#frmlogin").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "post",
            url: "<?php echo roothtml.'login/login_action.php' ?>",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) {
                    location.href = "<?php echo roothtml.'index.php'?>";
                } else if (data == 0) {
                    swal("Error", "Invalid username or password", "error");
                } else {
                    // Show any other unexpected output as error
                    swal("Error", "Login failed: " + data, "error");
                }
            }
        });
    });
});
</script>