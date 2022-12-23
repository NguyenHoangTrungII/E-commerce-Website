<?php
      // session_start();
      include("include/menu.php");
      include("include/session.php");
      include("include/top.php");
      // include("../Model/ModelAll.php");
      include("../config/databse.php");
    include("../config/site.php");
?>


<?php
    // $Model = new ModelAll;

    if(isset($_GET['id'])){
        ##=======LẤY DỮ LIỆU=======##
        $columnName = $tableName = $whereValue =   $joinCondition = $employeeInfo = null;
        $columnName = "*";
        $tableName = "slider";
        $sliderList = $Model->selectData($columnName, $tableName);
        $whereValue['id']= $_GET['id'];
        // var_dump($whereValue['id']);
        // $whereCondition ="!=";
        $sliderInfo = $Model->selectData($columnName, $tableName,  $whereValue);
        // var_dump($sliderInfo);
       
       
        ##=======LẤY DỮ LIỆU=======##
    }
?>




        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website / </span> <a class="fw-light"
                href="list-category.php" style="color: #b1b1b1">Slider
                / </a>Sửa silder</h4>

            <hr class="my-5" />
             <!-- alert warning -->
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
                    <h5 class="mb-0">Thông tin <span>Slider</span></h5>
                    <small class="text-muted float-end">Sửa thông tin</small>
                  </div>
                  <div class="card-body">
                    <form>

                      <div class="mb-3 col-xl-12">
                        <label class="form-label" for="basic-default-fullname">Tên slider</label>
                        <input type="text" id= "id-sli-edit" value="<?= $sliderInfo[0]['id'] ?>" hidden>
                        <input type="text" class="form-control" value="<?= $sliderInfo[0]['tenslider'] ?>" id="name-slider"
                          placeholder="Nhập tên danh mục" />
                      </div>
                     <div class="row">
                      <div class="mb-3 col-md-3">
                      <label class="form-label col-12" for="basic-default-slug">Tình trạng</label>

                        <label class="toggle-switchy pl-2" for="status-sli-edit" data-size="sm"
                        data-text="false" data-style="rounded" data-toggle="collapse"
                        data-target="#filterbar" aria-expanded="true" aria-controls="filterbar"
                        id="filter-btn" onclick="changeBtnTxt()">
                        <input class="status-sli-edit" <?php echo $sliderInfo[0]['tinhtrang'] == 1 ? "checked " : " " ?> type="checkbox" id="status-sli-edit">
                        <span class="toggle" >
                            <span class="switch"></span>
                        </span>
                        </label>

                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label" for="basic-default-fullname">Số thứ tự</label>
                          <input type="text" class="form-control" value="<?= $sliderInfo[0]['sothutu'] ?>"id="stt-slider"
                            placeholder="Nhập tên danh mục" />
                        </div>
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                          <div class="input-group">
                              <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                              <input name= "photo-slider" class="form-control slider-img-preview" type="file" id="imgFile-edit-slider" 
                                accept=".jfif,.jpg,.jpeg,.png,.gif" set-to="div4"  onchange="readURL(this)"/>
                          <!-- <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple> -->
                          </div>

                          <div class="mb-5">
                              <label for="formFile" class="form-label">Xem trước</label>
                                  <!-- <div class="fileupload fileupload-new border-5" data-provides="fileupload"> -->
                                      <div id="Preview-filed" >
                                          <img src="<?= $GLOBALS['SLIDES_DIRECTORY_SHOW'].$sliderInfo[0]['url'] ?>" alt="<?= $sliderInfo[0]['url']?>" class ="img-preview-sli" alt="<?php $sliderInfo[0]['url'] ?> "id="div4" style="width: 20%;">
                                      </div>
                                  <!-- </div> -->
                          </div>

                        

                        <!-- <div class="mb-5">
                          <label for="formFile" class="form-label">Xem trước</label>
                          <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 300px; height: 160px;">
                              <img src="../assets/img/avatars/1.png" alt="">
                            </div>
                          </div>
                        </div> -->

                      </div>

                      <button type="button" class="btn-save-edit btn btn-primary" id="btn-edit-slide">Lưu</button>
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

    $("#btn-edit-slide").on("click", function(){
      var info={};
        info['id']=$("#id-sli-edit").val();
        info['tenslider'] = $("#name-slider").val();
        info['url'] = $("#img-slider").val();
        info['sothutu'] = $("#stt-slider").val();
        info['tinhtrang'] = document.getElementById("status-sli-edit").checked ? 1 : 0;
        info['anh_cu'] = $('.img-preview-sli').attr("alt");
        // alert(info['anh_cu']);

        var file_a = $('#imgFile-edit-slider').prop('files')[0];  
        var form_data = new FormData(); 
        //lưu file ảnh dưới dạng file, nén thông tin dưới dạng json để qua php xử lý
        form_data.append("other_data", JSON.stringify(info))  ;
        form_data.append("file_arr", file_a)  ;
         $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/admin/Controller/Slider/update-slider.php",
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
                        $(".img-preview-sli").attr("src", "../../public/uploads/slides/"+data['anh_moi']);
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