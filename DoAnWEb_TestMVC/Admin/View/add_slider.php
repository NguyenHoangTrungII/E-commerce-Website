<?php
  include("include/menu.php");
  include("include/top.php");
?>
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website / </span> <a class="fw-light"
                href="list-slider.php" style="color: #b1b1b1">Slider
                / </a>Thêm silder</h4>

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
                    <small class="text-muted float-end">Thêm thông tin</small>
                  </div>
                  <div class="card-body">
                    <form class="add-slider-form">

                      <div class="mb-3 col-xl-12">
                        <label class="form-label" for="basic-default-fullname">Tên slider</label>
                        <input type="text" class="form-control" id="name-slider"
                          placeholder="Nhập tên slider" />
                      </div>



                      <div class="mb-3">
                          <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                          <div class="input-group">
                              <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                              <input name= "avatar-slider" class="form-control Slider-img-preview" type="file" id="file-slider-add" 
                                accept=".jfif,.jpg,.jpeg,.png,.gif" set-to="div4"  onchange="readURL(this)"/>
                          <!-- <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple> -->
                          </div>

                          <div class="mb-5">
                          <label for="formFile" class="form-label">Xem trước</label>
                              <!-- <div class="fileupload fileupload-new border-5" data-provides="fileupload"> -->
                                  <div id="Preview-filed" >
                                      <img src="$GLOBALS['SLIDES_DIRECTORY_SHOW']"  class ="img-preview-sli" alt="" id="div4" style="width: 20%;">
                                  </div>
                              <!-- </div> -->
                          </div>

                          <div class="mb-3 col-md-4 text-center">
                            <label class="form-label col-12 pb-2" for="basic-default-slug">Tình trạng</label>
                            <label class="toggle-switchy pl-2" for="status-sli-add" data-size="sm" data-text="false"
                              data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true"
                              aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                              <input id="status-sli-add" checked="" type="checkbox" id="fitter-product">
                              <span class="toggle">
                                <span class="switch"></span>
                              </span>
                            </label>

                          </div>

                          <div class="mb-3 col-md-4">
                            <label class="form-label" for="basic-default-fullname">Số thứ tự</label>
                            <input type="number" class="form-control" id="stt-slider"
                              placeholder="Nhập số thứ tự" />
                        </div>

                        

                      </div>
                      <button type="button" id="btn-add-slider" class="btn-save-edit btn btn-primary" name="create_slider">Lưu</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>


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
</script>


<!-- kiem tra hong tin chua dien  -->
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

    $("#btn-add-slider").on("click", function(){
        //Lấy thông tin input
        // var name = $(".name-text").val();
        // var birthday = $("#birthday-input").val(); //format khi làm php
        // var gender = $('.Gender-cb:checked').val();
        // var email = $("#basic-default-email").val();
        // var phone = $("#basic-default-phone").val();
        // var provice = checkAdress($( "#Provice option:selected" ).val(), $( "#Provice option:selected" ).text());
        // var district = checkAdress($( "#District option:selected" ).val(), $( "#District option:selected" ).text());
        // var town = checkAdress($( "#Town option:selected" ).val(), $( "#Town option:selected" ).text());
        // var address = $("#Address").val();

        // var other_data = $('form').serialize(); // page_id=&category_id=15&method=upload&required%5Bcategory_id%5D=Category+ID
        // alert(other_data);
        // var form_data = new FormData();  
        // form_data.append("file_a", file_a)  ;
        // form_data.append("insert", '1') 

        var info={};
        info['tenslider'] = $("#name-slider").val();
        info['url'] = $("#img-slider").val();
        info['sothutu'] = $("#stt-slider").val();
        info['tinhtrang'] = document.getElementById("status-sli-add").checked ? 1 : 0;


        var file_a = $('#file-slider-add').prop('files')[0];  
        var form_data = new FormData();  
        form_data.append("other_data", JSON.stringify(info))  ;
        form_data.append("file_arr", file_a) ;

         $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/Admin/Controller/Slider/create-add-slider.php",
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
                            // $('.alert.alert-danger.alert-dismissible').text("");
                        $('.alert.alert-danger.alert-dismissible').text("Không được để trống miền giá trị nào");
                        // $(".alert.alert-danger.alert-dismissible").php("Không được để trống miền giá trị nào");
                        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                        // $('.btn-close-danger').prop('hidden', false);
                        $("html, body").animate({scrollTop: 0}, 1000);
                        }
                        break;
                    case 1:
                       {
                         //$('.alert.alert-danger.alert-dismissible').text("");
                         $('.alert.alert-info.alert-dismissible').text("Thêm thành công");
                        // $(".alert.alert-danger.alert-dismissible").php("Không được để trống miền giá trị nào");
                        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                        // $('.btn-close-danger').prop('hidden', false);
                            //xóa dữ liệu trong form
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
