<?php
    include("include/top.php");
    include("include/menu.php");
?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website / </span> <a class="fw-light"
                href="list-category.php" style="color: #b1b1b1">Danh mục
                / </a>Thêm danh mục</h4>

            <hr class="my-5" />
            <!-- Basic Layout -->
            <div class="row">
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Thông tin <span>Danh mục</span></h5>
                    <small class="text-muted float-end">Thêm thông tin</small>
                  </div>
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="mb-3 col-xl-6">
                          <label class="form-label" for="basic-default-fullname">Tên danh mục</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                            placeholder="Nhập tên danh mục" />
                        </div>
                        <div class="mb-3 col-xl-6">
                          <label class="form-label" for="basic-default-slug">Slug</label>
                          <input type="text" class="form-control" id="basic-default-slug"
                            placeholder="Nhập slug tên miền" />
                        </div>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Mô tả</label>
                        <textarea id="basic-default-message" class="form-control" placeholder="Nhập mô tả cho danh mục"></textarea>
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                        <div class="input-group">
                          <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                          <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                            onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple>
                      </div>

                      <div class="mb-5">
                        <label for="formFile" class="form-label">Xem trước</label>
                        <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 300px; height: 160px;">
                            <img src="../assets/img/avatars/1.png" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Lưu</button>
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