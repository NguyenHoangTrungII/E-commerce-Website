<?php
    include("include/menu.php");
    include("include/top.php");
?>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực / </span> <a class="fw-light" href="list-employee.php" style="color: #b1b1b1">Nhân viên
                            / </a>Thêm nhân viên</h4>

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
                                        <h5 class="mb-0">Thông tin <span>nhân viên</span></h5>
                                        <small class="text-muted float-end">Thêm thông tin</small>
                                    </div>
                                    <div class="card-body">
                                        <form class="add_employee-form">
                                            <div class="row">
                                                <div class="mb-3 col-xl-6">
                                                    <label class="form-label" for="basic-default-fullname">Họ
                                                        tên</label>
                                                    <input type="text" class="name-text form-control" id="basic-default-fullname"
                                                        placeholder="Nhập họ và tên" />
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="form-label">Ngày sinh</label>
                                                    <input id="birthday-input" class=" form-control" type="date" value="1/1/20200">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class=" col-xl-4 pl-1">
                                                    <label class="form-label mb-3" for="basic-default-phone">Giới
                                                        tính</label>
                                                        <div class="row">
                                                        <div class=" col-6">
                                                            <input
                                                            name="Gender"
                                                            class="Gender-cb form-check-input"
                                                            type="radio"
                                                            value="0"
                                                            id="Female"
                                                            />
                                                            <label class="form-check-label" for="defaultRadio1"> Nữ </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input
                                                            name="Gender"
                                                            class="Gender-cb form-check-input"
                                                            type="radio"
                                                            value="1"
                                                            id="Male"
                                                            checked
                                                            />
                                                            <label class="form-check-label" for="defaultRadio2"> Nam </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-email">Email</label> <span class="Error-notify-email"></span>
                                                            <input type="text" id="basic-default-email"
                                                                class="form-control" placeholder="nguyenhoangtrunghs"
                                                                aria-label=""
                                                                aria-describedby="basic-default-email2" />
                                                            <!-- <span class="input-group-text"
                                                                id="basic-default-email2">@gmail.com</span> -->
                                                            <!-- <label class="Error-notify-email form-label"
                                                            for="basic-default-email"></label> -->
                                                        <!-- </div> -->
                                                        <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-phone">Số điện
                                                            thoại</label> <span class="Error-notify-phone"></span>
                                                        <input type="text" id="basic-default-phone"
                                                            class="form-control phone-mask"
                                                            placeholder="0123456789" />
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="Provice" class="form-label" >Tỉnh/Thành phố</label>
                                                        <select class="form-select " id="Provice"  style="width: 100%;" >
                                                            <option>Chọn tỉnh/thành phố</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="District" class="form-label">Quận/Huyện</label>
                                                        <select id="District" class="form-select" style="width: 100%;" >
                                                            <option value="-1">Chọn quận/huyên</option>
                                                            <!-- <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option> -->
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label for="Town" class="form-label">Phường/Xã</label>
                                                        <select id="Town" class="form-select" style="width: 100%;" >
                                                            <option value="-1">Chọn phường/xã</option>
                                                            <!-- <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Địa chỉ</label>
                                                <textarea id="Address" class="form-control"
                                                    placeholder="Địa chỉ" ></textarea>
                                            </div>

                                            <div class="row">
                                                <div class="mb-3 col-6">
                                                    <label class="form-label col-12" for="basic-default-slug">Tình trạng</label>

                                                    <label class="toggle-switchy pl-2" for="fitter-product" data-size="sm"
                                                    data-text="false" data-style="rounded" data-toggle="collapse"
                                                    data-target="#filterbar" aria-expanded="true" aria-controls="filterbar"
                                                    id="filter-btn" onclick="changeBtnTxt()">
                                                    <input class="status-emp-add" checked type="checkbox" id="fitter-product">
                                                    <span class="toggle" >
                                                        <span class="switch"></span>
                                                    </span>
                                                    </label>
                                                </div>

                                                <div class="col-xl-4 col-6">
                                                    <div class="mb-3">
                                                        <label for="role-emp-add" class="form-label">Vai trò</label>
                                                        <select id="role-emp-add" class="form-select" style="width: 100%;" >
                                                            <option value="-1">Chọn vai trò</option>
                                                            <option value="1">Nhân viên</option>
                                                            <option value="2">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                                                <div class="input-group">
                                                    <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                                                    <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                                      accept=".jfif,.jpg,.jpeg,.png,.gif"  onchange="previewImages()" multiple/>
                                                <!-- <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                                     onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple> -->
                                            </div>

                                            <div class="mb-5">
                                                <label for="formFile" class="form-label">Xem trước</label>
                                                    <!-- <div class="fileupload fileupload-new border-5" data-provides="fileupload"> -->
                                                        <div id="Preview-filed" >
                                                            <!-- <img src="../assets/img/avatars/1.png" class ="img-preview" alt=""  id="div3" style="width: 20%;"> -->
                                                        </div>
                                                    <!-- </div> -->
                                            </div>
                                            <button type="button" id="btn-add-employee" class="btn-save-edit btn btn-primary" name="create_employee">Lưu</button>
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
        $(document).ready(function() {

            $('#Provice').select2(
            {
                width: 'resolve'
            }
            );

            $('#District').select2(
            {
                width: 'resolve'
            }
            );

            $('#Town').select2(
            {
                width: 'resolve'
            }
            );

        });

        $(".btn-remove-img").on("click", function(){
            $(".img-preview").attr('src', " ");
            $('input[type=file]').val("");
        })


</script>


<!-- Kiểm tra tính hợp lệ của email, số điện thoại, upload file realtime -->
<script>
    let checkNotify1 = 1;
    let checkNotify2= 1;
    let checkNotify3= 1;
    $("#basic-default-email").on("focusout keyup keydown blur change ",function(e){
        var $ele = $(this);
        var email_input = $("#basic-default-email").val();
        $.ajax({
                url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/email.php",
                type:"POST",
                data:{email_input: email_input},
                success: function(data){
                   if(data==1){
                        $('.Error-notify-email').attr('style', 'color:#33A0FF;padding-left: 20px');
                        $(".Error-notify-email").html("<i class='bx bxs-check-circle pl-3'></i> Email hợp lệ");
                        setTimeout(function(){
                        $(".Error-notify-email").html("");
                        }, 2000)
                        checkNotify1=1;
                        if(checkNotify1==1 && checkNotify2 && checkNotify3 ){
                            $('.btn-save-edit.btn.btn-primary').prop('disabled', false);
                        }

                        
                    }
                    else {
                        $(".Error-notify-email").html("");
                        $('.Error-notify-email').attr('style', 'color:#ff3333;padding-left: 20px');
                        $(".Error-notify-email").html("<i class='bx bxs-x-circle pl-3'></i>"+data);
                        $('.btn-save-edit.btn.btn-primary').prop('disabled', true);
                        checkNotify1 = 0;

                    }
                }
                
            });
    });

    $("#basic-default-phone").on("focusout keyup keydown blur change",function(e){
        var phone_input = $("#basic-default-phone").val();
        $.ajax({
                url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/phone.php",
                type:"POST",
                data:{phone_input: phone_input},
                success: function(data){
                    if(data==1 ){
                        $('.Error-notify-phone').attr('style', 'color:#33A0FF;padding-left: 20px');
                        $(".Error-notify-phone").html("<i class='bx bxs-check-circle pl-3'></i> Số điện thoại hợp lệ");
                        setTimeout(function(){
                        $(".Error-notify-phone").html("");
                        }, 2000)
                        checkNotify2=1;
                        if(checkNotify1==1 && checkNotify2 && checkNotify3){
                            $('.btn-save-edit.btn.btn-primary').prop('disabled', false);
                        }
                    }
                    else{
                        $(".Error-notify-phone").html("");
                        $('.Error-notify-phone').attr('style', 'color:#ff3333;padding-left: 20px');
                        $(".Error-notify-phone").html("<i class='bx bxs-x-circle pl-3'></i>"+data);
                        $('.btn-save-edit.btn.btn-primary').prop('disabled', true);
                        checkNotify2=0;
                    }
                }

                
            });
    });

    $("#formFile-review-image-label").on("change", function(){ 
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
                        checkNotify3 =1;
                        if(checkNotify1==1 && checkNotify2 && checkNotify3)
                        {
                            $('.btn-save-edit.btn.btn-primary').prop('disabled', false);
                        }

                    }
                    else if(data==0){
                        $(".upload-notify").html("");
                        $('.upload-notify').attr('style', 'color:#ff3333;padding-left: 20px');
                        $(".upload-notify").html("<i class='bx bxs-x-circle pl-3'></i>Loại ảnh không được cho phép");
                        $('.btn-save-edit.btn.btn-primary').prop('disabled', true);
                        checkNotify3=0;
                    }
                    
                }     
        });
    });

</script>


<!-- Ajax kiểm tra thông tin chưa điền, file ảnh không hợp lệ v.v.v.v -->
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

    $("#btn-add-employee").on("click", function(){
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
        info['hoten'] = $(".name-text").val();
        info['ngaysinh'] = $("#birthday-input").val(); 
        info['gioitinh']= $('.Gender-cb:checked').val();
        info['email'] = $("#basic-default-email").val();
        info['sdt'] = $("#basic-default-phone").val();
        info['tinh_thanhpho'] = checkAdress($( "#Provice option:selected" ).val(), $( "#Provice option:selected" ).text());
        info['quan_huyen'] = checkAdress($( "#District option:selected" ).val(), $( "#District option:selected" ).text());
        info['phuong_xa'] = checkAdress($( "#Town option:selected" ).val(), $( "#Town option:selected" ).text());
        info['diachi'] = $("#Address").val();
        info['trangthai'] = document.getElementById("fitter-product").checked ? 1 : 0;
        info['vaitro']= $('#role-emp-add option:selected').val()!=-1 ? $('#role-emp-add option:selected').val() : " ";
       
        console.debug(info['vaitro']);


        var file_a = $('#formFile-review-image-label').prop('files')[0];  
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
                        // $('.btn-close-anger').prop('hidden', false);
                            //xóa dữ liệu trong form
                        $('.add_employee-form')[0].reset();

                        //reset tỉnh thành phố
                        $("#Provice").val("-1").change();
                        
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


<script>
    $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/LayTinh.php",       
        dataType:'json',         
        success: function(data){     
            $("#Provice").html("");
            $("#Provice").append($('<option>', {value:-1, text:"Chọn tỉnh/thành phố"}));
            for (i=0; i<data.length; i++){            
                var provice = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                // console.log(provice);
                $('#Provice').append($('<option>', {value:provice['id'], text:provice['name']}));
            }

            $("#Provice").on("change", function(e){
                $("#Town").html("");
                $("#Town").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                var Provice_id = $( "#Provice option:selected" ).val();
                console.log(Provice_id);
                $.ajax({
                    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetDistrict.php?ProviceId=" + Provice_id,
                    dataType:'json',         
                    success: function(data){  
                        $("#District").html("");
                        $("#District").append($('<option>', {value:-1, text:"Chọn quận/huyện"}));
                        
                        for (i=0; i<data.length; i++){            
                        var district = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                        
                        // console.log(district);
                        $('#District').append($('<option>', {value:district['id'], text:district['name']}));
                        }  
                        
                        $("#District").on("change", function(e){
                            var District_id = $( "#District option:selected" ).val();
                            console.log(District_id);
                            $.ajax({
                                url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetTown.php?DistrictId=" + District_id,
                                dataType:'json',         
                                success: function(data){  
                                    // console.log(data);
                                    $("#Town").html("");
                                    $("#Town").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                                    for (i=0; i<data.length; i++){            
                                    var town = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                                    
                                    $('#Town').append($('<option>', {value:town['id'], text:town['name']}));
                                    }                  
                                }

                    
                             });
                        });
                    }

                    
                });
            });

        }
    });

</script>
