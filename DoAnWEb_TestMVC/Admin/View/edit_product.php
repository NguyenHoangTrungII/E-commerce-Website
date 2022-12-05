<?php
  include("include/top.php");
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
              <li class="menu-item active">
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
                  <li class="menu-item active open">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-box"></i>
                      <div data-i18n="">Bán hàng</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item active">
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
                <form id="regForm" action="">
                    
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="content-wrapper">
                            <!-- Content -->
        
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm / </span> <a
                                        class="fw-light" href="" style="color: #b1b1b1">Sản phẩm
                                        / </a>Sửa sản phẩm</h4>
        
                                <hr class="my-5" />
                                <!-- Basic Layout -->
                                <div class="row">
                                    <div class="col-xl">
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">Thông tin <span>sản phẩm</span></h5>
                                                <small class="text-muted float-end">Sửa thông tin</small>
                                            </div>
                                            <div class="card-body mb-5">
                                                <form>
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-12">
                                                            <label class="form-label" for="basic-default-nameproduct">Tên sản
                                                                phẩm</label>
                                                            <input type="text" class="form-control"
                                                                id="basic-default-nameproduct" placeholder="Nhập tên sản phẩm">
                                                        </div>
                                                    </div>
        
        
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-12">
                                                            <label class="form-label" for="basic-default-fullname">Slug</label>
                                                            <input type="text" class="form-control" id="basic-default-slug"
                                                                placeholder="Nhập slug">
                                                        </div>
                                                    </div>
        
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="mb-3">
                                                                <label for="defaultSelect" class="form-label">Danh mục</label>
                                                                <select id="defaultSelect" class="form-select">
                                                                    <option>Chọn danh mục</option>
                                                                    <option value="1">CPU</option>
                                                                    <option value="2">RAM</option>
                                                                    <option value="3">SSD</option>
                                                                    <option value="4">HDD</option>
                                                                    <option value="5">VGA</option>
                                                                </select>
                                                            </div>
                                                        </div>
        
                                                        <div class="col-xl-6">
                                                            <div class="mb-3">
                                                                <label for="defaultSelect" class="form-label">Thương
                                                                    hiệu</label>
                                                                <select id="defaultSelect" class="form-select">
                                                                    <option>Chọn thương hiệu</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
        
        
        
                                                    </div>
        
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-6">
                                                            <label class="form-label">Giá gốc</label>
                                                            <input type="text" class="form-control" id="basic-default-cost"
                                                                placeholder="Nhập giá gốc">
                                                        </div>
                                                        <div class="mb-3 col-xl-6">
                                                            <label class="form-label">Phần trăm giảm</label>
                                                            <input type="text" class="form-control" id="basic-default-percent"
                                                                placeholder="Nhập phần trăm giảm">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-5">
                                                            <label class="form-label">Bảo hành</label>
                                                            <input type="text" class="form-control" id="basic-default-cost"
                                                                placeholder="Nhập số tháng bảo hành">
                                                        </div>
        
                                                        <div class="col-xl-5">
                                                            <div class="mb-3">
                                                                <label for="defaultSelect" class="form-label">Ngày sản
                                                                    xuất</label>
                                                                <input class="form-control" type="date" value="">
                                                            </div>
                                                        </div>
        
                                                        <div class="mb-3 col-xl-2 text-center">
                                                            <label class="form-label pb-2">Tình trạng</label><br>
                                                            <label class="toggle-switchy" for="example_textless_4"
                                                                data-size="sm" data-text="false" data-style="rounded">
                                                                <input checked type="checkbox" id="example_textless_4">
                                                                <span class="toggle">
                                                                    <span class="switch"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
        
        
                                                    <!-- <div class="row">
                                                        
        
                                                        <div class="col-xl-4">
                                                            <div class="mb-3">
                                                                <label for="defaultSelect" class="form-label">Ngày tạo</label>
                                                                <input type="text" class="form-control" id="date-time-create" value="">
                                                                <p class="mt-1" id="date-time-create"></p>
                                                            </div>
                                                        </div>
        
        
                                                        
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-3 col-md-6">
                                                            <label for="formFile" class="form-label ">Ảnh thumbnail</label>
                                                            <input class="form-control add-infor user" type="file"
                                                                id="formFile review-image-label"
                                                                accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                                <label for="formFile" class="form-label">Xem trước ảnh
                                                                    thumbnail</label>
                                                                <div class="fileupload fileupload-new border-5"
                                                                    data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail"
                                                                        style="width: 160px; height: 160px;">
                                                                        <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png"
                                                                            alt="" width="200px">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-3 col-md-6">
                                                            <label for="formFile" class="form-label ">Ảnh</label>
                                                            <input class="form-control add-infor user" type="file"
                                                                id="formFile review-image-label"
                                                                accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                                <label for="formFile" class="form-label">Xem trước</label>
                                                                <div class="fileupload fileupload-new border-5"
                                                                    data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail"
                                                                        style="width: 160px; height: 160px;">
                                                                        <img src="../assets/img/avatars/1.png" alt="">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="mb-3 col-xl-3 col-md-6">
                                                            <label for="formFile" class="form-label ">Ảnh</label>
                                                            <input class="form-control add-infor user" type="file"
                                                                id="formFile review-image-label"
                                                                accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                                <label for="formFile" class="form-label">Xem trước</label>
                                                                <div class="fileupload fileupload-new border-5"
                                                                    data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail"
                                                                        style="width: 160px; height: 160px;">
                                                                        <img src="../assets/img/avatars/1.png" alt="">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="mb-3 col-xl-3 col-md-6">
                                                            <label for="formFile" class="form-label ">Ảnh</label>
                                                            <input class="form-control add-infor user" type="file"
                                                                id="formFile review-image-label"
                                                                accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                                <label for="formFile" class="form-label">Xem trước</label>
                                                                <div class="fileupload fileupload-new border-5"
                                                                    data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail"
                                                                        style="width: 160px; height: 160px;">
                                                                        <img src="../assets/img/avatars/1.png" alt="">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="mb-3 col-xl-3 col-md-6">
                                                            <label for="formFile" class="form-label ">Ảnh</label>
                                                            <input class="form-control add-infor user" type="file"
                                                                id="formFile review-image-label"
                                                                accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                                <label for="formFile" class="form-label">Xem trước</label>
                                                                <div class="fileupload fileupload-new border-5"
                                                                    data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail"
                                                                        style="width: 160px; height: 160px;">
                                                                        <img src="../assets/img/avatars/1.png" alt="">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
        
                                                    <!-- <button type="submit" class="btn btn-primary mt-5">Lưu</button> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- / Content -->
        
                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    
                    <div class="tab">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm / </span> <a
                                    class="fw-light" href="" style="color: #b1b1b1">Sản phẩm
                                    / </a>Sửa cấu hình sản phẩm</h4>
    
                            <hr class="my-5" />
                        <div class="container-lg p-0">
                            <div class="table-responsive">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-8"><h2>Cấu hình sản phẩm</h2></div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-info add-new"><i class='bx bx-plus'></i>Thêm mới</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Thông số</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tên sản phẩm</td>
                                                <td></td>
                                                <td>
                                                    <a class="add" title="Add" data-toggle="tooltip"><i class='bx bx-list-plus' ></i></a>
                                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class='bx bx-edit-alt'></i></a>
                                                    <a class="delete" title="Delete" data-toggle=""><i class='bx bxs-trash-alt'></i></a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>   
                        </div>  
                    </div>
                    
                    <div class="tab">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm / </span> <a
                                    class="fw-light" href="" style="color: #b1b1b1">Sản phẩm
                                    / </a>Thêm mô tả sản phẩm</h4>
                                    <div class="table-wrapper">
                                        <div class="table-title">
                                            <div id="summernote" placeholder="Nhập mô tả sản phẩm" ></div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    
                    
                    
                    <div style="overflow:auto;">
                      <div style="float:right; margin-right: 50px;">
                        <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Trước</button>
                        <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Tiếp</button>
                      </div>
                    </div>
                    
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:20px; margin-bottom: 20px;">
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                    </div>
                    
                </form>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

<?php
  include("include/tail.php");
?>