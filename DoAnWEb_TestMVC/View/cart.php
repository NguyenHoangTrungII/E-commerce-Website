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
                        <h2>GIỎ HÀNG</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="ftco-section ftco-cart pt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table" d="cart-gym">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="product-remove"><a href=""><i class="trash-icon fa-solid fa-x"></i></a>
                                    </td>

                                    <td class="img-product-cart">
                                        <img src="./assets/img/homepage/product-card.jpg" alt="">
                                    </td>

                                    <td class="product-name">
                                        <h3>Loại sản phẩm</h3>
                                        <p>Tên sản phẩm</p>
                                    </td>

                                    <td class="price">10000</td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number" value="1" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total">100000</td>
                                </tr><!-- END TR-->

                                <tr class="text-center">
                                    <td class="product-remove"><a href=""><i class="fa-solid fa-x"></i></a></td>

                                    <td class="img-product-cart">
                                        <img src="./assets/img/homepage/product-card.jpg" alt="">
                                    </td>

                                    <td class="product-name">
                                        <h3>Loại sản phẩm</h3>
                                        <p>Tên sản phẩm</p>
                                    </td>

                                    <td class="price">20000</td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number" value="1" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total">100000</td>
                                </tr><!-- END TR-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Mã giảm giá</h3>
                        <form action="#" class="info">
                            <div class="form-group">
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary btn-cart">Áp dụng</a></p>
                </div>
                <!-- <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">State/Province</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">Zip/Postal Code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
                </div> -->
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tổng chi phí</h3>
                        <p class="d-flex total__product-price">
                            <span>Phí hàng</span>
                            <span>100.00đ</span>
                        </p>
                        <p class="d-flex">
                            <span>Phí vận chuyển</span>
                            <span>0đ</span>
                        </p>
                        <p class="d-flex">
                            <span>Giảm giá</span>
                            <span>50.000đ</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Tổng</span>
                            <span>150.000đ</span>
                        </p>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary btn-cart py-3 px-4">Xác nhận</a></p>
                </div>
            </div>
        </div>
    </section>

<?php
    include("include/footer.php");
?>