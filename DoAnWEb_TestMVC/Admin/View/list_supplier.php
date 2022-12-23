<?php
  include("include/menu.php");

  include("include/top.php");
?>

<?php 
  if(!$ctrl->checkprivilege( $privilegeUser_array, "add_supplier.php")){
    $add_status = "hidden";
  }else{
    $add_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "edit_supplier.php?id=4")){
    $edit_status = "hidden";
  }else{
    $edit_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "delete_supplier.php")){
    $delete_status = "hidden";
  }else{
    $delete_status = "";
  }

  if($delete_status == "" || $edit_status == ""){
    $dow_status ="";
  }
  else{
    $dow_status ="hidden";
  }


?>




                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Thương hiệu
                        </h4>

                        <hr class="my-5" />

                        <!-- Bootstrap Table with Header - Footer -->
                        <div class="card">
                            <div class="card-header header table-user">
                                <h5 class=" card-header">Thông tin thương hiệu</h5>
                                <a href="add_supplier.php"><button class="btn btn-primary add-btn user"
                                        type="button">THÊM</button></a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table user">
                                    <thead>
                                        <tr>
                                            <th class="id-header brand">Mã</th>
                                            <th class="name brand">Tên nhà cung cấp</th>
                                            <th class="img brand text-center">Ảnh</th>
                                            <th class="category brand">Danh mục</th>
                                            <th class="action brand">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="id-header brand">
                                              1000
                                            </td>
                                            <td class="name brand">
                                                Intel
                                            </td>
                                            <td class="img brand">
                                              <img src="" alt="Anh dai dien" class="photo-brand">
                                            </td> 
                                            <td class="category brand">
                                                CPU, VGA
                                            </td>
                                            <td class="action brand">
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

                                                        <a class="dropdown-item" href="edit_supplier.php"><i
                                                                class="bx bx-edit-alt me-1"></i>
                                                            Sửa</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-1"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="id-header brand">
                                              1000
                                            </td>
                                            <td class="name brand">
                                                Iaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                            </td>
                                            <td class="img brand">
                                              <img src="../../public/uploads/users/User_admin_anh-dai-dien.jpg" alt="Anh dai dien" class="photo-brand">
                                            </td> 
                                            <td class="category brand">
                                                CPU, VGA
                                            </td>
                                            <td class="action brand">
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu action--none">
                                                        <a class="dropdown-item " data-bs-toggle="modal"
                                                            data-bs-target="#modalLong"><i
                                                                class="bx bx-info-circle"></i> Xem thông tin chi
                                                            tiết</a>

                                                        <a class="dropdown-item" href="edit_supplier.php"><i
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
                                        <th class="id-header brand">Mã</th>
                                            <th class="name brand">Tên nhà cung cấp</th>
                                            <th class="img brand">Ảnh</th>
                                            <th class="category brand">Danh mục</th>
                                            <th class="action brand">Thao tác</th>
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
                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                            <h5 class="mb-0">Thông tin <span>nhà cung cấp</span></h5>
                                                            <small class="text-muted float-end">Thêm thông tin</small>
                                                        </div>
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="mb-3 col-xl-6">
                                                                        <label class="form-label" for="basic-default-fullname">Tên nhà cung cấp</label>
                                                                        <input type="text" class="form-control" id="basic-default-fullname"
                                                                            placeholder="Nhập tên nhà cung cấp" disabled>
                                                                    </div>
                                                                    <div class="mb-3 col-xl-6">
                                                                        <label class="form-label">Danh mục</label>
                                                                        <select class="selectpicker form-select" multiple disabled>
                                                                            <option>CPU</option>
                                                                            <option>RAM</option>
                                                                            <option>SSD</option>
                                                                            <option>HDD</option>
                                                                            <option>VGA</option>
                                                                            <option>RAM</option>
                                                                            <option>RAM</option>
                                                                          </select>
                                                                    </div>
                                                                </div>
                                                               
                    
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label ">Ảnh</label>
                                                                    <input class="form-control add-infor user" type="file" id="formFile review-image-label" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple disabled>
                                                                </div>
                    
                                                                <div class="mb-5">
                                                                    <label for="formFile" class="form-label">Xem trước</label>
                                                                        <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                                                                            <div class="fileupload-new thumbnail" style="width: 160px; height: 160px;">
                                                                                <img src="../assets/img/avatars/1.png" alt="">
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



<?php
  include("include/tail.php");
?>