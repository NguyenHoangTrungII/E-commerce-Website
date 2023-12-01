<?php
session_start();
require_once("../Controller/Controller.php");
require_once("../Admin/Model/ModelAll.php");
require_once("../Admin/config/databse.php");
require_once("../Admin/config/site.php");

$Model= new ModelAll;
if(isset($_POST['customer_login']))
{
        $columnName = $tableName = null;
        $columnName['1']="nguoidung.id id_nguoidung";
        $columnName['2']="nguoidung.hoten hoten";
        $columnName['3']="nguoidung.tenhienthi tenhienthi";
        $columnName['4']="taikhoan.email email";
        $columnName['5']="nguoidung.sdt sdt";
        $columnName['6']="nguoidung.diachi diachi";
        $tableName['MAIN'] = "taikhoan";
        $tableName['1'] ='nguoidung';
        $whereValue['email']= $_POST['user_email'];
        $whereValue['matkhau']= sha1($_POST['user_pass']);
        $whereValue['vaitro']= 3;

        $joinCondition = array ("1"=>array ('taikhoan.id', 'nguoidung.id_taikhoan'));
        $userLogin = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
        // var_dump($employeeInfo);
    // var_dump($userLogin);

	
	if(!empty($userLogin))
	{
		$_SESSION['SSCF_login_time'] = date("Y-m-d H:i:s");
		$_SESSION['SSCF_login_id'] = $userLogin[0]['id_nguoidung'];
		$_SESSION['SSCF_login_user_name'] = $userLogin[0]['hoten'];
        $_SESSION['SSCF_login_user_showname'] = $userLogin[0]['tenhienthi'];
		$_SESSION['SSCF_login_user_email'] = $userLogin[0]['email'];
		$_SESSION['SSCF_login_user_mobile'] = $userLogin[0]['sdt'];
		$_SESSION['SSCF_login_user_address'] = $userLogin[0]['diachi'];
		
		echo '<meta http-equiv="Refresh" content="0; url=index.php" />';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        body {
            height: 100%;
            width: 100%;
            /* extended code */
            background-size: 100% 100%;
            background-position: center center;
            background-image: url('../assets/img/login/backgroup_login_SignUp.jpg');
        }
    </style>
</head>

<body>
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-11 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body login-sinup">
                                <form  method="post" action="">
                                    <h5 class="header__title-login text-uppercase text-center pb-2">QUÊN MẬT KHẨU</h5>

                                    <div class=" erro-alert alert alert-danger alert-dismissible" role="alert" hidden>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                    <div class="success-laert alert alert-info alert-dismissible" role="alert"  hidden>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                    <form>

                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form3Example1cg">Địa chỉ email</label>
                                            <input type="text" id="user_email" class="form-control form-control" name="user_email"/>
                                        </div>

                                        <div class="d-flex justify-content-center pt-4">
                                            <button type="button" class="reset-password-btn btn btn-primary-color fw-bold text-white " name="customer_reset" style="width: 100%; height: 40px; border-radius: 5px;">Lấy lại mật khẩu</button>
                                        </div>

                                        <p class="text-center mt-4 mb-0">Bạn muốn cài lại mật khẩu?<a href="password-change.php"
                                            class=" px-1 fst-italic text-body text-sm-start"><u>Cài lại mật
                                                    khẩu</u></a></p>
                                        
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.nice-select.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/jquery.slicknav.js"></script>
</body>



</html>

<!-- Kiểm tra tính hợp lệ của email, số điện thoại, upload file realtime -->

<script>
    $(".reset-password-btn").on("click", function(){
        var email = $("#user_email").val();
        var input ="Mã đặt lại mật khẩu đã gửi vào "+ email+". Nếu không thấy email được gửi, vui lòng kiểm tra lại email hoặcthử lại"
        $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/ResetPassword/check_reset-mail.php",
        data: {email: email},
        type: 'POST',
        dataType: "text",
        success: function(data){ 
            if(parseInt(data) ==1 || parseInt(data) ==-1){
                // console.debug(input);
                $('.alert.alert-info.alert-dismissible').text(input);
                $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                // $(".success-laert").html("<i class='bx bxs-check-circle pl-3'></i>"+iput+"");
                setTimeout(function(){
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                }, 10000)
                }
            else{
                $('.alert.alert-danger.alert-dismissible').text(data);
                $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                // $(".success-laert").html("<i class='bx bxs-check-circle pl-3'></i>"+iput+"");
                setTimeout(function(){
                    // $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                }, 6000)
            }
        } 
    });

    })
</script>

<!-- <script>
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
                        $('#login-info').html("Email hợp lệ")
                        setTimeout(function(){
                        $(".Error-notify-email").html("");
                        }, 2000)
                        checkNotify1=1;
                        if(checkNotify1==1 && checkNotify2 ){
                            $('.btn-save-edit.btn.btn-primary').prop('disabled', false);
                        }

                        
                    }
                    else {
                        $("#login-info").html(data);
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

                        setTimeout(function(){
                        $(".Error-notify-phone").html("");
                        }, 2000)
                        checkNotify2=1;
                        if(checkNotify1==1 && checkNotify2){
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

</script> -->