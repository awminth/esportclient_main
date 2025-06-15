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
    <link rel="apple-touch-icon" sizes="180x180" href="<?= roothtml . 'lib/images/titlelogo1.png' ?>">
    <link rel="icon" type="image/png" href="<?= roothtml . 'lib/images/titlelogo1.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= roothtml . 'lib/images/titlelogo1.png' ?>">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/vendor/simplebar/dist/simplebar.min.css' ?>" />
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/vendor/tiny-slider/dist/tiny-slider.css' ?>" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'lib/css/theme.min.css' ?>">

    <!-- login css -->
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'login/login-style.css' ?>">
    <link rel="stylesheet" media="screen" href="<?= roothtml . 'wallet/topup-style.css' ?>">

    <style>
    /* Desktop View */
    @media screen and (min-width: 1024px) {
        .bodycontainer {
            width: 33%;
            margin: 0 auto;
            /* အလယ်မှာထားဖို့ */
        }
    }

    .bgcolour {
        background-color: #2E2E2E;
    }

    .bgactive {
        background-color: rgba(241, 237, 237, 0.33);
    }

    .mainwallet-circle {
        background-color: rgba(0, 0, 0, 0.2);
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        transition: background-color 0.5s ease;
    }

    .mainwallet-circle i {
        font-size: 35px;
        color: rgba(90, 231, 184, 0.73);
    }

    .mainwallet-label {
        margin-top: 10px;
        color: white;
    }

    .mainwallet-circle:hover {
        background-color: rgba(114, 167, 118, 0.51);
        /* Change as needed */
    }
    </style>
</head>
<!-- Body-->

<body class="handheld-toolbar-enabled bodycontainer">
    <main class="page-wrapper bgcolour">
        <!-- Navbar Marketplace-->
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <header class="bgcolour shadow-sm navbar-sticky">
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand d-none d-sm-block flex-shrink-0 me-4 order-lg-1"
                        href="<?= roothtml . 'index.php' ?>"><img src="<?= roothtml . 'lib/images/mainlogo.png' ?>"
                            width="145" alt="Cartzilla"></a>
                    <a class="navbar-brand d-sm-none me-1 order-lg-1" href="<?= roothtml .'index.php' ?>">
                        <img src="<?= roothtml . 'lib/images/mainlogo.png' ?>" class="rounded-3" width="100"
                            alt="Cartzilla"></a>
                    <!-- Toolbar-->
                    <div class="navbar-toolbar d-flex align-items-center order-lg-3">

                        <div class="navbar-tool ms-4"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                                href="<?= roothtml . 'index.php' ?>"><i class="navbar-tool-icon ci-reload"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>