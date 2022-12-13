<?php
    include("include/top.php");
    // include("include/Silder.php");
?>

     <!-- Breadcrumb Section Begin -->
     <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>SẢN PHẨM</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                            <a>Sản phẩm</a><span>tên sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
</section>
<!-- Hero Section End -->


    <!-- Product List Section Begin -->
    <section class="product-list pt-5">
        <div class="container">
            <div class="bg-white rounded d-flex align-items-center justify-content-between toolbox horizontal-filter"
                id="header">
                <!-- <button class="btn btn-hide text-uppercase" type="button" data-toggle="collapse"
                        data-target="#filterbar" aria-expanded="false" aria-controls="filterbar" id="filter-btn"
                        onclick="changeBtnTxt()"> <span class="fas fa-angle-left" id="filter-angle"></span> <span
                            id="btn-txt">Lọc</span>
                    </button> -->

                <div class="toolbox-left pl-3">
                    <!-- <div class="filter-toggle opened pl-2" data-toggle="collapse" data-target="#filterbar"
                        aria-expanded="false" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                        <span>Lọc:</span>
                        <a href="#">&nbsp;</a>
                    </div> -->

                    <span>Lọc:</span>
                    <label class="toggle-switchy pl-2" for="fitter-product" data-size="sm" data-text="false"
                        data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="false"
                        aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                        <input checked type="checkbox" id="fitter-product">
                        <span class="toggle">
                            <span class="switch"></span>
                        </span>
                    </label>

                </div>
                <nav class="navbar navbar-expand-lg navbar-light pl-lg-0 pl-auto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav"
                        aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation"
                        onclick="changeIcon()" id="icon"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="mynav">
                        <ul class="navbar-nav d-lg-flex align-items-lg-center">
                            <li class="nav-item active"> <select name="sort " id="sort-product-detail">
                                    <option value="" hidden selected>Sắp xếp theo</option>
                                    <option value="price">Phổ biến</option>
                                    <option value="popularity">Giá tăng dần</option>
                                    <option value="rating">Giá giảm dần</option>
                                </select> </li>
                            <!-- <li class="nav-item d-inline-flex align-items-center justify-content-between mb-lg-0 mb-3">
                                    <div class="d-inline-flex align-items-center mx-lg-2" id="select2">
                                        <div class="pl-2">Products:</div> <select name="pro" id="pro">
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                    <div class="font-weight-bold mx-2 result">18 from 200</div>
                                </li> -->
                            <li class="nav-item d-lg-none d-inline-flex"> </li>
                        </ul>
                    </div>
                </nav>

            </div>
            <div id="content" class="my-5">
                <div id="filterbar" class="collapse">
                    <div class="box border-bottom">
                        <div class="form-group text-center">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success form-check-label"> <input class="form-check-input"
                                        type="radio"> Đặt lại </label>
                                <label class="btn btn-success form-check-label active"> <input class="form-check-input"
                                        type="radio" checked> Áp dụng </label>
                            </div>
                        </div>
                        <div> <label class="tick">Hàng mới <input type="checkbox" checked="checked"> <span
                                    class="check"></span> </label> </div>
                        <div> <label class="tick">Sale sốc <input type="checkbox"> <span class="check"></span> </label>
                        </div>
                    </div>
                    <!-- <div class="box border-bottom"> -->
                        <!-- <div class="box-label text-uppercase d-flex align-items-center">Phân loại <button
                                class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box"
                                aria-expanded="false" aria-controls="inner-box" id="out" onclick="outerFilter()"> <span
                                    class="fas fa-plus"></span> </button> </div> -->
                        <!-- <div id="inner-box" class="collapse mt-2 mr-1">
                            <div class="my-1"> <label class="tick">Mainboard <input type="checkbox" checked="checked">
                                    <span class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Bộ nhớ SSD <input type="checkbox"> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Bộ nhớ HDD <input type="checkbox"> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">CPU <input type="checkbox"> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Sound Card <input type="checkbox"> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">VGA <input type="checkbox" checked> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Case <input type="checkbox"> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Keo tản nhiệt <input type="checkbox" checked> <span
                                        class="check"></span> </label> </div>
                        </div> -->
                    <!-- </div> -->
                    <div class="box border-bottom">
                        <div class="box-label text-uppercase d-flex align-items-center">Thương hiệu<button
                                class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box2"
                                aria-expanded="false" aria-controls="inner-box2"><span
                                    class="fas fa-plus"></span></button> </div>
                        <div id="inner-box2" class="collapse mt-2 mr-1">
                            <div class="my-1"> <label class="tick">Thương hiệu  <input type="checkbox" checked="checked">
                                    <span class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Thương hiệu  <input type="checkbox"> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Thương hiệu  <input type="checkbox" checked> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Thương hiệu  <input type="checkbox"> <span
                                        class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">Thương hiệu  <input type="checkbox"> <span
                                        class="check"></span> </label> </div>
                        </div>
                    </div>
                    <div class="box border-bottom">
                        <div class="box-label text-uppercase d-flex align-items-center">Giá <button class="btn ml-auto"
                                type="button" data-toggle="collapse" data-target="#price" aria-expanded="false"
                                aria-controls="price"><span class="fas fa-plus"></span></button> </div>
                        <div class="collapse" id="price">
                            <div class="middle">
                                <div class="multi-range-slider"> <input type="range" id="input-left" min="0" max="100"
                                        value="10"> <input type="range" id="input-right" min="0" max="100" value="50">
                                    <div class="slider">
                                        <div class="track"></div>
                                        <div class="range"></div>
                                        <div class="thumb left"></div>
                                        <div class="thumb right"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <div> <span id="amount-left" class="font-weight-bold"></span> VND </div>
                                <div> <span id="amount-right" class="font-weight-bold"></span> VND </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="products">
                <div class="row mx-0">
                    <div class="col-lg-4 col-xl-4 col-md-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="../assets/img/homepage/product-card.jpg" alt="">
                                <div class="product-label">

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

                    <div class="col-lg-4 col-xl-4 col-md-6">
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

                    <div class="col-lg-4 col-xl-4 col-md-6">
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

                    <div class="col-lg-4 col-xl-4 col-md-6">
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

                    <div class="col-lg-4 col-xl-4 col-md-6">
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

                    <div class="col-lg-4 col-xl-4 col-md-6">
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
            </div>
            <div class="row">
                <div class="container">
                    <div class="ml-auto mt-3 mr-2 nextpage">
                        <nav aria-label="Page navigation" class="pagination detail-product">
                            <ul class="pagination">
                                <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span
                                            aria-hidden="true" class="font-weight-bold">&lt;</span> <span
                                            class="sr-only">Previous</span> </a> </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">..</a></li>
                                <li class="page-item"><a class="page-link" href="#">18</a></li>
                                <li class="page-item"><a class="page-link" href="#">19</a></li>
                                <li class="page-item"><a class="page-link" href="#">20</a></li>
                                <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span
                                            aria-hidden="true" class="font-weight-bold">&gt;</span> <span
                                            class="sr-only">Next</span> </a> </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product List Section End -->

    <!-- <div class="container"> -->


    <!-- <div class="bg-white rounded d-flex align-items-center justify-content-between" id="header"> -->

    <!-- <div class="row"> -->

    <!-- <div class="col-12">
                <nav class="toolbox horizontal-filter">
                    <div class="toolbox-left">
                        <div class="filter-toggle opened" data-toggle="collapse" data-target="#filterbar"
                            aria-expanded="false" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                            <span>Lọc:</span>
                            <a href="#">&nbsp;</a>
                        </div>
                    </div>
                    <div class="toolbox-item toolbox-sort">
                        <div class="select-custom">
                            <select name="orderby" class="form-control orderby ">
                                <option value="menu_order" selected="selected">DEFAULT SORTING</option>
                                <option value="popularity">POPULARITY</option>
                                <option value="date">NEW PRODUCT</option>
                                <option value="price">PRICE (LOW to HIGH)</option>
                                <option value="price-desc">PRICE (HIGH to LOW)</option>
                            </select>
                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                        <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set
                                Ascending
                                Direction</span></a>
                    </div>
                    <div class="toolbox-item">
                        <div class="toolbox-item toolbox-show">

                            <label>Showing 0-0 of 0 results</label>

                        </div>
                        <div class="layout-modes">
                            <a href="category.php" class="layout-btn btn-grid active" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="category-list.php" class="layout-btn btn-list" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                    </div>
                    <div class="toolbox-item">
                    </div>
                </nav>
            </div> -->


    <!-- <div class="col-12">
                <div id="content" class="my-5">
                    <div id="filterbar" class="collapse">
                        <div class="box border-bottom">
                            <div class="form-group text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-success form-check-label"> <input class="form-check-input"
                                            type="radio"> Đặt lại </label>
                                    <label class="btn btn-success form-check-label active"> <input
                                            class="form-check-input" type="radio" checked> Áp dụng </label>
                                </div>
                            </div>
                            <div> <label class="tick">Hàng mới <input type="checkbox" checked="checked"> <span
                                        class="check"></span> </label> </div>
                            <div> <label class="tick">Sale sốc <input type="checkbox"> <span class="check"></span>
                                </label>
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Phân loại <button
                                    class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box"
                                    aria-expanded="false" aria-controls="inner-box" id="out" onclick="outerFilter()">
                                    <span class="fas fa-plus"></span> </button> </div>
                            <div id="inner-box" class="collapse mt-2 mr-1">
                                <div class="my-1"> <label class="tick">Mainboard <input type="checkbox"
                                            checked="checked">
                                        <span class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Bộ nhớ SSD <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Bộ nhớ HDD <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">CPU <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Sound Card <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">VGA <input type="checkbox" checked> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Case <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Keo tản nhiệt <input type="checkbox" checked>
                                        <span class="check"></span> </label> </div>
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Bộ lọc 2 <button
                                    class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box2"
                                    aria-expanded="false" aria-controls="inner-box2"><span
                                        class="fas fa-plus"></span></button> </div>
                            <div id="inner-box2" class="collapse mt-2 mr-1">
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox" checked="checked">
                                        <span class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox" checked> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Giá <button
                                    class="btn ml-auto" type="button" data-toggle="collapse" data-target="#price"
                                    aria-expanded="false" aria-controls="price"><span
                                        class="fas fa-plus"></span></button>
                            </div>
                            <div class="collapse" id="price">
                                <div class="middle">
                                    <div class="multi-range-slider"> <input type="range" id="input-left" min="0"
                                            max="100" value="10"> <input type="range" id="input-right" min="0" max="100"
                                            value="50">
                                        <div class="slider">
                                            <div class="track"></div>
                                            <div class="range"></div>
                                            <div class="thumb left"></div>
                                            <div class="thumb right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <div> <span id="amount-left" class="font-weight-bold"></span> VND </div>
                                    <div> <span id="amount-right" class="font-weight-bold"></span> VND </div>
                                </div>
                            </div>
                        </div>
                        <-- <div class="box"> -->
    <!-- <div class="box-label text-uppercase d-flex align-items-center">size <button class="btn ml-auto"
                            type="button" data-toggle="collapse" data-target="#size" aria-expanded="false"
                            aria-controls="size"><span class="fas fa-plus"></span></button> </div>
                    <div id="size" class="collapse">
                        <div class="btn-group d-flex align-items-center flex-wrap" data-toggle="buttons"> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox"> 80 </label> <label class="btn btn-success form-check-label">
                                <input class="form-check-input" type="checkbox" checked> 92 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 102 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 104 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 106 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 108 </label> </div>
                    </div>
                    </div>
                </div>
            </div>  -->
    <!-- </div> -->

    <!-- </div> -->
    <?php
    include("include/footer.php");
?>