<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cartzilla | Multi-vendor Marketplace</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords"
        content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
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
<!-- Body-->

<body class="handheld-toolbar-enabled bg-dark bodycontainer">
    <main class="page-wrapper">
        <!-- Navbar Marketplace-->
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <header class="bg-light shadow-sm navbar-sticky">
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0 me-4 order-lg-1"
                        href="index.html"><img src="<?= roothtml.'lib/images/hituplarge.png'?>" width="145" alt="Cartzilla"></a><a
                        class="navbar-brand d-sm-none me-1 order-lg-1" href="index.html">
                        <img src="<?= roothtml.'lib/images/1.jpg'?>" class="rounded-3"
                            width="50" alt="Cartzilla"></a>
                    <!-- Toolbar-->
                    <div class="navbar-toolbar d-flex align-items-center order-lg-3">
                        
                        <div class="navbar-tool ms-4"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                                href="<?= roothtml.'index.php'?>"><i
                                    class="navbar-tool-icon ci-reload"></i></a></div>
                    </div>
                    <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
                        <!-- Categories dropdown-->
                        <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#"
                                    data-bs-toggle="dropdown"><i
                                        class="ci-menu align-middle mt-n1 me-2"></i>Categories</a>
                                <ul class="dropdown-menu py-1">
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown">Photos</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a
                                                    href="marketplace-category.html">All Photos<i
                                                        class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Abstract</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Animals</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="marketplace-category.html">Architecture</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Beauty &amp;
                                                    Fashion</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Business</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Education</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Food &amp;
                                                    Drink</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Holidays</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Industrial</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">People</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Sports</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Technology</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown">Graphics</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a href="#">All Graphics<i
                                                        class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Icons</a></li>
                                            <li><a class="dropdown-item"
                                                    href="marketplace-category.html">Illustartions</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Patterns</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Textures</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Web
                                                    Elements</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown">UI Design</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a
                                                    href="marketplace-category.html">All UI Design<i
                                                        class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">PSD
                                                    Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Sketch
                                                    Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Adobe XD
                                                    Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Figma
                                                    Templates</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown">Web Themes</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a
                                                    href="marketplace-category.html">All Web Themes<i
                                                        class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">WordPress
                                                    Themes</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Bootstrap
                                                    Themes</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">eCommerce
                                                    Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Muse
                                                    Templates</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Plugins</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown">Fonts</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a
                                                    href="marketplace-category.html">All Fonts<i
                                                        class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item"
                                                    href="marketplace-category.html">Blackletter</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Display</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Non
                                                    Western</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Sans Serif</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Script</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Serif</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Slab Serif</a>
                                            </li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Symbols</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown">Add-Ons</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item product-title fw-medium"><a
                                                    href="marketplace-category.html">All Add-Ons<i
                                                        class="ci-arrow-right fs-xs ms-1"></i></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Photoshop
                                                    Add-Ons</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Illustrator
                                                    Add-Ons</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Sketch
                                                    Plugins</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Procreate
                                                    Brushes</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">InDesign
                                                    Palettes</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Lightroom
                                                    Presets</a></li>
                                            <li><a class="dropdown-item" href="marketplace-category.html">Other
                                                    Software</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>