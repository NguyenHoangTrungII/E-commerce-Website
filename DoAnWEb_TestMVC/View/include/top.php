<!DOCTYPE html>
<html lang="en">

<head>

    <?php 
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/View/include/session.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/Controller.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/HomeController.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/HeroBannerController.php");
        date_default_timezone_set('Asia/Ho_Chi_Minh');


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
        $columnName['8']="danhmucsp.ten tendanhmuc";
        $tableName['MAIN'] = 'ct_giohang';
        $tableName['1'] = 'giohang';
        $tableName['2'] = 'sanpham';
        $tableName['3'] = 'danhmucsp';
        $joinCondition = array ("1"=>array ('ct_giohang.id_giohang', 'giohang.id'), "2"=>array('ct_giohang.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'));
        @$whereValue['giohang.id_user']= $_SESSION['SSCF_login_id'];

        $cartDetail = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);




        //Lấy dữ liệu cho giỏ hàng header, danh mục sản phẩm
        $tableName = $columnName= $whereValue = null;
        $columnName="*";
        $tableName = 'danhmucsp';
        $formatBy['ASC'] ="sothutu";

        $categoryList = $Model->selectData($columnName, $tableName, null, null, null, null, $formatBy, null);
        // var_dump($categoryList);


        //Lấy slider tho sothutu
        $tableName = $columnName= $whereValue = $whereCondition = null;
        $columnName['1'] = "url";
        $tableName = 'slider';
        $whereValue['tinhtrang'] = 1;
        $whereCondition = "=";
        $formatBy['ASC'] ="sothutu";
       

        $sliderList = $Model->selectData($columnName, $tableName, $whereValue, $whereCondition, null, null, $formatBy, null);
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
    <link rel="stylesheet" href="../../assets/css/popup.css">

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
    <link rel="stylesheet" href="../assets/css/css/toggle-switchy.css">
    <link rel="stylesheet" href="../assets/css/range-srate.css">
    <link rel="stylesheet" href="../assets/css/add_css.css">
    <link rel="stylesheet" href="../assets/css/lightslider.css">
    <link rel="stylesheet" href="../assets/js/footer.css">
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
            <a href="index.php">LOGO</a>
        </div>
        <hr>
        <div class="mobile__menu__widget">
            <div class="header__top__right__auth">
                <?php 
                    if(isset($_SESSION['SSCF_login_id'])){
                        echo '<a href="accountdetail.php"><i class="user-icon fa fa-user"></i>'. $_SESSION['SSCF_login_user_showname'].'</a>

                        ';
                    }
                    else
                    {
                        echo '<a href="#"><i class="user-icon fa fa-user"></i> Đăng nhập</a>

                        ';
                    }
                ?>
            </div>
        </div>
        <div class="mobile__menu__cart">
            <ul>
                <?php 
                
                if(isset($cartDetail)){
                    echo '<li><a href="cart.php"><i class="header-cart-icon fa-solid fa-cart-shopping"></i></a></li>
                    ';
                }
                else
                {
                    echo '<li><a href="cart.php"><i class="header-cart-icon fa-solid fa-cart-shopping"></i></a></li>
                    ';
                }
                ?>
            </ul>
        </div>

        <hr>

        <nav class="mobile__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Trang chủ</a></li>
                <li class="'"><a href="">Chính sách & điều khoản</a></li>
                <li class=""><a href="contact.php">Liên hệ</a></li>
                <li class=""><a href="about-us.php">Về chúng tôi</a></li>
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
                            <h3> <a href="index.php"><img src="../public/uploads/logo/z3981326372782_609beeb43778012128067c888231f4fe.jpg" alt="" style="width:40px"><span>4.2GRP</span></a></h3>
                        </div>
                    </div>

                    <!-- SEARCH BAR -->
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <form role="search" id="form">
                                    <input type="search" id="query" name="serach" placeholder="Tìm kiếm" autocomplete="off"
                                        >
                                    <button class="search-btn">
                                        <svg viewBox="0 0 1024 1024">
                                            <path class="path1"
                                                d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div class="col-12">
                            <div class="list-group list-group-flush list-style" id="show-list">
                            </div>
                        </div>



                    </div>
                    </div>

                    <!-- header-mid-side -->
                    <div class="col-lg-3  col-md-3 text-center">
                        <div class="header-mid-side">


                            <?php 
                                $heroBannerController->checkLogIn($_SESSION, $cartDetail);
                            ?>

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
            <section class="hero <?= $pageName =="index" ? " " : " hero-normal"?>">
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
                                    <!-- Category động -->
                                    <?php 
                                        foreach($categoryList as $eachRow){
                                            echo 
                                            '
                                                <li><a href="productlist.php?id='.$eachRow['id'].'">'.$eachRow['ten'].'</a></li>

                                            ';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- header_menu -->
                        <div class="col-lg-9">
                            <nav class="header__menu">
                                <ul class="header__menu--li">
                                    <li class="active"><a href="index,php">Trang chủ</a></li>
                                    <li class="'"><a href="">Chính sách</a></li>
                                    <li class=""><a href="contact.php">Liên hệ</a></li>
                                    <li class=""><a href="about-us.php">Về chúng tôi</a></li>
                                </ul>
                            </nav>

                            <?php 
                                //Nếu là trang index-> hiển thị bannerhero
                                //Nếu là trang sản phẩm -> hiển thị banner theo từng loại danh mục
                                //Nếu là các trang khác-> hiển thị ảnh theo từng rang và fix link 
                                if($pageName == "index"){
                                    $heroBannerController->setHeroBanner($sliderList);
                                }
                                else{
                                    echo 
                                    '
                                     </div> </div>  </div> </div> </section>
                                    ';
                                }
                            ?>

    </header>


