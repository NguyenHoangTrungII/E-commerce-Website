<?php
    session_start();
    include("include/session.php");
    include("include/top.php");
    include("include/menu.php");
    include("../Model/ModelAll.php");
    include("../config/databse.php");
	  include("../config/site.php");
    include("../Model/Pagination.php");
    include("../Controller/Category/getall-category.php");
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
    'link_full'     => 'list-category.php?page={page}',
    'link_first'    => 'list-category.php',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');



// Lấy danh sách thành viên
$categoryList = getAll($limit, $start);

var_dump($categoryList);


?>


        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Danh mục</h4>

            <hr class="my-5" />

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
                <h5 class=" card-header">Thông tin danh mục</h5>
                <a href="add_category.php"><button class="btn btn-primary add-btn user" type="button">THÊM</button></a>
              </div>
              <div class="table-responsive text-nowrap">
                <table class="table user">
                  <thead>
                    <tr>
                      <th class="id-header category">Mã</th>
                      <th class="name category">Danh mục</th>
                      <th class="slug category">Slug</th>
                      <th class="img category">Ảnh</th>
                      <th class="descript category">số thứ tự</th>
                      <th class="show category">Hiển thị</th>
                      <th class="action category">Thao tác</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      $number=0;
                      foreach($categoryList as $eachRow){
                        
                        echo 
                      '
                        <tr>
                          <td class="id-header category">
                            '.$eachRow['id'].'
                          </td>
                          <td class="name category">
                            '.$eachRow['ten'].'
                          </td>
                          <td class="slug category">
                            Bo-nho-ssd
                          </td>
                          <td class="img category">
                            <img src="' . $GLOBALS['CATEGORY_DIRECTORY_SHOW'] . $eachRow['anh'] . '" class="photo-category">
                          </td>
                          <td class="descript category">
                            Số thứ tự
                          </td>
                          <td class="show category">
                              <label class="toggle-switchy pl-2" for="category-list_'.$number.'" data-size="sm"
                              data-text="false" data-style="rounded" data-toggle="collapse"
                              data-target="#filterbar" aria-expanded="true"
                              aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                              <input checked="" type="checkbox" id="category-list_'.$number.'">
                              <span class="toggle">
                                  <span class="switch"></span>
                              </span>
                          </label>
                          </td>
                          <td class="action category flex">
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class=" bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu action--none">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i
                                    class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>

                                <a class="dropdown-item" href="edit_category.php?id='.$eachRow['id'].'"><i class="bx bx-edit-alt me-1"></i>
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
                      <td class="id-header category">
                        1
                      </td>
                      <td class="name category">
                        Bộ nhớ SSD
                      </td>
                      <td class="slug category">
                        Bo-nho-ssd
                      </td>
                      <td class="img category">
                        <img src="../assets/img/avatars/1.png" alt="Anh dai dien" class="photo-category">
                      </td>
                      <td class="descript category">
                        Danh mục bộ nhớ ssd
                      </td>
                      <td class="action category flex">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class=" bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu action--none">
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i
                                class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>

                            <a class="dropdown-item" href="edit_category.php"><i class="bx bx-edit-alt me-1"></i>
                              Sửa</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Xóa</a>
                          </div>
                        </div>
                      </td>
                    </tr> -->

                  </tbody>
                  <tfoot class="table-border-bottom-0">
                    <tr>
                    <th class="id-header category">Mã</th>
                      <th class="name category">Danh mục</th>
                      <th class="slug category">Slug</th>
                      <th class="img category">Ảnh</th>
                      <th class="descript category">số thứ tự</th>
                      <th class="show category">Hiển thị</th>
                      <th class="action category">Thao tác</th>
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
                                  <h5 class="mb-0">Thông tin <span>Danh mục</span></h5>
                                  <small class="text-muted float-end">Xem thông tin</small>
                                </div>
                                <div class="card-body">
                                  <form>
                                    <div class="row">
                                      <div class="mb-3 col-xl-6">
                                        <label class="form-label" for="basic-default-fullname">Tên danh mục</label>
                                        <input type="text" class="form-control" id="basic-default-fullname"
                                          placeholder="Nhập tên danh mục" disabled/>
                                      </div>
                                      <div class="mb-3 col-xl-6">
                                        <label class="form-label" for="basic-default-slug">Slug</label>
                                        <input type="text" class="form-control" id="basic-default-slug"
                                          placeholder="Nhập slug tên miền" disabled/>
                                      </div>
                                    </div>
              
                                    <div class="mb-3">
                                      <label class="form-label" for="basic-default-message">Mô tả</label>
                                      <textarea id="basic-default-message" class="form-control" placeholder="Nhập mô tả cho danh mục" disabled></textarea>
                                    </div>
              
                                    <div class="mb-5">
                                      <label for="formFile" class="form-label">Ảnh</label>
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
        url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/admin/Controller/Category/delete-category.php",
        type:"POST",
        data:{del_id: del_id},
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