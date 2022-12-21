<?php
  include("include/menu.php");
  include("include/top.php");
?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực / </span> <a
                                class="fw-light" href="list_discount.php" style="color: #b1b1b1">Khuyến mãi
                                / </a>Thêm khuyến mãi</h4>

                        <hr class="my-5" />
                        <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Thông tin <span>khuyến mãi</span></h5>
                                        <small class="text-muted float-end">Thêm thông tin</small>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="mb-3 col-xl-12">
                                                    <label class="form-label" for="basic-default-fullname">Tên khuyến
                                                        mãi</label>
                                                    <input type="text" class="form-control" id="basic-default-fullname"
                                                        placeholder="Nhập tên khuyến mãi" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label class="form-label" for="basic-default-fullname">Mã khuyến
                                                        mãi</label>
                                                    <input type="text" class="form-control" id="basic-default-fullname"
                                                        placeholder="Nhập mã khuyến mãi" />
                                                </div>
                                                <div class="col-xl-4">
                                                    <label class="form-label" for="basic-default-fullname">Loại khuyến mãi</label>
                                                    <select id="defaultSelect" class="form-select">
                                                        <option>Chọn loại khuyến mãi</option>
                                                        <option value="1">Miễn phí vận chuyển</option>
                                                        <option value="2">Giảm giá</option>
                                                    </select>
                                                </div>

                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-phone">Đơn tối thiểu</label>
                                                        <input type="text" id="basic-default-phone"
                                                            class="form-control phone-mask" placeholder="0Đ" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <label class="form-label" for="basic-default-fullname">Từ ngày</label>
                                                    <input class="form-control" type="date" value="">
                                                </div>
                                                <div class="col-xl-5">
                                                    <label class="form-label" for="basic-default-fullname">Đến ngày</label>
                                                    <input class="form-control" type="date" value="">
                                                </div>

                                                <div class="mb-3 col-xl-2 text-center">
                                                    <label class="form-label pb-2">Tình trạng</label><br>
                                                    <label class="toggle-switchy" for="example_textless_4"
                                                        data-size="sm" data-text="false" data-style="rounded">
                                                        <input checked type="checkbox" id="example_textless_4">
                                                        <span class="toggle">
                                                            <span class="switch"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Nội dung</label>
                                                <textarea id="basic-default-message" class="form-control"
                                                    placeholder="Nhập nội dung mã khuyến mãi"></textarea>
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



            </div>
            <!-- / Layout page -->
        </div>

<?php
  include("include/tail.php");
?>