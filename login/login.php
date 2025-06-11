<?php
include("../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hitupmm.com</title>
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/vendor/simplebar/dist/simplebar.min.css' ?>" />
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/vendor/tiny-slider/dist/tiny-slider.css' ?>" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/css/theme.min.css' ?>">

    <style>
    /* Desktop View */
    @media screen and (min-width: 1024px) {
        .bodycontainer {
            width: 35%;
            margin: 0 auto;
            /* အလယ်မှာထားဖို့ */
        }
    }
    </style>
</head>

<body class="handheld-toolbar-enabled bg-dark bodycontainer">
    <div class="container py-4 py-lg-5 my-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h2 class="h4 mb-1">Sign in</h2>
                <div class="py-3">
                </div>
                <form class="needs-validation" novalidate="" id="frmlogin" method="POST">
                    <input type="hidden" name="action" value="login" />
                    <div class="input-group mb-3">
                        <i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                        <input class="form-control rounded-start" type="email" placeholder="UserName" required=""
                            name="username">
                    </div>
                    <div class="input-group mb-3">
                        <i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                        <div class="password-toggle w-100">
                            <input class="form-control" type="password" placeholder="Password" required=""
                                name="password">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <hr class="mt-4">
                    <div class="text-end pt-4">
                        <button class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Sign
                            In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="<?= roothtml . 'lib/vendor/bootstrap/dist/js/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= roothtml . 'lib/vendor/simplebar/dist/simplebar.min.js' ?>"></script>
    <script src="<?= roothtml . 'lib/vendor/tiny-slider/dist/min/tiny-slider.js' ?>"></script>
    <script src="<?= roothtml . 'lib/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js' ?>"></script>
    <!-- Main theme script-->
    <script src="<?= roothtml . 'lib/js/theme.min.js' ?>"></script>
    <!-- jQuery -->
    <script src="<?= roothtml.'lib/jquery/jquery.min.js' ?>"></script>
    <!-- Sweet Alarm -->
    <link href="<?= roothtml.'lib/sweet/sweetalert.css' ?>" rel="stylesheet" />
    <script src="<?= roothtml.'lib/sweet/sweetalert.min.js' ?>"></script>
    <script src="<?= roothtml.'lib/sweet/sweetalert.js' ?>"></script>
</body>

</html>

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
                if(data == 1){
                    location.href = "<?php echo roothtml.'index.php'?>";
                }
                else if (data == 0) {
                    swal("Error", "Invalid username or password", "error");
                }
                else{
                    // Show any other unexpected output as error
                    swal("Error", "Login failed: " + data, "error");
                }
            }
        });
    });
});
</script>