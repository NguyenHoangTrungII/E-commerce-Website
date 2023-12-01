<?php

session_start();
include("include/session.php");
include("include/top.php");
include("include/menu.php");
include("../Model/ModelAll.php");
include("../config/databse.php");
include("../config/site.php");
?>


<?php
$Model = new ModelAll;

if(isset($_GET['id'])){
  ##=======LẤY DỮ LIỆU=======##
  $columnName = $tableName = null;
  $columnName = "*";
  $tableName = "danhmucsp";
  // $categoryList = $Model->selectData($columnName, $tableName);
  $whereValue['id']= $_GET['id'];

  $categoryInfo = $Model->selectData($columnName, $tableName,  $whereValue);
}
?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website / </span> <a class="fw-light"
                href="list-category.php" style="color: #b1b1b1">Danh mục
                / </a>Sửa danh mục</h4>

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
                    <small class="text-muted float-end">Sửa thông tin</small>
                  </div>
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="mb-3 col-xl-6">
                          <label class="form-label" for="basic-default-fullname">Tên danh mục</label>
                          <input type="text" id= "id-catedogry-edit" value="<?= $categoryInfo[0]['id'] ?>" hidden>
                          <input type="text" class="form-control" id="category-name-edit"
                            placeholder="Nhập tên danh mục" value="<?= $categoryInfo[0]['ten']   ?>" />
                        </div>
                        <div class="mb-3 col-xl-6">
                          <label class="form-label" for="basic-default-slug">Slug</label>
                          <input type="text" class="form-control" id="category-slug-edit"
                            placeholder="Nhập slug tên miền" value="<?= $categoryInfo[0]['slug'] ?>" />
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-6">
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Số thứ tự</label>
                        <input type="text" class="form-control" id="category-number-edit"
                            placeholder="Nhập số thứ tự" value="<?= $categoryInfo[0]['sothutu'] ?>"/>                      
                      </div>
                      </div>

                      <div class="col-6">
                      <div class="mb-3 col-md-4 text-center">
                            <label class="form-label col-12 pb-2" for="category-category-edit">Hiển thị</label>
                            <label class="toggle-switchy pl-2" for="category-category-edit" data-size="sm" data-text="false"
                              data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true"
                              aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                              <input id="category-category-edit" <?= $categoryInfo[0]['hienthi'] ==1? "checked" : " " ?> type="checkbox">
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
                          <input name= "avatar-employee" class="form-control add-infor user" type="file" id="category-file-edit" 
                            onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple>
                      </div>

                      <div class="mb-5">
                        <label for="formFile" class="form-label">Xem trước</label>
                        <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 300px; height: 160px;">
                            <img src="<?= $GLOBALS['CATEGORY_DIRECTORY_SHOW'].$categoryInfo[0]['anh'] ?>" alt="<?= $categoryInfo[0]['anh']?>" class="img-preview-category" style="width: 50%" >
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-primary" id="btn-edit-category">Lưu</button>
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

<!-- Ajax kiểm tra thông tin chưa điền, file ảnh không hợp lệ đồng thời nộp file v.v.v.v -->
<script>
    function checkAdress(data_value, data_text){
        var data;
        if(data_value == -1 ){
            data="";
        } else{
            data= data_text;
        }
        return data;
    }

    function getNameImg(path_img){
        return path_img.match(/\w*(?=.\w+$)/);
    }

    $("#btn-edit-category").on("click", function(){
      var info={};
        info['id']=$("#id-catedogry-edit").val();
        info['ten'] = $("#category-name-edit").val();
        // info['anh'] = $("#img-slider").val();
        info['slug'] = $("#category-slug-edit").val();
        info['sothutu'] =$("#category-number-edit").val();
        info['hienthi'] = document.getElementById("category-category-edit").checked ? 1 : 0;
        
        info['anh_cu'] = $('.img-preview-category').attr("alt");
        // alert(info['anh_cu']);

        var file_a = $('#category-file-edit').prop('files')[0];  
        var form_data = new FormData(); 
        //lưu file ảnh dưới dạng file, nén thông tin dưới dạng json để qua php xử lý
        form_data.append("other_data", JSON.stringify(info))  ;
        form_data.append("file_arr", file_a)  ;
         $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/admin/Controller/Category/update-category.php",
            data: form_data,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: "JSON",
            success: function(data){
                console.debug( data['tinhtrang']);

                switch((data['tinhtrang']) ){
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
                         $('.alert.alert-info.alert-dismissible').text("Sửa thông tin thành công");
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                        $("html, body").animate({scrollTop: 0}, 1000);
                        $(".img-preview-sli").attr("src", "../../public/uploads/categarys/"+data['anh_moi']);
                        $(".img-preview-sli").attr("alt", data['anh_moi']);
                       }
                        break;
                    case -1:{
                        $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                        $("html, body").animate({scrollTop: 0}, 1000);
                        }
                        break;
                    case 2:{
                        $('.alert.alert-danger.alert-dismissible').text("Bạn chưa thay đổi miền giá trị nào");
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