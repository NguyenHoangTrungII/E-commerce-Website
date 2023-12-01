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



    //Lấy thông tin chủ tài khoản
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']= "nguoidung.anh anhnguoidung";
    $columnName['2']= "nguoidung.hoten hoten";
    $columnName['3']= "nguoidung.sdt sdt";
    $columnName['4']= "nguoidung.tinh_thanhpho";
    $columnName['5']= "nguoidung.quan_huyen";
    $columnName['6']= "nguoidung.phuong_xa";
    $columnName['7']= "nguoidung.diachi";
    $columnName['8']= "taikhoan.email ";
    $columnName['9']= "nguoidung.tenhienthi";


    $tableName['MAIN'] = "taikhoan";
    $tableName['1'] ='nguoidung';

    $whereValue['nguoidung.id'] = $_SESSION['SSCF_login_id'];
    $joinCondition = array ("1"=>array ('nguoidung.id_taikhoan', 'taikhoan.id'));

    $userInfo = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);
    // var_dump($userInfo);


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
                                    <img src="<?= $GLOBALS['USER_DIRECTORY_SHOW'].$userInfo[0]['anhnguoidung'] ?>" alt="anh-dai-dien.jpg" class="shadow">
                                </div>
                                <h4 class="text-center"><?= $userInfo[0]['tenhienthi'] ?></h4>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a href="#info_account" class="nav-link active" id="account-tab" data-toggle="pill" 
                                    role="tab" aria-controls="account" aria-selected="true">
                                    <i class='bx bxs-user-account' ></i>
                                    Tài khoản
                                </a>
                                <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab"
                                    aria-controls="password" aria-selected="false">
                                    <i class='bx bx-lock-open-alt' ></i>
                                     Mật khẩu
                                </a>
                                <!-- <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab"
                                    aria-controls="security" aria-selected="false">
                                    <i class="fa fa-user text-center mr-1"></i>
                                    Security
                                </a> -->
                                <a class="nav-link" id="application-tab" data-toggle="pill" href="#ordered" role="tab"
                                    aria-controls="application" aria-selected="false">
                                    <i class='bx bx-history'></i>
                                        Đơn hàng
                                </a>
                                <!-- <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification"
                                    role="tab" aria-controls="notification" aria-selected="false">
                                    <i class="fa fa-bell text-center mr-1"></i>
                                    Thông báo
                                </a> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-9 pb-5">
                        <div class="tab-content account-details pl-3" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="info_account" role="tabpanel"
                                aria-labelledby="account-tab">
                                <h3 class="mb-4">Cài đặt tài khoản</h3>
                                <div class="row">

                                    <div class="alert alert-info alert-dismissible" role="alert" hidden >
                                                This is an info dismissible alert — check it out!
                                    </div>

                                    <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                                            This is a danger dismissible alert — check it out!
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group account-deatil">
                                            <label class="form-label" for="name-account">Họ
                                                tên</label>
                                            <input type="text" class="form-control" id="name-account"
                                                placeholder="Nhập họ và tên" value="<?= $userInfo[0]['hoten']?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group account-deatil">
                                            <label class="form-label" for="name-show-account">Tên hiển thị</label>
                                            <input type="text" class="form-control" id="name-show-account"
                                                placeholder="Nhập nickname" value="<?= $userInfo[0]['tenhienthi']?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="email-account">Email</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="email-account" class="form-control"
                                                placeholder="diachimail@gmail.com"  value="<?= $userInfo[0]['email']?>">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group account-deatil">
                                                <label class="form-label" for="phone-account">Số điện
                                                    thoại</label>
                                                <input type="text" id="phone-account"
                                                    class="form-control phone-mask" placeholder="0123456789"  value="<?= $userInfo[0]['sdt']?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Provice-account" class="form-label">Tỉnh/Thành
                                                    phố</label>
                                                <select id="Provice-account" class="form-select" style="width:100%">
                                                    <option value="0"><?= $userInfo[0]['tinh_thanhpho']?></option>
                                                    <!-- <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="District-account" class="form-label">Quận/Huyện</label>
                                                <select id="District-account" class="form-select" style="width:100%">
                                                <option value="0"><?= $userInfo[0]['quan_huyen']?></option>
                                                    <!-- <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Town-account" class="form-label">Phường/Xã</label>
                                                <select id="Town-account" class="form-select" style="width:100%">
                                                <option value="0"><?= $userInfo[0]['phuong_xa']?></option>
                                                    <!-- <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="address-account">Địa chỉ</label>
                                                <textarea id="address-account" class="form-control"
                                                    placeholder="Địa chỉ" style="height: 150px;"><?= $userInfo[0]['diachi'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="update-address btn btn-primary account-details" style="height:44px">Cập nhật</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                    <h3 class="mb-4">Đặt lại mặt khẩu</h3>
                                    <div class="row">
                                    <div class="alert alert-info alert-dismissible" role="alert" hidden >
                                                This is an info dismissible alert — check it out!
                                    </div>

                                    <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                                            This is a danger dismissible alert — check it out!
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group account-deatil">
                                                <label>Mật khẩu cũ</label>
                                                <input type="password" id="passwordold-account" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group account-deatil">
                                                <label>Mật khẩu mới</label>
                                                <input type="password" id="passwordnew-account" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group account-deatil">
                                                <label>Xác nhận mật khẩu</label>
                                                <input type="password" id="passwordnew2-account" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class=" update-pass btn btn-primary account-details" style="height:44px">Đặt lại</button>
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
    $('.update-pass').on('click', function(){
        var data = {};
        data['matkhaucu'] = $('#passwordold-account').val();
        data['matkhaumoi']= $('#passwordnew-account').val();
        data['matkhaumoi2'] = $('#passwordnew2-account').val(); 

        console.debug(data);

        $.ajax({
                url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/AccountDeatails/update-pass.php',
                type: 'POST',
                data: {
                    data :JSON.stringify(data)
                },
                dataType:"text",
                success: function(response) {
                    if(response == 1){
                        $('.alert.alert-info.alert-dismissible').text("Cập nhật thông tin thành công");
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', false);


                        setTimeout(function(){
                            $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        }, 2000)

                    }
                    else if(response == -1){
                        $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                        setTimeout(function(){
                            $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        }, 2000)
                    }
                    else{
                        $('.alert.alert-danger.alert-dismissible').text(response);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                        setTimeout(function(){
                            $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        }, 2000)
                    }
                }
            });


    })
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

    $('.update-address').on('click', function(){
        var data = {};
        data['hoten'] = $('#name-account').val();
        data['tenhienthi']= $('#name-show-account').val();
        data['email'] = $('#email-account').val(); 
        data['sdt'] = $('#phone-account').val();
        data['tinh_thanhpho']  = checkAdress($( "#Provice-account option:selected" ).val(), $( "#Provice-account option:selected" ).text());
        data['quan_huyen'] = checkAdress($( "#District-account  option:selected" ).val(), $( "#District-account option:selected" ).text());
       data['phuong_xa'] = checkAdress($( "#Town-account  option:selected" ).val(), $( "#Town-account option:selected" ).text());
        data['diachi'] = $('#address-account').val();

        console.debug(data);

        $.ajax({
                url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/AccountDeatails/update-info.php',
                type: 'POST',
                data: {
                    data :JSON.stringify(data)
                },
                dataType:"text",
                success: function(response) {
                    if(response['tinhtrang'] != -1){
                        $('.alert.alert-info.alert-dismissible').text("Cập nhật thông tin thành công");
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', false);


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


    })
</script>

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

<script>
    $(document).ready(function() {

        $('#Provice-account').select2(
        {
            width: 'resolve'
        }
        );

        $('#District-account').select2(
        {
            width: 'resolve'
        }
        );

        $('#Town-account').select2(
        {
            width: 'resolve'
        }
        );

    });
</script>

<script>
    $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/LayTinh.php",       
        dataType:'json',         
        success: function(data){     
            // $("#Provice").html("");
            $("#Provice-account").append($('<option>', {value:-1, text:"Chọn tỉnh/thành phố"}));
            for (i=0; i<data.length; i++){            
                var provice = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                // console.log(provice);
                $('#Provice-account').append($('<option>', {value:provice['id'], text:provice['name']}));
            }

            $("#Provice-account").on("change", function(e){
                $("#Town-account").html("");
                $("#Town-account").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                var Provice_id = $( "#Provice-account option:selected" ).val();
                console.log(Provice_id);
                $.ajax({
                    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetDistrict.php?ProviceId=" + Provice_id,
                    dataType:'json',         
                    success: function(data){  
                        $("#District-account").html("");
                        $("#District-account").append($('<option>', {value:-1, text:"Chọn quận/huyện"}));
                        
                        for (i=0; i<data.length; i++){            
                        var district = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                        
                        // console.log(district);
                        $('#District-account').append($('<option>', {value:district['id'], text:district['name']}));
                        }  

                        // setPrice();
                        // update_total_price();
                        
                        $("#District-account").on("change", function(e){
                            var District_id = $( "#District-account option:selected" ).val();
                            console.log(District_id);
                            $.ajax({
                                url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetTown.php?DistrictId=" + District_id,
                                dataType:'json',         
                                success: function(data){  
                                    // console.log(data);
                                    $("#Town-account").html("");
                                    $("#Town-account").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                                    for (i=0; i<data.length; i++){            
                                    var town = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                                    
                                    $('#Town-account').append($('<option>', {value:town['id'], text:town['name']}));
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

