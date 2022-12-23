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



                                        <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLongTitle">Thông tin chi tiết
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card mb-4">
                                                                    <div
                                                                        class="card-header d-flex justify-content-between align-items-center">
                                                                        <h5 class="mb-0">Thông tin <span>sản phẩm</span>
                                                                        </h5>
                                                                        <small class="text-muted float-end">Thêm thông
                                                                            tin</small>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form>
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-12">
                                                                                    <label class="form-label" for="basic-default-nameproduct">Tên sản phẩm</label>
                                                                                    <input type="text" class="form-control" id="basic-default-nameproduct"
                                                                                        placeholder="Nhập tên sản phẩm" disabled>
                                                                                </div>
                                                                            </div>
                                
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-12">
                                                                                    <label class="form-label" for="basic-default-fullname">Slug</label>
                                                                                    <input type="text" class="form-control" id="basic-default-slug"
                                                                                        placeholder="Nhập slug" disabled>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Danh mục</label>
                                                                                        <select id="defaultSelect" class="form-select" disabled>
                                                                                            <option>Chọn danh mục</option>
                                                                                            <option value="1">CPU</option>
                                                                                            <option value="2">RAM</option>
                                                                                            <option value="3">SSD</option>
                                                                                            <option value="4">HDD</option>
                                                                                            <option value="5">VGA</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Thương hiệu</label>
                                                                                        <select id="defaultSelect" class="form-select" disabled>
                                                                                            <option>Chọn thương hiệu</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                
                                                                                
                                                                                
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Giá gốc</label>
                                                                                    <input type="text" class="form-control" id="basic-default-cost"
                                                                                        placeholder="Nhập giá gốc" disabled>
                                                                                </div>
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Phần trăm giảm</label>
                                                                                    <input type="text" class="form-control" id="basic-default-percent"
                                                                                        placeholder="Nhập phần trăm giảm" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Bảo hành</label>
                                                                                    <input type="text" class="form-control" id="basic-default-cost"
                                                                                        placeholder="Nhập số tháng bảo hành" disabled>
                                                                                </div>
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Tình trạng</label>
                                                                                    <input type="text" class="form-control" id="basic-default-percent"
                                                                                        placeholder="Nhập tình trạng còn hàng" disabled>
                                                                                </div>
                                                                                
                                                                            </div>
                                
                                
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày sản
                                                                                            xuất</label>
                                                                                        <input class="form-control" type="date" value="" disabled>
                                                                                    </div>
                                                                                </div>
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày tạo</label>
                                                                                        <!-- <input type="text" class="form-control" id="date-time-create" value=""> -->
                                                                                        <p class="mt-1" id="date-time-create"></p>
                                                                                    </div>
                                                                                </div>
                                
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày sửa</label>
                                                                                        <input class="form-control" type="date" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 1</label>
                                                                                </div>

                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 2</label>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 3</label>
                                                                                </div>

                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 4</label>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
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
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
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

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


<?php
  include("include/tail.php");
?>

<!-- real time  -->
<script>
  function  changestock(e){
    var id = $(e).parent().parent().find('td').attr('id');
    var stock = parseInt($(e).closest('tr').find('.stock.warehouse').find('input').val()) ;

    // alert($(e).attr('id'));
    // alert(stock);

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