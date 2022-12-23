<?php
  include("include/menu.php");
  include("include/top.php");
?>

                <!-- Content wrapper -->
                <form id="regForm" action="">

                

                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">

                 
                        <div class="content-wrapper">
                            <!-- Content -->
        
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm / </span> <a
                                        class="fw-light" href="" style="color: #b1b1b1">Sản phẩm
                                        / </a>Thêm sản phẩm</h4>
        
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
                                                <h5 class="mb-0">Thông tin <span>sản phẩm</span></h5>
                                                <small class="text-muted float-end">Thêm thông tin</small>
                                            </div>
                                            <div class="card-body mb-5">
                                                <form>
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-12">
                                                            <label class="form-label" for="basic-default-nameproduct">Tên sản
                                                                phẩm</label>
                                                            <input type="text" class="form-control"
                                                                id="product-name-add" placeholder="Nhập tên sản phẩm">
                                                        </div>
                                                    </div>
        
        
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-12">
                                                            <label class="form-label" for="basic-default-fullname">Slug</label>
                                                            <span class ="Error-notify-slug" ></span>
                                                            <input type="text" class="form-control" id="product-slug-add"
                                                                placeholder="Nhập slug">
                                                        </div>
                                                    </div>
        
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="mb-3">
                                                                <label for="category-list-add" class="form-label">Danh mục</label>
                                                                <select class="form-select" id="category_list_add" style="width: 100%;">
                                                                    <option value="-1">Chọn danh mục</option>
                                                                    <!-- <option value="1">CPU</option>
                                                                    <option value="2">RAM</option>
                                                                    <option value="3">SSD</option>
                                                                    <option value="4">HDD</option>
                                                                    <option value="5">VGA</option> -->
                                                                </select>
                                                            </div>
                                                        </div>
        
                                                        <div class="col-xl-6">
                                                            <div class="mb-3">
                                                                <label for="brand_list_add" class="form-label">Thương
                                                                    hiệu</label>
                                                                <select id="brand_list_add" class="form-select" style="width: 100%;">
                                                                    <option>Chọn thương hiệu</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
        
        
        
                                                    </div>
        
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-4">
                                                            <label class="form-label">Giá gốc</label>
                                                            <span class="Error_cost_check"></span>
                                                            <input type="number" class="form-control" id="historical-cost"
                                                                placeholder="Nhập giá gốc">
                                                        </div>
                                                        <div class="mb-3 col-xl-4">
                                                            <label class="form-label">Phần trăm giảm</label>
                                                            <span class="Error_number_check"> </span>
                                                            <input type="number" class="percent-reduction-class form-control" id="percent-reduction"
                                                                placeholder="Nhập phần trăm giảm" min="1" max="100" step="1">
                                                        </div>
                                                        <div class="mb-3 col-xl-4">
                                                            <label class="form-label">Số lượng nhập</label>
                                                            <span class="Error_qty_check"> </span>
                                                            <input type="number" class="form-control" id="qty-product-add"
                                                                placeholder="Nhập số lượng đầu vào">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-5">

                                                            <label class="form-label">Bảo hành</label>
                                                            <span class="Error_date_check"></span>
                                                            <input type="number" class="form-control" id="insurance-date"
                                                                placeholder="Nhập số tháng bảo hành">
                                                        </div>
        
                                                        <div class="col-xl-5">
                                                            <div class="mb-3">
                                                                <label for="defaultSelect" class="form-label">Ngày sản
                                                                    xuất</label>
                                                                <input class="form-control" type="date" value="" id="MFG-product-add">
                                                            </div>
                                                        </div>
        
                                                        <div class="mb-3 col-xl-2 text-center">
                                                            <label class="form-label pb-2">Tình trạng</label><br>
                                                            <label class="toggle-switchy" for="product-status-add"
                                                                data-size="sm" data-text="false" data-style="rounded">
                                                                <input checked type="checkbox" id="product-status-add">
                                                                <span class="toggle">
                                                                    <span class="switch"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
        
        
                                                    <!-- <div class="row">
                                                        
        
                                                        <div class="col-xl-4">
                                                            <div class="mb-3">
                                                                <label for="defaultSelect" class="form-label">Ngày tạo</label>
                                                                <input type="text" class="form-control" id="date-time-create" value="">
                                                                <p class="mt-1" id="date-time-create"></p>
                                                            </div>
                                                        </div>
        
        
                                                        
                                                    </div> -->
                                                    <div class="row">
                                                          <label for="formFile" class="form-label ">Ảnh thumbail</label> <span class="upload-notify-thub"></span>
                                                          <div class="input-group">
                                                            <!-- <div class="row"> -->
                                                              <!-- <div class="col-6"> -->
                                                                  <button class="btn-remove-img-thub btn btn-outline-primary" type="button" >Xóa</button>
                                                                  <input name= "avatar-employee" class="form-control Employee-img-preview" type="file" id="file-product-add" 
                                                                    accept=".jfif,.jpg,.jpeg,.png,.gif" set-to="div4"  onchange="readURL(this)"/>
                                                              <!-- </div> -->

                                                              
                                                          </div>
                                                          <div class="col-6">
                                                                <label for="formFile" class="form-label">Xem trước</label>
                                                                  <div id="preview-product-add" >
                                                                      <img src=""  class ="preview-add-product-thub" alt="" id="div4" style="width: 20%;">
                                                                  </div>
                                                          </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="mb-3">
                                                              <label for="formFile" class="form-label ">Ảnh liên quan</label> <span class="Error-img-notify"></span>
                                                              <div class="input-group">
                                                                  <button class="btn-remove-img-garelly thumbail btn btn-outline-primary" type="button" >Xóa</button>
                                                                  <input name= "avatar-employee" class="form-control Employee-img-preview" type="file" id="product-gallery-add" 
                                                                    accept=".jfif,.jpg,.jpeg,.png,.gif" multiple  />
                                                              <!-- <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                                                  onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple> -->
                                                              </div>

                                                          <div class="mb-5">
                                                              <label for="formFile" class="form-label">Xem trước</label>
                                                                  <!-- <div class="fileupload fileupload-new border-5" data-provides="fileupload"> -->
                                                                      <div id="preview-product-gallery-add" >
                                                                          <img src=""  class ="preview-add-product-garelly" alt=""  style="width: 20%;">
                                                                      </div>
                                                                  <!-- </div> -->
                                                          </div>
                                                      </div>
                                                    </div>

                                                    <!-- <button type="button" class="btn-save-edit btn btn-primary">Lưu</button> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- / Content -->
        
                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    
                    <div class="tab">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm / </span> <a
                                    class="fw-light" href="list_product.php" style="color: #b1b1b1">Sản phẩm
                                    / </a>Thêm cấu hình sản phẩm</h4>
    
                            <hr class="my-5" />
                        <div class="container-lg p-0">
                          <div class="table-responsive">
                              <div class="table-wrapper">
                                  <div class="table-title">
                                      <div class="row">
                                          <div class="col-sm-8"><h2>Cấu hình sản phẩm</h2></div>
                                          <div class="col-sm-4">
                                              <button type="button" class="btn btn-info add-new"><i class='bx bx-plus'></i> Thêm mới</button>
                                          </div>
                                      </div>
                                  </div>
                                  <table id="specification-product" class="table table-bordered">
                                      <thead>
                                          <tr>
                                              <th>Mục</th>
                                              <th>Thông số</th>
                                              <th>Thao tác</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td></td>
                                              <td></td>
                                              <td>
                                                  <a class="add" title="Add" data-toggle=""><i class='bx bx-list-plus' ></i></a>
                                                  <a class="edit" title="Edit" data-toggle=""><i class='bx bx-edit-alt'></i></a>
                                                  <a class="delete" title="Delete" data-toggle=""><i class='bx bxs-trash-alt'></i></a>
                                              </td>
                                          </tr>
                                          
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                        </div>   
                        </div>  
                    </div>
                    
                    <div class="tab">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm / </span> <a
                                    class="fw-light" href="" style="color: #b1b1b1">Sản phẩm
                                    / </a>Thêm mô tả sản phẩm</h4>
                                    <div class="table-wrapper">
                                        <div class="table-title">
                                            <div id="summernote" placeholder="Nhập mô tả sản phẩm" ></div>
                                        </div>

                                        <button type="button" class="btn-nextPrev btn btn-primary" id="finish" onclick="nextPrev(1)">Tiếp</button>

                                    </div>


                        </div>


                    </div>
                    
                    
                    
                    <div style="overflow:auto;">
                      <div style="float:right; margin-right: 50px;">
                        <button type="button" class=" btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Trước</button>
                        <button type="button" class=" btn btn-primary" id="nextPrev" onclick="nextPrev(1)">Tiếp</button>
                      </div>
                    </div>
                    
                    <div style="text-align:center;margin-top:20px; margin-bottom: 20px;">
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                    </div>
                    
                </form>

            </div>
            <!-- / Layout page -->
        </div>

<?php
  include("include/tail.php");
?>

<script>
  function checkEmpty(data_value){
        var data;
        if(data_value == -1 ){
            data="";
        } else{
            data= data_value;
        }
        return data;
    }

   $("#finish").on("click", function(){
      var info={};
      info['tensp'] = $("#product-name-add").val();
      info['slug'] = $("#product-slug-add").val(); 
      info['danhmuc']= checkEmpty($( "#category_list_add option:selected" ).val());
      info['thuonghieu'] = checkEmpty($( "#brand_list_add option:selected" ).val());
      info['giagoc'] = $("#historical-cost").val();
      info['phantram'] = $("#percent-reduction").val();
      info['baohanh'] =  $("#insurance-date").val();
      info['ngaysx'] = $("#MFG-product-add").val(); 
      info['tinhtrang'] = document.getElementById("product-status-add").checked ? 1 : 0;
      info['soluongton'] = $('#qty-product-add').val();
      info['tendanhmuc'] = $('#category_list_add option:selected').text();


      var thongtincauhinh = [];
      var $headers = ["loai", "noidung"];
      $("#specification-product").find("tbody tr").each(function(index) {
        var values = {};
        $(this).find("td:lt(2)").each(function(index) {
          values[$headers[index]] = $(this).text();
        })
        thongtincauhinh.push(values) 
      });
      // console.debug(JSON.stringify(thongtincauhinh));

      var plainText = $("#summernote").summernote('code');
      // console.log(plainText);



      


    //  console.log(info);
      //lấy ảnh thumbail
      var file_thumbail_img = $('#file-product-add').prop('files')[0]; 

      //Lấy ảnh liên quan
      var form_data = new FormData();  

      var file_garelly_img  = $('#product-gallery-add').prop('files');
      // console.debug(length_a);
      for(var i = 0; i< file_garelly_img.length; i++){
        console.debug(file_garelly_img[i]);
        form_data.append("file_garelly_img[]", file_garelly_img[i]) ;
      }

      form_data.append("other_data", JSON.stringify(info));
      form_data.append("file_thumbail_img", file_thumbail_img) ;
      // form_data.append("file_garelly_img", file_garelly_img) ;
      form_data.append("specification", JSON.stringify(thongtincauhinh));
      form_data.append("summarynote_content", plainText);
      // console.debug(...form_data);


        $.ajax({
          url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/create-add-product.php",
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

        $(document).ready(function() {

            $('#category_list_add').select2(
            {
                width: 'resolve'
            }
            );

            $('#brand_list_add').select2(
            {
                width: 'resolve'
            }
            );

        });

        $(".btn-remove-img-thub").on("click", function(){
            $(".preview-add-product-thub").attr('src', " ");
            $('#file-product-add').val("");

            $('.upload-notify-thub').attr('style', 'color:#ff3333;padding-left: 20px');
            $(".upload-notify-thub").html("<i class='bx bxs-x-circle pl-3'></i>" + "Không được để trống");
        })

        $(".btn-remove-img-garelly").on("click", function(){
            var a = $("#preview-product-gallery-add").find('img').remove();
            $('#product-gallery-add').val("");

            $('.Error-img-notify').attr('style', 'color:#ff3333;padding-left: 20px');
            $(".Error-img-notify").html("<i class='bx bxs-x-circle pl-3'></i>" +"Không được để trống");

        })


</script>


<script>
    $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/getCategory.php",       
        dataType:'json',         
        success: function(data){     
            $("#category_list_add").html("");
            $("#category_list_add").append($('<option>', {value:-1, text:"Chọn danh mục sản phẩm"}));
            for (i=0; i<data.length; i++){            
                var category = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                console.log(category["id"]);
                $('#category_list_add').append($('<option>', {value:category['id'], text:category['ten'].toUpperCase()}));
            }

        }
    });
</script>

<script>
   $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/getBrand.php",       
        dataType:'json',         
        success: function(data){     
            $("#brand_list_add").html("");
            $("#brand_list_add").append($('<option>', {value:-1, text:"Chọn thương hiệu"}));
            for (i=0; i<data.length; i++){            
                var brand = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                console.log(brand["id"]);
                $('#brand_list_add').append($('<option>', {value:brand['id'], text:brand['tenncc'].toUpperCase()}));
            }

        }
    });
</script>

<!-- check độc nhất cho slug -->
<script>
  $("#product-slug-add").on("focusout keyup ",function(e){
    var slug = $("#product-slug-add").val(); 
    $.ajax({
    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/slugCheck.php",
    type:"POST",
    data:{slug: slug},
    success: function(data){
      if(data==1){
          $('.Error-notify-slug').attr('style', 'color:#33A0FF;padding-left: 20px');
          $(".Error-notify-slug").html("<i class='bx bxs-check-circle pl-3'></i> slug hợp lệ");
          setTimeout(function(){
          $(".Error-notify-slug").html("");
          }, 2000)
          $('#nextPrev').prop('disabled', false);
          
      }
      else {
          $(".Error-notify-slug").html("");
          $('.Error-notify-slug').attr('style', 'color:#ff3333;padding-left: 20px');
          $(".Error-notify-slug").html("<i class='bx bxs-x-circle pl-3'></i>"+data);
          $('#nextPrev').prop('disabled', true);
      }
    }      
  }); 
});
</script>

<script>
   let n1=1; let n2=1; let n3 =1; let n4=1; let n5=1; let n6=1;

   $('#historical-cost').on("keyup", function(){
    var  n = $('#historical-cost').val();
    
    if(parseInt(n)  < 0 ){
      $('.Error_cost_check').html("");
      $('.Error_cost_check').attr('style', 'color:#ff3333;padding-left: 20px');
      $(".Error_cost_check").html("<i class='bx bxs-x-circle pl-3'></i>" +"Số bạn vừa nhập không hợp lệ");
      $('#nextPrev').prop('disabled', true);
      n5=0;
      
    }
    else{
      $('.Error_cost_check').html("");
      n5=1;
      if(n1==1 && n2==1 && n3==1 && n4 ==1 && n5==1 && n6==1)
       {
        $('#nextPrev').prop('disabled', false)
       }
    }
  })

  $('.percent-reduction-class').on("keyup", function(){
    var  n = $('.percent-reduction-class').val();
    
    if(parseInt(n)  < 0 || parseInt(n) > 100){
      $('.Error_number_check').html("");
      $('.Error_number_check').attr('style', 'color:#ff3333;padding-left: 20px');
      $(".Error_number_check").html("<i class='bx bxs-x-circle pl-3'></i>" +"Số bạn vừa nhập không hợp lệ");
      $('#nextPrev').prop('disabled', true);
      n1=0;
      
    }
    else{
      $('.Error_number_check').html("");
      n1=1;
      if(n1==1 && n2==1 && n3==1 && n4 ==1)
       {
        $('#nextPrev').prop('disabled', false)
       }
    }
  })

  $('#qty-product-add').on("keyup", function(){
    var  n = $('#qty-product-add').val();
    
    if(parseInt(n)  < 0){
      $('.Error_qty_check').attr('style', 'color:#ff3333;padding-left: 20px');
      $(".Error_qty_check").html("<i class='bx bxs-x-circle pl-3'></i>" +"Số bạn vừa nhập không hợp lệ");
      $('#nextPrev').prop('disabled', true)
      n2=0;
    }
    else{
      $(".Error_qty_check").html("");
      n2=1;
      if(n1==1 && n2==1 && n3==1 && n4 ==1 && n5==1 && n6==1)
       {
        $('#nextPrev').prop('disabled', false)
       }
    }
  })

  $('#insurance-date').on("keyup", function(){
    var  n = $('#insurance-date').val();
    // console.debug(n);
    if(parseInt(n)  < 0 || parseInt(n)  > 36 ){
      $('.Error_date_check').attr('style', 'color:#ff3333;padding-left: 20px');
      $(".Error_date_check").html("<i class='bx bxs-x-circle pl-3'></i>" +"Số bạn vừa nhập không hợp lệ");
      $('#nextPrev').prop('disabled', true);
      n3=0;
    }else{
      $(".Error_date_check").html("");
      n3=1;
      if(n1==1 && n2==1 && n3==1 && n4 ==1 && n5==1 && n6==1)
       {
        $('#nextPrev').prop('disabled', false)
       }
    }
    
  })

  $("#file-product-add").on("change", function(){ 
    var file_name = $('input[type=file]').val().split('\\').pop();
    var file_extension = file_name.split('.').pop();
    $.ajax({
      url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Formcheck/file_img.php",
      type:"POST",
      data:{file_extension: file_extension },
      success: function(data){
        if(data==1){
          $('.upload-notify-thub').attr('style', 'color:#33A0FF;padding-left: 20px');
          $(".upload-notify-thub").html("<i class='bx bxs-check-circle pl-3'></i> Tải ảnh thành công");
          setTimeout(function(){
          $(".upload-notify-thub").html("");
          }, 2000)
          n4 =1;
          if(n1==1 && n2==1 && n3==1 && n4==1 && n5==1 && n6==1)
          {
              $('#nextPrev').prop('disabled', false);
          }

        }
        else if(data==0){
          $(".upload-notify-thub").html("");
          $('.upload-notify-thub').attr('style', 'color:#ff3333;padding-left: 20px');
          $(".upload-notify-thub").html("<i class='bx bxs-x-circle pl-3'></i>Loại ảnh không được cho phép");
          $('#nextPrev').prop('disabled', true);
          n4=0;
        }
          
      }     
    });
  });

  $("#product-gallery-add").on("change", function(){ 
    var form_data = new FormData();  
    var file_garelly_img  = $('#product-gallery-add').prop('files');
    for(var i = 0; i< file_garelly_img.length; i++){
      console.debug(file_garelly_img[i]);
      form_data.append("file_garelly_img[]", file_garelly_img[i]) ;
    }
  $.ajax({
      url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/check_mutil_img.php",
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
              $('.Error-img-notify').attr('style', 'color:#ff3333;padding-left: 20px');
              $(".Error-img-notify").html("<i class='bx bxs-x-circle pl-3'></i>" +"Ảnh không hợp lệ");
              $('#nextPrev').prop('disabled', true);
              $n6=0;
            }
            break;
          case 1:
            {
              $(".Error-img-notify").html("");
              // $('.Error-img-notify').attr('style', 'color:#ff3333;padding-left: 20px');
              // $(".Error-img-notify").html("<i class='bx bxs-x-circle pl-3'></i>"+"Thêm ảnh thành công");
              n6 =1;
              if(n1==1 && n2==1 && n3==1 && n4==1 && n5==1 && n6==1)
              {
                  $('#nextPrev').prop('disabled', false);
              }
            }
          break;

        }
          
      }
          
          
  });

    
  });
  
</script>
