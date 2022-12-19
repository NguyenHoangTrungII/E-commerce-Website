<?php
    session_start();
    require_once("../Controller/Controller.php");
    require_once("../Admin/Model/ModelAll.php");
    require_once("../Admin/config/databse.php");
    require_once("../Admin/config/site.php");

    $Model= new ModelAll;
    $stmt = $Model->connection->prepare("SELECT * FROM quenmatkhau WHERE sel = ? AND han_token >= NOW()");
    $stmt->execute([$_REQUEST['selector']]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($results)) {
        @$calc = hash('sha256', hex2bin($_REQUEST['validator']));
        if (!hash_equals($calc, $results[0]['token'])) {
            echo "Liên kết của bạn không hợp lệ hoặc đã hết hạn, vui lòng thử lại sau";
            exit();
        }
        
    }
    else{
        echo "Liên kết của bạn không hợp lệ hoặc đã hết hạn, vui lòng thử lại sau";
        exit();
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
                                    <h5 class="header__title-login text-uppercase text-center pb-2">ĐẶT LẠI MẬT KHẨU</h5>

                                    <div class=" erro-alert alert alert-danger alert-dismissible" role="alert" hidden>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                    <div class="success-laert alert alert-info alert-dismissible" role="alert"  hidden>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                    <form>

                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form3Example1cg">Mật khẩu mới</label>
                                            <input type="text" id="user_pass" class="form-control form-control" name="user_pass"/>
                                        </div>

                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form3Example1cg">Nhập lại mật khẩu mới</label>
                                            <input type="text" id="user_pass_2" class="form-control form-control" name="user_pass_2"/>
                                        </div>

                                        <div class="d-flex justify-content-center pt-4">
                                            <button id="id_acc" class ="<?=  $results[0]['id_taikhoan']?>" hidden></button>
                                            <button type="button" class="btn btn-primary-color fw-bold text-white " id="reset-pass-btn" name="customer_reset" style="width: 100%; height: 40px;">Đặt lại mật khẩu</button>
                                        </div>

                                        <!-- <p class="text-center mt-4 mb-0">Bạn muốn chưa lấy được mật khẩu mới?<a href="forgot-password.php"
                                            class=" px-1 fst-italic text-body text-sm-start"><u>Quên mật khẩu</u></a></p> -->
                                        
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
    $("#reset-pass-btn").on("click", function(){
        var pass = $("#user_pass").val();
        var pass_remind = $("#user_pass_2").val();
        var id_acc = $('#id_acc').attr('class');

        // alert(pass);
        $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/ResetPassword/check_new_pass.php",
        data: {pass_remind: pass_remind, pass:pass, id_acc: id_acc},
        type: 'POST',
        dataType: "text",
        success: function(data){ 
            if(data==1){
                $('.alert.alert-info.alert-dismissible').text("Cập nhật mật khẩu thành công");
                $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                $('.alert.alert-info.alert-dismissible').prop('hidden', false);

                setTimeout(function(){
                $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                window.location.href="http://localhost/DoAnWeb/DoAnWeb_testMVC/View/login.php";

                }, 2000);

                
            }
            else{
                $('.alert.alert-danger.alert-dismissible').text(data);
                $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
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