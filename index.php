<!-- header -->
<?php
    include("config.php");
    include(root."master/header.php");
?>
<!-- <section class="container pb-5 mb-lg-3 bg-success mt-1"> -->
<!-- One item + Dots + Loop (defaults) -->
<div class="tns-carousel tns-nav-enabled m-3">
    <div class="tns-carousel-inner" style="height:190px;">
        <img src="<?=roothtml.'lib/images/1.jpg'?>" alt="Alt text" style="height: 100%;" class="rounded-3">
        <img src="<?=roothtml.'lib/images/2.jpg'?>" alt="Alt text" style="height: 100%;" class="rounded-3">
        <img src="<?=roothtml.'lib/images/3.jpg'?>" alt="Alt text" style="height: 100%;" class="rounded-3">
    </div>
</div>

<!-- play to click -->
<div class="container">
    <div class="row">
        <div class="col-6 tns-item tns-slide-active">
            <article class="card border-0">
                <div class="card-img-top position-relative overflow-hidden">
                    <a class="d-block"><img src="<?=roothtml.'lib/images/sbo.jpg'?>" alt="Product image" id="sportone"
                            style="height: 180px;"></a>
                </div>
                <h5 class="product-title mb-2 fs-base text-center mt-2">SBO Sports</h5>
            </article>
        </div>

        <div class="col-6 tns-item tns-slide-active">
            <article class="card border-0">
                <div class="card-img-top position-relative overflow-hidden">
                    <a class="d-block"><img src="<?=roothtml.'lib/images/afb.jpg'?>" alt="Product image" id="sporttwo"
                            style="height: 180px;"></a>
                </div>
                <h5 class="product-title mb-2 fs-base text-center mt-2">Live Casino</h5>
            </article>
        </div>
    </div>
</div>

<!-- footer -->
<?php
    include(root."master/footer.php");
?>

<script>
$(document).ready(function() {

    $(document).on("click", "#sportone", function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?php echo roothtml.'index_action.php' ?>",
            data: {
                action: 'sportlogin',
                portfolio: 'Sportsbook',
                gpid: 1015
            },
            success: function(data) {
                try {
                    // Parse JSON response
                    var jsonData = typeof data === "string" ? JSON.parse(data) : data;

                    if (jsonData.status === "success") {
                        let redirectUrl = jsonData.redirect_url;

                        // Redirect to the login URL
                        window.location.href = "<?= roothtml.'pages/localhome.php'?>" +
                            "?target_url=" + encodeURIComponent(redirectUrl);
                    } else if (data == 404) {
                        location.href = "<?=roothtml.'login/login.php'?>";
                    } else {
                        console.log("Error data", jsonData);
                        swal("Error", "Login failed", "error");
                    }
                } catch (err) {
                    console.error("Invalid JSON:", err, data);
                    swal("Error", "Unexpected server response", "error");
                }
            },
            error: function() {
                swal("Error", "Server error occurred", "error");
            }
        });
    });

    $(document).on("click", "#sporttwo", function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?php echo roothtml.'index_action.php' ?>",
            data: {
                action: 'sportlogin',
                portfolio: 'Seamlessgame',
                gpid: 1024
            },
            success: function(data) {
                try {
                    // Parse JSON response
                    var jsonData = typeof data === "string" ? JSON.parse(data) : data;

                    if (jsonData.status === "success") {
                        let redirectUrl = jsonData.redirect_url;

                        // Redirect to the login URL
                        window.location.href = "<?= roothtml.'pages/localhome.php'?>" +
                            "?target_url=" + encodeURIComponent(redirectUrl);
                    } else if (data == 404) {
                        location.href = "<?=roothtml.'login/login.php'?>";
                    } else {
                        console.log("Error data", jsonData);
                        swal("Error", "Login failed", "error");
                    }
                } catch (err) {
                    console.error("Invalid JSON:", err, data);
                    swal("Error", "Unexpected server response", "error");
                }
            },
            error: function() {
                swal("Error", "Server error occurred", "error");
            }
        });
    });
});
</script>