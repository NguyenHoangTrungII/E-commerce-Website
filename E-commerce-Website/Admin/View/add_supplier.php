<?php
  include("include/top.php");
  include("include/menu.php");
?>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực / </span> <a class="fw-light" href="" style="color: #b1b1b1">Nhân viên
                            / </a>Thêm nhà cung cấp</h4>

                        <hr class="my-5" />
                        <!-- Basic Layout -->
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
                                                        placeholder="Nhập tên nhà cung cấp" />
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="form-label">Danh mục</label>
                                                    <select class="category-select2" multiple="multiple" style="width:100%">
                                                      <option value="O1" data-badge="">Option1</option>
                                                      <option value="O2" data-badge="">Option2</option>
                                                      <option value="O3" data-badge="">Option3</option>
                                                      <option value="O4" data-badge="">Option4</option>
                                                      <option value="O5" data-badge="">Option5</option>
                                                      <option value="O6" data-badge="">Option6</option>
                                                      <option value="O7" data-badge="">Option7</option>
                                                      <option value="O8" data-badge="">Option8</option>
                                                      <option value="O9" data-badge="">Option9</option>
                                                      <option value="O10" data-badge="">Option10</option>
                                                      <option value="O11" data-badge="">Option11</option>
                                                      <option value="O12" data-badge="">Option12</option>
                                                      <option value="O13" data-badge="">Option13</option>
                                                    </select>
                                                        
                                                </div>
                                            </div>
                                           

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label ">Ảnh</label>
                                                <input class="form-control add-infor user" type="file" id="formFile review-image-label" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                            </div>

                                            <div class="mb-5">
                                                <label for="formFile" class="form-label">Xem trước</label>
                                                    <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 160px; height: 160px;">
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

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


<?php
  include("include/tail.php");
?>

<script>
  $(document).ready(function() {

    $('.category-select2').select2(
      {
          width: 'resolve'
      }
    );
  });
</script>
