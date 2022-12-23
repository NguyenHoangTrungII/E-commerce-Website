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

    //Lấy địa chỉ nhận hàng



?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="../assets/img/login/backgroup_login_SignUp.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>XÁC NHẬN</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                            <a>Giỏ hàng</a><span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
<body>
    <div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-8">
						<div class="mb-4">
							<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
						</div>
						
						<h3 class="pb-5">THÔNG TIN ĐƠN HÀNG</h3>

                        <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                                This is a danger dismissible alert — check it out!
                        </div>



                        <div class="alert alert-info alert-dismissible" role="alert" hidden >
                                    This is an info dismissible alert — check it out!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <table class="table table" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sản phẩm</th>
                                    <th class="text-center">Gía</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody id="cart-table-detail">
                                <?php 
                                        if(isset($cartDetail)){
                                        foreach($cartDetail as $eachProduct){
                                            echo 
                                                '<tr class="text-center">
                                                    <td class="product-remove">
                                                    '.$eachProduct['idsp'].'
                                                    </td>
                
                                                    <td id ="'.$eachProduct['idsp'].'" class="product-name">
                                                        <h3>'.$eachProduct['tendanhmuc'].'</h3>
                                                        <p>'.$eachProduct['tensp'].'</p>
                                                    </td>
                
                                                    <td class="price">'.$controller->currency_format($eachProduct['giagoc']*$eachProduct['phantram']).'</td>
                
                                                    <td class="quantity">
                                                        <div class="buttons_added">
                                                            <input class="minus is-form" type="button" value="-" style="background-color: #FFF" hidden>
                                                            <input aria-label="quantity" class="input-qty" max="100" min="1" name="" type="number"
                                                                value="'.$eachProduct['soluongsp'].'" style="background-color: #FFF; border: 0px solid #fff; width:50px">
                                                            <input class="plus is-form" type="button" value="+" style="background-color: #FFF" hidden>
                                                        </div>
                                                    </td>
                                                    <td class="total">'.$controller->currency_format($eachProduct['giagoc']*$eachProduct['phantram']*$eachProduct['soluongsp']).'</td>
                                                </tr>
                                                ';
                                        }
                                        }
                                    ?>					
                            </tbody>
                        </table>

                        <div class="row">
					<div class="col-md-8 col-xs-7 payment-method">
                        <div>
                            <h3 class="pb-3">Địa chỉ nhận hàng</h3>
                            <div class="shipping-step-addresses">
                                <div class="shipping-address-box active" style="width: 100%;   height: 140px;">
                                    <ul class="text-justify pt-3" style="font-size: 14px;">
                                        <li>
                                            <span class="address-provice">aaaaaaaaaa</span>
                                            <sapn class="address-district">aaaaaaaa aaaaaa</sapn>
                                            <span class="address-town">Bangladesh</span>
                                        </li>
                                        <li class="address-detail">aaaaaaaaaaa</li>									
                                    </ul>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-md-4 col-xs-5 invoice-block pull-right">
						<ul class="unstyled amounts">
							<li><span>Tiền hàng : </span><span class="total-price-product"><?= $controller->currency_format($heroBannerController->totalCart($cartDetail)) ?></span></li>
							<li>Phí vận chuyển : <span class="shipping-free">0đ</span></li>
							<li>Phí giảm giá: <span class="discount-price">0đ</span></li>
							<li class="grand-total">Tổng tiền :<span class="total-order-finish">150.000đ</span>
</li>
						</ul>
					</div>
				</div>
                        <hr>
					</div>
					<div class="col-lg-4">
						<div class="mb-4">
							<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
						</div>
						<h3 class="pb-5"> Phương thức thanh toán</h3>
						<table  class="table-rowbreak" style="width:100%">
							<tbody>
                                <tr>
                                    <span>Thanh toán bằng paypal</span>
                                    <div id="paypal-button-container"></div>
                                </tr>

                                <tr >
                                    <span>
                                        Thanh toán bằng VNPAY
                                    </span>  
                                    <div class="py-3">
                                        <form action="http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Payment/VNPAY/create_payment.php" id="create_form" method="post">   
                                                <input type="text" class="total-hidden" name="total-hidden" hidden>
                                                <input type="text" class="shipfee-hidden" name="shipfee-hidden" hidden>
                                                <input type="text" class="discount-hidden" name="discount-hidden" hidden>
                                                <input type="text" class="total-producPrice-hidden" name="total-producPrice-hidden" hidden>
                                                <input type="text" class="note-order" name="ghichu" hidden>
                                                <input type="text" class="phone-number" name="sdt" hidden>
                                                <input type="text" class="provice-order" name="tinh_thanhpho" hidden>
                                                <input type="text" class="district-order" name="quan_huyen" hidden>
                                                <input type="text" class="town-order" name="phuong_xa" hidden>
                                                <input type="text" class="address-order" name="diachi" hidden>


                                                <button type="submit" name="redirect" id="redirect" class="btn btn-primary btn-block" style="height:46px; font-size: 19px">Thanh toán</button>
                                        </form> 
                                    </div>
                                </tr>

                                <tr>
                                    <span>
                                        Thanh toán bằng MOMO
                                    </span>

                                    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Payment/MOMO/MOMO_QR.php">
                                        <button type="submit" class="btn btn-primary btn-block" style="height:46px; font-size: 19px;background-color:#D82D88;border-color:#D82D88">
                                        <!-- <img src="../assets//img/svg_momo/momo_circle_pinkbg.svg" alt="" style="width: 35px; padding-right:10px"> -->
                                            Mã QR
                                        </button>
                                    </form>
                                   
                                    <div class="py-3">
                                        <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"  action="http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Payment/MOMO/MOMO_ATM.php">
                                                <input type="text" class="total-hidden" name="total-hidden" hidden>
                                                <input type="text" class="shipfee-hidden" name="shipfee-hidden" hidden>
                                                <input type="text" class="discount-hidden" name="discount-hidden" hidden>
                                                <input type="text" class="total-producPrice-hidden" name="total-producPrice-hidden" hidden>
                                                <input type="text" class="note-order" name="ghichu" hidden>
                                                <input type="text" class="phone-number" name="sdt" hidden>
                                                <input type="text" class="provice-order" name="tinh_thanhpho" hidden>
                                                <input type="text" class="district-order" name="quan_huyen" hidden>
                                                <input type="text" class="town-order" name="phuong_xa" hidden>
                                                <input type="text" class="address-order" name="diachi" hidden>
                                            <button type="submit" class="btn btn-primary btn-block" style="height:46px; font-size: 19px;background-color:#D82D88;border-color:#D82D88">ATM</button>
                                        </form>

                                        
                                    </div>
                                    
                                </tr>

                                
                                <tr>
                                    <td>
                                        <div class="pb-3">
                                            <!-- <form method="post" > -->
                                                <div class="form-group-custom-control pb-5" >
                                                    <div class="custom-control custom-checkbox pb-3">
                                                        <!-- <input type="checkbox" name="payment_values" value="1" class="cash-on-dilevery-cb custom-control-input" id="address-save"> -->
                                                        <label class="custom-control-label" for="address-save">Thanh toán khi nhận hàng</label>
                                                    </div>

                                                    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"  action="http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Payment/COD/cash-on-delivery.php">
                                                        <input type="text" class="total-hidden" name="total-hidden" hidden>
                                                        <input type="text" class="shipfee-hidden" name="shipfee-hidden" hidden>
                                                        <input type="text" class="discount-hidden" name="discount-hidden" hidden>
                                                        <input type="text" class="total-producPrice-hidden" name="total-producPrice-hidden" hidden>
                                                        <input type="text" class="note-order" name="ghichu" hidden>
                                                        <input type="text" class="phone-number" name="sdt" hidden>
                                                        <input type="text" class="provice-order" name="tinh_thanhpho" hidden>
                                                        <input type="text" class="district-order" name="quan_huyen" hidden>
                                                        <input type="text" class="town-order" name="phuong_xa" hidden>
                                                        <input type="text" class="address-order" name="diachi" hidden>
                                                        <button type="submit" name="cash_on_delivery" class="cash-on-dilevery btn btn-block btn-sm btn-primary " style="width:100%; height:46px;font-size:19px;">Xác nhận</button>
                                                    </form>
                                                    
                                                    <!-- <button type="button" name="cash_on_delivery" class="cash-on-dilevery btn btn-block btn-sm btn-primary " style="width:100%; height:46px;font-size:19px;">Xác nhận</button> -->
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


<?php
    include("include/footer.php");
?>




<!-- <script>
    $('.cash-on-dilevery').on('click', function(){
        if($('.cash-on-dilevery-cb').checked){


        }
        else{
            $('.alert.alert-danger.alert-dismissible').text("Vui lòng chọn hình thức thanh toán");
            $('.alert.alert-info.alert-dismissible').prop('hidden', true);
            $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
            $("html, body").animate({scrollTop: 0}, 10000);
        }
    })
</script> -->

<script>
    var myData = JSON.parse(localStorage['address_customer']);
    // localStorage.removeItem( 'address_customer' );
    // JSON.parse(data)
    // console.debug(myData['diachi']);
    $('.address-provice').html(myData['tinh_thanhpho'] + " - ");
    $('.address-district').html(myData['quan_huyen']  + " - ");
    $('.address-town').html(myData['phuong_xa']);
    $('.address-detail').html(myData['diachi']);
    $('.note-order').attr("value", myData['ghichu']);
    $('.phone-number').attr("value", myData['sdt']);
    $('.provice-order').attr("value", myData['tinh_thanhpho']);
    $('.district-order').attr("value", myData['quan_huyen']);
    $('.town-order').attr("value", myData['phuong_xa']);
    $('.address-order').attr("value", myData['diachi']);

</script>

<!-- set thông tin cho bảng giá -->
<script>

    var historyPrice = JSON.parse(localStorage['history-cart-price']);
    $('.total-price-product').html(historyPrice['total_price_product']);
    $('.shipping-free').html(historyPrice['ship_fee']);
    $('.discount-price').html(historyPrice['discount']);
    $('.total-order-finish').html(historyPrice['total_price_order']);
    $('.total-hidden').attr("value", historyPrice['total_price_order'].replace(/\D/g, ""));
    $('.shipfee-hidden').attr("value", historyPrice['ship_fee'].replace(/\D/g, ""));
    $('.total-producPrice-hidden').attr("value", historyPrice['total_price_product'].replace(/\D/g, ""));
    $('.iscount-hidden').attr("value", historyPrice['discount'].replace(/\D/g, ""));
</script>

<script>
</script>

<script>

    var   tongtien = parseFloat($('.total-order-finish').text().replace(/\D/g, "")) ;
    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: tongtien/24000
            }
          }]
        });
      },
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
        //   alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

          //Lấy giá trị cần thiết để insert vào đơn hàng
          var total_hidden = $('.total-hidden').val();
          var total_producPrice_hidden = $('.total-producPrice-hidden').val();
          var  discount_hidden = $('.discount-hidden').val();
          var  shipfee_hidden = $('.shipfee-hidden').val();
          var  ghichu = $('.note-order').val();
          var sdt = $('.phone-number').val();
          var tinh_thanhpho = $('.provice-order').text();
          var quan_huyen = $('.district-order').text();
          var phuong_xa = $('.town-order').text();

          $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Payment/PAYPAL/create_order.php",
            type: 'POST',
            data:{
                total_hidden:total_hidden,
                total_producPrice_hidden: total_producPrice_hidden,
                discount_hidden: discount_hidden,
                shipfee_hidden:shipfee_hidden,
                ghichu: ghichu,
                sdt:sdt,
                tinh_thanhpho:tinh_thanhpho,
                quan_huyen: quan_huyen,
                phuong_xa:phuong_xa
            },
            dataType: "text",
            success: function(data){ 
                if(data==1){
                    window.location.href="http://localhost/DoAnWeb/DoAnWeb_testMVC/View/invoice.php";
                }
            } 
        });

          
        });
      }
    }).render('#paypal-button-container');

</script>

<script>
    $('.momo-payment').on('click', function(){
        
        $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Payment/MOMO/MOMO_QR.php",
            data: {flag: 1},
            type: 'POST',
            dataType: "text",
            success: function(data){ 
                // if(data==1){
                    // $('.alert.alert-info.alert-dismissible').text("Cập nhật mật khẩu thành công");
                    // $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    // $('.alert.alert-info.alert-dismissible').prop('hidden', false);

                    // setTimeout(function(){
                    // $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    // window.location.href="http://localhost/DoAnWeb/DoAnWeb_testMVC/View/login.php";

                    // }, 2000);

                    
                // }
                // else{
                    // $('.alert.alert-danger.alert-dismissible').text(data);
                    // $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    // $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                // }
            } 
        });
    })
</script>

<script>
    $('.vnpay-payment').on('click', function(){
        
        $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Payment/VNPAY/create_payment.php",
            data: {redirect: 1},
            type: 'POST',
            dataType: "text",
            success: function(data){ 
                if(data==1){
                    $('.alert.alert-info.alert-dismissible').text("Cập nhật mật khẩu thành công");
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-info.alert-dismissible').prop('hidden', false);

                    setTimeout(function(){
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    window.location.href="http://localhost/DoAnWeb/DoAnWeb_testMVC/View/login.php";

                    }, 2000);

                    
                }
                else{
                    $('.alert.alert-danger.alert-dismissible').text(data);
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                }
            } 
        });
    })
</script>

<style>
    .shipping-address-box.active {
    border: 1px solid #33A0FF;
}

.shipping-address-box ul{
    padding-left: 10px !important;
}

</style>

