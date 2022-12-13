<?php
  include("include/top.php");
  include("include/menu.php");
?>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực / </span> <a class="fw-light" href="list-employee.php" style="color: #b1b1b1">Nhân viên
                            / </a>Thêm khách hàng</h4>

                        <hr class="my-5" />
                        <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Thông tin <span>khách hàng</span></h5>
                                        <small class="text-muted float-end">Thêm thông tin</small>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="mb-3 col-xl-6">
                                                    <label class="form-label" for="basic-default-fullname">Họ
                                                        tên</label>
                                                    <input type="text" class="form-control" id="basic-default-fullname"
                                                        placeholder="Nhập họ và tên" />
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="form-label">Ngày sinh</label>
                                                    <input class="form-control" type="date" value="Chọn ngày si">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check col-xl-4">
                                                    <label class="form-label mb-3" for="basic-default-phone">Giới
                                                        tính</label>
                                                    <div class="row px-4">
                                                        <div class="col-6">
                                                            <input name=" GioiTinh" class="form-check-input"
                                                                type="radio" value="" checked>
                                                            <label class="form-check-label" for="defaultRadio2"> Nam
                                                            </label>
                                                        </div>

                                                        <div class="col-6">
                                                            <input name="GioiTinh" class="form-check-input"
                                                                type="radio" value="" >
                                                            <label class="form-check-label" for="defaultRadio1">
                                                                Nữ </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-email">Email</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="basic-default-email"
                                                                class="form-control" placeholder="nguyenhoangtrunghs"
                                                                aria-label=""
                                                                aria-describedby="basic-default-email2" />
                                                            <span class="input-group-text"
                                                                id="basic-default-email2">@gmail.com</span>
                                                        </div>
                                                        <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-phone">Số điện
                                                            thoại</label>
                                                        <input type="text" id="basic-default-phone"
                                                            class="form-control phone-mask"
                                                            placeholder="0123456789" />
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="defaultSelect" class="form-label">Tỉnh/Thành
                                                            phố</label>
                                                        <select id="defaultSelect" class="form-select">
                                                            <option>Chọn tỉnh/thành phố</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="defaultSelect" class="form-label">Quận/Huyện</label>
                                                        <select id="defaultSelect" class="form-select">
                                                            <option>Chọn quận/huyên</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="defaultSelect" class="form-label">Phường/Xã</label>
                                                        <select id="defaultSelect" class="form-select">
                                                            <option>Chọn phường/xã</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Địa chỉ</label>
                                                <textarea id="basic-default-message" class="form-control"
                                                    placeholder="Địa chỉ"></textarea>
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