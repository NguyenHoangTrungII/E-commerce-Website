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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Khuyến mãi</h4>

                        <hr class="my-5" />

                        <!-- Bootstrap Table with Header - Footer -->
                        <div class="card">
                            <div class="card-header header table-user">
                                <h5 class=" card-header">Danh sách sản phẩm</h5>
                                <a href="add_discount.php"><button class="btn btn-primary add-btn user"
                                        type="button">THÊM</button></a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table user">
                                    <thead>
                                        <tr>
                                            <th class="id-header discount">ID</th>
                                            <th class="name discount">Tên khuyến mãi</th>
                                            <th class="code discount">Mã khuyến mãi</th>
                                            <th class="type discount">Loại khuyến mãi</th>
                                            <th class="min discount">Tối thiểu</th>
                                            <th class="begin discount">Từ ngày</th>
                                            <th class="end discount">Đến ngày</th>
                                            <th class="status discount">Tình trạng</th>
                                            <th class="action discount">Thao tác</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="id-header discount">
                                          100
                                        </td>
                                        <td class="name discount">
                                          Tên khuyến mãiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                        </td>
                                        <td class="code discount">
                                          Mã khuyến mãi
                                        </td>
                                        <td class="type discount">
                                          Loại khuyến mãi</td>
                                        <td class="min discount">
                                         Tối thiểu
                                        </td>
                                        <td class="begin discount">
                                          Từ ngày
                                        </td>
                                        <td class="end discount">
                                          Đến ngày
                                        </td>
                                        <td class="status discount">
                                          Tình trạng
                                        </td>   
                                        <td class="action discount">
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

                                                        <a class="dropdown-item" href="edit_discount.php"><i
                                                                class="bx bx-edit-alt me-1"></i>
                                                            Sửa</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-1"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                      </tr>
                                    </tbody>
                                    <tfoot class="table-border-bottom-0">
                                      <tr>
                                        <th class="id-header discount">ID</th>
                                            <th class="directory product">Tên khuyến mãi</th>
                                            <th class="companny product">Mã khuyến mãi</th>
                                            <th class="name product">Loại khuyến mãi</th>
                                            <th class="img product">Tối thiểu</th>
                                            <th class="cost product">Từ ngày</th>
                                            <th class="percent-reduce product">Đến ngày</th>
                                            <th class="status product">Tình trạng</th>
                                            <th class="action product">Thao tác</th>
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
                                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                                        <h5 class="mb-0">Thông tin <span>khuyến mãi</span></h5>
                                                                        <small class="text-muted float-end">Sửa thông tin</small>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form>
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-12">
                                                                                    <label class="form-label" for="basic-default-fullname">Tên khuyến
                                                                                        mãi</label>
                                                                                    <input type="text" class="form-control" id="basic-default-fullname"
                                                                                        placeholder="Nhập tên khuyến mãi" disabled>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <label class="form-label" for="basic-default-fullname">Mã khuyến
                                                                                        mãi</label>
                                                                                    <input type="text" class="form-control" id="basic-default-fullname"
                                                                                        placeholder="Nhập mã khuyến mãi" disabled>
                                                                                </div>
                                                                                <div class="col-xl-4">
                                                                                    <label class="form-label" for="basic-default-fullname">Loại khuyến mãi</label>
                                                                                    <select id="defaultSelect" class="form-select" disabled>
                                                                                        <option>Chọn loại khuyến mãi</option>
                                                                                        <option value="1">Miễn phí vận chuyển</option>
                                                                                        <option value="2">Giảm giá</option>
                                                                                    </select>
                                                                                </div>
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="basic-default-phone">Đơn tối thiểu</label>
                                                                                        <input type="text" id="basic-default-phone"
                                                                                            class="form-control phone-mask" placeholder="0Đ" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <label class="form-label" for="basic-default-fullname">Từ ngày</label>
                                                                                    <input class="form-control" type="date" value="" disabled>
                                                                                </div>
                                                                                <div class="col-xl-5">
                                                                                    <label class="form-label" for="basic-default-fullname">Đến ngày</label>
                                                                                    <input class="form-control" type="date" value="" disabled>
                                                                                </div>
                                
                                                                                <div class="mb-3 col-xl-2 text-center">
                                                                                    <label class="form-label pb-2">Tình trạng</label><br>
                                                                                    <label class="toggle-switchy" for="example_textless_4"
                                                                                        data-size="sm" data-text="false" data-style="rounded">
                                                                                        <input checked type="checkbox" id="example_textless_4" disabled>
                                                                                        <span class="toggle">
                                                                                            <span class="switch"></span>
                                                                                        </span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="basic-default-message">Nội dung</label>
                                                                                <textarea id="basic-default-message" class="form-control"
                                                                                    placeholder="Nhập nội dung mã khuyến mãi" disabled></textarea>
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