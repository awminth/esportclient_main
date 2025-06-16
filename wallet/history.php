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
            <a href="#topuppage" class="nav-link active" data-bs-toggle="tab" role="tab">
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
        <div class="tab-pane fade show active" id="topuppage" role="tabpanel">
            <div class="mb-3">
                <input type="hidden" name="hidselectdate">
                <select class="form-select" id="selectdate">
                    <option value="1">Today</option>
                    <option value="2">Last 7 Day</option>
                    <option value="3">1 Months </option>
                    <option value="4">ALL</option>
                </select>
            </div>
            <!-- Link with href -->
            <div id="loadpagetopup">
                <!-- Return from loadpagesetup -->
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

<!-- Modal markup -->
<div class="modal" tabindex="-1" role="dialog" id="editmodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmedittopup">
                <div class="modal-body">
                    <input type="hidden" name="editaid">
                    <input type="hidden" name="action" value="edittopup">
                    <div class="mb-3">
                        <label for="text-input" class="form-label">Amount</label>
                        <input class="form-control" type="number" name="editamount" required>
                    </div>
                    <div class="mb-3">
                        <label for="text-input" class="form-label">TransitionCode</label>
                        <input class="form-control" type="text" name="editcode" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
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
            var entryvalue = $("[name='hidselectdate']").val();
            $.ajax({
                url: '<?= roothtml . 'wallet/history_action.php' ?>',
                type: 'POST',
                data: {
                    action: "loadpagetopup",
                    entryvalue: entryvalue
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

        $(document).on("change", "#selectdate", function() {
            var entryvalue = $(this).val();
            $("[name='hidselectdate']").val(entryvalue);
            loadpagetopup();
        });

        $(document).on("click", "#edittopup", function(e) {
            e.preventDefault();
            var aid = $(this).data("aid");
            var amount = $(this).data("amount");
            var transitioncode = $(this).data("transitioncode");
            $("[name='editamount']").val(amount);
            $('[name="editcode"]').val(transitioncode);
            $('[name="editaid"]').val(aid);
            $("#editmodal").modal("show");
        });

        $("#frmedittopup").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $("#editmodal").modal("hide");
            $.ajax({
                type: "post",
                url: "<?php echo roothtml . 'wallet/history_action.php' ?>",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 1) {
                        swal({
                            title: "Success",
                            text: "Edit Topup successful!",
                            icon: "success",
                            buttons: false,
                        });
                        loadpagetopup();
                    } else if (data == 0) {
                        swal("Error", "Invalid kpayname or kpayno", "error");
                    } else {
                        // Show any other unexpected output as error
                        swal("Error", "Edit failed: " + data, "error");
                        //alert(data);
                    }
                }
            });
        });
    });
</script>