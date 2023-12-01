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

    var other_data = $('form').serialize(); // page_id=&category_id=15&method=upload&required%5Bcategory_id%5D=Category+ID
    alert(other_data);
    var file_a = $('#formFile-review-image-label').prop('files')[0];  
    // var form_data = new FormData();  
    // form_data.append("file_a", file_a)  ;
    // form_data.append("insert", '1') 

    const info={};
    info['hoten'] = $(".name-text").val();
    info['ngaysinh'] = $("#birthday-input").val(); //format khi làm php
    info['gioitinh']= $('.Gender-cb:checked').val();
    info['email'] = $("#basic-default-email").val();
    info['sdt'] = $("#basic-default-phone").val();
    info['tinh_thanhpho'] = checkAdress($( "#Provice option:selected" ).val(), $( "#Provice option:selected" ).text());
    info['quan_huyen'] = checkAdress($( "#District option:selected" ).val(), $( "#District option:selected" ).text());
    info['phuong_xa'] = checkAdress($( "#Town option:selected" ).val(), $( "#Town option:selected" ).text());
    info['diachi'] = $("#Address").val();
    // info['anh'] = file_a.name !=null ? "User_Employee_"+file_a.name : " ";

    // alert( info['anh']);

    var a = JSON.stringify(info);
     $.ajax({
        url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/emptyCheck.php",
        type:"POST",
        dataType: "json",
        data:JSON.stringify(info),
        contentType: 'application/json; charset=utf-8',
        async: false,
        success: function(data){
            console.log(data);

            switch(data){
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