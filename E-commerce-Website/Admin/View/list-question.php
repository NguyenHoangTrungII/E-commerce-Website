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
                    <li class="menu-item active open">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="">Phản hồi</div>
                        </a>
                        <ul class="menu-sub ">
                            <li class="menu-item">
                                <a href="list-rate.php" class="menu-link">
                                    <div data-i18n="">Đánh giá</div>
                                </a>
                            </li>
                            <li class="menu-item active">
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Phản hồi /</span> Thắc mắc</h4>

                        <hr class="my-5" />

                        <!-- Bootstrap Table with Header - Footer -->
                        <div class="card">
                            <div class="card-header header table-user">
                                <h5 class=" card-header">Thông tin đánh giá</h5>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table user">
                                    <thead>
                                        <tr>
                                            <th class="id-header question">Mã</th>
                                            <th class="name-user question">Người dùng</th>
                                            <th class="date question">Ngày gửi</th>
                                            <th class="status question">Tình trạng</th>
                                            <th class="content question">Nội dung</th>
                                            <th class="action question">Thao tác</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="id-header question">
                                                1
                                            </td>
                                            <td class="name-user question">
                                                Nguyễn Hoàng Trung
                                            </td>
                                            <td class="date question">
                                                1/1/2020
                                            </td>
                                            <td class="status question">
                                                <label class="toggle-switchy pl-2" for="fitter-product" data-size="sm"
                                                    data-text="false" data-style="rounded" data-toggle="collapse"
                                                    data-target="#filterbar" aria-expanded="true"
                                                    aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                                                    <input checked="" type="checkbox" id="fitter-product">
                                                    <span class="toggle">
                                                        <span class="switch"></span>
                                                    </span>
                                                </label>
                                            </td>
                                            <td class="content question">
                                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                            </td>
                                            <td class="action question">
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu action--none">
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#modalLong"><i
                                                                class="bx bx-info-circle"></i> Xem thông tin chi
                                                            tiết</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-1"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot class="table-border-bottom-0">
                                        <tr>
                                            <th class="id-header question">Mã</th>
                                            <th class="name-user question">Người dùng</th>
                                            <th class="date question">Ngày gửi</th>
                                            <th class="status question">Tình trạng</th>
                                            <th class="content question">Nội dung</th>
                                            <th class="action question">Thao tác</th>
                                        </tr>
                                    </tfoot>

                                    <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLongTitle">Thông tin chi tiết</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xl">
                                                            <div class="card mb-4">
                                                                <div
                                                                    class="card-header d-flex justify-content-between align-items-center">
                                                                    <h5 class="mb-0">Thông tin <span>phản hồi</span>
                                                                    </h5>
                                                                    <small class="text-muted float-end">Xem thông
                                                                        tin</small>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form>

                                                                        <div class="mb-3 col-xl-12">
                                                                            <label class="form-label"
                                                                                for="basic-default-fullname">Người
                                                                                dùng: </label>
                                                                            <label class="form-label"
                                                                                for="basic-default-fullname">Nguyễn
                                                                                Hoàng Trung</label>
                                                                        </div>



                                                                        <div class="row">

                                                                            <div class="mb-3 col-md-6">
                                                                                <label class="form-label"
                                                                                    for="basic-default-date_post">Ngày
                                                                                    đăng: </label>
                                                                                <label class="form-label"
                                                                                    for="basic-default-date_post">1/1/2020
                                                                                </label>

                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="basic-default-message">Nội
                                                                                dung</label>
                                                                            <textarea id="basic-default-message"
                                                                                class="form-control"
                                                                                placeholder="Nhập mô tả cho danh mục"
                                                                                disabled></textarea>
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