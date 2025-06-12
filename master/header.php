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
    <link rel="apple-touch-icon" sizes="180x180" href="<?= roothtml.'lib/images/titlelogo1.png'?>">
    <link rel="icon" type="image/png" href="<?= roothtml.'lib/images/titlelogo1.png'?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= roothtml.'lib/images/titlelogo1.png'?>">
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

    .txtcolour {
        color: #E5E7EB;
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
                    <a class="navbar-brand d-none d-sm-block flex-shrink-0 me-4 order-lg-1" href="index.html"><img
                            src="<?= roothtml.'lib/images/zmh1.png'?>" width="145" alt="Cartzilla"></a><a
                        class="navbar-brand d-sm-none me-1 order-lg-1" href="index.html">
                        <img src="<?= roothtml.'lib/images/zmh1.png'?>" class="rounded-3" width="100"
                            alt="Cartzilla"></a>
                    <!-- Toolbar-->
                    <div class="navbar-toolbar d-flex align-items-center order-lg-3">

                        <div class="navbar-tool ms-4"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                                href="<?= roothtml.'index.php'?>"><i class="navbar-tool-icon ci-reply"></i></a></div>
                    </div>
                    <?php if(curlink != 'login.php'){ ?>
                    <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
                        <!-- Categories dropdown-->
                        <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle ps-lg-0 txtcolour" href="#"
                                    data-bs-toggle="dropdown"><i
                                        class="ci-menu align-middle mt-n1 me-2 txtcolour"></i>Menu</a>
                                <ul class="dropdown-menu py-1">
                                    <li class="dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown">Me</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium">
                                                <a href="#">
                                                    Change Password</a>
                                            </li>
                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item product-title fw-medium">
                                                <a href="#">
                                                    Help</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-item" href="#">Wallet</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-item" href="#">Home</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </header>