<?php
    // session_start();
    include("include/session.php");
    include("include/top.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/Controller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/HomeController.php");
    // include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
?>
<?php

    // Lay xem co bao nhieu cot ma admin muon hien thi tren website
    $conn = new Controller;
    $homeCtrl = new HomeController;
    $Model = new ModelAll;

    $tableName = $columnName = $whereValue =null;
    $tableName ="danhmucsp";
    $columnName['1'] = "id";
    $whereValue['hienthi'] = "1";
    $categoryShow = $Model->selectData($columnName, $tableName, $whereValue);
    // var_dump( $categoryShow);
    // var_dump(json_decode(($conn->getListMainProduct($categoryShow))['category'][0], true)[2]['tenncc']);

    
    $categoryLists = (($conn->getListMainProduct($categoryShow))['category']);
    $productsListsMenu = (($conn->getListMainProduct($categoryShow))['product']);
    // var_dump( json_decode($productsListsMenu[0], true));



    
    $categoryName = '4';
    $sql_code="SELECT DISTINCT id_thuonghieu, nhacungcap.tenncc, danhmucsp.ten FROM `sanpham` inner join `nhacungcap` on sanpham.id_thuonghieu  = nhacungcap.id INNER JOIN `danhmucsp` on sanpham.id_danhmuc = danhmucsp.id WHERE danhmucsp.id =:VALUE1";
    // $sql_code = "SELECT * FROM `taikhoan` JOIN `nguoidung` ON taikhoan.id = nguoidung.id_taikhoan WHERE `email`=:VALUE1 AND `matkhau`=:VALUE2";
    $query = $conn->connection->prepare($sql_code);
    
    $values = array(
        ':VALUE1' => $categoryName,
        );
        
    $query->execute($values);
    
    $menuMainProductList = $query->fetchAll(PDO::FETCH_ASSOC);
    $totalRowSelected = $query->rowCount();


    
    //Sản phẩm gợi ý
    $sql_code="SELECT sanpham.id id_sp, danhmucsp.ten tendanhmuc, nhacungcap.tenncc tenncc, sanpham.tensp tensp, sanpham.anh , sanpham.giagoc, sanpham.phantram, sanpham.tinhtrang, sanpham.id_danhmuc
            
    FROM `sanpham` inner join `nhacungcap` on sanpham.id_thuonghieu  = nhacungcap.id INNER JOIN `danhmucsp` on sanpham.id_danhmuc = danhmucsp.id ORDER BY RAND()  LIMIT 5";


    $query = $controller->connection->prepare($sql_code);


    $query->execute( );

    $todayProduct = $query->fetchAll(PDO::FETCH_ASSOC);  


		
?>
    <section class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="background-color: #33A0FF; height: 180px;">
                            <img src="../public/uploads/Banner/Banner_2.webp" alt="">
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="background-color: #33A0FF; height: 180px;">
                            <img src="../public/uploads/Banner/Banner_1.webp" alt="" class="pt-2">
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="background-color: #33A0FF; height: 180px;">
                            <img src="../public/uploads/Banner/Banner_4.webp" alt="" class="pt-4">
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="background-color: #33A0FF; height: 180px;">
                            <img src="../public/uploads/Banner/Banner_6.png" alt="" class="pt-4">
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>
    <!-- /SECTION -->


    <!-- Deals -->
    <section class="deal-today pb-4 pt-5">
        <div class="container">
            <div class="row">
                <div class="module deals-layout1">
                    <div class="head-title">
                        <div class="modtitle">
                            <span>GỢI Ý HÔM NAY</span>
                            <div class="cslider-item-timer">
                                <div class="product_time_maxprice">
                                    <div class="item-time">
                                        <div class="item-timer">
                                            <div class="defaultCountdown-30">
                                                <div class="time-item time-day">
                                                    <div class="num-time"><?= date("Y") ?></div>
                                                    <div class="name-time">Ngày </div>
                                                </div>
                                                <div class="time-item time-hour">
                                                    <div class="num-time"><?= date("m") ?></div>
                                                    <div class="name-time">Tháng </div>
                                                </div>
                                                <div class="time-item time-min">
                                                    <div class="num-time"><?= date("d") ?></div>
                                                    <div class="name-time">Năm </div>
                                                </div>
                                                <div class="time-item time-sec">
                                                    <div class="num-time"><?= date("H") ?> giờ</div>
                                                    <div class="name-time">Giờ </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modcontent">
                        <div id="so_deal_1" class="so-deal style1">
                            <div class="row property__gallery__flash-sale owl-carousel">
                                <?php 
                                    echo $homeCtrl->mainProductToday($todayProduct);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Deals -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="../public/uploads/Banner/Banner_discount2.jpg" style="height:200px">
        <!-- <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span style="font-size: 40px">Siêu khuyến mãi tết dương lịch</span>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Sự kiện hoàn thành thành đồ án của nhóm 4.2</span>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Sự kiện siêu giảm giá 11.11</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
    <!-- Banner Section End -->

    
    <!-- Product Section Begin -->
    <?php
        for($i=0; $i < count($categoryShow); $i++){
            echo '<section class="main-product pt-4">  <div class="container">';

            $decode_category = json_decode($categoryLists[$i], true);
            $homeCtrl->menuMainProduct($decode_category, $decode_category[0]['ten'], $i);

            echo '<div class="row property__gallery '."line_".''.($i+1).' owl-carousel  ">';

            echo $homeCtrl->mainProduct(json_decode($productsListsMenu[$i], true));


            echo ' </div> <div class="btn-all text-center pt-3"> <a href="productlist.php?id='.json_decode($productsListsMenu[$i], true)[0]['id_danhmuc'].'" class="primary-btn all-product"> Xem tất cả sản phẩm</a>
                </div> </div> </section>';
        }
    ?>
    <!-- Product Section End -->

    <!-- Discount Section Begin -->
    <section class="discount">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="discount__pic">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="discount__text">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->

    <section class="choosen-product pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="group-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#best-seller" aria-controls="best-seller" role="tab"
                                data-toggle="tab" class="active-color"><span>Bán chạy</span> </a></li>
                        <li role="presentation"><a href="#new-arrive" aria-controls="new-arrive" role="tab"
                                data-toggle="tab">Mới về</a></li>
                        <li role="presentation"><a href="#most-react" aria-controls="most-react" role="tab"
                                data-toggle="tab">Nhiều đánh giá</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content pt-3">
                        <div role="tabpanel" class="tab-pane active" id="best-seller">
                            <div class="container">
                                <div class="row  product-choosed-silder owl-carousel">
                                    <div class="col-lg-3 col-xl-3 col-md-6">
                                        <div class="product product__hot--style">
                                            <div class="product-img">
                                                <img src="../assets/img/homepage/product-card.jpg" alt="">
                                                <div class="product-label">
                                                    <!-- <span class="sale">-30%</span>
                                                    <span class="new">MỚI</span> -->
                                                </div>

                                                <ul class="product-chose">
                                                    <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                                    <li><a href="#"><i
                                                                class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-body">
                                                <div class="product-another ">
                                                    <p class="product-category">Loại sản phẩm</p>
                                                    <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                                    <h4 class="product-price">1.000.000đ <del
                                                            class="product-old-price">1.150.000đ</del>
                                                    </h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-xl-3 col-md-6">
                                        <div class="product product__hot--style">
                                            <div class="product-img">
                                                <img src="../assets/img/homepage/product-card.jpg" alt="">
                                                <div class="product-label">
                                                    <!-- <span class="sale">-30%</span>
                                                    <span class="new">MỚI</span> -->
                                                </div>

                                                <ul class="product-chose">
                                                    <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                                    <li><a href="#"><i
                                                                class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-body">
                                                <div class="product-another ">
                                                    <p class="product-category">Loại sản phẩm</p>
                                                    <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                                    <h4 class="product-price">1.000.000đ <del
                                                            class="product-old-price">1.150.000đ</del>
                                                    </h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-xl-3 col-md-6">
                                        <div class="product product__hot--style">
                                            <div class="product-img">
                                                <img src="../assets/img/homepage/product-card.jpg" alt="">
                                                <div class="product-label">
                                                    <!-- <span class="sale">-30%</span>
                                                    <span class="new">MỚI</span> -->
                                                </div>

                                                <ul class="product-chose">
                                                    <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                                    <li><a href="#"><i
                                                                class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-body">
                                                <div class="product-another ">
                                                    <p class="product-category">Loại sản phẩm</p>
                                                    <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                                    <h4 class="product-price">1.000.000đ <del
                                                            class="product-old-price">1.150.000đ</del>
                                                    </h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-xl-3 col-md-6">
                                        <div class="product product__hot--style">
                                            <div class="product-img">
                                                <img src="../assets/img/homepage/product-card.jpg" alt="">
                                                <div class="product-label">
                                                    <!-- <span class="sale">-30%</span>
                                                    <span class="new">MỚI</span> -->
                                                </div>

                                                <ul class="product-chose">
                                                    <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                                    <li><a href="#"><i
                                                                class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-body">
                                                <div class="product-another ">
                                                    <p class="product-category">Loại sản phẩm</p>
                                                    <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                                    <h4 class="product-price">1.000.000đ <del
                                                            class="product-old-price">1.150.000đ</del>
                                                    </h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="new-arrive">

                        </div>
                        <div role="tabpanel" class="tab-pane" id="most-react">
                            <div class="col-lg-3 col-xl-3 col-md-6">
                                <div class="product product__hot--style">
                                    <div class="product-img">
                                        <img src="../assets/img/homepage/product-card.jpg" alt="">
                                        <div class="product-label">
                                            <!-- <span class="sale">-30%</span>
                                                <span class="new">MỚI</span> -->
                                        </div>

                                        <ul class="product-chose">
                                            <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                            <li><a href="#"><i
                                                        class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-body">
                                        <div class="product-another ">
                                            <p class="product-category">Loại sản phẩm</p>
                                            <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                            <h4 class="product-price">1.000.000đ <del
                                                    class="product-old-price">1.150.000đ</del>
                                            </h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reason sectio -->
    <section class="Reason_section">
        <div class="container">
            <div class="row px-xl-5 pb-3">
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="info-box ">
                        <h1 class="fa fa-check"></h1>
                        <h5>Chất lượng</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="info-box">
                        <h1 class="fa fa-shipping-fast"></h1>
                        <h5>Vận chuyển nhanh</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="info-box">
                        <h1 class="fa fa-phone-volume"></h1>
                        <h5>Hỗ trợ 24/7</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include("include/footer.php");
?>