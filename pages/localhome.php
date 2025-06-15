<?php
    include("../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HITUPMM</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords"
        content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=roothtml.'lib/images/1.jpg'?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=roothtml.'lib/images/1.jpg'?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=roothtml.'lib/images/1.jpg'?>">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/vendor/simplebar/dist/simplebar.min.css' ?>" />
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/vendor/tiny-slider/dist/tiny-slider.css' ?>" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/css/theme.min.css' ?>">

    <style>
    .iframe-container {
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: relative;
        border: 1px solid #ddd;
    }

    #myIframe {
        width: 100%;
        height: 100%;
        border: none;
        overflow: hidden;
    }
    </style>
</head>
<!-- Body-->

<body class="handheld-toolbar-enabled bg-dark">
    <main class="page-wrapper">
        <header class="shadow-sm" style="background-color: #2E2E2E;">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center py-2 px-3">
                    <!-- Logo -->
                    <div class="d-flex align-items-center">
                        <a class="navbar-brand d-none d-sm-block flex-shrink-0 me-4 order-lg-1" href="<?= roothtml .'index.php' ?>"><img
                                src="<?= roothtml.'lib/images/mainlogo.png'?>" width="145" alt="Cartzilla"></a><a
                            class="navbar-brand d-sm-none me-1 order-lg-1" href="<?= roothtml . 'index.php' ?>">
                            <img src="<?= roothtml.'lib/images/3.jpg'?>" class="rounded-3" width="50"
                                alt="Cartzilla"></a>
                    </div>

                    <!-- Refresh Icon -->
                    <div>
                        <a class="navbar-tool-icon-box dropdown-toggle" href="<?= roothtml.'index.php'?>"><i
                                class="navbar-tool-icon ci-reply"></i></a>
                    </div>
                </div>
            </div>
        </header>




        <?php
    // localhome.php
    $allowedDomains = [
        '568win.com',
        'ex-api-demo-yy.568win.com',
        'ggppqqgg.com',
        'sports-demo.ggppqqgg.com' // သင်သုံးနေတဲ့ domain
    ];

    if (isset($_GET['target_url'])) {
        $url = $_GET['target_url'];
        $parsedUrl = parse_url($url);
        $host = $parsedUrl['host'] ?? '';

        if (in_array($host, $allowedDomains)) {
            $safeUrl = htmlspecialchars($url);
            echo '
            <div class="iframe-container">
                <iframe id="myIframe" src="'.$safeUrl.'" 
                    sandbox="allow-same-origin allow-scripts allow-popups allow-forms allow-presentation"
                    scrolling="true"
                    referrerpolicy="no-referrer"
                    allowfullscreen></iframe>
            </div>';
        } else {
            echo "<p>This URL is not allowed to be shown in an iframe.</p>";
        }
    } else {
        echo "<p>No target URL provided.</p>";
    }
?>
    </main>

    <!-- <script src="<?=roothtml.'pages/pagereload.js'?>"></script> -->
    <!-- jQuery -->
    <script src="<?= roothtml . 'lib/jquery/jquery.min.js' ?>"></script>
    <script>
    $(document).ready(function() {
        const entries = performance.getEntriesByType("navigation");
        if (entries.length > 0 && entries[0].type === "reload") {
            var username = "<?php echo $_SESSION['esportclient_username'] ?>";
            var password = "<?php echo $_SESSION['esportclient_userpassword'] ?>";
            var portfolio = "<?php echo $_SESSION['esportclient_portfolio'] ?>";
            var gpid = "<?php echo $_SESSION['esportclient_gpid'] ?>";

            $.ajax({
                type: "post",
                url: "<?php echo roothtml.'index_action.php' ?>",
                data: {
                    action: 'sportlogin',
                    portfolio: portfolio,
                    gpid: gpid
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
        }
    });
    </script>
</body>

</html>