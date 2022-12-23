
<?php
    // session_start();
    include("include/top.php");
    // include("include/Silder.php");
?>

<?php 
    //Kiểm tra xem khách hàng đã có địa chỉ nhận hàng chưa, nếu có load dữ liệu để khách hàng kiểm tra và cập nhật, nếu không lấy dữ liệu mới nhập và update vào tài khoản
    //Lưu ý, tất cả các miền giá trị đều bắt buộc trừ ghi chú

    //Kiểm tra
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $tableName='nguoidung';
    $columnName['1']= "diachi";
    $columnName['2']= "tinh_thanhpho";
    $columnName['3']= "quan_huyen";
    $columnName['4']= "phuong_xa";
    $columnName['5']= "sdt";
    $whereValue['id '] = $_SESSION['SSCF_login_id'];

    $adressUser = $Model->selectData($columnName, $tableName, $whereValue);
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
                            <a>Giỏ hàng</a><span>Xác nhận đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    

    <section class="ftco-section pt-4 p-3">
        <div class="container">
            <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                    This is a danger dismissible alert — check it out!
            </div>

            <div class="alert alert-info alert-dismissible" role="alert"  >
                Chào <span>Nguyễn Trung</span>, vui lòng điền đầy đủ thông tin nhận hàng hoàn tất quá trình đặt hàng.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-info alert-dismissible" role="alert" hidden >
                        This is an info dismissible alert — check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-7 ftco-animate">
                    <form action="#" class="">
                        <h3 class="mb-4 billing-heading">Chi tiết đơn hàng</h3>
                        
                        <hr>
                        <br>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-default-phone">Số điện
                                        thoại liên hệ</label>
                                    <input type="text" id="basic-default-phone" class="phone-address-order form-control phone-mask"
                                        placeholder="0123456789" value="<?= $adressUser[0]['sdt'] ?>" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Provice" class="form-label">Tỉnh/Thành
                                        phố</label>
                                    <select id="Provice" class="form-select" style="width:100%;">
                                        <option value="0"><?= $adressUser[0]['tinh_thanhpho'] ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="District" class="form-label">Quận/Huyện</label>
                                    <select id="District" class="form-select" style="width:100%;">
                                        <option value="0"><?= $adressUser[0]['quan_huyen'] ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Town" class="form-label">Phường/Xã</label>
                                    <select id="Town" class="form-select" style="width:100%;">
                                        <option value="0"><?= $adressUser[0]['phuong_xa'] ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Ghi chú</label>
                                    <textarea id="basic-default-message" class="note-order form-control"
                                        placeholder="Nhập ghi chú khi đơn hàng" style="height: 75px"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Địa chỉ</label>
                                    <textarea id="basic-default-message" class="address-order form-control"
                                        placeholder="Địa chỉ" style="height: 200px"><?= $adressUser[0]['diachi'] ?></textarea>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            
                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-4 col-md-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Tổng đơn hàng</h3>
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

                                <p><a class="next-payment btn btn-primary btn-cart py-3 px-4" style="color:#FFF">THANH TOÁN</a></p>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- .col-md-8 -->
            </div>
        </div>
    </section>
<?php
    include("include/footer.php");
?>

<script>
    $(document).ready(function() {

        $('#Provice').select2(
        {
            width: 'resolve'
        }
        );

        $('#District').select2(
        {
            width: 'resolve'
        }
        );

        $('#Town').select2(
        {
            width: 'resolve'
        }
        );

    });
</script>

<!-- set thông tin cho bảng giá -->
<script>
     
     setPrice();

    function total_AfterUpdate(){
        var total_product = parseInt($('.total-price-product').text().replace(/\D/g, "")); 
        var total_ship = parseInt($('.shipping-free').text().replace(/\D/g, "")); 
        var  total_discount= parseInt($('.discount-price').text().replace(/\D/g, "")); 
        const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
        const total = new Intl.NumberFormat('vi-VN', config).format(total_product  + total_ship - total_discount);
        return total;
    }



    function setPrice(){
        var tinh_thanhpho = ($( "#Provice option:selected" ).text());
        let fee_ship;
        var historyPrice = JSON.parse(localStorage['history-cart-price']);
        
        if(parseFloat(historyPrice['ship_fee'].replace(/\D/g, ""))  >  0){
            if(tinh_thanhpho=="Thành phố Hồ Chí Minh" ){
                const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
                fee_ship = new Intl.NumberFormat('vi-VN', config).format(50000);}
            else{
                const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
                 fee_ship = new Intl.NumberFormat('vi-VN', config).format(60000);
            }


            var historyPrice = JSON.parse(localStorage['history-cart-price']);
            $('.total-price-product').html(historyPrice['total_price_product']);
            $('.shipping-free').html(fee_ship);
            $('.discount-price').html(historyPrice['discount']);
            $('.total-order-finish').html(total_AfterUpdate());
            localStorage.removeItem("history-cart-price");

            

        }
        else if(parseFloat(historyPrice['ship_fee'].replace(/\D/g, ""))  ==0 ){
            var historyPrice = JSON.parse(localStorage['history-cart-price']);
            $('.total-price-product').html(historyPrice['total_price_product']);
            $('.shipping-free').html("0đ");
            $('.discount-price').html(historyPrice['discount']);
            $('.total-order-finish').html(total_AfterUpdate());
            localStorage.removeItem("history-cart-price");

            

        }
        else{
            if(tinh_thanhpho=="Thành phố Hồ Chí Minh" ){
            const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
            const fee_ship = new Intl.NumberFormat('vi-VN', config).format(50000);
           
            $('.shipping-free').html(fee_ship);
            $('.total-order-finish').html(total_AfterUpdate());


        }
        else{
            const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
            const fee_ship = new Intl.NumberFormat('vi-VN', config).format(60000);
            $('.shipping-free').html(fee_ship);
            $('.total-order-finish').html(total_AfterUpdate());
        }
        }
    }

   


    // if(localStorage['history-cart-price'] != "")
    // {
    //     var historyPrice = JSON.parse(localStorage['history-cart-price']);
    //     console.debug(historyPrice);
    //     $('.total-price-product').html(historyPrice['total_price_product']);
    //     $('.shipping-free').html(historyPrice['ship_fee']);
    //     $('.discount-price').html(historyPrice['discount']);
    //     $('.total-order-finish').html(historyPrice['total_price_order']);
    // }
    // else{
    // }


</script>



<script>
    function checkAdress(data_value, data_text){
        var data;
        if(data_value == -1 ){
            data="";
        } else{
            data= data_text;
        }
        return data;
    }

    $('.next-payment').on('click', function(){
        var  address_customer = {};
        address_customer['sdt']= $('.phone-address-order').val();
        address_customer['tinh_thanhpho'] = checkAdress($( "#Provice option:selected" ).val(), $( "#Provice option:selected" ).text());
        address_customer['quan_huyen'] = checkAdress($( "#District option:selected" ).val(), $( "#District option:selected" ).text());
        address_customer['phuong_xa'] = checkAdress($( "#Town option:selected" ).val(), $( "#Town option:selected" ).text());
        address_customer['ghichu']= $('.note-order').val();
        address_customer['diachi']= $('.address-order').val();

        var historyPrice = {};
       historyPrice['total_price_product'] = $('.total-price-product').text();
       historyPrice['ship_fee'] = $('.shipping-free').text();
       historyPrice['discount'] = $('.discount-price').text();
       historyPrice['total_price_order'] = $('.total-order-finish').text();

        var n =0;
        for (const [key, value] of Object.entries(address_customer)) {
            if(key != 'ghichu'){
                if(value == ""){
                    $('.alert.alert-danger.alert-dismissible').text("Không được bỏ các trường bắt buộc");
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                    $("html, body").animate({scrollTop: 0}, 1000);
                }
                else{
                    n++;
                }
            }
        }

        if(n==5){
            var myJSON = JSON.stringify(address_customer);
            localStorage.setItem( 'address_customer', myJSON );
            var myJSON2 = JSON.stringify(historyPrice);
            localStorage.removeItem( 'history-cart-price' );
            localStorage.setItem( 'history-cart-price', myJSON2 );

            window.location.href="http://localhost/DoAnWeb/DoAnWeb_testMVC/View/payment.php";
        }
    })
</script>

<script>
    $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/LayTinh.php",       
        dataType:'json',         
        success: function(data){     
            $("#Provice").append($('<option>', {value:-1, text:"Chọn tỉnh/thành phố"}));
            for (i=0; i<data.length; i++){            
                var provice = data[i]; 
                
                $('#Provice').append($('<option>', {value:provice['id'], text:provice['name']}));
            }

            $("#Provice").on("change", function(e){
                $("#Town").html("");
                $("#Town").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                var Provice_id = $( "#Provice option:selected" ).val();
                console.log(Provice_id);
                $.ajax({
                    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetDistrict.php?ProviceId=" + Provice_id,
                    dataType:'json',         
                    success: function(data){  
                        $("#District").html("");
                        $("#District").append($('<option>', {value:-1, text:"Chọn quận/huyện"}));
                        
                        for (i=0; i<data.length; i++){            
                        var district = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                        
                        $('#District').append($('<option>', {value:district['id'], text:district['name']}));
                        }  

                        setPrice();
                        
                        $("#District").on("change", function(e){
                            var District_id = $( "#District option:selected" ).val();
                            console.log(District_id);
                            $.ajax({
                                url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetTown.php?DistrictId=" + District_id,
                                dataType:'json',         
                                success: function(data){  
                                    // console.log(data);
                                    $("#Town").html("");
                                    $("#Town").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                                    for (i=0; i<data.length; i++){            
                                    var town = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                                    
                                    $('#Town').append($('<option>', {value:town['id'], text:town['name']}));
                                    }                  
                                }

                    
                             });
                        });
                    }

                    
                });
            });

        }
    });

</script>
