<?php
  include("include/menu.php");
  include("include/top.php");
?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực / </span> <a class="fw-light" href="" style="color: #b1b1b1">Nhân viên
                            / </a>Thêm sản phẩm vào kho</h4>

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
                                        <h5 class="mb-0">Thông tin <span>sản phẩm trong kho</span></h5>
                                        <small class="text-muted float-end">Thêm thông tin</small>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="mb-3 col-xl-12">
                                                    <label class="form-label" for="basic-default-fullname">Tên sản phẩm</label>
                                                    <input type="text" class="form-control" id="warehouse-name-product"
                                                        placeholder="Nhập tên nhà cung cấp" />
                                                </div>
                                                <div class="mb-3 col-xl-12">
                                                    <label class="form-label" for="basic-default-fullname">Số lượng nhập</label>
                                                    <input type="text" class="form-control" id="amount-import"
                                                        placeholder="Số lượng nhập" />
                                                </div>
                                                
                                            </div>
                                           

                                           





                                            <button type="button" class="btn-save-edit btn btn-primary">Lưu</button>
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

    $(".btn-save-edit").on("click", function(){
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
        info['tensp'] = $("#warehouse-name-product").val();
        info['soluongton'] = $("#amount-import").val();



        var file_a = $('#file-slider-add').prop('files')[0];  
        var form_data = new FormData();  
        form_data.append("other_data", JSON.stringify(info))  ;
        form_data.append("file_arr", file_a) ;

         $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/emptyCheck.php",
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
                        $('.add_employee-form')[0].reset();

                        // xóa ảnh
                        $(".img-preview").attr('src', " ");
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
