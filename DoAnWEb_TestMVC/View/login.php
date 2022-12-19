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
                                    <h5 class="header__title-login text-uppercase text-center pb-2">ĐĂNG NHẬP</h5>

                                    <div class="login__with-gg text-center ">
                                        <div class="btn btn-with fw-bold" style="border: 1px solid #9999; width: 100%;">
                                            <img class="login__with-gg-img" src="../../assets/img/login/Google__G__Logo.svg"
                                                alt="">
                                            Đăng nhập với google
                                        </div>

                                        <div class="login__another fw-bold">

                                            <div class="divider text-center position-relative my-3">
                                                <span class="line position-absolute start-0 end-0 "
                                                    style="background-color: #d4d4d4;"></span>

                                                <div class="content position-relative bg-white px-3 mx-auto">
                                                    <span class="fw-bold" style="color:#8e8e8e">Hoặc</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="alert alert-danger alert-dismissible" id ="login-info-error" role="alert" >
                                        Thông báo realtime login
                                    </div>
                                    <div class="alert alert-info alert-dismissible" id ="login-info-success" role="alert" hidden >
                                        Thông báo realtime login
                                    </div> -->

                                    <form>

                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form3Example1cg">Địa chỉ email</label>
                                            <input type="text" id="user_email" class="form-control form-control" name="user_email"/>
                                        </div>

                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                                            <input type="password" id="user_pass"
                                                class="form-control form-control" name="user_pass"/>
                                        </div>

                                        <div class="form-check d-flex justify-content-start pt-3 pb-3">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3cg" />
                                            <label class="form-check-label" for="form2Example3g">
                                                Nhớ mật khẩu
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary-color fw-bold text-white " id="login-btn" name="customer_login">Đăng
                                                nhập</button>
                                        </div>


                                        <p class="text-center mt-4 mb-0"><a href="forgot-password.php"
                                                class=" px-1 fst-italic text-body text-sm-start"><u>Quên mật
                                                    khẩu?</u></a></p>
                                        <div class="vr"></div>
                                        <p class="text-center mt-3 mb-0">Chưa có tài khoản? <a href="Singup.php"
                                                class=" fst-italic text-body"><u>Đăng ký </u></a></p>
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

<!-- <script>
    $("#login-btn").on("click", function(){
        var pass = $("#user_pass").val();
        var email = $("#user_email").val();
        $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Login/check_login.php",
        data: {email: email, pass:pass},
        type: 'POST',
        dataType: "text",
        success: function(data){ 
            if(data==1){
                $('.alert.alert-info.alert-dismissible').text("Sửa thông tin thành công");
                $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                $("html, body").animate({scrollTop: 0}, 1000);

                setTimeout(function(){
                $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                }, 2000);
            }
            else{
                $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
                $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                $("html, body").animate({scrollTop: 0}, 1000);

                setTimeout(function(){
                $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                }, 5000);
            }
        } 
    });

    })
</script> -->

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