<?php
    include("include/top.php");
    require_once("../Controller/AccountDetails.php");
?>

<?php 
    $accountdeatils = new AccountDetails;
    //Lấy thông tin đơn hàng của khách hàng
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']= "sanpham.anh anhsp";
    $columnName['2']= "sanpham.tensp tensp";
    $columnName['3']= "sanpham.giagoc giagoc";
    $columnName['4']= "sanpham.phantram phantram";
    $columnName['5']= "danhmucsp.ten tendanhmuc";
    $columnName['6']= "ctdh.trangthai tinhtrang";
    $columnName['7']= "sanpham.id idsp";
    $columnName['8']= "ctdh.soluong ";
    $columnName['9']= "ctdh.giasp ";
    $columnName['10']= "donhang.mavanchuyen ";
    $columnName['11'] = "donhang.ngaydat";
    $columnName['12'] = "donhang.id madonhang";
    $columnName['13']= "diachinhanhang.diachi diachi ";


    $tableName['MAIN'] = "donhang";
    $tableName['1'] ='ctdh';
    $tableName['2'] ='sanpham';
    $tableName['3'] ='danhmucsp';
    $tableName['4'] ='diachinhanhang';
    $whereValue['donhang.id_nguoidung'] = $_SESSION['SSCF_login_id'];
    $whereValue['ctdh.trangthai'] = 1;

    $joinCondition = array ("1"=>array ('donhang.id', 'ctdh.id_donhang'), "2"=>array('ctdh.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'), "4"=>array('donhang.id', 'diachinhanhang.id_donhang'));

    $order_ConfirmWaiting = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);


    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']= "sanpham.anh anhsp";
    $columnName['2']= "sanpham.tensp tensp";
    $columnName['3']= "sanpham.giagoc giagoc";
    $columnName['4']= "sanpham.phantram phantram";
    $columnName['5']= "danhmucsp.ten tendanhmuc";
    $columnName['6']= "donhang.trangthai tinhtrang";
    $columnName['7']= "sanpham.id idsp";
    $columnName['8']= "ctdh.soluong ";
    $columnName['9']= "ctdh.giasp ";
    $columnName['10']= "donhang.mavanchuyen ";
    $columnName['11'] = "donhang.ngaydat";
    $columnName['12'] = "donhang.id madonhang";
    $columnName['13']= "diachinhanhang.diachi diachi ";
    $tableName['MAIN'] = "donhang";
    $tableName['1'] ='ctdh';
    $tableName['2'] ='sanpham';
    $tableName['3'] ='danhmucsp';
    $tableName['4'] ='diachinhanhang';
    $whereValue['donhang.id_nguoidung'] = $_SESSION['SSCF_login_id'];
    $whereValue['ctdh.trangthai'] = 2;

    $joinCondition = array ("1"=>array ('donhang.id', 'ctdh.id_donhang'), "2"=>array('ctdh.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'), "4"=>array('donhang.id', 'diachinhanhang.id_donhang'));
    $order_Confirmed = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);


    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']= "sanpham.anh anhsp";
    $columnName['2']= "sanpham.tensp tensp";
    $columnName['3']= "sanpham.giagoc giagoc";
    $columnName['4']= "sanpham.phantram phantram";
    $columnName['5']= "danhmucsp.ten tendanhmuc";
    $columnName['6']= "donhang.trangthai tinhtrang";
    $columnName['7']= "sanpham.id idsp";
    $columnName['8']= "ctdh.soluong ";
    $columnName['9']= "ctdh.giasp ";
    $columnName['10']= "donhang.mavanchuyen ";
    $columnName['11'] = "donhang.ngaydat";
    $columnName['12'] = "donhang.id madonhang";
    $columnName['13']= "diachinhanhang.diachi diachi ";
    $tableName['MAIN'] = "donhang";
    $tableName['1'] ='ctdh';
    $tableName['2'] ='sanpham';
    $tableName['3'] ='danhmucsp';
    $tableName['4'] ='diachinhanhang';
    $whereValue['donhang.id_nguoidung'] = $_SESSION['SSCF_login_id'];
    $whereValue['ctdh.trangthai'] = 3;

    $joinCondition = array ("1"=>array ('donhang.id', 'ctdh.id_donhang'), "2"=>array('ctdh.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'), "4"=>array('donhang.id', 'diachinhanhang.id_donhang'));

    $order_Shipping = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);


    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']= "sanpham.anh anhsp";
    $columnName['2']= "sanpham.tensp tensp";
    $columnName['3']= "sanpham.giagoc giagoc";
    $columnName['4']= "sanpham.phantram phantram";
    $columnName['5']= "danhmucsp.ten tendanhmuc";
    $columnName['6']= "donhang.trangthai tinhtrang";
    $columnName['7']= "sanpham.id idsp";
    $columnName['8']= "ctdh.soluong ";
    $columnName['9']= "ctdh.giasp ";
    $columnName['10']= "donhang.mavanchuyen ";
    $columnName['11'] = "donhang.ngaydat";
    $columnName['12'] = "donhang.id madonhang";
    $columnName['13']= "diachinhanhang.diachi diachi ";
    $tableName['MAIN'] = "donhang";
    $tableName['1'] ='ctdh';
    $tableName['2'] ='sanpham';
    $tableName['3'] ='danhmucsp';
    $tableName['4'] ='diachinhanhang';
    $whereValue['donhang.id_nguoidung'] = $_SESSION['SSCF_login_id'];
    $whereValue['ctdh.trangthai'] = 4;

    $joinCondition = array ("1"=>array ('donhang.id', 'ctdh.id_donhang'), "2"=>array('ctdh.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'), "4"=>array('donhang.id', 'diachinhanhang.id_donhang'));

    $order_Shipped = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);



    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']= "sanpham.anh anhsp";
    $columnName['2']= "sanpham.tensp tensp";
    $columnName['3']= "sanpham.giagoc giagoc";
    $columnName['4']= "sanpham.phantram phantram";
    $columnName['5']= "danhmucsp.ten tendanhmuc";
    $columnName['6']= "donhang.trangthai tinhtrang";
    $columnName['7']= "sanpham.id idsp";
    $columnName['8']= "ctdh.soluong ";
    $columnName['9']= "ctdh.giasp ";
    $columnName['10']= "donhang.mavanchuyen ";
    $columnName['11'] = "donhang.ngaydat";
    $columnName['12'] = "donhang.id madonhang";
    $columnName['13']= "diachinhanhang.diachi diachi ";
    $tableName['MAIN'] = "donhang";
    $tableName['1'] ='ctdh';
    $tableName['2'] ='sanpham';
    $tableName['3'] ='danhmucsp';
    $tableName['4'] ='diachinhanhang';
    $whereValue['donhang.id_nguoidung'] = $_SESSION['SSCF_login_id'];
    $whereValue['ctdh.trangthai'] = 5;
    $joinCondition = array ("1"=>array ('donhang.id', 'ctdh.id_donhang'), "2"=>array('ctdh.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'), "4"=>array('donhang.id', 'diachinhanhang.id_donhang'));

    $order_Cancel = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);

    // var_dump($order_ConfirmWaitin/g);
?>

    <section class=" account-detail-section pt-5">
        <!-- <div class="container"> -->
        <div class="bg-white rounded-lg d-block d-sm-flex">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-3 pb-5">
                        <div class="profile-tab-nav border">
                            <div class="profile-setting">
                                <div class="img-circle text-center mb-3">
                                    <img src="./assets/img/homepage/product-card.jpg" alt="Image" class="shadow">
                                </div>
                                <h4 class="text-center">Nguyễn Hoàng Trung</h4>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a href="#info_account" class="nav-link active" id="account-tab" data-toggle="pill" 
                                    role="tab" aria-controls="account" aria-selected="true">
                                    <i class="fa fa-home text-center mr-1"></i>
                                    Tài khoản
                                </a>
                                <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab"
                                    aria-controls="password" aria-selected="false">
                                    <i class="fa fa-key text-center mr-1"></i>
                                    Mật khẩu
                                </a>
                                <!-- <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab"
                                    aria-controls="security" aria-selected="false">
                                    <i class="fa fa-user text-center mr-1"></i>
                                    Security
                                </a> -->
                                <a class="nav-link" id="application-tab" data-toggle="pill" href="#ordered" role="tab"
                                    aria-controls="application" aria-selected="false">
                                    <i class="fa fa-tv text-center mr-1"></i>
                                    Đơn hàng
                                </a>
                                <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification"
                                    role="tab" aria-controls="notification" aria-selected="false">
                                    <i class="fa fa-bell text-center mr-1"></i>
                                    Thông báo
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-9 pb-5">
                        <div class="tab-content account-details pl-3" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="info_account" role="tabpanel"
                                aria-labelledby="account-tab">
                                <h3 class="mb-4">Cài đặt tài khoản</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group account-deatil">
                                            <label class="form-label" for="basic-default-fullname">Họ
                                                tên</label>
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                                placeholder="Nhập họ và tên" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group account-deatil">
                                            <label class="form-label" for="basic-default-fullname">Tên hiển thị</label>
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                                placeholder="Nhập họ và tên" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="basic-default-email">Email</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-email" class="form-control"
                                                placeholder="diachimail@gmail.com" >
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group account-deatil">
                                                <label class="form-label" for="basic-default-phone">Số điện
                                                    thoại</label>
                                                <input type="text" id="basic-default-phone"
                                                    class="form-control phone-mask" placeholder="0123456789" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="defaultSelect" class="form-label">Tỉnh/Thành
                                                    phố</label>
                                                <select id="defaultSelect" class="form-select">
                                                    <option>Chọn tỉnh/thành phố</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="defaultSelect" class="form-label">Quận/Huyện</label>
                                                <select id="defaultSelect" class="form-select">
                                                    <option>Chọn quận/huyên</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="defaultSelect" class="form-label">Phường/Xã</label>
                                                <select id="defaultSelect" class="form-select">
                                                    <option>Chọn phường/xã</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Địa chỉ</label>
                                                <textarea id="basic-default-message" class="form-control"
                                                    placeholder="Địa chỉ" style="height: 150px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary account-details">Cập nhật</button>
                                        <button class="btn btn-light account-details">Hủy</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                    <h3 class="mb-4">Đặt lại mặt khẩu</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group account-deatil">
                                                <label>Mật khẩu cũ</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group account-deatil">
                                                <label>Mật khẩu mới</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group account-deatil">
                                                <label>Xác nhận mật khẩu</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary account-details">Đặt lại</button>
                                        <button class="btn btn-light account-details">Hủy</button>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="ordered" role="tabpanel"
                                    aria-labelledby="application-tab">
                                    <div class="group-tabs">
                                        <ul class="nav nav-tabs account-details order-details text-center"
                                            role="tablist">
                                            <li role="presentation"><a href="#confirm-waiting"
                                                    aria-controls="confirm-waiting" role="tab" data-toggle="tab"
                                                    class="active-color"><span>Chờ xác nhận</span>
                                                </a></li>
                                            <li role="presentation"><a href="#confirmed" aria-controls="confirmed"
                                                    role="tab" data-toggle="tab" class="conffirmed">Đã xác nhận</a></li>
                                            <li role="presentation"><a href="#shipping" aria-controls="shipping"
                                                    role="tab" data-toggle="tab">Đang vận chuyển</a></li>
                                            <li role="presentation" class="need"><a href="#shipped"
                                                    aria-controls="shipped" role="tab" data-toggle="tab">Đã giao</a>
                                            </li>
                                            <li role="presentation"><a href="#cancel" aria-controls="cancel" role="tab"
                                                    data-toggle="tab">Đã hủy</a></li>
                                        </ul>


                                        

                                        <div class="tab-content  pt-3">
                                            <div role="tabpanel" class="tab-pane needed active" id="confirm-waiting">
                                                <div class="row">
                                                    <?php $accountdeatils->historyOrder($order_ConfirmWaiting)  ?>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane needed" id="confirmed">

                                                <div class="row">
                                                    <?php $accountdeatils->historyOrder($order_Confirmed)  ?>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="shipping">

                                                <div class="row">
                                                    <?php $accountdeatils->historyOrder($order_Shipping)  ?>
                                                </div>

                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="shipped">
                                                <div class="row">
                                                    <?php $accountdeatils->historyOrder($order_Shipped)  ?>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="cancel">
                                                <div class="row" id="cancel_append">
                                                     <?php $accountdeatils->historyOrder($order_Cancel)  ?>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notification" role="tabpanel"
                                    aria-labelledby="notification-tab">
                                    <div class="mdc-tab-bar" role="tablist">
                                        <div class="mdc-tab-scroller">
                                            <div class="mdc-tab-scroller__scroll-area">
                                                <div class="mdc-tab-scroller__scroll-content">
                                                    <button class="mdc-tab mdc-tab--active" role="tab"
                                                        aria-selected="true" tabindex="0">
                                                        <span class="mdc-tab__content">
                                                        </span>
                                                        <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                                            <span
                                                                class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                        </span>
                                                        <span class="mdc-tab__ripple"></span>
                                                    </button>
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
            <!-- </div> -->
    </section>

<?php
    include("include/footer.php");
?>

<script>
    $(document).ready(function() {
    if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle='tab']", function(event) {
        location.hash = this.getAttribute("href");
    });
    });
    $(window).on("popstate", function() {
        var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
        $("a[href='" + anchor + "']").tab("show");
    });
</script>

<script>


    $('.cancel-order').on('click', function(){
        var id_product = $(this).parent().parent().parent().find('.name-product-order').attr('id');
        var id_order = $(this).parent().parent().parent().parent().parent().find('.edit-order-details').find('#order-id-account').text();
        var elm = $(this).parent().parent().parent().parent().parent();

        // update_order_customer(elm);


        console.debug(id_order);
        Swal.fire({
        title: 'Bạn có muốn hủy đơn hàng này',
        text: "Toàn bộ thông tin về đơn hàng sẽ biến mất",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/AccountDeatails/cancel-order.php',
                type: 'POST',
                data: {id_product: id_product,
                    id_order: id_order},
                dataType:"json",
                success: function(response) {
                    if(response['tinhtrang'] != -1){
                        $('.alert.alert-info.alert-dismissible').text("Xóa sản phẩm thành công");
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                        elm.slideToggle('slow');
                        elm.remove();

                        // console.debug(response);

                        console.debug("cc");

                        $('#cancel_append').append(response['html']);



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

<!-- <script type="text/javascript">
    $(function() {
        $("a[data-tab-destination]").on('click', function(e) { 
            e.preventDefault();
            // Works
            var tab = $(this).attr('data-tab-destination');

            $("#" + tab).click();

            // Doesn't work
            var hashtag = $(this.hash);

            var target = hashtag.length ? hashtag : $('[name=' + this.hash.slice(1) + ']');

            if (target.length) {
                $("#B").removeClass("fade").addClass("active");
                $('html, body').animate({scrollTop: target.offset().top}, 1000);
                return false;
            }
        });
    });
</script> -->