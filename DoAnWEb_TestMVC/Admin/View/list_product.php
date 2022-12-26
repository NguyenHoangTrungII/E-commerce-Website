<?php
    // session_start();
    require_once("include/menu.php");

    require_once("include/session.php");
    require_once("include/top.php");
    require_once("../Model/ModelAll.php");
    require_once("../config/databse.php");
	  require_once("../config/site.php");
    require_once("../Model/Pagination.php");
    require_once("../Controller/product/getall-product.php");
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
    'link_full'     => 'list_product.php?page={page}',
    'link_first'    => 'list_product.php',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');

// var_dump($limit);


// Lấy danh sách thành viên
$productList = getAll($limit, $start);

?>

<!-- Phân quyền -->
<?php 
  if(!$ctrl->checkprivilege( $privilegeUser_array, "add_product.php", $role)){
    $add_status = "hidden";
  }else{
    $add_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "edit_product.php?id=4", $role)){
    $edit_status = "hidden";
  }else{
    $edit_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "delete_product.php", $role)){
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
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bán hàng /</span> Sản phẩm</h4>

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
                                <h5 class=" card-header">Danh sách sản phẩm</h5>
                                <a href="add_product.php"><button class="btn btn-primary add-btn user"
                                        type="button" <?=  $add_status  ?>>THÊM</button></a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table user">
                                    <thead>
                                      <tr>
                                        <th class="id-header product">ID</th>
                                        <th class="category product">Danh mục</th>
                                        <th class="companny product">Hãng</th>
                                        <th class="name product">Tên sản phẩm</th>
                                        <th class="img product text-center">Ảnh</th>
                                        <th class="cost product">Giá gốc</th>
                                        <th class="percent-reduce product">Phần trăm giảm</th>
                                        <th class="status product">Tình trạng</th>
                                        <th class="action product" <?= $dow_status ?>>Thao tác</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        $int=0;
                                        foreach($productList AS $eachRow)
                                        {
                                          if($eachRow['tinhtrang']==1)
                                          {
                                            $productStatus = "checked='true'";
                                          }
                                          else
                                          {
                                            $productStatus = "";
                                          }
                                          
                                          echo
                                          '
                                          <tr>
                                            <td id="'.$eachRow['id'].'" class="id-header product">
                                              '.$eachRow['id'].'
                                            </td>
                                            <td class="category product">
                                            '.$eachRow['ten'].'
                                            </td>
                                            <td class="companny product">
                                            '.$eachRow['tenncc'].'
                                            </td>
                                            <td class="name product">
                                            '.$eachRow['tensp'].'
                                            </td>
                                            <td class="img product">
                                              <img src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$eachRow['ten']."/"."Thumbnail/".$eachRow['anh'].'" class ="product-img">
                                            </td>
                                            <td class="cost product">
                                            '.$eachRow['giagoc'].'
                                            </td>
                                            <td class="percent-reduce product">
                                            '.$eachRow['phantram'].'
                                            </td>
                                            <td class="status product">
                                              <label class="status-product-check toggle-switchy pl-2" for="status-product-check_'.$int.'" data-size="sm" data-text="false"
                                                data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true"
                                                aria-controls="filterbar" id="filter-btn" onchange="changStatus(this)">
                                                <input '.$productStatus.'"  type="checkbox" class="" id="status-product-check_'.$int.'">
                                                <span class="toggle">
                                                  <span class="switch"></span>
                                                </span>
                                              </label>
                                            </td>
                                            <td class="action product" '.$dow_status.'>
                                            <div class="dropdown" '.$dow_status.'>
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu action--none">
                                                        <a class="dropdown-item" href="edit_product.php?id='.$eachRow['id'].'" '.$edit_status.'><i
                                                                    class="bx bx-trash me-1"></i> sửa</a>
                                                            
                                                            <a class="dropdown-item" href="javascript:void(0);" '.$delete_status.'><i
                                                                    class="bx bx-trash me-1"></i> Xóa</a>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                          ';
                                          
                                          $int++;
                                        }

                                        


                                      ?>
                                    </tbody>
                                    <tfoot class="table-border-bottom-0">
                                      <tr>
                                        <th class="id-header product">ID</th>
                                        <th class="category product">Danh mục</th>
                                        <th class="companny product">Hãng</th>
                                        <th class="name product">Tên sản phẩm</th>
                                        <th class="img product">Ảnh</th>
                                        <th class="cost product">Giá gốc</th>
                                        <th class="percent-reduce product">Phần trăm giảm</th>
                                        <th class="status product">Tình trạng</th>
                                        <th class="action product" <?= $dow_status ?>>Thao tác</th>
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


<!-- realtime thay đổi trạng thái -->
<script>
  function  changStatus(e){
    var id_product = $(e).parent().parent().find('td').attr('id');
    var status = document.getElementById($(e).find('input').attr('id')).checked ? 1: 0;

    $.ajax({
    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/status_check_rt.php",
    data: {id_product: id_product, status: status},
    type: 'POST',
    dataType: "text",
    success: function(data){ 
      if(data==1){
        $('.alert.alert-info.alert-dismissible').text("Sửa thông tin thành công");
        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
        $("html, body").animate({scrollTop: 0}, 1000);

        setTimeout(function(){
          $('.alert.alert-info.alert-dismissible').prop('hidden', true);
          }, 2000);
      }
      else{
        $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
        $("html, body").animate({scrollTop: 0}, 1000);

        setTimeout(function(){
          $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
        }, 5000);
      }
    }
        
        
  });
};
</script>