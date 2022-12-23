<?php
    // session_start();
    require_once("include/menu.php");
    require_once("include/session.php");
    require_once("include/top.php");
    require_once("../Model/ModelAll.php");
    require_once("../config/databse.php");
	  require_once("../config/site.php");
    require_once("../Model/Pagination.php");
    require_once("../Controller/Category/getall-category.php");
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



?>

<?php 
  if(!$ctrl->checkprivilege( $privilegeUser_array, "add_category.php", $role)){
    $add_status = "hidden";
  }else{
    $add_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "edit_category.php?id=4", $role)){
    $edit_status = "hidden";
  }else{
    $edit_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "delete_category.php", $role)){
    $delete_status = "hidden";
  }else{
    $delete_status = "";
  }

  if($delete_status == "" || $edit_status == ""){
    $dow_status ="";
  }
  else{
    $dow_status ="hidden";
  }


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
                <a href="add_category.php"><button class="btn btn-primary add-btn user" type="button" <?= $add_status ?>>THÊM</button></a>
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
                      <th class="action category" <?= $dow_status ?>>Thao tác</th>

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
                          <td class="show category" >
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
                          <td class="action category flex" '.$dow_status.'>
                            <div class="dropdown" '.$dow_status.'>
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class=" bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu action--none">

                                <a class="dropdown-item" href="edit_category.php?id='.$eachRow['id'].'" '.$edit_status .'><i class="bx bx-edit-alt me-1" ></i>
                                  Sửa</a>
                                  <p class="btn-delete dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" id=' . $eachRow['id'] . ' href="" '.$delete_status.'><i class="bx bx-trash me-1" ></i> Xóa</p>
                              </div>
                            </div>
                          </td>
                        </tr>
                      ';
                      $number++;
                      }

                      
                    ?>

                  </tbody>
                  <tfoot class="table-border-bottom-0">
                    <tr>
                    <th class="id-header category">Mã</th>
                      <th class="name category">Danh mục</th>
                      <th class="slug category">Slug</th>
                      <th class="img category">Ảnh</th>
                      <th class="descript category">số thứ tự</th>
                      <th class="show category">Hiển thị</th>
                      <th class="action category" <?= $dow_status ?>>Thao tác</th>
                    </tr>
                  </tfoot>


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