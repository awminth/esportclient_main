<!-- header -->
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
            <h3 class=" m-4" style="color: white;">History</h3>
        </div>
    </div>
</div>
<!-- Nav tabs -->
<div class="container">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a href="#home1" class="nav-link active" data-bs-toggle="tab" role="tab">
                <i class="ci-money-bag me-2"></i>
                TOP-UP
            </a>
        </li>
        <li class="nav-item">
            <a href="#profile1" class="nav-link" data-bs-toggle="tab" role="tab">
                <i class="ci-dollar me-2"></i>
                WITHDRAW
            </a>
        </li>
    </ul>

    <!-- Tabs content -->
    <div class="tab-content">
        <!-- Topup Tab -->
        <div class="tab-pane fade show active" id="home1" role="tabpanel">
            <div class="mb-3">
                <select class="form-select" id="select-input">
                    <option>Today</option>
                    <option>Last 7 Day</option>
                    <option>1 Months </option>
                    <option>ALL</option>
                </select>
            </div>
            <!-- Link with href -->
            <div id="loadpagetopup">
                <!-- Return from loadpagesetup -->
            </div>

            <div>
                <a href="#collapseExample" class="btn btn-outline-accent" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>

                <!-- Collapse -->
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                        provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                        dolorum
                        fuga.
                    </div>
                </div>
            </div>
        </div>

        <!-- Withdraw Tab -->
        <div class="tab-pane fade show" id="profile1" role="tabpanel">
            <div class="mb-3">
                <select class="form-select" id="select-input">
                    <option>Today</option>
                    <option>Last 7 Day</option>
                    <option>1 Months </option>
                    <option>ALL</option>
                </select>
            </div>
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
<script src="<?= roothtml . 'lib/jquery/jquery.min.js' ?>"></script>
<!-- Sweet Alarm -->
<link href="<?= roothtml . 'lib/sweet/sweetalert.css' ?>" rel="stylesheet" />
<script src="<?= roothtml . 'lib/sweet/sweetalert.min.js' ?>"></script>
<script src="<?= roothtml . 'lib/sweet/sweetalert.js' ?>"></script>
<!-- jQuery -->
<script src="<?= roothtml . 'lib/jquery/jquery.min.js' ?>"></script>
<script>
$(document).ready(function() {
    function loadpagetopup() {
        $.ajax({
            url: '<?= roothtml . 'wallet/history_action.php' ?>',
            type: 'POST',
            data : {
                action : "loadpagetopup"
            },
            success: function(data) {
                $('#loadpagetopup').html(data);
            },
            error: function() {
                alert('Error loading page');
            }
        });
    }
    loadpagetopup();
});
</script>