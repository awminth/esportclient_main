<!-- header -->
<?php
include("../config.php");
include(root . "master/header.php");
?>
<h3 class="text-center mt-4" style="color: white;">Profile</h3>
<?php if (isset($_SESSION["esportclient_username"])) { ?>
    <div class="alert alert-primary d-flex m-4 mb-0" role="alert">
        <div class="alert-icon">
            <i class="ci-user"></i>
        </div>
        <div><?= $_SESSION["esportclient_username"] ?> </div>
    </div>
<?php } else { ?>
    <div class="alert alert-danger alert-dismissible fade show m-4 mb-0 d-flex justify-content-between 
align-items-center" role="alert" style="cursor: pointer;" id="loginfirst">
        <span class="fw-medium">Please Login First.</span>
        <i class="ci-sign-in"></i>
    </div>
<?php } ?>
<!-- List group with icons and badges -->
<ul class="list-group p-4" style="cursor: pointer;">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>
            <i class="ci-message me-2 text-danger"></i>
            Feedback
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>
            <i class="ci-bag mt-n1 me-2 text-danger"></i>
            Change Password
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center" id="btnlogout">
        <span>
            <i class="ci-sign-out me-2 text-danger"></i>
            Logout
        </span>
    </li>
</ul>
<!-- footer -->
<?php
include(root . "master/footer.php");
?>

<script>
    $(document).ready(function() {

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