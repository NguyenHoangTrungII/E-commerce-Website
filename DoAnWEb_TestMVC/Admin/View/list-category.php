<?php
    include("include/top.php");
    include("include/menu.php");
?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Danh mục</h4>

            <hr class="my-5" />

            <!-- Bootstrap Table with Header - Footer -->
            <div class="card">
              <div class="card-header header table-user">
                <h5 class=" card-header">Thông tin danh mục</h5>
                <a href="add_category.php"><button class="btn btn-primary add-btn user" type="button">THÊM</button></a>
              </div>
              <div class="table-responsive text-nowrap">
                <table class="table user">
                  <thead>
                    <tr>
                      <th class="id-header category">Mã</th>
                      <th class="name category">Danh mục</th>
                      <th class="slug category">Slug</th>
                      <th class="img category">Ảnh</th>
                      <th class="descript category">Mô tả</th>
                      <th class="action category">Thao tác</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="id-header category">
                        1
                      </td>
                      <td class="name category">
                        Bộ nhớ SSD
                      </td>
                      <td class="slug category">
                        Bo-nho-ssd
                      </td>
                      <td class="img category">
                        <img src="../assets/img/avatars/1.png" alt="Anh dai dien" class="photo-category">
                      </td>
                      <td class="descript category">
                        Danh mục bộ nhớ ssd
                      </td>
                      <td class="action category flex">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class=" bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu action--none">
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i
                                class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>

                            <a class="dropdown-item" href="edit_category.php"><i class="bx bx-edit-alt me-1"></i>
                              Sửa</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Xóa</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td class="id-header category">
                        1
                      </td>
                      <td class="name category">
                        Bộ nhớ SSD
                      </td>
                      <td class="slug category">
                        Bo-nho-ssd
                      </td>
                      <td class="img category">
                        <img src="../assets/img/avatars/1.png" alt="Anh dai dien" class="photo-category">
                      </td>
                      <td class="descript category">
                        Danh mục bộ nhớ ssd
                      </td>
                      <td class="action category flex">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class=" bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu action--none">
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i
                                class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>

                            <a class="dropdown-item" href="edit_category.php"><i class="bx bx-edit-alt me-1"></i>
                              Sửa</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Xóa</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                  </tbody>
                  <tfoot class="table-border-bottom-0">
                    <tr>
                      <th class="id-header category">Mã</th>
                      <th class="name category">Danh mục</th>
                      <th class="slug category">Slug</th>
                      <th class="img category">Ảnh</th>
                      <th class="descript category">Mô tả</th>
                      <th class="action category">Thao tác</th>
                    </tr>
                  </tfoot>

                  <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLongTitle">Thông tin chi tiết</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-xl">
                              <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                  <h5 class="mb-0">Thông tin <span>Danh mục</span></h5>
                                  <small class="text-muted float-end">Xem thông tin</small>
                                </div>
                                <div class="card-body">
                                  <form>
                                    <div class="row">
                                      <div class="mb-3 col-xl-6">
                                        <label class="form-label" for="basic-default-fullname">Tên danh mục</label>
                                        <input type="text" class="form-control" id="basic-default-fullname"
                                          placeholder="Nhập tên danh mục" disabled/>
                                      </div>
                                      <div class="mb-3 col-xl-6">
                                        <label class="form-label" for="basic-default-slug">Slug</label>
                                        <input type="text" class="form-control" id="basic-default-slug"
                                          placeholder="Nhập slug tên miền" disabled/>
                                      </div>
                                    </div>
              
                                    <div class="mb-3">
                                      <label class="form-label" for="basic-default-message">Mô tả</label>
                                      <textarea id="basic-default-message" class="form-control" placeholder="Nhập mô tả cho danh mục" disabled></textarea>
                                    </div>
              
                                    <div class="mb-5">
                                      <label for="formFile" class="form-label">Ảnh</label>
                                      <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 300px; height: 160px;">
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
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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