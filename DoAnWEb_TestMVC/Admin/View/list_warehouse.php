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

// var_dump($_SESSION);
##=======LẤY DỮ LIỆU=======##
$columnName = $tableName = null;
$columnName = "*";
$tableName['MAIN'] = "khohang";
$tableName['1'] ='sanpham';
$whereValue['sanpham.id']=	$_SESSION['SMC_login_id'];
// var_dump($whereValue['id']);
$whereCondition ="!=";
$joinCondition = array ("1"=>array ('khohang.id_sp', 'sanpham.id'));
$warehouseList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue, $whereCondition);
// var_dump($warehouseList );

##=======LẤY DỮ LIỆU=======##


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
                    <a href="" class="menu-link">
                      <div data-i18n="Alerts">Slider</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="" class="menu-link">
                      <div data-i18n="Alerts">Banner</div>
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
                  <li class="menu-item active">
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
                <a href="list_brand.php" class="menu-link">
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
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Nhân viên</h4>

                        <hr class="my-5" />

                        <!-- Bootstrap Table with Header - Footer -->
                        <div class="card">
                            <div class="card-header header table-user">
                                <h5 class=" card-header">Danh sách sản phẩm</h5>
                                <a href="add_warehouse.php"><button class="btn btn-primary add-btn user"
                                        type="button">THÊM</button></a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table user">
                                    <thead>
                                        <tr>
                                            <th class="id-header warehouse">ID</th>
                                            <th class="product-name warehouse">Tên sản phẩm</th>
                                            <th class="stock warehouse">Số lượng tồn</th>
                                            <th class="buyed warehouse">Số lượng bán</th>
                                            <th class="date-import warehouse">Ngày nhập</th>
                                            <th class="date-update warehouse">Ngày sửa</th>
                                            <th class="action warehouse">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                        foreach($warehouseList AS $eachRow)
                                        {
                                            echo '
                                            <tr>
                                            <td class="id-header warehouse">
                                              '.$eachRow['id_sp'].'
                                              </td>
                                              <td class="product-name warehouse">
                                                '.$eachRow['tensp'].'
                                              </td>
                                              <td class="stock warehouse">
                                              '.$eachRow['soluongton'].'
                                              </td>
                                              <td class ="buyed warehouse">
                                              '.$eachRow['soluongdaban'].'
                                              </td>
                                              <td class="date-import warehouse">
                                                '.$eachRow['ngaynhap'].'
                                              </td>
                                              <td class="date-update warehouse">
                                                '.$eachRow['ngaysua'].'
                                              </td>
                                              <td class="action warehouse">
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu action--none">
                                                        
                                                        <a class="btn-delete dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-1"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                          ';
                                        }
                                        ?>

                                        
                                    </tbody>
                                        <tfoot class="table-border-bottom-0">
                                          <tr>
                                            <th class="id-header warehouse">ID</th>
                                            <th class="product-name warehouse">Tên sản phẩm</th>
                                            <th class="stock warehouse">Số lượng tồn</th>
                                            <th class ="buyed warehouse">Số lượng bán</th>
                                            <th class="date-import warehouse">Ngày nhập</th>
                                            <th class="date-update warehouse">Ngày sửa</th>
                                            <th class="action warehouse">Thao tác</th>
                                          </tr>
                                        </tfoot>



                                        <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLongTitle">Thông tin chi tiết
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card mb-4">
                                                                    <div
                                                                        class="card-header d-flex justify-content-between align-items-center">
                                                                        <h5 class="mb-0">Thông tin <span>sản phẩm</span>
                                                                        </h5>
                                                                        <small class="text-muted float-end">Thêm thông
                                                                            tin</small>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form>
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-12">
                                                                                    <label class="form-label" for="basic-default-nameproduct">Tên sản phẩm</label>
                                                                                    <input type="text" class="form-control" id="basic-default-nameproduct"
                                                                                        placeholder="Nhập tên sản phẩm" disabled>
                                                                                </div>
                                                                            </div>
                                
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-12">
                                                                                    <label class="form-label" for="basic-default-fullname">Slug</label>
                                                                                    <input type="text" class="form-control" id="basic-default-slug"
                                                                                        placeholder="Nhập slug" disabled>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Danh mục</label>
                                                                                        <select id="defaultSelect" class="form-select" disabled>
                                                                                            <option>Chọn danh mục</option>
                                                                                            <option value="1">CPU</option>
                                                                                            <option value="2">RAM</option>
                                                                                            <option value="3">SSD</option>
                                                                                            <option value="4">HDD</option>
                                                                                            <option value="5">VGA</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Thương hiệu</label>
                                                                                        <select id="defaultSelect" class="form-select" disabled>
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
                                                                                        placeholder="Nhập giá gốc" disabled>
                                                                                </div>
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Phần trăm giảm</label>
                                                                                    <input type="text" class="form-control" id="basic-default-percent"
                                                                                        placeholder="Nhập phần trăm giảm" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Bảo hành</label>
                                                                                    <input type="text" class="form-control" id="basic-default-cost"
                                                                                        placeholder="Nhập số tháng bảo hành" disabled>
                                                                                </div>
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Tình trạng</label>
                                                                                    <input type="text" class="form-control" id="basic-default-percent"
                                                                                        placeholder="Nhập tình trạng còn hàng" disabled>
                                                                                </div>
                                                                                
                                                                            </div>
                                
                                
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày sản
                                                                                            xuất</label>
                                                                                        <input class="form-control" type="date" value="" disabled>
                                                                                    </div>
                                                                                </div>
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày tạo</label>
                                                                                        <!-- <input type="text" class="form-control" id="date-time-create" value=""> -->
                                                                                        <p class="mt-1" id="date-time-create"></p>
                                                                                    </div>
                                                                                </div>
                                
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày sửa</label>
                                                                                        <input class="form-control" type="date" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 1</label>
                                                                                </div>

                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 2</label>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 3</label>
                                                                                </div>

                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 4</label>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>  
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Đóng
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                </table>
                            </div>
                        </div>
                        <!-- Bootstrap Table with Header - Footer -->
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


<?php
  include("include/tail.php");
?>



<script type="text/javascript">
$(".btn-delete").click(function(e){
    var del_id = $(this).attr('id');
        var $ele = $(this);
        Swal.fire({
        title: 'Bạn có muốn xóa sản phẩm này?',
        text: "Toàn bộ thông tin sẽ biến mất",
        icon: 'Cảnh báo',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Employee/delete-employee.php",
              type:"POST",
              data:{del_id: del_id},
              
              success: function(response){
                if(response !=0){
                      console.log(response);
                      Swal.fire(
                      'Đã xóa!',
                      'Sản phẩm có ID '+del_id+' đã bị xóa',
                      'success')
                      $ele.parent().parent().parent().parent().slideToggle('slow'); 
                  } else{
                      Swal.fire(
                      'Thất bại',
                      'Đã xảy ra lỗi! Vui lòng thử lại',
                      'error'
                    )
              }
              }
             
                
 
          });
            
          }
        })
 });
</script>
