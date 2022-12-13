<?php
    session_start();
    include("include/session.php");
    include("include/top.php");
    include("include/menu.php");
    include("../Model/ModelAll.php");
    include("../config/databse.php");
	  include("../config/site.php");
    include("../Model/Pagination.php");
    include("../Controller/Slider/getall-slider.php");
?>

<!-- get role -->
<?php

$pagination = new Pagination;


  if($_SESSION['SMC_login_admin_type']==1){
    $_SESSION['SMC_login_admin_role']="Admin";
  }
  else {
    $_SESSION['SMC_login_admin_role']="Quản lý";
  }


  $config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
    'total_record'  => count_all_member(), 
    'limit'         => 5,
    'link_full'     => 'list-slider.php?page={page}',
    'link_first'    => 'list-slider.php',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');

// var_dump($limit);


// Lấy danh sách thành viên
$sliderList = getAll($limit, $start);

// var_dump($sliderList);

?>



        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website /</span> Slider</h4>

            <hr class="my-5" />
             <!-- alert warning -->
             <div class="alert alert-danger alert-dismissible" role="alert" hidden>
              This is a danger dismissible alert — check it out!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-info alert-dismissible" role="alert" hidden >
              This is an info dismissible alert — check it out!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- Bootstrap Table with Header - Footer -->
            <div class="card">
              <div class="card-header header table-user">
                <h5 class=" card-header">Thông tin silder</h5>
                <a href="add_slider.php"><button class="btn btn-primary add-btn user" type="button">THÊM</button></a>
              </div>
              <div class="table-responsive text-nowrap">
                <table class="table user">
                  <thead>
                    <tr>
                      <th class="id-header  slider">Mã</th>
                      <th class="name-slider slider">Slider</th>
                      <th class="img slider">Ảnh</th>
                      <th class="satus slider">Tình trạng</th>
                      <th class="number slider">Thứ tự</th>
                      <th class="action slider">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $number =0;
                    foreach ($sliderList as $eachRow) {
                      if (empty($eachRow['url'])) {
                        $adminImage = "";
                      } else {
                        $adminImage = $GLOBALS['USER_DIRECTORY'] . $eachRow['url'];
                      }

                      if($eachRow['tinhtrang']==1)
                      {
                        $sliderStatus = "checked='true'";
                      }
                      else
                      {
                        $sliderStatus = "";
                      }

                      echo '
                     <tr>
                          <td  id =" ' . $eachRow['id'] . '" class="id-header slider">
                            ' . $eachRow['id'] . '
                          </td>
 
                          <td class="name-slider slider">
                            ' . $eachRow['tenslider'] . '
                          </td>

                          <td class="img slider">
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li>
                              <img src="' . $GLOBALS['SLIDES_DIRECTORY_SHOW'] . $eachRow['url'] . '" alt="Anh slider" class="slider-photo">
                            </li>
                          </ul>
                          </td>
                        
                          

                          <td class="satus slider">
                              <label onchange="changStatusSlider(this)" class="toggle-switchy pl-2" for="satus-silder-check'.$number.'" data-size="sm" data-text="false" data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                              <input  '.$sliderStatus.' type="checkbox" id="satus-silder-check'.$number.'">
                              <span class="toggle">
                                <span class="switch"></span>
                              </span>
                              </label>
                          </td>

                          <td class="number slider">
                          ' . $eachRow['sothutu'] . '
                          </td>

                        <td>
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i
                              class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>

                          <a type="button" class="dropdown-item" href="edit_slider.php?id=' . $eachRow['id'] . '"><i class="bx bx-edit-alt me-1"></i>
                            Sửa</a>
                          <p class="btn-delete dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" id=' . $eachRow['id'] . ' href=""><i class="bx bx-trash me-1" ></i> Xóa</p>
                        </div>
                        </div>
                      </td>
                    </tr>
                    ';
                      $number++;
                    }


                    ?>
                    <!-- <tr>
                      <td class="id-header  slider">
                        1
                      </td>
                      <td class="name-slider slider">
                        Khuyến mãi lớn aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                      </td>

                      <img src="../../public/uploads//users/User_admin_anh-dai-dien.jpg" alt="Anh dai dien" class="photo-silder">
                      </td>
                      <td class="satus slider">
                        <label class="toggle-switchy pl-2" for="status-silder-check" data-size="sm" data-text="false" data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                          <input checked="" type="checkbox" id="status-silder-check">
                          <span class="toggle">
                            <span class="switch"></span>
                          </span>
                        </label>
                      </td>
                      <td class="number slider">
                        1
                      </td>
                      <td class="action slider">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu action--none">
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>

                            <a class="dropdown-item" href="edit_slider.php"><i class="bx bx-edit-alt me-1"></i>
                              Sửa</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Xóa</a>
                          </div>
                        </div>
                      </td>
                    </tr> -->
                  </tbody>
                  <tfoot class="table-border-bottom-0">
                    <tr>
                      <th class="id-header  slider">Mã</th>
                      <th class="name-slider slider">Slider</th>
                      <th class="img slider">Ảnh</th>
                      <th class="satus slider">Tình trạng</th>
                      <th class="number slider">Thứ tự</th>
                      <th class="action slider">Thao tác</th>
                    </tr>
                  </tfoot>

                  <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLongTitle">Thông tin chi tiết</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-xl">
                              <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                  <h5 class="mb-0">Thông tin <span>Slider</span></h5>
                                  <small class="text-muted float-end">Xem thông tin</small>
                                </div>
                                <div class="card-body">
                                  <form>

                                    <div class="mb-3 col-xl-12">
                                      <label class="form-label" for="basic-default-fullname">Tên slider</label>
                                      <input type="text" class="form-control" id="basic-default-fullname" placeholder="Nhập tên danh mục" disabled />
                                    </div>



                                    <div class="row">

                                      <div class="mb-3 col-md-6 d-flex flex-column ">
                                        <label class="form-label col-12" for="basic-default-slug">Tình trạng</label>

                                        <label class="toggle-switchy pl-2" for="fitter-product" data-size="sm" data-text="false" data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">

                                          <input checked="" type="checkbox" id="fitter-product" disabled>
                                          <span class="toggle">
                                            <span class="switch"></span>
                                          </span>
                                        </label>

                                      </div>

                                      <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-default-fullname">Số thứ tự</label>
                                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Nhập tên danh mục" disabled />
                                      </div>
                                    </div>

                                    <div class="mb-5">
                                      <label for="formFile" class="form-label">Xem trước</label>
                                      <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 300px; height: 160px;">
                                          <img src="../assets/img/avatars/1.png" alt="">
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Đóng
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>


                </table>
                <div class="paging d-flex justify-content-end px-5 py-4">
                  <?php echo $pagination->html(); ?>
                </div>
              </div>
            </div>
            <!-- Bootstrap Table with Header - Footer -->
          </div>
          <!-- / Content -->

          
<?php
include("include/tail.php");
?>


<script type="text/javascript">
$(".btn-delete").click(function(e){
  var del_id = $(this).attr('id');
  
  var $ele = $(this);
  Swal.fire({
  title: 'Bạn có muốn xóa slider này?',
  text: "Toàn bộ thông tin sẽ biến mất",
  icon: 'Cảnh báo',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Xóa',
  cancelButtonText: 'Hủy'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/admin/Controller/Slider/delete-slider.php",
        type:"POST",
        data:{del_id: del_id},
        // alert('aaaaa');
        success: function(response){
          if(response !=0){
                // console.log(response);
                Swal.fire(
                'Đã xóa!',
                'Slider có ID '+del_id+' đã bị xóa',
                'sucess')
                $ele.parent().parent().parent().parent().slideToggle('slow'); 
            } else{
                Swal.fire(
                'Thất bại',
                'Đã xảy ra lỗi! Vui lòng thử lại',
                'error'
              )
        }
      }
        
          

    });
      
    }
  })
 });
</script>


<!-- realtime thay đổi trạng thái -->
<script>
  function  changStatusSlider(e){
    var id = $(e).parent().parent().find('td').attr('id');
    var status = document.getElementById($(e).find('input').attr('id')).checked ? 1: 0;
    // alert($(e).attr('id'));

    $.ajax({
    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Slider/status_checkrt_slider.php",
    data: {id: id, status: status},
    type: 'POST',
    dataType: "text",
    success: function(data){ 
      if(data==1){
        $('.alert.alert-info.alert-dismissible').text("Sửa thông tin thành công");
        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
        $("html, body").animate({scrollTop: 0}, 1000);

        setTimeout(function(){
          $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
          }, 2000);
      //   setTimeout(function(){

      //     $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
      //   }, 1000)
      }
      else{
        $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
        $("html, body").animate({scrollTop: 0}, 1000);

        setTimeout(function(){
          $('.alert.alert-info.alert-dismissible').prop('hidden', true);
        }, 2000);
      }
    }
        
        
  });
};
</script>