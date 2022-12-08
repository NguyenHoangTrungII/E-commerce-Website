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
        $tableName = "slider";
        $sliderList = $Model->selectData($columnName, $tableName);
        $whereValue['id']= $_GET['id'];
        // var_dump($whereValue['id']);
        // $whereCondition ="!=";
        $sliderInfo = $Model->selectData($columnName, $tableName,  $whereValue);
        // var_dump($sliderInfo);
       
       
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

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
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
          <!-- Cards -->
          <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-box"></i>
              <div data-i18n="">Nhân lực</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
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
          <li class="menu-item  active open">
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
              <li class="menu-item active">
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

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
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
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website / </span> <a class="fw-light"
                href="list-category.php" style="color: #b1b1b1">Slider
                / </a>Sửa silder</h4>

            <hr class="my-5" />
             <!-- alert warning -->
             <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                  This is a danger dismissible alert — check it out!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-info alert-dismissible" role="alert" hidden >
                  This is an info dismissible alert — check it out!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            <!-- Basic Layout -->
            <div class="row">
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Thông tin <span>Slider</span></h5>
                    <small class="text-muted float-end">Sửa thông tin</small>
                  </div>
                  <div class="card-body">
                    <form>

                      <div class="mb-3 col-xl-12">
                        <label class="form-label" for="basic-default-fullname">Tên slider</label>
                        <input type="text" id= "id-sli-edit" value="<?= $sliderInfo[0]['id'] ?>" hidden>
                        <input type="text" class="form-control" value="<?= $sliderInfo[0]['tenslider'] ?>" id="name-slider"
                          placeholder="Nhập tên danh mục" />
                      </div>
                     <div class="row">
                      <div class="mb-3 col-md-3">
                      <label class="form-label col-12" for="basic-default-slug">Tình trạng</label>

                        <label class="toggle-switchy pl-2" for="status-sli-edit" data-size="sm"
                        data-text="false" data-style="rounded" data-toggle="collapse"
                        data-target="#filterbar" aria-expanded="true" aria-controls="filterbar"
                        id="filter-btn" onclick="changeBtnTxt()">
                        <input class="status-sli-edit" <?php echo $sliderInfo[0]['tinhtrang'] == 1 ? "checked " : " " ?> type="checkbox" id="status-sli-edit">
                        <span class="toggle" >
                            <span class="switch"></span>
                        </span>
                        </label>

                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label" for="basic-default-fullname">Số thứ tự</label>
                          <input type="text" class="form-control" value="<?= $sliderInfo[0]['sothutu'] ?>"id="stt-slider"
                            placeholder="Nhập tên danh mục" />
                        </div>
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                          <div class="input-group">
                              <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                              <input name= "photo-slider" class="form-control slider-img-preview" type="file" id="imgFile-edit-slider" 
                                accept=".jfif,.jpg,.jpeg,.png,.gif" set-to="div4"  onchange="readURL(this)"/>
                          <!-- <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple> -->
                          </div>

                          <div class="mb-5">
                              <label for="formFile" class="form-label">Xem trước</label>
                                  <!-- <div class="fileupload fileupload-new border-5" data-provides="fileupload"> -->
                                      <div id="Preview-filed" >
                                          <img src="<?= $GLOBALS['SLIDES_DIRECTORY_SHOW'].$sliderInfo[0]['url'] ?>"  class ="img-preview-sli" alt="<?php $sliderInfo[0]['url'] ?> "id="div4" style="width: 20%;">
                                      </div>
                                  <!-- </div> -->
                          </div>

                        

                        <!-- <div class="mb-5">
                          <label for="formFile" class="form-label">Xem trước</label>
                          <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 300px; height: 160px;">
                              <img src="../assets/img/avatars/1.png" alt="">
                            </div>
                          </div>
                        </div> -->

                      </div>

                      <button type="button" class="btn-save-edit btn btn-primary">Lưu</button>
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

    function getNameImg(path_img){
        return path_img.match(/\w*(?=.\w+$)/);
    }

    $(".btn-save-edit").on("click", function(){
      var info={};
        info['id']=$("#id-sli-edit").val();
        info['tenslider'] = $("#name-slider").val();
        info['url'] = $("#img-slider").val();
        info['sothutu'] = $("#stt-slider").val();
        info['tinhtrang'] = document.getElementById("status-sli-edit").checked ? 1 : 0;
        info['anh_cu'] = $('.img-preview-sli').attr("src").split("/").reverse()[0];
        alert(info['anh_cu']);

        var file_a = $('#imgFile-edit-slider').prop('files')[0];  
        var form_data = new FormData(); 
        //lưu file ảnh dưới dạng file, nén thông tin dưới dạng json để qua php xử lý
        form_data.append("other_data", JSON.stringify(info))  ;
        form_data.append("file_arr", file_a)  ;
         $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/admin/Controller/Slider/update-slider.php",
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
                         $('.alert.alert-info.alert-dismissible').text("Sửa thông tin thành công");
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
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
                    case 2:{
                        $('.alert.alert-danger.alert-dismissible').text("Bạn chưa thay đổi miền giá trị nào");
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