<?php
    // session_start();
    require_once("include/menu.php");
    require_once("include/session.php");
    require_once("include/top.php");
    require_once("../Model/ModelAll.php");
    require_once("../config/databse.php");
	  require_once("../config/site.php");
    require_once("../Model/Pagination.php");
    require_once("../Controller/Warehouse/getall-warehouse.php");
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
    'link_full'     => 'list_warehouse.php?page={page}',
    'link_first'    => 'list_warehouse.php',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');

// var_dump($limit);


// Lấy danh sách thành viên
$warehouseList = getAll($limit, $start);

// var_dump($productList);

?>

<?php 

  if(!$ctrl->checkprivilege( $privilegeUser_array, "update_qty.php", $role)){
    $edit_status = "onkeydown='return false'";
  }else{
    $edit_status = "";
  }

?>


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Nhân viên</h4>

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
                                <h5 class=" card-header">Danh sách sản phẩm</h5>
                                <!-- <a href="add_warehouse.php"><button class="btn btn-primary add-btn user"
                                        type="button">THÊM</button></a> -->
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table user">
                                    <thead>
                                        <tr>
                                            <th class="id-header warehouse">ID</th>
                                            <th class="product-name warehouse">Tên sản phẩm</th>
                                            <th class="stock warehouse">Số lượng tồn</th>
                                            <th class="buyed warehouse">Số lượng bán</th>
                                            <th class="date-import warehouse">Ngày nhập</th>
                                            <th class="date-update warehouse">Ngày sửa</th>
                                            <th class="action warehouse">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                        foreach($warehouseList AS $eachRow)
                                        {
                                            echo '
                                            <tr>
                                            <td id=" '.$eachRow['id_sp'].'" class="id-header warehouse">
                                              '.$eachRow['id_sp'].'
                                              </td>
                                              <td class="product-name warehouse">
                                                '.$eachRow['tensp'].'
                                              </td>
                                              <td class="stock warehouse">
                                              <input type="number" class="form-control"   placeholder="nhap so luong ton"  value="'.(int)$eachRow['soluongton'].'"  '.$edit_status.'>
                                              
                                              </td>
                                              <td class ="buyed warehouse">
                                              '.$eachRow['soluongdaban'].'
                                              </td>
                                              <td class="date-import warehouse">
                                                '.$eachRow['ngaynhap'].'
                                              </td>
                                              <td class="date-update warehouse">
                                                '.$eachRow['ngaysua'].'
                                              </td>
                                              <td class="action warehouse">
                                              <button class="btn btn-primary "
                                                type="button" onClick="changestock(this)"  >Lưu</button></a>
                                               </td>
                                          ';
                                        }
                                        ?>

                                        
                                    </tbody>
                                        <tfoot class="table-border-bottom-0">
                                          <tr>
                                            <th class="id-header warehouse">ID</th>
                                            <th class="product-name warehouse">Tên sản phẩm</th>
                                            <th class="stock warehouse">Số lượng tồn</th>
                                            <th class ="buyed warehouse">Số lượng bán</th>
                                            <th class="date-import warehouse">Ngày nhập</th>
                                            <th class="date-update warehouse">Ngày sửa</th>
                                            <th class="action warehouse">Thao tác</th>
                                          </tr>
                                        </tfoot>
                                </table>
                                <div class="paging d-flex justify-content-end px-5 py-4">
                                  <?php echo $pagination->html(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>


<?php
  include("include/tail.php");
?>

<!-- real time thay đổi số lượng sản phẩm  -->
<script>
  function  changestock(e){
    var id = $(e).parent().parent().find('td').attr('id');
    var stock = parseInt($(e).closest('tr').find('.stock.warehouse').find('input').val()) ;

    $.ajax({
    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Warehouse/checkrt-warehouse.php",
    data: {id: id, stock: stock},
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