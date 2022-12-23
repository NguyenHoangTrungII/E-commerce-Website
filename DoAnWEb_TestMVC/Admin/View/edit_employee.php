<?php
    // session_start();
   include("include/menu.php");
   include("include/top.php");
   include("include/session.php");
    
//    include("../Model/ModelAll.php");
   include("../config/databse.php");
    include("../config/site.php");
?>

<?php
    // $Model = new ModelAll;

    if(isset($_GET['id'])){
        $columnName = $tableName = $whereValue =   $joinCondition = $employeeInfo = null;
        $columnName = "*";
        $tableName['MAIN'] = "taikhoan";
        $tableName['1'] ='nguoidung';
        $whereValue['nguoidung.id']= $_GET['id'];

        $joinCondition = array ("1"=>array ('taikhoan.id', 'nguoidung.id_taikhoan'));
        $employeeInfo = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
        // var_dump($employeeInfo);
        
        //Lưu giá trị email, phone để sử dụng check form
        $phone_input_old = $employeeInfo[0]['sdt'];
        $email_input_old =  $employeeInfo[0]['email'];
        // var_dump( $phone_input_old);
        
        $columnName = $tableName = null;
        $columnName['id']='id';
        $tableName= "tinh_thanhpho";
        $whereValue['tinh_thanhpho']= $employeeInfo[0]['tinh_thanhpho'];
        $whereCondition ="LIKE";
        $employeeInfo_Provice = $Model->selectData($columnName, $tableName, $whereValue, $whereCondition);
        // var_dump($employeeInfo[0]['tinh_thanhpho']    );
        ##=======LẤY DỮ LIỆU=======##
    }
?>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực / </span> <a class="fw-light" href="" style="color: #b1b1b1">Nhân viên
                            / </a>Sửa nhân viên</h4>

                        <hr class="my-5" />
                        <!-- Basic Layout -->

                             <!-- alert warning -->
                        <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                            This is a danger dismissible alert — check it out!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="alert alert-info alert-dismissible" role="alert" hidden >
                            This is an info dismissible alert — check it out!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Thông tin <span>nhân viên</span></h5>
                                        <small class="text-muted float-end">Sửa thông tin</small>
                                    </div>
                                    <div class="card-body">
                                        <form class="edit_employee-form">
                                            <div class="row">
                                                <div class="mb-3 col-xl-6">
                                                    <label class="form-label" for="basic-default-fullname">Họ
                                                        tên</label>
                                                    <input type="text" id= "id-emp-edit" value="<?= $employeeInfo[0]['id_taikhoan'] ?>" hidden>
                                                    <input type="text" class="name-text form-control" value="<?= $employeeInfo[0]['hoten'] ?>" id="basic-default-fullname"
                                                        placeholder="Nhập họ và tên" />
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="form-label">Ngày sinh</label>
                                                    <input class="birthday-input form-control" type="date" value="<?= $employeeInfo[0]['ngaysinh'] ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check col-xl-4">
                                                    <label class="form-label mb-3" for="basic-default-phone">Giới
                                                        tính</label>
                                                    <div class="row px-4">
                                                        <?php
                                                            if($employeeInfo[0]['gioitinh']==1){
                                                                echo 
                                                                '
                                                                    <div class="col-6">
                                                                        <input name="Gender " class="Gender-cb form-check-input"
                                                                            type="radio" value="1" checked>
                                                                        <label class="form-check-label" for="defaultRadio2"> Nam
                                                                        </label>
                                                                    </div>
    
                                                                    <div class="col-6">
                                                                        <input name="Gender " class="Gender-cb form-check-input"
                                                                            type="radio" value="0" >
                                                                        <label class="form-check-label" for="defaultRadio1">
                                                                            Nữ </label>
                                                                    </div>
                                                                ';
                                                            }
                                                            else{
                                                                echo 
                                                                '
                                                                    <div class="col-6">
                                                                        <input name="Gender" class="Gender-cb form-check-input"
                                                                            type="radio" value="1">
                                                                        <label class="form-check-label" for="defaultRadio2"> Nam
                                                                        </label>
                                                                    </div>
    
                                                                    <div class="col-6">
                                                                        <input name="Gender" class="Gender-cb form-check-input"
                                                                            type="radio" value="0" checked>
                                                                        <label class="form-check-label" for="defaultRadio1">
                                                                            Nữ </label>
                                                                    </div>
                                                                ';
                                                            }
                                                        ?>
                                                        <!-- <div class="col-6">
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
                                                        </div> -->
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-email">Email</label><span class="Error-notify-email"></span>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="email-edit-value"
                                                                class="email-input form-control" placeholder="nguyenhoangtrunghs"
                                                                aria-label="" aria-describedby="basic-default-email2" value="<?= $employeeInfo[0]['email'] ?>" />
                                                            
                                                        </div>
                                                        <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-phone">Số điện
                                                            thoại</label><span class="Error-notify-phone"></span>
                                                        <input type="text" id="phone-edit-value"
                                                            class="phone-input form-control phone-mask" placeholder="0123456789" value="<?= $employeeInfo[0]['sdt'] ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="Provice_edit" class="form-label">Tỉnh/Thành
                                                            phố</label>
                                                        <select id="Provice_edit" class="form-select" style="width:100%">
                                                            <option value=0><?= $employeeInfo[0]['tinh_thanhpho']?></option>
                                                            <!-- <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option> -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="District_edit" class="form-label">Quận/Huyện</label>
                                                        <select id="District_edit" class="form-select">
                                                            <option value=0><?= $employeeInfo[0]['quan_huyen']?></option>
                                                            <!-- <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option> -->
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="Town_edit" class="form-label">Phường/Xã</label>
                                                        <select id="Town_edit" class="form-select">
                                                            <option value=0><?= $employeeInfo[0]['phuong_xa']?></option>
                                                            <!-- <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Địa chỉ</label>
                                                <textarea id="basic-default-message" class="Address-textarea form-control"
                                                    placeholder="Địa chỉ" ><?= $employeeInfo[0]['diachi'] ?></textarea>
                                            </div>


                                            <div class="row">
                                                
                                                <div class="mb-3 col-6">
                                                    <label class="form-label col-12" for="basic-default-slug">Tình trạng</label>

                                                    <label class="toggle-switchy pl-2" for="status-emp-edit" data-size="sm"
                                                    data-text="false" data-style="rounded" data-toggle="collapse"
                                                    data-target="#filterbar" aria-expanded="true" aria-controls="filterbar"
                                                    id="filter-btn" onclick="changeBtnTxt()">
                                                    <input class="status-emp-edit" <?php echo $employeeInfo[0]['trangthai'] == 1 ? "checked " : " " ?> type="checkbox" id="status-emp-edit">
                                                    <span class="toggle" >
                                                        <span class="switch"></span>
                                                    </span>
                                                    </label>
                                                </div>
                                                
                                                <div class="col-xl-4 col-6">
                                                    <div class="mb-3">
                                                        <label for="role-emp-edit" class="form-label">Vai trò</label>
                                                        <select id="role-emp-edit" class="form-select" style="width: 100%;" >
                                                            <option value="-1">Chọn vai trò</option>
                                                            <option <?php echo $employeeInfo[0]['vaitro']==2 ? "selected ":" " ?> value="2">Nhân viên</option>
                                                            <option <?php echo $employeeInfo[0]['vaitro']==1 ? "selected ":" "?> value="1">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                                                <div class="input-group">
                                                    <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                                                    <input name= "avatar-employee" class="form-control Employee-img-preview" type="file" id="imgFile-edit-employee" 
                                                      accept=".jfif,.jpg,.jpeg,.png,.gif" set-to="div4"  onchange="readURL(this)"/>
                                                <!-- <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                                     onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple> -->
                                            </div>

                                            <div class="mb-5">
                                                <label for="formFile" class="form-label">Xem trước</label>
                                                    <!-- <div class="fileupload fileupload-new border-5" data-provides="fileupload"> -->
                                                        <div id="Preview-filed" >
                                                            <img src="<?= $GLOBALS['USER_DIRECTORY_SHOW'].$employeeInfo[0]['anh'] ?>"  class ="img-preview-emp" alt="<?php echo $employeeInfo[0]['anh'] ?>" id="div4" style="width: 20%;">
                                                        </div>
                                                    <!-- </div> -->
                                            </div>
                                            <button type="button" id="btn-edit-employee" class="btn-save-edit btn btn-primary">Lưu</button>
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

<!-- sử dụng select2 để tạo select search  -->
<script>
    $(document).ready(function() {

        $('#Provice_edit').select2(
        {
            width: 'resolve'
        }
        );

        $('#District_edit').select2(
        {
            width: 'resolve'
        }
        );

        $('#Town_edit').select2(
        {
            width: 'resolve'
        }
        );

    });
</script>

<!-- ajax lấy tỉnh thành phố -->
<script >
    $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/LayTinh.php",       
        dataType:'json',         
        success: function(data){     
            for (i=0; i<data.length; i++){            
                var provice = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                console.debug(provice);
                $('#Provice_edit').append($('<option>', {value:provice['id'], text:provice['name']}));
            }


            $("#Provice_edit").on("change", function(e){
                $("#Town_edit").html("");
                $("#Town_edit").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                var Provice_id = $( "#Provice_edit option:selected" ).val();
                console.debug(Provice_id);
                $.ajax({
                    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetDistrict.php?ProviceId=" + Provice_id,
                    dataType:'json',         
                    success: function(data){  
                        $("#District_edit").html("");
                        $("#District_edit").append($('<option>', {value:-1, text:"Chọn quận/huyện"}));
                        
                        for (i=0; i<data.length; i++){            
                        var district = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                        
                        // console.log(district);
                        $('#District_edit').append($('<option>', {value:district['id'], text:district['name']}));
                        }  
                        
                        $("#District_edit").on("change", function(e){
                            var District_id = $( "#District_edit option:selected" ).val();
                            console.log(District_id);
                            $.ajax({
                                url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetTown.php?DistrictId=" + District_id,
                                dataType:'json',         
                                success: function(data){  
                                    // console.log(data);
                                    $("#Town_edit").html("");
                                    $("#Town_edit").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                                    for (i=0; i<data.length; i++){            
                                    var town = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                                    
                                    $('#Town_edit').append($('<option>', {value:town['id'], text:town['name']}));
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

<!-- check lỗi đồng thời email, phone, ảnh realtime by ajax -->
<script>
    let checkNotify1 = 1;
    let checkNotify2= 1;
    let checkNotify3= 1;
    const email_input_old = $("#email-edit-value").val();
    const phone_input_old = $("#phone-edit-value").val();
    $("#email-edit-value").on("focusout keyup keydown blur change ",function(e){
        var $ele = $(this);
        var email_input = $("#email-edit-value").val();
        console.log(email_input);
        console.log(email_input_old);
        //Nếu email bị thay đổi-> báo như thường, phòng trường họp check email-> email của bạn đã tồn tại trong hệ thống
        if(email_input!= email_input_old){
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
        }
        else{
            $(".Error-notify-email").html("");
        }
        
    });

    $("#phone-edit-value").on("focusout keyup keydown blur change",function(e){
        var phone_input = $("#phone-edit-value").val();
        //Tương tư như email
        // console.debug(phone_input_old);
        if(phone_input != phone_input_old){
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
        }
        else{
            $(".Error-notify-phone").html("")
        }
    });
    

    $("#imgFile-edit-employee").on("change", function(){ 
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
                        // $(".img-preview-emp").attr("src", "../../public/uploads/users/"+data['anh_moi']);
                        
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

                        //ẨN ảnh cũ đi
                        $('img.img-preview-emp').removeProp('src').hide();
                        $('input[type=file]').val("");
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

    $("#btn-edit-employee").on("click", function(){
        var info={};
        info['id'] = $("#id-emp-edit").val();
        info['hoten'] = $(".name-text").val();
        console.debug(info['hoten']);
        info['ngaysinh'] = $(".birthday-input").val(); 
        info['gioitinh']= $('.Gender-cb:checked').val();
        info['email'] = $(".email-input").val();
        info['sdt'] = $(".phone-input").val();
        info['tinh_thanhpho'] = checkAdress($( "#Provice_edit option:selected" ).val(), $( "#Provice_edit option:selected" ).text());
        info['quan_huyen'] = checkAdress($( "#District_edit option:selected" ).val(), $( "#District_edit option:selected" ).text());
        info['phuong_xa'] = checkAdress($( "#Town_edit option:selected" ).val(), $( "#Town_edit option:selected" ).text());
        info['diachi'] = $(".Address-textarea").val();
        info['trangthai'] = document.getElementById("status-emp-edit").checked ? 1 : 0;
        info['vaitro']= $('#role-emp-edit option:selected').val()!=-1 ? $('#role-emp-edit option:selected').val() : " ";
        info['anh_cu'] = $('.img-preview-emp').attr("alt");

        // alert(info['anh_cu']);
        var file_a = $('#imgFile-edit-employee').prop('files')[0];  
        var form_data = new FormData(); 
        //lưu file ảnh dưới dạng file, nén thông tin dưới dạng json để qua php xử lý
        form_data.append("other_data", JSON.stringify(info))  ;
        form_data.append("file_arr", file_a)  ;
         $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Employee/update-employee.php",
            data: form_data,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: "json",
            success: function(data){
                console.debug( data['anh_moi']);

                switch(parseInt(data['tinhtrang']) ){
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
                        //Doi path cho anh, sau nay neu muon sua tiesp se khong bi loi
                        $(".img-preview-emp").attr("src", "../../public/uploads/users/"+data['anh_moi']);
                        $(".img-preview-emp").attr("alt", data['anh_moi']);

                        
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