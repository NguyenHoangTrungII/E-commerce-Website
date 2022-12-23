<?php
    require_once("include/top.php");
    require_once("include/menu.php");

?>

?>

<?php 

  if(!$ctrl->checkprivilege( $privilegeUser_array, "delete_rate.php", $role)){
    $delete_status = "hidden";
  }else{
    $delete_status = "";
  }


?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Phản hồi /</span> Đánh giá</h4>

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
                                            <th class="id-header rate">Mã</th>
                                            <th class="name-user rate">Người dùng</th>
                                            <th class="date rate">Ngày đăng</th>
                                            <th class="content rate">Nội dung</th>
                                            <th class="rate-product rate">Đánh giá</th>
                                            <th class="for-product rate">Cho sản phẩm</th>
                                            <th class="action rate" <?= $delete_status ?>>Thao tác</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
                                            <td class="id-header rate">
                                                1
                                            </td>
                                            <td class="name-user rate">
                                                Nguyễn Hoàng Trung
                                            </td>
                                            <td class="date rate">
                                                1/1/2020
                                            </td>
                                            <td class="content rate">
                                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaâ
                                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaâ
                                            </td>
                                            <td class="rate-product rate">
                                                5 sao
                                            </td>
                                            <td class="for-product rate">
                                                Intel i7
                                            </td>
                                            <td class="action rate">
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
                                        </tr> -->
                                        <tr>
                                            <td class="id-header rate">
                                                1
                                            </td>
                                            <td class="name-user rate">
                                                Nguyễn Hoàng Trung
                                            </td>
                                            <td class="date rate">
                                                1/1/2020
                                            </td>
                                            <td class="content rate">
                                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaâ
                                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaâ
                                            </td>
                                            <td class="rate-product rate">
                                                5 sao
                                            </td>
                                            <td class="for-product rate">
                                                Intel i7
                                            </td>
                                            <td class="action rate" <?= $delete_status ?>>
                                                <div class="dropdown" <?= $delete_status ?>>
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu action--none"  <?= $delete_status ?>>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-1"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot class="table-border-bottom-0">
                                        <tr>
                                            <th class="id-header rate">Mã</th>
                                            <th class="name-user rate">Người dùng</th>
                                            <th class="date rate">Ngày đăng</th>
                                            <th class="img rate">Nội dung</th>
                                            <th class="rate-product rate">Đánh giá</th>
                                            <th class="for-product rate">Cho sản phẩm</th>
                                            <th class="action rate" <?= $delete_status ?>>Thao tác</th>
                                        </tr>
                                    </tfoot>



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