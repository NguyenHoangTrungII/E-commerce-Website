<?php

use FTP\Connection;

  session_start();
  include("session.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/site.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Controller/Controller.php");


  $Model = new ModelAll;
  $ctrl = new Controller;


   $columnName = $tableName = $whereValue = null;
   $columnName['1'] = "url";
   $columnName['2'] = "quyen.id tenquyen";
   $tableName['MAIN'] = "ct_quyen";
   $tableName['2'] ='nhomquyen';
   $tableName['1'] ='quyen';
   $whereValue['id_taikhoan']= $_SESSION['SMC_login_account_id'];
   $joinCondition = array ("1"=>array ('ct_quyen.id_quyen', 'quyen.id'), "2"=> array('ct_quyen.id_nhomquyen', 'nhomquyen.id'));
   $privilegeUser = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
   $privilegeUser_array = array();
   foreach($privilegeUser as $eachRow){
    array_push($privilegeUser_array, $eachRow['url']);
  }

  // var_dump($privilegeUser_array);


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
                <span class="app-brand-text demo menu-text fw-bolder ms-2"><img src="./../../public/uploads/logo/z3981326372782_609beeb43778012128067c888231f4fe.jpg" alt="" style="width:60px;padding-left:10px"><span style="  text-transform: uppercase;color:#33A0FF;font:40px">4.2GRP</span></span>
              </a>

              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item one" id="index">
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
                  <?php 
                    if($ctrl->checkprivilege(  $privilegeUser_array, "list-employee.php") ||  $ctrl->checkprivilege(  $privilegeUser_array, "list-customer.php")){

                      $string =
                        '<li class="menu-item">
                            <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-box"></i>
                              <div data-i18n="">Nhân lực</div>
                            </a>
                            <ul class="menu-sub">
                            
                          
                        ';

                      if($ctrl->checkprivilege(  $privilegeUser_array, "list-employee.php")){
                        $string .= '
                        <li class="menu-item" id="list-employee">
                          <a href="list-employee.php" class="menu-link">
                            <div data-i18n="">Nhân viên</div>
                          </a>
                        </li>';
                        
                      }

                      if($ctrl->checkprivilege(  $privilegeUser_array, "list-customer.php")){
                        $string .= '
                        
                        <li class="menu-item" id="list-customer">
                          <a href="list_customer.php" class="menu-link">
                            <div data-i18n="Alerts">Khách hàng</div>
                          </a>
                        </li>'
                      ;
                      }

                      $string .= '</ul> </li>';
                      
                      echo $string;
                      
                    }
                  ?>

                  <!-- website -->
                  <?php 

                  // if(){

                    if($ctrl->checkprivilege(  $privilegeUser_array, "list-category.php") ||  $ctrl->checkprivilege(  $privilegeUser_array, "list-slider.php")){

                      $string =
                        '<li class="menu-item">
                          <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="">Website</div>
                          </a>
                          <ul class="menu-sub">
                        ';

                      if($ctrl->checkprivilege(  $privilegeUser_array, "list-category.php")){
                        $string .= '
                          <li class="menu-item" id="list-category">
                            <a href="list-category.php" class="menu-link">
                              <div data-i18n="">Danh mục</div>
                            </a>
                          </li>';
                        
                      }

                      if($ctrl->checkprivilege(  $privilegeUser_array, "list-slider.php")){
                        $string .= '
                        
                          <li class="menu-item" id="list-slider">
                            <a href="list-slider.php" class="menu-link">
                              <div data-i18n="Alerts">Slider</div>
                            </a>
                          </li>'
                      ;
                      }

                      $string .= '</ul> </li>';
                      
                      echo $string;

                    }
                  ?>

                  <!-- Feedback -->
                  <?php 

                  // if(){

                    if($ctrl->checkprivilege(  $privilegeUser_array, "list-rate.php") ||  $ctrl->checkprivilege(  $privilegeUser_array, "list-question.phplist")){

                      $string =
                        '<li class="menu-item">
                          <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="">Phản hồi</div>
                          </a>
                          <ul class="menu-sub" id="list-rate">
                        ';

                      if($ctrl->checkprivilege(  $privilegeUser_array, "list-rate.php")){
                        $string .= '
                        <li class="menu-item">
                          <a href="list-rate.php" class="menu-link">
                            <div data-i18n="">Đánh giá</div>
                          </a>
                        </li>';
                        
                      }

                      if($ctrl->checkprivilege(  $privilegeUser_array, "list-question.php")){
                        $string .= '
                        
                        <li class="menu-item" id="list-question">
                        <a href="list-question.php" class="menu-link">
                          <div data-i18n="Alerts">Thắc mắc</div>
                        </a>
                      </li>'
                      ;
                      }

                      $string .= '</ul> </li>';
                      
                      echo $string;

                    }
                  ?>

                  <!-- Buying -->
                  <?php 

                    // if(){

                      if($ctrl->checkprivilege(  $privilegeUser_array, "list_product.php") ||  $ctrl->checkprivilege(  $privilegeUser_array, "list_discount.php")  ||  $ctrl->checkprivilege(  $privilegeUser_array, "list_warehouse.php")){

                        $string =
                          '<li class="menu-item">
                            <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-box"></i>
                              <div data-i18n="">Bán hàng</div>
                            </a>
                            <ul class="menu-sub">
                          ';

                        if($ctrl->checkprivilege(  $privilegeUser_array, "list_product.php")){
                          $string .= '
                          <li class="menu-item" id="list-products">
                            <a href="list_product.php" class="menu-link" >
                              <div data-i18n="">Sản phẩm</div>
                            </a>
                          </li>';
                          
                        }

                        if($ctrl->checkprivilege(  $privilegeUser_array, "list_discount.php")){
                          $string .= '
                          
                          <li class="menu-item" id="list-discount">
                            <a href="list_discount.php" class="menu-link">
                              <div data-i18n="Alerts">Mã giảm giá</div>
                            </a>
                          </li>'
                        ;
                        }

                        if($ctrl->checkprivilege(  $privilegeUser_array, "list_warehouse.php")){
                          $string .= '
                          
                          <li class="menu-item" id="list-warehouse">
                            <a href="list_warehouse.php" class="menu-link">
                              <div data-i18n="Alerts">Kho hàng</div>
                            </a>
                          </li>'
                        ;
                        }

                        $string .= '</ul> </li>';
                        
                        echo $string;

                      }
                    ?>

                  <!-- Order -->
                  <?php 

                    // if(){

                      if($ctrl->checkprivilege(  $privilegeUser_array, "list-order.php") ){

                        $string =
                          '<li class="menu-item" >
                              <a href="list-order.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-box"></i>
                                <div data-i18n="">Đơn hàng</div>
                              </a>
                            </li>';                        
                        echo $string;

                      }
                    ?>

                    <!-- Brand -->

                    <?php 
                      if($ctrl->checkprivilege(  $privilegeUser_array, "list_supplier.php") ){

                        $string =
                          ' 
                          <li class="menu-item one" id="list-brand">
                            <a href="list_supplier.php" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-box"></i>
                              <div data-i18n="">Thương hiệu</div>
                            </a>
                          </li>';                        
                        echo $string;

                      }
                    ?>


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
                                        <img src= "<?= $GLOBALS['USER_DIRECTORY_SHOW']."User_employee_file1.jpg"?>" alt
                                            class="set-height-avatar w-px-40  rounded-circle" style="height:44px" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="" alt
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
                                        <a class="dropdown-item" href="index.php?exit=yes">
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


    