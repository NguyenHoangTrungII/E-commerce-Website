
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
                        <h2>XÁC NHẬN</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                            <a>Giỏ hàng</a><span>Xác nhận đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="ftco-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-7 ftco-animate">
                    <form action="#" class="billing-form">
                        <h3 class="mb-4 billing-heading">Chi tiết đơn hàng</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Họ</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Tên</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">Địa chỉ</label>
                                    <!-- <div class="icon"><span class="ion-ios-arrow-down"></span></div> -->

                                    <details class="geater-select">
                                        <summary class="radios">
                                            <input type="radio" name="item" id="default" title="Thành phố" checked>
                                            <input type="radio" name="item" id="item1" title="Item 1">
                                            <input type="radio" name="item" id="item2" title="Item 2">
                                            <input type="radio" name="item" id="item3" title="Item 3">
                                            <input type="radio" name="item" id="item4" title="Item 4">
                                            <input type="radio" name="item" id="item5" title="Item 5">
                                        </summary>
                                        <ul class="list-selected">
                                            <li>
                                                <label class="item-list-selected" for="item1">
                                                    Item 1
                                                    <span></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label for="item2">Item 2</label>
                                            </li>
                                            <li>
                                                <label for="item3">Item 3</label>
                                            </li>
                                            <li>
                                                <label for="item4">Item 4</label>
                                            </li>
                                            <li>
                                                <label for="item5">Item 5</label>
                                            </li>
                                        </ul>
                                    </details>

                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data-setbg">Ngày đặt hàng</label>
                                    <input type="datetime-local" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-4 col-md-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Tổng đơn hàng</h3>
                                <p class="d-flex">
                                    <span>Chi phí</span>
                                    <span>200.00đ</span>
                                </p>
                                <p class="d-flex">
                                    <span>Phí vận chuyển</span>
                                    <span>0đ</span>
                                </p>
                                <p class="d-flex">
                                    <span>Giảm giá</span>
                                    <span>50.00đ</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Tổng</span>
                                    <span>150.00đ</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading payment mb-4">Phương thức thanh toán</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Trực tiếp thẻ tín
                                                dụng</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Trả sau</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2"> Tôi chấp nhận với mọi
                                                điều khoản</label>
                                        </div>
                                    </div>
                                </div>
                                <p><a href="#" class="btn btn-primary btn-cart py-3 px-4">Đặt hàng</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .col-md-8 -->
            </div>
        </div>
    </section>
    <!-- .section -->

<?php
    include("include/footer.php");
?>