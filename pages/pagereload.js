$(document).ready(function() {
const entries = performance.getEntriesByType("navigation");
if (entries.length > 0 && entries[0].type === "reload") {
    var username = "<?php echo $_SESSION['esportclient_username'] ?>";
    // var password = "<?= json_encode($_SESSION['esportclient_userpassword']) ?>";
    // var portfolio = "<?= json_encode($_SESSION['esportclient_portfolio']) ?>";
    // var gpid = "<?= json_encode($_SESSION['esportclient_gpid']) ?>";

    // $.ajax({
    //     type: "post",
    //     url: "<?php echo roothtml.'index_action.php' ?>",
    //     data: {
    //         action: 'sportlogin',
    //         portfolio: portfolio,
    //         gpid: gpid
    //     },
    //     success: function(data) {
    //         try {
    //             // Parse JSON response
    //             var jsonData = typeof data === "string" ? JSON.parse(data) : data;

    //             if (jsonData.status === "success") {
    //                 let redirectUrl = jsonData.redirect_url;

    //                 // Redirect to the login URL
    //                 window.location.href = "<?= roothtml.'pages/localhome.php'?>" +
    //                     "?target_url=" + encodeURIComponent(redirectUrl);
    //             } else if (data == 404) {
    //                 location.href = "<?=roothtml.'login/login.php'?>";
    //             } else {
    //                 console.log("Error data", jsonData);
    //                 swal("Error", "Login failed", "error");
    //             }
    //         } catch (err) {
    //             console.error("Invalid JSON:", err, data);
    //             swal("Error", "Unexpected server response", "error");
    //         }
    //     },
    //     error: function() {
    //         swal("Error", "Server error occurred", "error");
    //     }
    // });
}
});