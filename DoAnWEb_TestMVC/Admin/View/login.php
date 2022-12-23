<?php
session_start();
include("../Controller/Controller.php");
include("../Controller/AdminController.php");
include("../config/databse.php");
include("../config/site.php");



$adminController = new AdminController;

if(isset($_POST['load_login']))
{
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	
	$adminData = $adminController->loadLogin( $email, $password );
	
	if(!empty($adminData))
	{
        //Lưu thông tin phiên đăng nhập vào session
		$_SESSION['SMC_login_time'] = date("Y-m-d H:i:s");
		$_SESSION['SMC_login_id'] = $adminData[0]['id'];
        $_SESSION['SMC_login_account_id'] = $adminData[0]['id_taikhoan'];
		$_SESSION['SMC_login_admin_name'] = $adminData[0]['hoten'];
        $_SESSION['SMC_login_admin_name'] = $adminData[0]['tenhienthi'];
		$_SESSION['SMC_login_admin_email'] = $adminData[0]['email'];
		$_SESSION['SMC_login_admin_image'] = $adminData[0]['anh'];
		$_SESSION['SMC_login_admin_status'] = $adminData[0]['trangthai'];
		$_SESSION['SMC_login_admin_type'] = $adminData[0]['vaitro'];
		
        // var_dump($_SESSION);
        //Chuyển hướng đến dashboard
		header("Location: list-employee.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

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
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <style>
        body {
            height: 100%;
            width: 100%;
            /* extended code */
            background-size: 100% 100%;
            background-position: center center;
            background-image: url('../../assets/img/login/backgroup_login_SignUp.jpg');
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
                                        <!-- <div class="btn btn-with fw-bold" style="border: 1px solid #9999; width: 100%;">
                                            <img class="login__with-gg-img" src="../../assets/img/login/Google__G__Logo.svg"
                                                alt="">
                                            Đăng nhập với google
                                        </div> -->

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

                                    <form>

                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form3Example1cg">Địa chỉ email</label>
                                            <input type="text" id="form3Example1cg" class="form-control form-control" name="email"/>
                                        </div>

                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                                            <input type="password" id="form3Example4cg"
                                                class="form-control form-control" name="password"/>
                                        </div>

                                        <div class="form-check d-flex justify-content-start pt-3 pb-3">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3cg" />
                                            <label class="form-check-label" for="form2Example3g">
                                                Nhớ mật khẩu
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary-color fw-bold text-white " name="load_login">Đăng
                                                nhập</button>
                                        </div>


                                        <p class="text-center mt-4 mb-0"><a href="#"
                                                class=" px-1 fst-italic text-body text-sm-start"><u>Quên mật
                                                    khẩu?</u></a></p>
                                        <div class="vr"></div>
                                        <p class="text-center mt-3 mb-0">Chưa có tài khoản? <a href="./Singup.html"
                                                class=" fst-italic text-body"><u>Đăng ký </u></a></p>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>