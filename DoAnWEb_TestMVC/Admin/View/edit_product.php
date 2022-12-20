<?php
  session_start();
  include("include/session.php");
  include("include/top.php");
  include("include/menu.php");
  include("../Model/ModelAll.php");
  include("../config/databse.php");
	include("../config/site.php");
?>

<?php
    $Model = new ModelAll;

    if(isset($_GET['id'])){
      $columnName = $tableName = null;
      // $columnName = "*";
      $columnName['1']="sanpham.id";
      $columnName['2']="danhmucsp.ten ten";
      $columnName['3']="nhacungcap.tenncc";
      $columnName['4']="sanpham.tensp";
      $columnName['5']="sanpham.anh";
      $columnName['11']="sanpham.slug";
      $columnName['6']="sanpham.giagoc";
      $columnName['7']="sanpham.phantram";
      $columnName['8']="sanpham.tinhtrang";
      $columnName['9']="sanpham.id_danhmuc";
      $columnName['10']="sanpham.id_thuonghieu";
      $columnName['12']="sanpham.baohanh";
      $columnName['13']="sanpham.ngaysx";
      // $columnName['14']="cauhinh.noidung1";
      // $columnName['15']="cauhinh.noidung2";
      $tableName['MAIN'] = "sanpham";
      $tableName['1'] ='danhmucsp';
      $tableName['2'] ='nhacungcap';
      $whereValue['sanpham.id']= $_GET['id'];
      $joinCondition = array ("1"=>array ('sanpham.id_danhmuc', 'danhmucsp.id'), "2"=>array('sanpham.id_thuonghieu', 'nhacungcap.id'));
      $productInfo = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
      // var_dump( $productInfo);

      //Lấy ảnh cho sản phẩm
      $tableName2 = "Anhsp";
      $columnName2['1']='anh';
      $whereValue2['id_sp'] = $_GET['id'];
      $imgGarelly = $Model->selectData($columnName2, $tableName2,  $whereValue2);
      // var_dump($imgGarelly);

      //Lấy ảnh thông tin cấu hình
      $tableName2 = "cauhinh";
      $columnName2 ='*';
      // $columnName2['2']='noidung2';
      $whereValue2['id_sp'] = $_GET['id'];
      $SpecInfo= $Model->selectData($columnName2, $tableName2,  $whereValue2);
      // var_dump(($SpecInfo));
      // $a = json_decode($SpecInfo, true);
      // var_dump($a);
      // foreach($SpecInfo as $eachRow){
      //   foreach(json_decode($eachRow['noidung1'], true) as $eachRow2){
      //     echo $eachRow2['loai'];
      //     echo $eachRow2['noidung'];
      //   }
      // }


      //Lấy ảnh mô tả cấu hình
      $tableName3 = "motakithuat";
      $columnName3='*';
      // $columnName2['2']='noidung2';
      $whereValue3['id_sp'] = $_GET['id'];
      $DesInfo= $Model->selectData($columnName3, $tableName3,  $whereValue3);
      // var_dump($DesInfo);

      
    }
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
                                        / </a>Sửa sản phẩm</h4>
        
                                <hr class="my-5" />

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
                                                <h5 class="mb-0">Thông tin <span>sản phẩm</span></h5>
                                                <small class="text-muted float-end">Sửa thông tin</small>
                                            </div>
                                            <div class="card-body mb-5">
                                                <form>
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-12">
                                                            <label class="form-label" for="basic-default-nameproduct">Tên sản
                                                                phẩm</label>
                                                                <input type="text" id= "id-product-edit" value="<?= $productInfo[0]['id'] ?>" hidden>
                                                            <input type="text" class="form-control" value="<?= $productInfo[0]['tensp'] ?>"
                                                                id="product-name-edit" placeholder="Nhập tên sản phẩm">
                                                        </div>
                                                    </div>
        
        
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-12">
                                                            <label class="form-label" for="basic-default-fullname">Slug</label>
                                                            <input type="text" class="form-control" id="product-slug-edit"
                                                                placeholder="Nhập slug" value="<?= $productInfo[0]['slug'] ?>">
                                                        </div>
                                                    </div>
        
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="mb-3">
                                                                <label for="category_list_edit" class="form-label">Danh mục</label>
                                                                <select id="category_list_edit" class="form-select">
                                                                    <!-- <option>Chọn danh mục</option> -->
                                                                    <option selected value="<?= $productInfo[0]['id_danhmuc']?>"><?= strtoupper($productInfo[0]['ten'])?></option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
        
                                                        <div class="col-xl-6">
                                                            <div class="mb-3">
                                                                <label for="brand_list_edit" class="form-label">Thương
                                                                    hiệu</label>
                                                                <select id="brand_list_edit" class="form-select">
                                                                    <!-- <option>Chọn thương hiệu</option> -->
                                                                    <option selected value="<?= $productInfo[0]['id_thuonghieu']?>"><?= strtoupper($productInfo[0]['tenncc'])?></option>
                                                                    <!-- <option value="2">2</option>
                                                                    <option value="3">3</option> -->
                                                                </select>
                                                            </div>
                                                        </div>
        
        
        
                                                    </div>
        
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-6">
                                                            <label class="form-label">Giá gốc</label>
                                                            <input type="text" class="form-control" id="historical-cost-edit"
                                                                placeholder="Nhập giá gốc" value="<?= $productInfo[0]['giagoc'] ?>">
                                                        </div>
                                                        <div class="mb-3 col-xl-6">
                                                            <label class="form-label">Phần trăm giảm</label>
                                                            <input type="text" class="form-control" id="percent-reduction-edit"
                                                                placeholder="Nhập phần trăm giảm" value="<?= $productInfo[0]['phantram'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-xl-5">
                                                            <label class="form-label">Bảo hành</label>
                                                            <input type="text" class="form-control" id="insurance-date-edit"
                                                                placeholder="Nhập số tháng bảo hành" value="<?= $productInfo[0]['baohanh'] ?>">
                                                        </div>
        
                                                        <div class="col-xl-5">
                                                            <div class="mb-3">
                                                                <label for="defaultSelect" class="form-label">Ngày sản
                                                                    xuất</label>
                                                                <input id="MFG-product-edit" class="form-control" type="date" value="<?= $productInfo[0]['ngaysx'] ?>">
                                                            </div>
                                                        </div>
        
                                                        <div class="mb-3 col-xl-2 text-center">
                                                            <label class="form-label pb-2">Tình trạng</label><br>
                                                            <label class="toggle-switchy" for="product-status-edit"
                                                                data-size="sm" data-text="false" data-style="rounded">
                                                                <input id="product-status-edit" <?= $productInfo[0]['tinhtrang'] == 1? "checked" : " " ?> type="checkbox" id="example_textless_4">
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
                                                          <label for="formFile" class="form-label ">Ảnh thumbail</label> <span class="upload-notify"></span>
                                                          <div class="input-group">
                                                            <!-- <div class="row"> -->
                                                              <!-- <div class="col-6"> -->
                                                                  <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                                                                  <input name= "avatar-employee" class="form-control Employee-img-preview" type="file" id="file-product-edit" 
                                                                    accept=".jfif,.jpg,.jpeg,.png,.gif" set-to="div4"  onchange="readURL(this)"/>
                                                              <!-- </div> -->

                                                              
                                                          </div>
                                                          <div class="col-6">
                                                                <label for="formFile" class="form-label">Xem trước</label>
                                                                  <div id="Preview-filed" >
                                                                      <img src="<?= $GLOBALS['PRODUCT_DIRECTORY_SHOW'].$productInfo[0]['ten']."/"."thumbnail/".$productInfo[0]['anh'] ?>"  class ="img-preview-product-edit" alt="<?=$productInfo[0]['anh'] ?>" id="div4" style="width: 20%;">
                                                                  </div>
                                                          </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="mb-3">
                                                              <label for="formFile" class="form-label ">Ảnh liên quan</label> <span class="upload-notify"></span>
                                                              <div class="input-group">
                                                                  <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                                                                  <input name= "avatar-employee" class="form-control Employee-img-preview" type="file" id="product-gallery-edit" 
                                                                    accept=".jfif,.jpg,.jpeg,.png,.gif" multiple/>
                                                              <!-- <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                                                                  onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple> -->
                                                          </div>

                                                          <div class="mb-5">
                                                              <label for="formFile" class="form-label">Xem trước</label>
                                                                  <!-- <div class="fileupload fileupload-new border-5" data-provides="fileupload"> -->
                                                                      <div id="Preview-product-gallery-edit" >
                                                                        <?php 
                                                                          foreach($imgGarelly AS $eachRow){
                                                                            echo 
                                                                            '
                                                                            <img src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$productInfo[0]['ten']."/"."gallery/".$eachRow['anh'].'"  class ="img-preview-emp" alt="'.$eachRow['anh'].'"  style="width: 20%;">
                                                                            ';
                                                                          }
                                                                        ?>
                                                                          
                                                                      </div>
                                                                  <!-- </div> -->
                                                          </div>
                                                      </div>
                                                    </div>
        
                                                    <!-- <button type="submit" class="btn btn-primary mt-5">Lưu</button> -->
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
                                  class="fw-light" href="" style="color: #b1b1b1">Sản phẩm
                                  / </a>Sửa cấu hình sản phẩm</h4>
    
                            <hr class="my-5" />
                        <div class="container-lg p-0">
                            <div class="table-responsive">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-8"><h2>Cấu hình sản phẩm</h2></div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-info add-new"><i class='bx bx-plus'></i>Thêm mới</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="specification-product-edit" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Thông số</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a class="add" title="Add" data-toggle="tooltip"><i class="bx bx-list-plus" ></i></a>
                                                <a class="edit" title="Edit" data-toggle="tooltip"><i class="bx bx-edit-alt"></i></a>
                                                <a class="delete" title="Delete" data-toggle=""><i class="bx bxs-trash-alt"></i></a>
                                            </td>
                                          </tr>
                                          <?php 
                                            foreach($SpecInfo as $eachRow){
                                              // var_dump(json_decode(utf8_encode($eachRow['noidung2']), true));
                                              foreach(json_decode(($eachRow['noidung1']), true) as $eachRow2){
                                                
                                                echo 
                                                  '
                                                  <tr>
                                                    <td>'.$eachRow2['loai'].'</td>
                                                    <td>'.$eachRow2['noidung'].'</td>
                                                    <td>
                                                        <a class="add" title="Add" data-toggle="tooltip"><i class="bx bx-list-plus" ></i></a>
                                                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="bx bx-edit-alt"></i></a>
                                                        <a class="delete" title="Delete" data-toggle=""><i class="bx bxs-trash-alt"></i></a>
                                                    </td>
                                                  </tr>
                                                    
                                                  ';

                                              }
                                            } 
                                          ?>
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
                                            <div id="summernote" placeholder="Nhập mô tả sản phẩm" ><?= $DesInfo[0]['noidung1'] ?></div>
                                        </div>

                                        <button type="button" class="btn-nextPrev btn btn-primary" id="finish" onclick="nextPrev(1)">Lưu</button>


                                    </div>
                        </div>
                    </div>
                    
                    
                    
                    <div style="overflow:auto;">
                      <div style="float:right; margin-right: 50px;">
                        <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Trước</button>
                        <button type="button" class="btn btn-primary" id="nextPrev" onclick="nextPrev(1)">Tiếp</button>
                      </div>
                    </div>
                    
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:20px; margin-bottom: 20px;">
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                    </div>
                    
                </form>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

<?php
  include("include/tail.php");
?>

<script>

    $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/getCategory.php",       
        dataType:'json',         
        success: function(data){     
            // $("#category_list_edit").html("");
            $("#category_list_edit").append($('<option>', {value:-1, text:"Chọn danh mục sản phẩm"}));
            for (i=0; i<data.length; i++){            
                var category = data[i]; 
                
                console.log(category["id"]);
                $('#category_list_edit').append($('<option>', {value:category['id'], text:category['ten'].toUpperCase()}));
            }

        }
  })
    
    $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/getBrand.php",       
        dataType:'json',         
        success: function(data){     
            // $("#brand_list_edit").html("");
            $("#brand_list_edit").append($('<option>', {value:-1, text:"Chọn thương hiệu"}));
            for (i=0; i<data.length; i++){            
                var brand = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                console.log(brand["id"]);
                $('#brand_list_edit').append($('<option>', {value:brand['id'], text:brand['tenncc'].toUpperCase()}));
            }

        }
  })

    
</script>

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
      info['id'] = $("#id-product-edit").val();
      info['tensp'] = $("#product-name-edit").val();
      info['slug'] = $("#product-slug-edit").val(); 
      info['danhmuc']= checkEmpty($( "#category_list_edit option:selected" ).val());
      info['thuonghieu'] = checkEmpty($( "#brand_list_edit option:selected" ).val());
      info['giagoc'] = $("#historical-cost-edit").val();
      info['phantram'] = $("#percent-reduction-edit").val();
      info['baohanh'] =  $("#insurance-date-edit").val();
      info['ngaysx'] = $("#MFG-product-edit").val(); 
      info['tinhtrang'] = document.getElementById("product-status-edit").checked ? 1 : 0;
      info['anh_cu'] = $('.img-preview-product-edit').attr("alt");
      info['tendanhmuc'] = $('#category_list_edit option:selected').text();



      var img_old_thumbail={};
      var img =$('#Preview-product-gallery-edit').find('img').each(function(index){
        img_old_thumbail[index] = $(this).attr('alt');
        // console.debug(img_old_thumbail);
      })
      

      var thongtincauhinh = [];
      var $headers = ["loai", "noidung"];
      $("#specification-product-edit").find("tbody tr").each(function(index) {
        var values = {};
        $(this).find("td:lt(2)").each(function(index) {
          values[$headers[index]] = $(this).text();
        })
        thongtincauhinh.push(values) 
      });

      var plainText = $("#summernote").summernote('code');

      var file_thumbail_img = $('#file-product-edit').prop('files')[0]; 

      var form_data = new FormData();  

      var file_garelly_img  = $('#product-gallery-edit').prop('files');
      for(var i = 0; i< file_garelly_img.length; i++){
        console.debug(file_garelly_img[i]);
        form_data.append("file_garelly_img[]", file_garelly_img[i]) ;
      }

      form_data.append("other_data", JSON.stringify(info));
      form_data.append("file_thumbail_img", file_thumbail_img) ;
      form_data.append("specification", JSON.stringify(thongtincauhinh));
      form_data.append("summarynote_content", plainText);
      form_data.append("img_old_thumbail", JSON.stringify(img_old_thumbail));

      $.ajax({
      url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/update-product.php",
      data: form_data,
      contentType: false,
      processData: false,
      type: 'POST',
      dataType: "json",
      success: function(data){
      console.debug( data);

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
              $('.alert.alert-info.alert-dismissible').text("Cập nhật thông tin thành công");
              $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
              $('.alert.alert-info.alert-dismissible').prop('hidden', false);
              $("html, body").animate({scrollTop: 0}, 1000);
              //Doi path cho anh, sau nay neu muon sua tiesp se khong bi loi
              //Anh thumbail
              $(".img-preview-product-edit").attr("src", "../../public/uploads/products/ "+info['tendanhmuc']+"thumbnail/"+data['anh_moi']);
              $(".img-preview-product-edit").attr("alt", data['anh_moi']);

              //Anh garelly
              foreach(data['anh_thumbail_cu'])
              $(".img-preview-product-edit").attr("src", "../../public/uploads/products/"+info['tendanhmuc']+"thumbnail/"+data['anh_moi']);
              $(".img-preview-product-edit").attr("alt", data['anh_moi']);




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
        var mutilImgEdit = document.getElementById("product-gallery-edit");
      mutilImgEdit.addEventListener("change",previewImagesEdit,false);
      function previewImagesEdit(){
        $('#Preview-product-gallery-edit').find('img').remove();
        var fileList = this.files;
        var anyWindow = window.URL || window.webkitURL;

          for(var i = 0; i < fileList.length; i++){
            var objectUrl = anyWindow.createObjectURL(fileList[i]);
            
            $('#Preview-product-gallery-edit').append('<img src="' + objectUrl + '" style="width: 20%;"/>');
            window.URL.revokeObjectURL(fileList[i]);
          }
      }
</script>
