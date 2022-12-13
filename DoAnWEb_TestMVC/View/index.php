<?php
    // session_start();
    include("include/session.php");
    include("include/top.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/Controller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/HomeController.php");
    
    // include("include/Silder.php");
?>
<?php
    $conn = new Controller;
    $homeCtrl = new HomeController;
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
		
        var_dump($menuMainProductList);
		
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
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="background-color: #33A0FF; height: 180px;">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="background-color: #33A0FF; height: 180px;">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="background-color: #33A0FF; height: 180px;">
                            <img src="" alt="">
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
                            <span>Flash Sale</span>
                            <div class="cslider-item-timer">
                                <div class="product_time_maxprice">
                                    <div class="item-time">
                                        <div class="item-timer">
                                            <div class="defaultCountdown-30">
                                                <div class="time-item time-day">
                                                    <div class="num-time">00</div>
                                                    <div class="name-time">Ngày </div>
                                                </div>
                                                <div class="time-item time-hour">
                                                    <div class="num-time">00</div>
                                                    <div class="name-time">Giờ </div>
                                                </div>
                                                <div class="time-item time-min">
                                                    <div class="num-time">00</div>
                                                    <div class="name-time">Phút </div>
                                                </div>
                                                <div class="time-item time-sec">
                                                    <div class="num-time">00</div>
                                                    <div class="name-time">Giây </div>
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
                                <div class="col-lg-3 col-xl-3 col-md-6">
                                    <div class="product product__hot--style">
                                        <div class="product-img">
                                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                                            <div class="product-label">
                                            </div>

                                            <ul class="product-chose">
                                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                                <li><a onclick="cart.add('1000 ')"><i
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
                                                <li class="iframe-link btn-button quickview quickview_handler visible-lg" ><a title="Quick view" href="productdetail.html" data-fancybox-type="iframe"><i class="add-to-wishlist fa fa-eye"></i></a></li>
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
                </div>
            </div>
        </div>
    </section>
    <!-- End Deals -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Siêu khuyến mãi 11.11</span>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Sự kiện siêu giảm giá 11.11</span>
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
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="main-product pt-4">
        <div class="container">

            <?php 
                $homeCtrl->menuMainProduct($menuMainProductList, $menuMainProductList[0]['ten'])
            ?>
            <!-- <div class="row under-line-product" style="border-bottom: 2px solid #b7b7b7">
                <div class="col-lg-4 col-md-4 p-0">
                    <div class="main-product-title">
                        <h4>CPU</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls line_1">
                        <li class="item active" data-owl-filter="*">Tất cả</li>
                        <li class="item" data-owl-filter=".asus">Asus</li>
                        <li class="item" data-owl-filter=".gigabyte">Gigabyte</li>
                        <li class="item" data-owl-filter=".antec">Antec</li>
                    </ul>
                </div>
            </div> -->

            <div class="row property__gallery line_1 owl-carousel ">
                <div class="col-lg-3 col-xl-3 col-md-6 item asus">
                    <div class="product ">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">MỚI</span>
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item asus">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item asus">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">aaa</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item gigabyte">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item gigabyte ">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

            <div class="btn-all text-center pt-3">

                <a href="homepage.html" class="primary-btn all-product"> Xem tất cả sản phẩm</a>
            </div>

        </div>
    </section>

    <section class="main-product">
        <div class="container">
            <div class="row under-line-product" style="border-bottom: 2px solid #b7b7b7">
                <div class="col-lg-4 col-md-4 p-0">
                    <div class="main-product-title">
                        <h4>CPU</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls line_2">
                        <li class="item active" data-owl-filter="*">Tất cả</li>
                        <li class="item" data-owl-filter=".asus">Asus</li>
                        <li class="item" data-owl-filter=".gigabyte">Gigabyte</li>
                        <li class="item" data-owl-filter=".antec">Antec</li>
                    </ul>
                </div>
            </div>

            <div class="row property__gallery line_2 owl-carousel ">

                <div class="col-lg-3 col-xl-3 col-md-6 item asus">
                    <div class="product ">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">MỚI</span>
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item asus">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item antec">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">aaa</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item gigabyte">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item gigabyte ">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

            <div class="btn-all text-center pt-3">

                <a href="homepage.html" class="primary-btn all-product"> Xem tất cả sản phẩm</a>
            </div>

        </div>
    </section>

    <section class="main-product">
        <div class="container">
            <div class="row under-line-product" style="border-bottom: 2px solid #b7b7b7">
                <div class="col-lg-4 col-md-4 p-0">
                    <div class="main-product-title">
                        <h4>CPU</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls line_3">
                        <li class="item active" data-owl-filter="*">Tất cả</li>
                        <li class="item" data-owl-filter=".asus">Asus</li>
                        <li class="item" data-owl-filter=".gigabyte">Gigabyte</li>
                        <li class="item" data-owl-filter=".antec">Antec</li>
                    </ul>
                </div>
            </div>

            <div class="row property__gallery line_3 owl-carousel ">

                <div class="col-lg-3 col-xl-3 col-md-6 item antec">
                    <div class="product ">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">MỚI</span>
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item antec">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item antec">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">aaa</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item gigabyte">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

                <div class="col-lg-3 col-xl-3 col-md-6 item gigabyte ">
                    <div class="product">
                        <div class="product-img">
                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                            <div class="product-label">
                                <!-- <span class="sale">-30%</span>
                                    <span class="new">MỚI</span> -->
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">ASUS</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">Loại sản phẩm</p>
                                <h3 class="product-name"><a href="#">Tên sản phẩm</a></h3>
                                <h4 class="product-price">1.000.000đ <del class="product-old-price">1.150.000đ</del>
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

            <div class="btn-all text-center pt-3">

                <a href="homepage.html" class="primary-btn all-product"> Xem tất cả sản phẩm</a>
            </div>

        </div>
    </section>
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
                        <!-- <div class="discount__text__title">
                                <span>Giảm giá</span>
                                <h2>Cuối tháng 10</h2>
                                <h5><span>Lên đến</span> 50%</h5>
                            </div>
                            <div class="discount__countdown" id="countdown-time">
                                <div class="countdown__item">
                                    <span>22</span>
                                    <p>Ngày</p>
                                </div>
                                <div class="countdown__item">
                                    <span>18</span>
                                    <p>Giờ</p>
                                </div>
                                <div class="countdown__item">
                                    <span>46</span>
                                    <p>Phút</p>
                                </div>
                                <div class="countdown__item">
                                    <span>05</span>
                                    <p>Giây</p>
                                </div>
                            </div>
                            <a href="#">Shop now</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->


    <!-- <section class="choose-product pt-5">
        <div class="container">
            <div class="row">
                <div class="ltabs-wrap">
                    <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars"
                        data-ajaxurl="" data-type_source="0" data-lg="5" data-md="3" data-sm="2" data-xs="1"
                        data-margin="30">
                        <div class="ltabs-tabs-wrap">
                            <span class="ltabs-tab-selected">Mới về</span> <span class="ltabs-tab-arrow">▼</span>
                            <div class="item-sub-cat">
                                <ul class="ltabs-tabs cf">
                                    <li class="ltabs-tab" data-category-id="20"
                                        data-active-content=".items-category-20"> <span class="ltabs-tab-label">Bán
                                            chạy</span> </li>
                                    <li class="ltabs-tab tab-sel" data-category-id="18"
                                        data-active-content=".items-category-18">
                                        <span class="ltabs-tab-label">Mới về</span>
                                    </li>
                                    <li class="ltabs-tab" data-category-id="25"
                                        data-active-content=".items-category-25"> <span class="ltabs-tab-label">Nhiều
                                            đánh giá</span> </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="ltabs-items-container products-list grid">
                        <div class="ltabs-items ltabs-items-selected items-category-20" data-total="16">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="product product__hot--style">
                                        <div class="product-img">
                                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                                            <div class="product-label">
                                               
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

                                <div class="col-xl-3">
                                    <div class="product product__hot--style">
                                        <div class="product-img">
                                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                                            <div class="product-label">
                                                
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

                                <div class="col-xl-3">
                                    <div class="product product__hot--style">
                                        <div class="product-img">
                                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                                            <div class="product-label">
                                                
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

                                <div class="col-xl-3">
                                    <div class="product product__hot--style">
                                        <div class="product-img">
                                            <img src="../assets/img/homepage/product-card.jpg" alt="">
                                            <div class="product-label">
                                                
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
                    <div class="ltabs-items items-category-18 grid" data-total="16">
                        <div class="ltabs-loading"></div>

                    </div>
                    <div class="ltabs-items  items-category-25 grid" data-total="16">
                        <div class="ltabs-loading"></div>
                    </div>
                

                </div>
            </div>
        </div>
    </section> -->

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