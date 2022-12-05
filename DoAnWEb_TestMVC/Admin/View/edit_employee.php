<?php
    session_start();
    include("include/session.php");
    include("include/top.php");
    include("../Model/ModelAll.php");
    include("../config/databse.php");
	include("../config/site.php");
?>

<?php
    $Model = new ModelAll;

    if(isset($_GET['id'])){
        ##=======LẤY DỮ LIỆU=======##
        $columnName = $tableName = null;
        $columnName = "*";
        $tableName['MAIN'] = "taikhoan";
        $tableName['1'] ='nguoidung';
        $whereValue['nguoidung.id']= $_GET['id'];
        // var_dump($whereValue['id']);
        // $whereCondition ="!=";
        $joinCondition = array ("1"=>array ('taikhoan.id', 'nguoidung.id_taikhoan'));
        $employeeInfo = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
        // var_dump($employeeInfo);
        
        //Lưu giá trị email, phone để sử dụng check form
        $phone_input_old = $employeeInfo[0]['sdt'];
        $email_input_old =  $employeeInfo[0]['email'];
        var_dump( $phone_input_old);
        
        // $columnName = $tableName = null;
        // $columnName = "id";
        // $tableName['1'] = "tinh_thanhpho";
        // $whereValue['tinh_thanhpho']= $employeeInfo['tinh_thanhpho'];
        // $whereCondition ="LIKE";
        // $employeeInfo_Provice = $Model->selectJoinData($columnName, $tableName, null, 0, $whereValue, $whereCondition);

        ##=======LẤY DỮ LIỆU=======##
    }
?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
           <!-- Menu -->
           <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.php" class="app-brand-link">
                        <span class="app-brand-logo demo">

                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">LOGO</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Account -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">TÀI KHOẢN</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Cài đặt tài khoản</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="pages-account-settings-account.php" class="menu-link">
                                    <div data-i18n="Account">Tài khoản</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-account-settings-notifications.php" class="menu-link">
                                    <div data-i18n="Notifications">Đổi mật khẩu</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="auth-login-basic.php" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Đăng nhập</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-register-basic.php" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Đăng xuất</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Manament -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Quản lý</span></li>
                    <li class="menu-item active open">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="">Nhân lực</div>
                        </a>
                        <ul class="menu-sub ">
                            <li class="menu-item active">
                                <a href="list-employee.php" class="menu-link">
                                    <div data-i18n="">Nhân viên</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="list_customer.php" class="menu-link">
                                    <div data-i18n="Alerts">Khách hàng</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- website -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="">Website</div>
                        </a>
                        <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="list-category.php" class="menu-link">
                            <div data-i18n="">Danh mục</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="list-slider.php" class="menu-link">
                            <div data-i18n="Alerts">Slider</div>
                            </a>
                        </li>
                        </ul>
                    </li>

                    <!-- Feedback -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="">Phản hồi</div>
                        </a>
                        <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="list-rate.php" class="menu-link">
                            <div data-i18n="">Đánh giá</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="list-question.php" class="menu-link">
                            <div data-i18n="Alerts">Thắc mắc</div>
                            </a>
                        </li>
                        </ul>
                    </li>

                    <!-- Buying -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="">Bán hàng</div>
                        </a>
                        <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="list_product.php" class="menu-link">
                            <div data-i18n="">Sản phẩm</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="list_discount.php" class="menu-link">
                            <div data-i18n="Alerts">Mã giảm giá</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="list_warehouse.php" class="menu-link">
                            <div data-i18n="Alerts">Kho hàng</div>
                            </a>
                        </li>
                        </ul>
                    </li>

                    <!-- Order -->
                    <li class="menu-item">
                        <a href="list-order.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="">Đơn hàng</div>
                        </a>
                    </li>

                    <!-- Brand -->
                    <li class="menu-item">
                        <a href="list_supplier.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="">Thương hiệu</div>
                        </a>
                    </li>


                    <!-- Forms & Tables -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Thống kê</span></li>

            </aside>
            <!-- / Menu -->
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Tìm kiếm..."
                                    aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">Nguyễn Hoàng Trung</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Thông tin cá nhân</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Cài đặt</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="auth-login-basic.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Đăng xuất</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực / </span> <a class="fw-light" href="" style="color: #b1b1b1">Nhân viên
                            / </a>Sửa nhân viên</h4>

                        <hr class="my-5" />
                        <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Thông tin <span>nhân viên</span></h5>
                                        <small class="text-muted float-end">Sửa thông tin</small>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="mb-3 col-xl-6">
                                                    <label class="name-text form-label" for="basic-default-fullname">Họ
                                                        tên</label>
                                                    <input type="text" class="form-control" value="<?= $employeeInfo[0]['hoten'] ?>" id="basic-default-fullname"
                                                        placeholder="Nhập họ và tên" />
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="form-label">Ngày sinh</label>
                                                    <input class="birthday-input form-control" type="date" value="<?= $employeeInfo[0]['ngaysinh'] ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check col-xl-4">
                                                    <label class="form-label mb-3" for="basic-default-phone">Giới
                                                        tính</label>
                                                    <div class="row px-4">
                                                        <?php
                                                            if($employeeInfo[0]['ngaysinh']==1){
                                                                echo 
                                                                '
                                                                    <div class="col-6">
                                                                        <input name=" Gender-cb " class="Gender-cb form-check-input"
                                                                            type="radio" value="" checked>
                                                                        <label class="form-check-label" for="defaultRadio2"> Nam
                                                                        </label>
                                                                    </div>
    
                                                                    <div class="col-6">
                                                                        <input name="Gender-cb " class="Gender-cb form-check-input"
                                                                            type="radio" value="" >
                                                                        <label class="form-check-label" for="defaultRadio1">
                                                                            Nữ </label>
                                                                    </div>
                                                                ';
                                                            }
                                                            else{
                                                                echo 
                                                                '
                                                                    <div class="col-6">
                                                                        <input name=" Gender-cb " class="Gender-cb form-check-input"
                                                                            type="radio" value="">
                                                                        <label class="form-check-label" for="defaultRadio2"> Nam
                                                                        </label>
                                                                    </div>
    
                                                                    <div class="col-6">
                                                                        <input name="Gender-cb " class="Gender-cb form-check-input"
                                                                            type="radio" value="" checked>
                                                                        <label class="form-check-label" for="defaultRadio1">
                                                                            Nữ </label>
                                                                    </div>
                                                                ';
                                                            }
                                                        ?>
                                                        <!-- <div class="col-6">
                                                            <input name=" GioiTinh" class="form-check-input"
                                                                type="radio" value="" checked>
                                                            <label class="form-check-label" for="defaultRadio2"> Nam
                                                            </label>
                                                        </div>

                                                        <div class="col-6">
                                                            <input name="GioiTinh" class="form-check-input"
                                                                type="radio" value="" >
                                                            <label class="form-check-label" for="defaultRadio1">
                                                                Nữ </label>
                                                        </div> -->
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-email">Email</label><span class="Error-notify-email"></span>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="email-edit-value"
                                                                class="email-input form-control" placeholder="nguyenhoangtrunghs"
                                                                aria-label="" aria-describedby="basic-default-email2" value="<?= $employeeInfo[0]['email'] ?>" />
                                                            
                                                        </div>
                                                        <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-phone">Số điện
                                                            thoại</label><span class="Error-notify-phone"></span>
                                                        <input type="text" id="phone-edit-value"
                                                            class="phone-input form-control phone-mask" placeholder="0123456789" value="<?= $employeeInfo[0]['sdt'] ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="Provice" class="form-label">Tỉnh/Thành
                                                            phố</label>
                                                        <select id="Provice_edit" class="form-select">
                                                            <option value=-1><?= $employeeInfo[0]['tinh_thanhpho']?></option>
                                                            <!-- <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option> -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="District" class="form-label">Quận/Huyện</label>
                                                        <select id="District_edit" class="form-select">
                                                            <option value=-1><?= $employeeInfo[0]['quan_huyen']?></option>
                                                            <!-- <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option> -->
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="Town" class="form-label">Phường/Xã</label>
                                                        <select id="Town_edit" class="form-select">
                                                            <option value=-1><?= $employeeInfo[0]['phuong_xa']?></option>
                                                            <!-- <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Địa chỉ</label>
                                                <textarea id="basic-default-message" class="Address-textarea form-control"
                                                    placeholder="Địa chỉ" ><?= $employeeInfo[0]['tinh_thanhpho'].", ". $employeeInfo[0]['quan_huyen'].", ".  $employeeInfo[0]['phuong_xa'].", ".  $employeeInfo[0]['diachi'] ?></textarea>
                                            </div>

                                           
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                                                <div class="input-group">
                                                    <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                                                    <input name= "avatar-employee" class="form-control Employee-img-preview" type="file" id="imgFile-edit-employee" 
                                                      accept=".jfif,.jpg,.jpeg,.png,.gif" set-to="div4"  onchange="readURL(this)"/>
                                                <!-- <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                                     onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple> -->
                                            </div>

                                            <div class="mb-5">
                                                <label for="formFile" class="form-label">Xem trước</label>
                                                    <!-- <div class="fileupload fileupload-new border-5" data-provides="fileupload"> -->
                                                        <div id="Preview-filed" >
                                                            <img src="<?= $GLOBALS['USER_DIRECTORY_SHOW'].$employeeInfo[0]['anh'] ?>"  alt="anh-dai-dien.png" id="div4" style="width: 20%;">
                                                        </div>
                                                    <!-- </div> -->
                                            </div>
                                            <button type="button" class="btn btn-primary">Lưu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->

<?php
    include("include/tail.php");
?>

<!-- sử dụng select2 để tạo select search  -->
<script>
    $(document).ready(function() {

        $('#Provice_edit').select2(
        {
            width: 'resolve'
        }
        );

        $('#District_edit').select2(
        {
            width: 'resolve'
        }
        );

        $('#Town_edit').select2(
        {
            width: 'resolve'
        }
        );

    });
</script>

<!-- ajax lấy tỉnh thành phố -->
<script >
    $.ajax({
        url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/LayTinh.php",       
        dataType:'json',         
        success: function(data){     
            for (i=0; i<data.length; i++){            
                var provice = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                // console.log(provice);
                $('#Provice_edit').append($('<option>', {value:provice['id'], text:provice['name']}));
            }
            
            $("#Provice_edit").val($employeeInfo_Provice[0][id]).change();


            $("#Provice_edit").on("change", function(e){
                $("#Town_edit").html("");
                $("#Town_edit").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                var Provice_id = $( "#Provice_edit option:selected" ).val();
                console.log(Provice_id);
                $.ajax({
                    url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/GetDistrict.php?ProviceId=" + Provice_id,
                    dataType:'json',         
                    success: function(data){  
                        $("#District_edit").html("");
                        $("#District_edit").append($('<option>', {value:-1, text:"Chọn quận/huyện"}));
                        
                        for (i=0; i<data.length; i++){            
                        var district = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                        
                        // console.log(district);
                        $('#District_edit').append($('<option>', {value:district['id'], text:district['name']}));
                        }  
                        
                        $("#District_edit").on("change", function(e){
                            var District_id = $( "#District_edit option:selected" ).val();
                            console.log(District_id);
                            $.ajax({
                                url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/GetTown.php?DistrictId=" + District_id,
                                dataType:'json',         
                                success: function(data){  
                                    // console.log(data);
                                    $("#Town_edit").html("");
                                    $("#Town_edit").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                                    for (i=0; i<data.length; i++){            
                                    var town = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                                    
                                    $('#Town_edit').append($('<option>', {value:town['id'], text:town['name']}));
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

<!-- check lỗi đồng thời email, phone, ảnh realtime by ajax -->
<script>
    let checkNotify1 = 1;
    let checkNotify2= 1;
    let checkNotify3= 1;
    const email_input_old = $("#email-edit-value").val();
    $("#email-edit-value").on("focusout keyup keydown blur change ",function(e){
        var $ele = $(this);
        var email_input = $("#email-edit-value").val();
        console.log(email_input);
        console.log(email_input_old);
        //Nếu email bị thay đổi-> báo như thường, phòng trường họp check email-> email của bạn đã tồn tại trong hệ thống
        if(email_input!= email_input_old){
           $.ajax({
            url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/email.php",
            type:"POST",
            data:{email_input: email_input},
            success: function(data){
               if(data==1){
                    $('.Error-notify-email').attr('style', 'color:#33A0FF;padding-left: 20px');
                    $(".Error-notify-email").html("<i class='bx bxs-check-circle pl-3'></i> Email hợp lệ");
                    setTimeout(function(){
                    $(".Error-notify-email").html("");
                    }, 2000)
                    checkNotify1=1;
                    if(checkNotify1==1 && checkNotify2 && checkNotify3 ){
                        $('.btn-save-edit.btn.btn-primary').prop('disabled', false);
                    }
                    
                }
                else {
                    $(".Error-notify-email").html("");
                    $('.Error-notify-email').attr('style', 'color:#ff3333;padding-left: 20px');
                    $(".Error-notify-email").html("<i class='bx bxs-x-circle pl-3'></i>"+data);
                    $('.btn-save-edit.btn.btn-primary').prop('disabled', true);
                    checkNotify1 = 0;
                }
            }
                
        }); 
        }
        
    });

    $("#phone-edit-value").on("focusout keyup keydown blur change",function(e){
        var phone_input = $("#phone-edit-value").val();
        //Tương tư như email
        if(phone_input != phone_input_old){
            $.ajax({
            url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/phone.php",
            type:"POST",
            data:{phone_input: phone_input},
            success: function(data){
                if(data==1 ){
                    $('.Error-notify-phone').attr('style', 'color:#33A0FF;padding-left: 20px');
                    $(".Error-notify-phone").html("<i class='bx bxs-check-circle pl-3'></i> Số điện thoại hợp lệ");
                    setTimeout(function(){
                    $(".Error-notify-phone").html("");
                    }, 2000)
                    checkNotify2=1;
                    if(checkNotify1==1 && checkNotify2 && checkNotify3){
                        $('.btn-save-edit.btn.btn-primary').prop('disabled', false);
                    }
                }
                else{
                    $(".Error-notify-phone").html("");
                    $('.Error-notify-phone').attr('style', 'color:#ff3333;padding-left: 20px');
                    $(".Error-notify-phone").html("<i class='bx bxs-x-circle pl-3'></i>"+data);
                    $('.btn-save-edit.btn.btn-primary').prop('disabled', true);
                    checkNotify2=0;
                }
            }
                
        });
        }
    });
    

    $("#imgFile-edit-employee").on("change", function(){ 
        var file_name = $('input[type=file]').val().split('\\').pop();
        var file_extension = file_name.split('.').pop();
        $.ajax({
                url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/file_img.php",
                type:"POST",
                data:{file_extension: file_extension },
                success: function(data){
                    if(data==1){
                        $('.upload-notify').attr('style', 'color:#33A0FF;padding-left: 20px');
                        $(".upload-notify").html("<i class='bx bxs-check-circle pl-3'></i> Tải ảnh thành công");
                        setTimeout(function(){
                        $(".upload-notify").html("");
                        }, 2000)
                        checkNotify3 =1;
                        if(checkNotify1==1 && checkNotify2 && checkNotify3)
                        {
                            $('.btn-save-edit.btn.btn-primary').prop('disabled', false);
                        }
                    }
                    else if(data==0){
                        $(".upload-notify").html("");
                        $('.upload-notify').attr('style', 'color:#ff3333;padding-left: 20px');
                        $(".upload-notify").html("<i class='bx bxs-x-circle pl-3'></i>Loại ảnh không được cho phép");
                        $('.btn-save-edit.btn.btn-primary').prop('disabled', true);
                        checkNotify3=0;
                    }
                    
                }     
        });
    });

</script>

<!-- Ajax kiểm tra thông tin chưa điền, file ảnh không hợp lệ đồng thời nộp file v.v.v.v -->
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

    $(".btn-save-edit").on("click", function(){
        var info={};
        info['hoten'] = $(".name-text").val();
        info['ngaysinh'] = $(".birthday-input").val(); 
        info['gioitinh']= $('.Gender-cb:checked').val();
        info['email'] = $(".email-input").val();
        info['sdt'] = $(".phone-input").val();
        info['tinh_thanhpho'] = checkAdress($( "#Provice option:selected" ).val(), $( "#Provice option:selected" ).text());
        info['quan_huyen'] = checkAdress($( "#District option:selected" ).val(), $( "#District option:selected" ).text());
        info['phuong_xa'] = checkAdress($( "#Town option:selected" ).val(), $( "#Town option:selected" ).text());
        info['diachi'] = $(".Address-textarea").val();

        var file_a = $('#imgFile-edit-employee').prop('files')[0];  
        var form_data = new FormData(); 
        //lưu file ảnh dưới dạng file, nén thông tin dưới dạng json để qua php xử lý
        form_data.append("other_data", JSON.stringify(info))  ;
        form_data.append("file_arr", file_a) ;

         $.ajax({
            url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/emptyCheck.php",
            data: form_data,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: "text",
            success: function(data){
                console.debug( data);

                switch(parseInt(data) ){
                    case 0:
                        {
                        $('.alert.alert-danger.alert-dismissible').text("Không được để trống miền giá trị nào");
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                        $("html, body").animate({scrollTop: 0}, 1000);
                        }
                        break;
                    case 1:
                       {
                         $('.alert.alert-info.alert-dismissible').text("Thêm thành công");
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                        //Reset dữ liệu sau khi thêm thành công
                        //xóa dữ liệu trong form
                        $('.add_employee-form')[0].reset();
                        // xóa ảnh
                        $(".img-preview").attr('src', " ");
                        $('input[type=file]').val("");
                        $("html, body").animate({scrollTop: 0}, 1000);
                       }
                    break;
                    case -1:{
                        $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                        $("html, body").animate({scrollTop: 0}, 1000);
                    }
                    break;

                }
               
            }
                
                
        });


    });

    
</script>