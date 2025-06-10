<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>HITUPMM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?=roothtml.'assets/img/favicon.png'?>" rel="icon">
    <link href="<?=roothtml.'assets/img/apple-touch-icon.png'?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?=roothtml.'assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=roothtml.'assets/vendor/bootstrap-icons/bootstrap-icons.css'?>" rel="stylesheet">
    <link href="<?=roothtml.'assets/vendor/boxicons/css/boxicons.min.css'?>" rel="stylesheet">
    <link href="<?=roothtml.'assets/vendor/quill/quill.snow.css'?>" rel="stylesheet">
    <link href="<?=roothtml.'assets/vendor/quill/quill.bubble.css'?>" rel="stylesheet">
    <link href="<?=roothtml.'assets/vendor/remixicon/remixicon.css'?>" rel="stylesheet">
    <link href="<?=roothtml.'assets/vendor/simple-datatables/style.css'?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?=roothtml.'assets/css/style.css'?>" rel="stylesheet">
    <style>
    /* Desktop View */
    @media screen and (min-width: 1024px) {
        .container {
            width: 80%;
        }

        .mybottom-nav {
            width: 40%;
            margin: 0 auto;
            border-radius: 30px 30px 0 0;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
        }
    }

    /* Tablet View */
    @media screen and (max-width: 1023px) and (min-width: 768px) {
        .container {
            width: 95%;
        }

        .mybottom-nav {
            width: 95%;
            margin: 0 auto;
            border-radius: 10px 10px 0 0;
        }
    }

    /* Mobile View */
    @media screen and (max-width: 767px) {
        .container {
            width: 100%;
        }

        .mybottom-nav {
            width: 100%;
            border-radius: 0;
        }
    }

    /* Main content အတွက် padding-bottom ထည့်ပါ */
    main {
        padding-bottom: 70px;
        /* Bottom nav height ထက် နည်းနည်းပိုပေးပါ */
    }

    .mybottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background-color: #fff;
        border-top: 1px solid #ddd;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    /* Nav items အတွက် ပိုညီညာစေမယ့် style */
    .mynav-item {
        flex: 1;
        text-align: center;
        padding: 8px 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
    }

    .mynav-link {
        color: #6c757d;
        font-size: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        transition: transform 0.2s ease-in-out;
    }

    .mynav-link.active {
        color: #007bff;
        transform: scale(1.1);
        /* ✅ Active scale animation */
    }

    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #f1f1f1;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .mynav-link.active .icon-circle {
        background-color: #007bff;
        color: #fff;
    }

    .icon-circle i {
        font-size: 18px;
    }
    </style>
</head>

<body class="container">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="<?=roothtml.'setup/home.php'?>" class="logo d-flex align-items-center">
                <img src="<?=roothtml.'assets/img/logo.png'?>" alt="">
                <span class="d-none d-lg-block">HITUPMM</span>
            </a>
            <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell" style="font-size:26px;"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a>
                </li>
                <li class="nav-item card-icon">
                    <a class="nav-link nav-icon" href="#" id="btnrefresh">
                        <i class="bi bi-arrow-repeat" style="font-size:26px;"></i>
                    </a>
                </li>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    

    