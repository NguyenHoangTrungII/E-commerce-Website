<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SingUp</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
  rel="stylesheet">
  <!-- Boxicon -->
  <link rel="stylesheet" href="../Admin/public/assets/vendor/fonts/boxicons.css" />

  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/base.css">
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

    /* MỚI */


input#input-img {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  /* font-family: Raleway; */
  border: 1px solid #aaaaaa;
}

input.invalid {
  background-color: red;
}


.tab {
  display: none;
}

.steptab {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.steptab.active {
  opacity: 1;
}

.steptab.finish {
  background-color: #04AA6D;
}

/* body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
} */

#avatar {
  background-color: antiquewhite;
  height: 200px;
  width: 200px;
  border: 3px solid #0af;
  border-radius: 50%;
  transition: background ease-out 200ms;
}

#preview {
  padding: 0 0 0 40px;
  position: relative;
}

input[type="file"] {
  display: none;
}

#upload-button {
  padding: 10px;
  border-radius: 90%;
  border: none;
  cursor: pointer;
  background-color: #08f;
  box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.2),
    0px 6px 10px 0px rgba(0, 0, 0, 0.14), 0px 1px 18px 0px rgba(0, 0, 0, 0.12);
  transition: background-color ease-out 120ms;
  position: absolute;
  right: 35%;
  bottom: 0%;
}

#upload-button:hover {
  background-color: #45a;
}


  </style>
</head>

<body>
  <section class="vh-100 bg-image">
    <form id="regForm" action="">
      <div class="tab">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-11 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card" style="border-radius: 15px;">
                  <div class="card-body login-sinup">
                    <h2 class="header__title-login text-uppercase text-center pb-4">Thông tin tài khoản</h2>

                    <div class="alert alert-info alert-dismissible" role="alert" hidden >
                                                This is an info dismissible alert — check it out!
                    </div>

                    <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                            This is a danger dismissible alert — check it out!
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example1cg">Tên hiển thị</label>
                      <input type="text" id="form3Example1cg" class="singup-nameshow form-control form-control" />
                    </div>


                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3cg">Địa chỉ mail</label>
                      <input type="email" id="form3Example3cg" class="singup-email form-control form-control" autocomplete="off"/>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                      <input type="password" id="form3Example4cg" class="singup-password form-control form-control" autocomplete="off"/>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example5cdg">Nhắc lại mật khẩu</label>
                      <input type="password" id="form3Example5cdg" class="singup-passwordRemind form-control form-control" />
                    </div>


                    <div class="d-flex justify-content-center pt-4">
                      <button type="button" class="next-singup btn btn-primary-color btn--sinup fw-bold text-white text-uppercase"
                        style="height: 45px; border-radius:8px"  >Tiếp theo</button>
                    </div>

                    <div class="login__another fw-bold">
                      <div class="divider text-center position-relative my-4">
                        <span class="line position-absolute start-0 end-0 " style="background-color: #d4d4d4;"></span>
                        <div class="content position-relative bg-white px-3 mx-auto">
                          <span class="fw-bold" style="color:#8e8e8e">Hoặc</span>
                        </div>
                      </div>
                    </div>

                   

                    <p class="text-center mt-4 mb-0">Bạn đã có tài khoản? <a href="login.php"
                        class="fst-italic text-body"><u>Đăng nhập</u></a></p>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="tab">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-11 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card" style="border-radius: 15px;">
                  <div class="card-body login-sinup">
                    <h2 class="header__title-login text-uppercase text-center pb-4">Thông tin cá nhân</h2>

                    <div class="alert alert-info alert-dismissible" role="alert" hidden >
                                                This is an info dismissible alert — check it out!
                    </div>

                    <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                            This is a danger dismissible alert — check it out!
                    </div>

                    <div class="container">
                      <div>
                        <input type="file" name="image" id="image" accept="image/*" />
                            <div id="preview">
                              <div id="avatar"></div>
                              <button type= "button"
                                id="upload-button"
                                aria-labelledby="image"
                                aria-describedby="image"
                              >
                              <i class='bx bx-camera'></i>
                              </button>
                            </div>
                        </div>

                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example1cg">Họ và tên</label>
                      <input type="text" id="form3Example1cg" class="name-customer form-control form-control " />
                    </div>

                    <label class="form-label mb-3" for="basic-default-phone">Giới
                      tính</label>
                      <div class="row">
                        <div class="form-check col-6">
                          <input class="gioitinh-cb form-check-input" type="radio" name="giotinh" id="male"  value=1 />
                          <label class="form-check-label" for="male">
                            Nam
                          </label>
                        </div>
                        <div class="form-check col-6">
                          <input class="gioitinh-cb form-check-input" type="radio" name="giotinh" id="female" value= 0/>
                          <label class="form-check-label" for="female">
                            Nữ
                          </label>
                        </div>
                      </div>

                      <div class="mb-3 col-12">
                          <label class="form-label">Ngày sinh</label>
                          <input id="" class="birthday-input form-control" type="date" value="">
                      </div>


                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3cg">Số điện thoại</label>
                      <input type="sdt" id="form3Example3cg" class="phone-customer form-control form-control" />
                    </div>


                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example1cg">Chọn Tỉnh/Thành phố</label>
                      <select id ="Provice_signup" class="form-select" aria-label="Default select example" style="width:100%;">
                        <!-- <option selected>Tỉnh/Thành phố</option> -->
                        <!-- <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option> -->
                      </select>
                    </div>
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example1cg">Chọn Quận/Huyện</label>
                      <select id="District_signup" class="form-select" aria-label="Default select example" style="width:100%;">
                        <option selected>Quận/Huyện</option>
                        <!-- <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option> -->
                      </select>
                    </div>
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example1cg">Chọn Phường/Xã</label>
                      <select id="Town_signup" class="form-select" aria-label="Default select example" style="width:100%;">
                        <option selected>Phường/Xã</option>
                        <!-- <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option> -->
                      </select>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="basic-default-message">Địa chỉ</label>
                      <textarea id="address" class="Address-textarea form-control" placeholder="Địa chỉ"></textarea>
                    </div>

                    <div class="row">
                      <div class="col-lg-12  d-flex justify-content-center pt-4">
                        <button type="button"
                          class="btn btn-primary-color btn--sinup fw-bold text-white text-uppercase " style="height: 45px; border-radius:8px" onclick="nextPrev(-1)">Quay lại</button>
                      </div>
                      <div class="col-lg-12 d-flex justify-content-center pt-4">
                      <!-- <button type="button" class="btn btn-primary-color btn--sinup fw-bold text-white text-uppercase"
                        style="height: 45px; border-radius:8px" onclick="nextPrev(1)" >Tiếp theo</button> -->
                        <button type="button"
                          class="create-account btn btn-primary-color btn--sinup fw-bold text-white " style="height: 45px; border-radius:8px">TẠO TÀI KHOẢN</button>
                      </div>
                    </div>
                    

                    <div class="login__another fw-bold">
                      <div class="divider text-center position-relative my-4">
                        <span class="line position-absolute start-0 end-0 " style="background-color: #d4d4d4;"></span>
                        <div class="content position-relative bg-white px-3 mx-auto">
                          <span class="fw-bold" style="color:#8e8e8e">Hoặc</span>
                        </div>
                      </div>
                    </div>

                    

                    <p class="text-center mt-4 mb-0">Bạn đã có tài khoản? <a href="login.php"
                        class="fst-italic text-body"><u>Đăng nhập</u></a></p>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </form>
  </section>
</body>



<script src="../Admin/public/assets/js/tab.js"></script>
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.nice-select.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/jquery.slicknav.js"></script>
    <script src="../Admin/public/js/select2.min.js"></script>
    <link href="../Admin/public/assets/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script>

$('.next-singup').on('click', function(){
    var info_acc = {};
    info_acc['tenhienthi'] = $('.singup-nameshow').val();
    info_acc['email'] = $('.singup-email').val();
    info_acc['pass'] = $('.singup-password').val();
    info_acc['passremind'] = $('.singup-passwordRemind').val();
    $.ajax({
          url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Signup/check_info_account.php',
          type: 'POST',
          data: {info_acc: JSON.stringify(info_acc)},
          success: function(response) {
              if(response != 1){
                  $('.alert.alert-danger.alert-dismissible').text(response);
                  $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                  $('.alert.alert-danger.alert-dismissible').prop('hidden', false);    
              }
              else{
                $('.alert.alert-danger.alert-dismissible').prop('hidden', true);    
                $('.next-singup').on('click', function(){
                  nextPrev(1);
                })
              }
          }
  });
})
</script>

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

  $('.create-account').on('click', function(){
    var info_per = {};
    info_per['hoten'] = $('.name-customer').val();
    info_per['sdt'] = $('.phone-customer').val();
    info_per['tinh_thanhpho'] = checkAdress($( "#Provice_signup option:selected" ).val(), $( "#Provice_signup option:selected" ).text());
    info_per['quan_huyen'] = checkAdress($( "#District_signup option:selected" ).val(), $( "#District_signup option:selected" ).text());
    info_per['phuong_xa'] = checkAdress($( "#Town_signup option:selected" ).val(), $( "#Town_signup option:selected" ).text());
    info_per['diachi'] = $(".Address-textarea").val();
    info_per['gioitinh']= $('.gioitinh-cb:checked').val();
    info_per['ngaysinh']= $('.birthday-input').val();    

    var info_acc = {};
    info_acc['tenhienthi'] = $('.singup-nameshow').val();
    info_acc['email'] = $('.singup-email').val();
    info_acc['pass'] = $('.singup-password').val();
    info_acc['passremind'] = $('.singup-passwordRemind').val();

    var file_a = $('#image').prop('files')[0];  
    var form_data = new FormData();  
    form_data.append("avatar", file_a) ;
    form_data.append('info_acc', JSON.stringify(info_acc));
    form_data.append('info_per', JSON.stringify(info_per));
    // console.debug(info_per);
    $.ajax({
          url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/Signup/check_pers_account.php',
          type: 'POST',
          data: form_data,
            contentType: false,
            processData: false,
          success: function(response) {
              if(response != 1){
                  $('.alert.alert-danger.alert-dismissible').text(response);
                  $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                  $('.alert.alert-danger.alert-dismissible').prop('hidden', false);    
                  $("html, body").animate({scrollTop: 0}, 1000);
              }
              else{
                location.reload();
                $('.alert.alert-info.alert-dismissible').text("Thành công, vui lòng đăng nhâp");
                $('.alert.alert-danger.alert-dismissible').prop('hidden', true); 
                $('.alert.alert-info.alert-dismissible').prop('hidden', false);       
                $('.next-singup').on('click', function(){
                })
              }
          }
  });

})
</script>

<script>
    $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/LayTinh.php",       
        dataType:'json',         
        success: function(data){     
            $("#Provice").html("");
            $("#Provice_signup").append($('<option>', {value:-1, text:"Chọn tỉnh/thành phố"}));
            for (i=0; i<data.length; i++){            
                var provice = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                // console.log(provice);
                $('#Provice_signup').append($('<option>', {value:provice['id'], text:provice['name']}));
            }

            $("#Provice_signup").on("change", function(e){
                $("#Town_signup").html("");
                $("#Town_signup").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                var Provice_id = $( "#Provice_signup option:selected" ).val();
                console.log(Provice_id);
                $.ajax({
                    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetDistrict.php?ProviceId=" + Provice_id,
                    dataType:'json',         
                    success: function(data){  
                        $("#District_signup").html("");
                        $("#District_signup").append($('<option>', {value:-1, text:"Chọn quận/huyện"}));
                        
                        for (i=0; i<data.length; i++){            
                        var district = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                        
                        // console.log(district);
                        $('#District_signup').append($('<option>', {value:district['id'], text:district['name']}));
                        }  

                        // setPrice();
                        // update_total_price();
                        
                        $("#District_signup").on("change", function(e){
                            var District_id = $( "#District_signup option:selected" ).val();
                            console.log(District_id);
                            $.ajax({
                                url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/GetTown.php?DistrictId=" + District_id,
                                dataType:'json',         
                                success: function(data){  
                                    // console.log(data);
                                    $("#Town_signup").html("");
                                    $("#Town_signup").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                                    for (i=0; i<data.length; i++){            
                                    var town = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                                    
                                    $('#Town_signup').append($('<option>', {value:town['id'], text:town['name']}));
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

<script>
    $(document).ready(function() {

        $('#Provice_signup').select2(
        {
            width: 'resolve'
        }
        );

        $('#District_signup').select2(
        {
            width: 'resolve'
        }
        );

        $('#Town_signup').select2(
        {
            width: 'resolve'
        }
        );

    });
</script>

<script>
  const UPLOAD_BUTTON = document.getElementById("upload-button");
const FILE_INPUT = document.querySelector("input[type=file]");
const AVATAR = document.getElementById("avatar");

UPLOAD_BUTTON.addEventListener("click", () => FILE_INPUT.click());

FILE_INPUT.addEventListener("change", event => {
  const file = event.target.files[0];

  const reader = new FileReader();
  reader.readAsDataURL(file);

  reader.onloadend = () => {
    AVATAR.setAttribute("aria-label", file.name);
    AVATAR.style.background = `url(${reader.result}) center center/cover`;
  };
});
</script>

</html>

</html>