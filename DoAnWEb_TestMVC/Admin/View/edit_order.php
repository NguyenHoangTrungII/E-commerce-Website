<?php
    // session_start();
    require_once("include/menu.php");
    require_once("include/session.php");
    require_once("include/top.php");
    // require_once("../Model/ModelAll.php");
    require_once("../config/databse.php");
	  require_once("../config/site.php");
    require_once("../Model/Pagination.php");
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

  $columnName = $tableName = $whereValue =   $joinCondition = $employeeInfo = null;

  // $columnName = "*";
  $columnName['1']="sanpham.id";
  $columnName['2']="sanpham.tensp";
  $columnName['3']="sanpham.anh";
  $columnName['4']="ctdh.giasp";
  $columnName['5']="ctdh.soluong";
  $columnName['6']="danhmucsp.ten tendanhmuc";
  
  $tableName['MAIN'] = "ctdh";
  $tableName['1'] ='sanpham';
  $tableName['2'] ='donhang';
  $tableName['3'] ='danhmucsp';
  $whereValue['ctdh.id_donhang']= $_GET['id'];

  $joinCondition = array ("1"=>array ('sanpham.id', 'ctdh.id_sp'), "2"=>array ('donhang.id', 'ctdh.id_donhang'), "3"=>array ('sanpham.id_danhmuc', 'danhmucsp.id'));
  $cthdList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
//  var_dump($cthdList);

?>



        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Đơn hàng /</span> Chi tiết đơn hàng</h4>

            <hr class="my-5" />

            <!-- Bootstrap Table with Header - Footer -->
            <div class="card">
              <div class="card-header header table-user">
                <h5 class=" card-header">Thông tin chi tiết đơn hàng</h5>
              </div>
              <div class="table-responsive text-nowrap">
                <table class="table user">
                  <thead>
                    <tr>
                      <th class="id-header order-detail">Mã</th>
                      <th class="name-product order-detail">Sản phẩm</th>
                      <th class="img order-detail">Ảnh sản phẩm</th>
                      <th class="price order-detail">Giá</th>
                      <th class="qty order-detail">Số lượng</th>
                      <th class="action order-detail">Thao tác</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php 

                  foreach($cthdList AS $eachRow)
                  {
                    $id_order=$_GET['id'];
                      echo '
                      <tr>
                        <td id='.$eachRow['id'].' class="id-header order-detail">
                        '.$eachRow['id'].'
                        </td>
                        <td class="name-product order-detail">
                          '.$eachRow['tensp'].'
                        </td>
                        <td class="img order-detail">
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                          <li>
                            <img src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$eachRow['tendanhmuc']."/"."Thumbnail/".$eachRow['anh'].'" alt="Anh-sp.jpg" class="photo-product">
                          </li>
                        </ul>
                        </td>
                        <td class="price order-detail">
                          <span>'.$eachRow['giasp'].'</span>
                        </td>
                        <td class="qty order-detail">
                          '.$eachRow['soluong'].'
                        </td>
                        <td class="action order-detail">
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu action--none">
                          <a class="dropdown-item" href="list-order.php"><i class="bx bx-edit-alt me-1"></i>
                            Quay lại</a>
                            <p class="btn-delete dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" id='.$id_order.' href=""><i class="bx bx-trash me-1" ></i> Xóa</p>
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
                      <th class="id-header order-detail">Mã</th>
                      <th class="name-product order-detail">Sản phẩm</th>
                      <th class="img order-detail">Ảnh sản phẩm</th>
                      <th class="price order-detail">Giá</th>
                      <th class="qty order-detail">Số lượng</th>
                      <th class="action order-detail">Thao tác</th>
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

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

<?php
  include("include/tail.php");
?>



<script type="text/javascript">
$(".btn-delete").click(function(e){
    var id_order = $(this).attr('id');
    var id_sp = $(this).parent().parent().parent().parent().find('td').attr('id');
    // alert(id_order);
        var $ele = $(this);
        Swal.fire({
        title: 'Bạn có muốn xóa sản phẩm này?',
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
              url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/admin/Controller/CTHD/delete-cthd.php",
              type:"POST",
              data:{id_order: id_order, id_sp: id_sp},
              
              success: function(response){
                if(response !=0){
                      console.log(response);
                      Swal.fire(
                      'Đã xóa!',
                      'Sản phẩm có ID '+id_sp+' đã bị xóa ra khỏi đơn hàng '+id_order+' ' ,
                      'success')
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
