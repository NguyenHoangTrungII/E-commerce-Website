<?php
    include("include/top.php");
?>

<?php 
    //Lấy thông tin giỏ hàng
    //Lấy số sản phẩm đã bán
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']= "sanpham.anh anhsp";
    $columnName['2']= "sanpham.tensp tensp";
    $columnName['3']= "sanpham.giagoc giagoc";
    $columnName['4']= "sanpham.phantram phantram";
    $columnName['5']= "danhmucsp.ten tendanhmuc";
    $columnName['6']= "ct_giohang.soluong soluongsp";
    $columnName['7']= "sanpham.id idsp";




    $tableName['MAIN'] = "giohang";
    $tableName['1'] ='ct_giohang';
    $tableName['2'] ='sanpham';
    $tableName['3'] ='danhmucsp';
    $whereValue['giohang.id_user'] = $_SESSION['SSCF_login_id'];

    $joinCondition = array ("1"=>array ('giohang.id', 'ct_giohang.id_giohang'), "2"=>array('ct_giohang.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'));

    $cartDetail = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);

    // var_dump($cartDetail);

?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="../assets/img/login/backgroup_login_SignUp.jpg">
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
        <div class="container-lg">
            <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                This is a danger dismissible alert — check it out!
            </div>

            <div class="alert alert-info alert-dismissible" role="alert"  hidden>
                This is an info dismissible alert — check it out!
            </div>
            <div class="row">
                <div class="col-xl-12 ftco-animate">
                    <div class="cart-list" style="max-height: 300px;">
                        <table class="table" d="cart-gym">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Câp nhật</th>
                                </tr>
                            </thead>
                            <tbody id="cart-table-detail">
                                <?php 
                                    if(isset($cartDetail)){
                                       foreach($cartDetail as $eachProduct){
                                        echo 
                                            '<tr class="text-center">
                                                <td class="product-remove"><a class="remove-product-cart" ><i class="trash-icon fa-solid fa-x"></i></a>
                                                </td>
            
                                                <td class="img-product-cart">
                                                    <img src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$eachProduct['tendanhmuc']."/"."thumbnail/".$eachProduct['anhsp'].'" alt="">
                                                </td>
            
                                                <td id ="'.$eachProduct['idsp'].'" class="product-name">
                                                    <h3>'.$eachProduct['tendanhmuc'].'</h3>
                                                    <p>'.$eachProduct['tensp'].'</p>
                                                </td>
            
                                                <td class="price">'.$controller->currency_format($eachProduct['giagoc']*$eachProduct['phantram']).'</td>
            
                                                <td class="quantity">
                                                    <div class="buttons_added">
                                                        <input class="minus is-form" type="button" value="-" style="background-color: #FFF">
                                                        <input aria-label="quantity" class="input-qty" max="100" min="1" name="" type="number"
                                                            value="'.$eachProduct['soluongsp'].'" style="background-color: #FFF">
                                                        <input class="plus is-form" type="button" value="+" style="background-color: #FFF">
                                                    </div>
                                                </td>
                                                <td class="total">'.$controller->currency_format($eachProduct['giagoc']*$eachProduct['phantram']*$eachProduct['soluongsp']).'</td>
                                                <td>
                                                    <button type="button" class="update-cart btn btn-outline-primary">Cập nhật</button>
                                                </td>
                                            </tr>
                                            ';
                                       }
                                    }
                                ?>
                                </tr>
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
                                <input type="text" class="coupon-code-customer form-control text-left px-3" placeholder="Nhập mã giảm giá">
                            </div>
                        </form>
                    </div>
                    <p><a  class="apply-coupon btn btn-primary btn-cart" style="color:#FFFF">Áp dụng</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Ước lượng phí vận chuyển</h3>
                        <p>Lựa chọn nơi nhận hàng để ước lượng phí vận chuyển</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Nơi Nhận</label>
                                <select class="selected-arrive form-select" aria-label="Default select example" style="height: 50px;">
                                    <option selected value="0">Chọn nơi nhận</option>
                                    <option value="1">Thành phố Hồ Chí Minh</option>
                                    <option value="2">Khác</option>
                                </select>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tổng chi phí</h3>
                        <p class="d-flex total__product-price">
                            <span>Phí hàng</span>
        
                            <span class="total-price-product"><?= $controller->currency_format($heroBannerController->totalCart($cartDetail)) ?></span>
                        </p>
                        <p class="d-flex">
                            <span>Phí vận chuyển</span>
                            <span class="shipping-free">0đ</span>
                        </p>
                        <p class="d-flex">
                            <span>Giảm giá</span>
                            <span class="discount-price">0đ</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Tổng</span>
                            <span class="total-order-finish">150.000đ</span>
                        </p>
                    </div>
                    <p><a class="checkout-btn btn btn-primary btn-cart py-3 px-4" style="color: #FFFF">Xác nhận</a></p>
                </div>
            </div>
        </div>
    </section>

<?php
    include("include/footer.php");
?>

<script>
    function checkCoupon(){
        var makm = $('.coupon-code-customer').val();
        var tongtien = $('.total-order-finish').val();
        $.ajax({
            url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Coupon/processConpon.php',
            type: 'POST',
            data: {makm: makm,
                    tongtien: tongtien},
            success: function(response) {
                if(response == 1){
                    $('.shipping-free').html("0đ")
                    update_total_price();
                    $('.alert.alert-info.alert-dismissible').text("Đơn của bạn đã được miễn phí vận chuyển");
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                    setTimeout(function(){
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    }, 2000);
                   
                }
                else if( response > 1){
                    //Cập nhật lại tiền
                    const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
                    const money_format_discount = new Intl.NumberFormat('vi-VN', config).format(parseFloat(response));
                    $('.discount-price').html(money_format_discount);
                    update_total_price();
                    $('.alert.alert-info.alert-dismissible').text("Đơn của bạn đã được trừ "+money_format_discount+" vào đơn hàng");
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                    setTimeout(function(){
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    }, 2000);
                    
                }
                else{
                    $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                    // $("html, body").animate({scrollTop: 50}, 1000);
                    setTimeout(function(){
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    }, 2000);
                }
            }
		});
    }

    $('.apply-coupon ').on('click', function(){
        
        checkCoupon();
    })
</script>

<script>
    update_total_price();

    function curren_price_update(e){
        var qty = price = 0;
        var price = e.parent().parent().parent().find('.price').text().replace(/\D/g, "");
        console.debug(e);
        var qty = e.parent().parent().find('.input-qty').val();
        var current_price = parseInt(qty)  * parseInt(price) ;
        const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
        const money_total = new Intl.NumberFormat('vi-VN', config).format(current_price);
        e.parent().parent().parent().find('.total').html(money_total);
    }

    function update_total_price(){
        var total = 0;
        $('#cart-table-detail').find('.total').each(function(i, elm){
            total += parseInt($(elm).text().replace(/\D/g, ""));
        })

        const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
        const total_money = new Intl.NumberFormat('vi-VN', config).format(total);

        $('.total-price-product').html(total_money);

        //update tổng hàng
        var discount  =  parseInt($('.discount-price').text().replace(/\D/g, ""));
        var shipp = parseInt($('.shipping-free').text().replace(/\D/g, ""));
        total_other_fee = shipp - discount;
        const total_order_money = new Intl.NumberFormat('vi-VN', config).format(total+total_other_fee);
        $('.total-order-finish').html(total_order_money);

    }

    $('.plus').on('click', function(){
        curren_price_update($(this));
        update_total_price();
    })

    $('.minus').on('click', function(){
        curren_price_update($(this));
        update_total_price();

    })

     $('.input-qty').on('change', function(){
        curren_price_update($(this));
        update_total_price();
        $(this).parent().parent().find('.input-qty').attr('value', qty);
        
     })



    $('.update-cart').on('click', function(){
        var id_product = $(this).parent().parent().find('.product-name').attr('id');
        var qty_change = $(this).parent().parent().find('.quantity').find('.input-qty').val();

        // console.debug(qty_change);

        $.ajax({
            url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Cart/update-qty-cart.php',
            type: 'POST',
            data: {id_product: id_product,
                    qty_change: qty_change},
            success: function(response) {
                if(response != -1){
                    $('.alert.alert-info.alert-dismissible').text("Cập nhật thông tin thành công");
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                    setTimeout(function(){
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    }, 2000);
                   
                }
                else{
                    $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                    setTimeout(function(){
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    }, 2000);
                }
            }
		});
    })
</script>

<script>
    $('.selected-arrive').on('change', function(){
        // checkCoupon();
        var selected_elm = $(".selected-arrive option:selected" ).val() ;
        var discount = $('.discount-price').text().replace(/\D/g, "");
        if(selected_elm == 1){
            var free_ship = 50000;
            var total_order = parseInt($('.total-price-product').text().replace(/\D/g, ""));
            const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
            const free_ship_money = new Intl.NumberFormat('vi-VN', config).format(free_ship);
            const discount_money = new Intl.NumberFormat('vi-VN', config).format(discount);
            const total_order_money = new Intl.NumberFormat('vi-VN', config).format(total_order + parseInt(free_ship) );
            $('.shipping-free').html(free_ship_money);
            $('.total-order-finish').html(total_order_money);
        }
        else if(selected_elm==2){
            var free_ship = 60000;
            var total_order = parseInt($('.total-price-product').text().replace(/\D/g, ""));
            const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
            const free_ship_money = new Intl.NumberFormat('vi-VN', config).format(free_ship);
            const discount_money = new Intl.NumberFormat('vi-VN', config).format(discount);
            const total_order_money = new Intl.NumberFormat('vi-VN', config).format(total_order + parseInt(free_ship));
            $('.shipping-free').html(free_ship_money);
            $('.total-order-finish').html(total_order_money);
        }
        else{
            var free_ship = 0;
            var total_order = parseInt($('.total-price-product').text().replace(/\D/g, ""));
            const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
            const free_ship_money = new Intl.NumberFormat('vi-VN', config).format(free_ship);
            const discount_money = new Intl.NumberFormat('vi-VN', config).format(discount);
            const total_order_money = new Intl.NumberFormat('vi-VN', config).format(total_order + parseInt(free_ship));
            $('.shipping-free').html(free_ship_money);
            $('.total-order-finish').html(total_order_money);
        }

        update_total_price();
    })

    $('.checkout-btn').on('click', function(){
        var selected_elm = $(".selected-arrive option:selected" ).val() ;
        var historyPrice = {};
       historyPrice['total_price_product'] = $('.total-price-product').text();
       historyPrice['ship_fee'] = $('.shipping-free').text();
       historyPrice['discount'] = $('.discount-price').text();
       historyPrice['total_price_order'] = $('.total-order-finish').text();

        if(selected_elm == 0){
            $('.alert.alert-danger.alert-dismissible').text("Vui lòng nhập địa chỉ để ước lượng phí ship");
            $('.alert.alert-info.alert-dismissible').prop('hidden', true);
            $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
            $("html, body").animate({scrollTop: 0}, 1000);
        }
        else{
            var myJSON2 = JSON.stringify(historyPrice);
            localStorage.setItem( 'history-cart-price', myJSON2 );
            window.location.href="http://localhost/DoAnWeb/DoAnWeb_testMVC/View/checkout.php";
        }
    })
</script>

<script>
    $('.remove-product-cart').on('click', function(){
        var id_product = $(this).parent().parent().find('.product-name').attr('id');
        var elm = $(this).parent().parent();
        var product_price_remove = $(this).parent().parent().find('.total').text();
        // alert(product_price_remove);
        // console.debug(id_product);
        Swal.fire({
        title: 'Bạn có muốn xóa sản phẩm này ra khỏi giỏ  hàng?',
        text: "Sản phẩm sẽ biến mất khỏi giỏ hàng của bạn",
        icon: 'Cảnh báo',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Cart/delete-product-cart.php',
                type: 'POST',
                data: {id_product: id_product},
                success: function(response) {
                    if(response != -1){
                        $('.alert.alert-info.alert-dismissible').text("Xóa sản phẩm thành công");
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                        elm.slideToggle('slow');
                        elm.remove();

                        update_total_price();


                        setTimeout(function(){
                            $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        }, 2000)

                    }
                    else{
                        $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                        setTimeout(function(){
                            $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        }, 2000)
                    }
                }
            });
        } 
    })
})
</script>