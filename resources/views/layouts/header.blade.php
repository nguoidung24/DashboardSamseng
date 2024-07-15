<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="tivo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tivo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    {{-- <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon"> --}}
    {{-- <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon"> --}}
    <title>Samseng - admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    {{-- Table --}}
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/datatables.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/select2.css">
    {{-- <script src="../assets/js/chart/chartjs/chart.min.js"></script> --}}

    {{-- =========================== CND =========================== --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/lmy2o3rr661is2d2hfjxe5lns2u5lreh7uq134g8duxb5dzw/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    {{-- =========================== CND =========================== --}}

    <style>
        .bg-html {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>

<body style="background: black">
    <iframe class="bg-html" src="/bg.html" frameborder="0"></iframe>

    @php
        $menu = [
            [
                'text' => 'Trang chủ',
                'link' => '/dashboard',
                'icon' => 'home',
                '__id' => 'link-dashboard',
            ],
            [
                'text' => 'Sản phẩm',
                'link' => '/products',
                'icon' => 'box',
                '__id' => 'link-products',
            ],
            [
                'text' => 'Danh mục',
                'link' => '/categories',
                'icon' => 'inbox',
                '__id' => 'link-categories',
            ],
            [
                'text' => 'Banner',
                'link' => '/banner',
                'icon' => 'credit-card',
                '__id' => 'link-banner',
            ],
            [
                'text' => 'Outstanding',
                'link' => '/outstanding',
                'icon' => 'layout',
                '__id' => 'link-outstanding',
            ],
            [
                'text' => 'Bài viết',
                'link' => '/posts',
                'icon' => 'book',
                '__id' => 'link-posts',
            ],
            [
                'text' => 'Chờ duyệt',
                'link' => '/order-wait',
                'icon' => 'check-square',
                '__id' => 'link-order-wait',
            ],
            [
                'text' => 'Đang giao',
                'link' => '/order-delivering',
                'icon' => 'truck',
                '__id' => 'link-order-delivering',
            ],
            [
                'text' => 'Color',
                'link' => '/color',
                'icon' => 'sun',
                '__id' => 'link-color',
            ],
            [
                'text' => 'Tài khoản',
                'link' => '/user',
                'icon' => 'user',
                '__id' => 'link-user',
            ],
            [
                'text' => 'Liên hệ',
                'link' => '/contact',
                'icon' => 'mail',
                '__id' => 'link-contact',
            ],
            [
                'text' => 'Thêm tài khoản',
                'link' => '/role/max',
                'icon' => 'user-plus',
                '__id' => 'link-user-max',
            ],
            [
                'text' => 'Đăng Xuất',
                'link' => '/login?isLogout=',
                'icon' => 'log-out',
                '__id' => 'link-logOut',
            ],
        ];
    @endphp

    <div class="tap-top">
        <i data-feather="chevrons-up">
        </i>
    </div>
    <div class="loader-wrapper">
        <div class="loader-box">
            <div class="loader-9"></div>
            <div class="loader-9"></div>
            <div class="loader-9"></div>
            <div class="loader-9"></div>
        </div>
    </div>

    <div class="page-wrapper compact-wrapper" id="pageWrapper" style="background-color: transparent">
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="toggle-sidebar" style="background-color: black">
                        <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
                    </div>
                </div>
                @include('components.header.header-left')
                @include('components.header.header-right')
            </div>
        </div>
        <div class="page-body-wrapper">
            <div class="sidebar-wrapper">
                @include('components.header.sidebar')
            </div>
            <div class="page-body pt-3" style="background-color: white">
