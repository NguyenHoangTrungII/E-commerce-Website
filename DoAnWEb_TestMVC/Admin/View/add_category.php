<?php
    include("include/menu.php");
    include("include/top.php");
?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website / </span> <a class="fw-light"
                href="list-category.php" style="color: #b1b1b1">Danh mục
                / </a>Thêm danh mục</h4>

            <hr class="my-5" />

            <div class="alert alert-danger alert-dismissible" role="alert" hidden>
              This is a danger dismissible alert — check it out!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-info alert-dismissible" role="alert" hidden >
              This is an info dismissible alert — check it out!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            
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
                          <input type="text" class="form-control" id="category-name-add"
                            placeholder="Nhập tên danh mục" />
                        </div>
                        <div class="mb-3 col-xl-6">
                          <label class="form-label" for="basic-default-slug">Slug</label>
                          <input type="text" class="form-control" id="category-slug-add"
                            placeholder="Nhập slug tên miền" />
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-6">
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Số thứ tự</label>
                        <input type="text" class="form-control" id="category-number-add"
                            placeholder="Nhập số thứ tự" />                      
                      </div>
                      </div>

                      <div class="col-6">
                      <div class="mb-3 col-md-4 text-center">
                            <label class="form-label col-12 pb-2" for="category-show-add">Hiển thị</label>
                            <label class="toggle-switchy pl-2" for="status-sli-add" data-size="sm" data-text="false"
                              data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true"
                              aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                              <input id="status-sli-add" checked="" type="checkbox" id="category-show-add">
                              <span class="toggle">
                                <span class="switch"></span>
                              </span>
                            </label>

                        </div>
                      </div>
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                        <div class="input-group">
                          <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                          <input name= "avatar-employee" class="form-control add-infor user" type="file" id="file-category-add" 
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
                      <button type="button" class="btn btn-primary" id="btn-add-category">Lưu</button>
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

<script>
  $("#file-slider-add").on("change", function(){ 
    var file_name = $('input[type=file]').val().split('\\').pop();
    var file_extension = file_name.split('.').pop();
    $.ajax({
      url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/file_img.php",
      type:"POST",
      data:{file_extension: file_extension },
      success: function(data){
          if(data==1){
              $('.upload-notify').attr('style', 'color:#33A0FF;padding-left: 20px');
              $(".upload-notify").html("<i class='bx bxs-check-circle pl-3'></i> Tải ảnh thành công");
              setTimeout(function(){
              $(".upload-notify").html("");
              }, 2000)
              $('.btn-save-edit.btn.btn-primary').prop('disabled', false);


          }
          else if(data==0){
              $(".upload-notify").html("");
              $('.upload-notify').attr('style', 'color:#ff3333;padding-left: 20px');
              $(".upload-notify").html("<i class='bx bxs-x-circle pl-3'></i>Loại ảnh không được cho phép");
              $('.btn-save-edit.btn.btn-primary').prop('disabled', true);
          }
          
      }     
    });
  });


  $("#btn-add-category").on("click", function(){
    var info={};
    info['tendanhmuc'] = $("#category-name-add").val();
    info['slug'] = $("#category-slug-add").val();
    info['sothutu'] = $("#category-number-add").val();
    info['hienthi'] =  document.getElementById("status-sli-add").checked ? 1 : 0;

    // sử lý file dữ liệu
    var file_a = $('#file-category-add').prop('files')[0];  
    var form_data = new FormData();  
    form_data.append("other_data", JSON.stringify(info))  ;
    form_data.append("file_arr", file_a) ;
      $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/Admin/Controller/Category/create-add-category.php",
        data: form_data,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "text",
        success: function(data){
            console.debug( data);

            switch(parseInt(data) ){
                case 0:
                    {
                    $('.alert.alert-danger.alert-dismissible').text("Không được để trống miền giá trị nào");
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                    $("html, body").animate({scrollTop: 0}, 1000);
                    }
                    break;
                case 1:
                    {
                    $('.alert.alert-info.alert-dismissible').text("Thêm thành công");
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                    $('.add-slider-form')[0].reset();

                    // xóa ảnh
                    $(".img-preview-sli").attr('src', " ");
                    $('input[type=file]').val("");
                        
                    $("html, body").animate({scrollTop: 0}, 1000);
                    }
                break;
                case -1:{
                    $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                    $("html, body").animate({scrollTop: 0}, 1000);
                }
                break;

            }
            
        }
            
            
    });


    });
</script>