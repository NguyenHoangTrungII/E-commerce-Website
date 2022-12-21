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

// var_dump($employeeList);

?>

<?php 
  if(!$ctrl->checkprivilege( $privilegeUser_array, "add_employee.php")){
    $add_status = "hidden";
  }else{
    $add_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "edit_employee.php?id=4")){
    $edit_status = "hidden";
  }else{
    $edit_status = "";
  }

  if(!$ctrl->checkprivilege( $privilegeUser_array, "delete_employee.php")){
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
                                  <a class="dropdown-item" href="privilege.php?id='.$eachRow['id_taikhoan'].'" '.$role.' ><i
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

                  <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLongTitle">Phân quyền</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-xl">
                              <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                  <h5 class="mb-0">Thông tin <span>quyền của nhân viên</span></h5>
                                  <small class="text-muted float-end">Thêm thông tin</small>
                                </div>
                                <div class="card-body">
                                  <form>
                                    <div class="row">
                                      <div class="mb-3 col-xl-6">
                                        <label class="form-label" for="basic-default-fullname">Họ
                                          tên</label>
                                        <input type="text" class="form-control" id="basic-default-fullname"
                                          placeholder="Nhập họ và tên" disabled />
                                      </div>
                                      <div class="mb-3 col-xl-6">
                                        <label class="form-label">Ngày sinh</label>
                                        <input class="form-control" type="date" value="Chọn ngày si" disabled>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-check col-xl-4">
                                        <label class="form-label mb-3" for="basic-default-phone">Giới
                                          tính</label>
                                        <div class="row px-4">
                                          <div class="col-6">
                                            <input name=" GioiTinh" class="form-check-input" type="radio" value=""
                                              checked>
                                            <label class="form-check-label" for="defaultRadio2"> Nam
                                            </label>
                                          </div>

                                          <div class="col-6">
                                            <input name="GioiTinh" class="form-check-input" type="radio" value="">
                                            <label class="form-check-label" for="defaultRadio1">
                                              Nữ </label>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-email">Email</label>
                                          <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-email" class="form-control"
                                              placeholder="nguyenhoangtrunghs" aria-label=""
                                              aria-describedby="basic-default-email2" disabled />
                                            <!-- <span class="input-group-text" id="basic-default-email2">@gmail.com</span> -->
                                          </div>
                                          <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                                        </div>
                                      </div>
                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-phone">Số điện
                                            thoại</label>
                                          <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                            placeholder="0123456789" disabled />
                                        </div>
                                      </div>


                                    </div>

                                    <div class="row">
                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label for="defaultSelect" class="form-label">Tỉnh/Thành
                                            phố</label>
                                          <select id="defaultSelect" class="form-select" disabled>
                                            <option>Chọn tỉnh/thành phố</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label for="defaultSelect" class="form-label">Quận/Huyện</label>
                                          <select id="defaultSelect" class="form-select" disabled>
                                            <option>Chọn quận/huyên</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                          </select>
                                        </div>
                                      </div>


                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label for="defaultSelect" class="form-label">Phường/Xã</label>
                                          <select id="defaultSelect" class="form-select" disabled>
                                            <option>Chọn phường/xã</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="mb-3">
                                      <label class="form-label" for="basic-default-message">Địa chỉ</label>
                                      <textarea id="basic-default-message" class="form-control" placeholder="Địa chỉ"
                                        disabled></textarea>
                                    </div>

                                    <div class="mb-5">
                                      <label for="formFile" class="form-label">Ảnh</label>
                                      <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 160px; height: 160px;">
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

<!-- <script type="text/javascript">
	$('.btn-delete').click(function(){
		var id = $(this).attr('id');
		
		$('#modalDelete').attr('href','list-employee.php?did='+id);
	})
</script>	 -->

<script>
  // $('a').on('click', function(e) {
  //   e.preventDefault()
  // })

  // function onClick(){
  //   this.addClass
  // }

  // $('#content-table').on('click',' a', function ()
  // {
  //     var url = $(this).attr('href');
  //   alert(url);
  //     $.ajax({
  //         url : "url",
  //         type : 'get',
  //         dataType : 'json',
  //         success : function (result)
  //         {
  //         alert(result);

  //                 var html = " ";
  //                 $.each(result['member'], function (key, item){
  //                   html += '<td class="id-header user">' 
  //                           +member['id']+'</td>'; 
  //                   html += '<td class="name user">'
  //                           +member['hoten']+ '</td>'; 
  //                   html += '<td class="img user">'
  //                     +'<img src="'+$GLOBALS['USER_DIRECTORY_SHOW']+member['anh']+'" alt="Anh-dai-dien.jpg" class="photo-user">'
  //                   +'</td>'; 
  //                   html += ' <td class="birthday user">'
  //                         +'<span>'+$eachRow['ngaysinh']+'</span>'
  //                         +'</td>';
  //                   html += '<td class="email user">'
  //                             +item['sdt']+
  //                             '</td>'; 
  //                   html += '<td class="email user">'
  //                           +item['diachi']+
  //                           '</td>'; 
  //                   html += '<td class="email user">'
  //                   +'<div class="dropdown">'
  //                   +'<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">'
  //                     +'<i class="bx bx-dots-vertical-rounded"></i>'
  //                   +'</button>'
  //                   +'<div class="dropdown-menu">'
  //                     +'<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i' +
  //                         +'class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>'

  //                     +'<a type="submit" class="dropdown-item" href="edit_employee.php?id='+member['id']+'"><i class="bx bx-edit-alt me-1"></i>'
  //                       +'Sửa</a>'
  //                     +'<p class="btn-delete dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" id='+member['id_taikhoan']+' href=""><i class="bx bx-trash me-1" ></i> Xóa</p>'
  //                   +'</div>'
  //                 +'</div>'+
  //                   '</td>'; 
  //                 });
                  
                  
  //                 $('#list').html(html);
                  
  //                 $('#paging').html(result['paging']);
                  
  //                 window.history.pushState({path:url},'',url);
  //         }
  //     });
  //     return false;
  // });
</script>

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


<!-- <script type="text/javascript">
$(".btn-delete").click(function(e){
    var del_id = $(this).attr('id');
        var $ele = $(this);

        alert(del_id);

        swal({
    title: "Add Note",
    input: "textarea",
    showCancelButton: true,
    confirmButtonColor: "#1FAB45",
    confirmButtonText: "Save",
    cancelButtonText: "Cancel",
    buttonsStyling: true
      }).then(function () {       
          $.ajax({
              type:"POST",
              data:{del_id: del_id},
              cache: false,
              success: function(response) {
                  swal(
                  "Sccess!",
                  "Your note has been saved!",
                  "success"
                  )
              },
              failure: function (response) {
                  swal(
                  "Internal Error",
                  "Oops, your note was not saved.", 
                  "error"
                  )
              }
          });
      }, 
      function (dismiss) {
        if (dismiss === "cancel") {
          swal(
            "Cancelled",
              "Canceled Note",
            "error"
          )
        }
      })
    });
</script> -->

<!-- <script type="text/javascript">
$(".btn-delete").click(function(e){
    var del_id = $(this).attr('id');
        var $ele = $(this);

        $.ajax({
            type:"POST",
            data:{del_id: del_id},
            success: function(data){
              $ele.parent().parent().parent().parent().hide('slow');
            }
            
          });
        });
</script>  -->