<!DOCTYPE html>
<html lang="en">

<head>

    <?php 
        session_start();
        include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/View/include/session.php");
        include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/Controller.php");
        include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
        include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/HomeController.php");
        include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
        include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/HeroBannerController.php");

    ?>

    <?php
        //Lấy title
        $controller = new Controller;
        $homeController = new HomeController;
        $heroBannerController = new HeroBannerController;

        $pageName = basename($_SERVER['PHP_SELF']);
        $pageName = str_replace('.php', '', $pageName);

        $pageTitile = $controller->getTitle($pageName);
        
    ?>

    <?php 
        //Lấy dữ liệu cho giỏ hàng header, danh mục sản phẩm
        $Model = new ModelAll;
        $tableName = $columnName= $whereValue = null;
        $columnName['1']="sanpham.tensp tensp";
        $columnName['2']="ct_giohang.soluong soluongsp";
        $columnName['3']="sanpham.giagoc giagoc";
        $columnName['4']="sanpham.phantram phantram";
        $columnName['5']="sanpham.anh anhsp";
        $columnName['6']="giohang.id_user";
        $columnName['7']="sanpham.id id_sp";
        // $columnName['8']="sanpham.phantram";
        // $columnName['9']="sanpham.tinhtrang";
        // $columnName['10']="sanpham.id_danhmuc";
        // $columnName['11']="sanpham.id_thuonghieu";
        // $columnName['12']="sanpham.baohanh";
        // $columnName['13']="sanpham.ngaysx";
        $tableName['MAIN'] = 'ct_giohang';
        $tableName['1'] = 'giohang';
        $tableName['2'] = 'sanpham';
        $joinCondition = array ("1"=>array ('ct_giohang.id_giohang', 'giohang.id'), "2"=>array('ct_giohang.id_sp', 'sanpham.id'));
        @$whereValue['giohang.id_user']= $_SESSION['SSCF_login_id'];

        $cartDetail = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);


        //Lấy dữ liệu cho giỏ hàng header, danh mục sản phẩm
        $Model = new ModelAll;
        $tableName = $columnName= $whereValue = null;
        $columnName="*";
        $tableName = 'danhmucsp';
        $formatBy['ASC'] ="sothutu";

        $categoryList = $Model->selectData($columnName, $tableName, null, null, null, null, $formatBy, null);
        // var_dump($categoryList);


        //Lấy slider tho sothutu
        $Model = new ModelAll;
        $tableName = $columnName= $whereValue = null;
        $columnName['1'] = "url";
        $tableName = 'slider';
        $formatBy['ASC'] ="sothutu";

        $sliderList = $Model->selectData($columnName, $tableName, null, null, null, null, $formatBy, null);
        // var_dump($sliderList);



        
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $pageTitile ?> </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,700&display=swap"
        rel="stylesheet">


    <!-- oswal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">



    <!-- csss -->
    <!-- <link rel="stylesheet" href="../../assests/css/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/css/elegant-icons.css">
    <link rel="stylesheet" href="../../assets/css/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/css/nice-select.css">
    <link rel="stylesheet" href="../../assets/css/css/jquery-ui.min.css">
    <link rel="stylesheet" href="../../assets/css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/css/slicknav.min.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/reposive.css">
    <link rel="stylesheet" href="../../assets/css/popup.css"> -->

    <link rel="stylesheet" href="../assets/css/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/css/elegant-icons.css">
    <link rel="stylesheet" href="../assets/css/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/css/nice-select.css">
    <link rel="stylesheet" href="../assets/css/css/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/css/slicknav.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/reposive.css">
    <link rel="stylesheet" href="../assets/css/popup.css">

    
</head>

<body>
       <!-- Page Preloder -->
       <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Mobie Responsive Begin -->
    <div class="mobile__menu__overlay"></div>

    <!-- Wrapper for mobile -->
    <div class="mobile__menu__wrapper">
        <div class="mobile__menu__logo">
            <a href="#">LOGO</a>
        </div>
        <hr>
        <div class="mobile__menu__widget">
            <div class="header__top__right__auth">
                <a href="#"><i class="user-icon fa fa-user"></i> Đăng nhập</a>
            </div>
        </div>
        <div class="mobile__menu__cart">
            <ul>
                <li><a href=""><i class="header-notify-icon fa-solid fa-bell"></i></a></li>
                <li><a href=""><i class="header-cart-icon fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>

        <hr>

        <nav class="mobile__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="">Trang chủ</a></li>
                <li class="'"><a href="">Chính sách & điều khoản</a></li>
                <li class=""><a href="">Liên hệ</a></li>
                <li class=""><a href="">Về chúng tôi</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
            <li style="margin:0;"><a href=""><i class="fa-brands fa-discord"></i></a></li>
        </div>
        <hr>
        <div class="mobile__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> 4-2.group@gmail.com</li>
                <li><i class="fa-solid fa-phone"></i>0123456789</li>
            </ul>
        </div>
    </div>
    <!-- Mobie Responsive End -->

    <!-- Header -->
    <!-- Top header -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> 4-2.group@gmail.com</li>
                                <li><i class="fa-solid fa-phone"></i>0123456789</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top-icon header__top__right__social">
                                <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                                <li style="margin:0;"><a href=""><i class="fa-brands fa-discord"></i></a></i></li>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End top header -->

        <!-- Mid_header -->
        <div class="header__mid">
            <div class="container">
                <div class="row">
                    <!-- Header logo -->
                    <div class="col-lg-3 col-md-3">
                        <div class="header__logo">
                            <h3>LOGO</h3>
                        </div>
                    </div>

                    <!-- SEARCH BAR -->
                    <div class="col-lg-6 col-md-6">
                        <form role="search" id="form">
                            <input type="search" id="query" name="serach" placeholder="Tìm kiếm"
                                aria-label="Search through site content">
                            <button class="search-btn">
                                <svg viewBox="0 0 1024 1024">
                                    <path class="path1"
                                        d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- header-mid-side -->
                    <div class="col-lg-3  col-md-3 text-center">
                        <div class="header-mid-side">


                            <?php 
                                $heroBannerController->checkLogIn($_SESSION, $cartDetail);
                            ?>
                            <!-- <div class="header-mid-side--no-login font-weight-bold" style="padding-right: 100px;">
                                    <a href="">Đăng nhập / Đăng ký</a>
                            </div> -->

                            <!-- <div class="user-header">
                                <span>Nội dung</span>
                                <a><i class=" user-icon-header fa-regular fa-user"></i></a>

                                <div class="user-item">
                                    <div class="dropdown-user-header">
                                    </div>
                                    <ul class="user-list">
                                        <li>
                                            <a href=""><i class="fa-solid fa-gear"></i>
                                                <span>Tài khoản của tôi</span></a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa-solid fa-bag-shopping"></i>
                                                <span>Đơn mua của tôi</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa-solid fa-lock"></i>
                                                <span>Đổi mật khẩu</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""><i class="fa-solid fa-circle-info"></i>
                                                <span>Thông tin cá nhân</span></a>
                                        </li>

                                    </ul>
                                    <div class="bottom">
                                        <a href="" class="btn animate">Đăng xuất</a>
                                        <a href="" class="btn animate">Đăng nhập</a>

                                    </div>
                                </div>
                            </div> -->

                            <!-- Cart -->
                            <!-- <div class="sinlge-bar shopping">
                                <a href="#" class="single-icon"><i
                                        class="header-mid-icon fa-solid fa-cart-shopping"></i> <span
                                        class="total-count">2</span></a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>2 sản phẩm</span>
                                        <a href="#">Xem giỏ hàng</a>
                                    </div>
                                    <ul class="shopping-list">
                                        <li>
                                            <div class="content-shopping-list-item">
                                                <div class="remove-icon">
                                                    <a href="#" class="remove" title="Xóa sản phẩm"><i
                                                            class="fa fa-remove"></i></a>
                                                </div>
                                                <a class="cart-img" href="#"><img
                                                        src="./assets/img/homepage/product01.png" alt="#"></a>
                                                <div class="cart-product-deatil">
                                                    <h4><a href="#">Tên sản phẩm</a></h4>
                                                    <p class="quantity">1x - <span class="amount">100.000đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content-shopping-list-item">
                                                <div class="remove-icon">
                                                    <a href="#" class="remove" title="Xóa sản phẩm"><i
                                                            class="fa fa-remove"></i></a>
                                                </div>
                                                <a class="cart-img" href="#"><img
                                                        src="./assets/img/homepage/product01.png" alt="#"></a>
                                                <div class="cart-product-deatil">
                                                    <h4><a href="#">Tên sản phẩm</a></h4>
                                                    <p class="quantity">1x - <span class="amount">100.000đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Tổng </span>
                                            <span class="total-amount">235.000đ</span>
                                        </div>
                                        <a href="" class="btn animate">Thanh toán</a>
                                    </div>
                                </div>

                            </div> -->
                            <!-- /Cart -->

                            


                        </div>

                    </div>
                </div>

                <!-- Icon nav mobie -->
                <div class="mobile__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
            <!-- end mid-header -->

            <!-- divider -->
            <hr>


            <!-- hero section -->
            <!-- WARING: add class hero-normal if u dont code for homepage -->
            <section class="hero">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <!-- category  -->
                            <div class="hero__categories">
                                <div class="hero__categories__all">
                                    <div>
                                        <i class="fa fa-bars"></i>
                                        <span>Danh mục</span>
                                    </div>
                                </div>
                                <ul>
                                    <?php 
                                        foreach($categoryList as $eachRow){
                                            echo 
                                            '
                                                <li><a href="#">'.$eachRow['ten'].'</a></li>

                                            ';
                                        }
                                    ?>
                                    <!-- <li><a href="#">MainBoard</a></li>
                                    <li><a href="#">Bộ nhớ HHD</a></li>
                                    <li><a href="#">Bộ nhớ SSD</a></li>
                                    <li><a href="#">CPU</a></li>
                                    <li><a href="#">Fan CPU</a></li>
                                    <li><a href="#">Case</a></li>
                                    <li><a href="#">Power</a></li>
                                    <li><a href="#">Sound Card</a></li>
                                    <li><a href="#">VGA Card</a></li>
                                    <li><a href="#">DVD</a></li>
                                    <li><a href="#">Keo tản nhiệt</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- header_menu -->
                        <div class="col-lg-9">
                            <nav class="header__menu">
                                <ul class="header__menu--li">
                                    <li class="active"><a href="">Trang chủ</a></li>
                                    <li class="'"><a href="">Chính sách</a></li>
                                    <li class=""><a href="">Liên hệ</a></li>
                                    <li class=""><a href="">Về chúng tôi</a></li>
                                </ul>
                            </nav>

                            <?php 
                                if($pageName == "index"){
                                    $heroBannerController->setHeroBanner($sliderList);
                                }
                                else{
                                    
                                }
                            ?>
                            <!-- <div class="hero-silder owl-carousel">
                                <div class="col-lg-12">
                                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                                        <div class="hero__text">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                                        <div class="hero__text">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- Hero Section End -->
    </header>
    <!-- Header Section End -->