<?php
    // session_start();
    require_once("include/menu.php");
    require_once("include/session.php");
    require_once("include/top.php");
    require_once("../Model/ModelAll.php");
    require_once("../Controller/Controller.php");
    require_once("../config/databse.php");
	  require_once("../config/site.php");
    require_once("../Model/Pagination.php");
    require_once("../Controller/Employee/getall-employee.php");
?>
<?php
$pagination = new Pagination;

  $config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
    'total_record'  => count_all_member(), 
    'limit'         => 2,
    'link_full'     => 'list-employee.php?page={page}',
    'link_first'    => 'list-employee.php',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $start= null;
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');


// Lấy danh sách thành viên
$employeeList = getAll($limit, $start);
?>

<!-- Phân quyền -->

<?php 
  if(!$ctrl->checkprivilege( $privilegeUser_array, "add_employee.php",$role)){
    $add_status = "hidden";
  }else{
    $add_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "edit_employee.php?id=4", $role)){
    $edit_status = "hidden";
  }else{
    $edit_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "delete_employee.php", $role)){
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

  if($_SESSION['SMC_login_admin_type'] == 1){
    $role = "";

  }
  else{
    $role = "hidden";
  }


?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Nhân viên</h4>

            <hr class="my-5" />

            <!-- Bootstrap Table with Header - Footer -->
            <div class="card">
              <div class="card-header header table-user">
                <h5 class=" card-header">Thông tin nhân viên</h5>
                <a href="add_employee.php"><button class="btn btn-primary add-btn user" type="button" <?= $add_status  ?>>THÊM</button></a>
              </div>
              <div class="table-responsive text-nowrap">
                <table id="content-table" class="table user">
                  <thead>
                    <tr>
                      <th class="id-header user">Mã</th>
                      <th class="name user">Họ tên</th>
                      <th class="img user">Ảnh</th>
                      <th class="birthday user">Ngày sinh</th>
                      <th class="email user">Email</th>
                      <th class="phone user">Số điện thoại</th>
                      <th class="address user">Địa chỉ</th>
                      <th class="action user" <?= $dow_status ?>>Thao tác</th>

                    </tr>
                  </thead>
                  <tbody id="list">

                    <?php 

                        foreach($employeeList AS $eachRow)
                        {
                          if(empty($eachRow['anh']))
                          {
                            $adminImage = "";
                          }
                          else
                          {
                            $adminImage = $GLOBALS['USER_DIRECTORY'].$eachRow['anh'];
                          }
                          
                          echo '
                          <tr>
                            <td class="id-header user">
                            '.$eachRow['id'].'
                            </td>
                            <td class="name user">
                              '.$eachRow['hoten'].'
                            </td>
                            <td class="img user">
                              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li>
                                  <img src="'.$GLOBALS['USER_DIRECTORY_SHOW'].$eachRow['anh'].'" alt="Anh-dai-dien.jpg" class="photo-user">
                                </li>
                              </ul>
                            </td>
                            <td class="birthday user">
                              <span>'.$eachRow['ngaysinh'].'</span>
                            </td>
                            <td class="email user">
                              '.$eachRow['email'].'
                            </td>
                            <td class="phone user">
                            '.$eachRow['sdt'].
                            '</td>
                            <td class="address user">
                              '.$eachRow['diachi'].'
                            </td>
                            <td '.$dow_status.'>
                              <div class="dropdown" '.$dow_status.'>
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="privilege.php?id='.$eachRow['id_taikhoan'].'" ><i
                                      class="bx bx-info-circle"></i> Phân quyền</a>

                                  <a type="submit" class="dropdown-item" href="edit_employee.php?id='.$eachRow['id'].'" '. $edit_status.'><i class="bx bx-edit-alt me-1"></i>
                                    Sửa</a>
                                  <p class="btn-delete dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" id='.$eachRow['id_taikhoan'].' href="" '. $delete_status.'><i class="bx bx-trash me-1" ></i> Xóa</p>
                                </div>
                              </div>
                            </td>
                          </tr>

                          
                          ';
                          
                      }

                      
                    ?>
                  </tbody>
                  <tfoot class="table-border-bottom-0">
                    <tr>
                      <th class="id-header user">Mã</th>
                      <th class="name user">Họ tên</th>
                      <th class="img user">Ảnh</th>
                      <th class="birthday user">Ngày sinh</th>
                      <th class="email user">Email</th>
                      <th class="phone user">Số điện thoại</th>
                      <th class="address user">Địa chỉ</th>
                      <th class="action user" <?= $dow_status ?>>Thao tác</th>
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
    console.log(del_id);
    var $ele = $(this);
    Swal.fire({
    title: 'Bạn có muốn xóa nhân viên này?',
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
          url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Employee/delete-employee.php",
          type:"POST",
          data:{del_id: del_id},
          
          success: function(response){
            if(response !=0){
                  console.log(response);
                  Swal.fire(
                  'Đã xóa!',
                  'Nhân viên có ID '+del_id+' đã bị xóa',
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