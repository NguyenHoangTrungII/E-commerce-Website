<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SingUp</title>

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link rel="stylesheet" href="../assets/signup/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/signup/vendor/nouislider/nouislider.min.css">

    <link rel="stylesheet" href="../assets/signup/css/style.css">
  <!-- <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/base.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- Font Icon -->
    <link rel="stylesheet" href="../assets/signup/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../assets/signup/css/style.css">

  <style>
    body {
      height: 100%;
      width: 100%;
      /* extended code */
      background-size: 100% 100%;
      /* background-repeat: no-repeat; */
      background-position: center center;
      background-image: url('../assets/img/login/backgroup_login_SignUp.jpg');
    }
  </style>
</head>

<body>

    <div class="main">

        <div class="container">
            <h2>Build your profile</h2>
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                <h3>
                    Tài khoản
                </h3>
                <fieldset >
                    <div class="form-row">
                        <!-- <div class="form-file">
                            <input type="file" class="inputfile" name="your_picture" id="your_picture"  onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple />
                            <label for="your_picture">
                                <figure>
                                    <img src="images/your-picture.png" alt="" class="your_picture_image">
                                </figure>
                                <span class="file-button">choose picture</span>
                            </label>
                        </div> -->
                        <div class="form-group-flex">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="first_name" id="first_name" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                              <label for="">Nhập lại khẩu</label>
                                <input type="email" name="email" id="email" placeholder="Email" />
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>
                    Thông tin cá nhân
                </h3>
                <fieldset >
                    <div class="form-radio">
                      <div class="form-file">
                            <!-- <input type="file" class="inputfile" name="your_picture" id="your_picture"  onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple />
                            <label for="your_picture">
                                <figure>
                                    <img src="images/your-picture.png" alt="" class="your_picture_image">
                                </figure>
                                <span class="file-button">Chọn ảnh đại diện</span>
                            </label>
                        </div> -->
                        <!-- <div class="row"> -->
                          <div class="form-group col-md-12">
                              <label for="">Họ tên</label>
                              <input type="text" name="first_name" id="first_name" placeholder="First Name" />
                          </div>
                          <div class="form-group col-md-12">
                              <label for="">Tên hiển thị</label>
                              <input type="text" name="first_name" id="first_name" placeholder="First Name" />
                          </div>
                        <!-- </div> -->
                                            <!--  -->
                        <!-- <label for="job" class="label-radio">What are you doing ?</label> -->
                        <!-- <div class="form-flex">
                            <div class="form-radio">
                                <input type="radio" name="job" value="designer" id="designer" />
                                <label for="designer">
                                    <figure>
                                        <img src="images/icon-1.png" alt="">
                                    </figure>
                                    <span>Designer</span>
                                </label>
                            </div>

                            <div class="form-radio">
                                <input type="radio" name="job" value="coder" id="coder" checked="checked" />
                                <label for="coder">
                                    <figure>
                                        <img src="images/icon-2.png" alt="">
                                    </figure>
                                    <span>Coder</span>
                                </label>
                            </div>

                            <div class="form-radio">
                                <input type="radio" name="job" value="developer" id="developer" />
                                <label for="developer">
                                    <figure>
                                        <img src="images/icon-3.png" alt="">
                                    </figure>
                                    <span>Developer</span>
                                </label>
                            </div>
                        </div> -->
                    </div>
                </fieldset>

                <!-- <h3>
                    Address
                </h3>
                <fieldset>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="street_name" id="street_name" placeholder="Street Name" />
                        </div>
                        <div class="form-input">
                            <input type="text" name="street_number" id="street_number" placeholder="Street Number" />
                        </div>
                    </div>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="city" id="city" placeholder="City" />
                        </div>
                        <div class="form-input">
                            <select name="country" id="country">
                                <option value="">Country</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="USA">USA</option>
                            </select>
                            <span class="select-icon"><i class="zmdi zmdi-caret-down"></i></span>
                        </div>
                    </div>
                </fieldset> -->
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="../assets/signup/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/signup/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../assets/signup/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../assets/signup/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="../assets/signup/js/main.js"></script>
</body>

</html>