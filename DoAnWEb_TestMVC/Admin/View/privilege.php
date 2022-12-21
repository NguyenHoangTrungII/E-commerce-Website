<?php
    if(!isset($_GET['id'])){
        echo "Đã có lỗi xảy ra";
        exit();
    }

    // session_start();
    require_once("include/menu.php");
    require_once("include/top.php");
    require_once("include/session.php");
    
    require_once("../Model/ModelAll.php");
    require_once("../config/databse.php");
	require_once("../config/site.php");
?>

<?php
    $Model = new ModelAll;
    if(isset($_GET['id'])){
        
        $columnName = $tableName = $whereValue = null;
        $columnName['1'] = "url";
        $columnName['2'] = "quyen.id tenquyen";
        $tableName['MAIN'] = "ct_quyen";
        $tableName['2'] ='nhomquyen';
        $tableName['1'] ='quyen';
        $whereValue['id_taikhoan']= $_GET['id'];
        $joinCondition = array ("1"=>array ('ct_quyen.id_quyen', 'quyen.id'), "2"=> array('ct_quyen.id_nhomquyen', 'nhomquyen.id'));
        $privilegeUser = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
        $privilegeUser_array = array();
        foreach($privilegeUser as $eachRow){
        array_push($privilegeUser_array, $eachRow['url']);
        }

        $columnName = $tableName = null;
        $columnName['1'] = "id";
        $columnName['2'] = "ten";;
        $tableName= 'nhomquyen';
        $privilegeNumber = $Model->selectData($columnName, $tableName);

    }

?>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực / </span> <a class="fw-light" href="" style="color: #b1b1b1">Nhân viên
                            / </a>Sửa nhân viên</h4>

                        <hr class="my-5" />
                        <!-- Basic Layout -->

                             <!-- alert warning -->
                        <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                            This is a danger dismissible alert — check it out!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="alert alert-info alert-dismissible" role="alert" hidden >
                            This is an info dismissible alert — check it out!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Thông tin <span>quyền nhân viên</span></h5>
                                        <small class="text-muted float-end">Cấp quyền</small>
                                    </div>
                                    <div class="card-body">
                                        <form class="edit_employee-form"  id="privilege-arrow">
                                            <!-- <div class="row"> -->
                                                <!-- <div class="mb-3 col-xl-6"> -->
                                                    <?php 
                                                        foreach($privilegeNumber as $eachPrivilege){
                                                            echo 
                                                            '
                                                                <label class="form-label" for="basic-default-fullname" ><h4>Quản lý ' . $eachPrivilege['ten'].'</h4></label>
                                                                <div class ="row pl-3" value='.$eachPrivilege['id'].'>
                                                            ';
                                                            $columnName = $tableName = $whereValue= null;
                                                            $columnName['1'] = "ten";;
                                                            $columnName['2'] = "url";
                                                            $columnName['3'] = "id";
                                                            $tableName= 'quyen';
                                                            $whereValue['id_nhomquyen'] = $eachPrivilege['id'];
                                                            $privilege = $Model->selectData($columnName, $tableName, $whereValue);

                                                            if(!empty($privilege)){
                                                                foreach(@$privilege as $each){
                                                                    if(in_array($each['url'], $privilegeUser_array)){
                                                                        echo '
                                                                            <div class="col-3 pb-4 pt-2">
                                                                            <div class="form-check">
                                                                                <input class="privilege-cb form-check-input" type="checkbox" value="'.$each['id'].'" id="defaultCheck3" checked />
                                                                                <label class="form-check-label" for="defaultCheck3"> '.$each['ten'].'</label>
                                                                            </div>
                                                                            </div> ';
                                                                    }
                                                                    else{
                                                                        echo '
                                                                        <div class="col-3 pb-4 pt-2">
                                                                        <div class="form-check">
                                                                            <input class="privilege-cb form-check-input" type="checkbox" value="'.$each['id'].'" id="defaultCheck3" />
                                                                            <label class="form-check-label" for="defaultCheck3">  '.$each['ten'].'</label>
                                                                        </div>
                                                                        </div> ';
                                                                    }
                                                                    
                                                                }
                                                            }

                                                            echo '</div>';

                                                        }
                                                    ?>
                                                    
                                                <!-- </div>
                                            </div> -->
                                            <button type="button" id=" btn-edit-employee" class="privilege-btn-save btn-save-edit btn btn-primary">Lưu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->

<?php
    include("include/tail.php");
?>

<script>
    $('.privilege-btn-save').on('click', function(){
        var id_nhomquyen = {};
        var id_quyen ={};
        var i = 0;
        var url_string = window.location;
        var url = new URL(url_string);
        var id_taikhoan = url.searchParams.get("id");

        // alert( id_taikhoan);

        $('#privilege-arrow').find('.privilege-cb').each(function(k, elm){
            console.debug($(elm).parent().parent().parent().attr('value'));

            if($(elm).is(":checked")){
                id_nhomquyen[i] = $(elm).parent().parent().parent().attr('value');
                id_quyen[i] = $(elm).attr("value");
                i = i +1;
            }
        })

        $.ajax({
              url: "http://localhost/DoAnWeb/DoAnWEb_TestMVC/admin/Controller/Privilege/add_edit_privilege.php",
              type:"POST",
              data:{
                id_nhomquyen: JSON.stringify(id_nhomquyen),
                id_quyen: JSON.stringify(id_quyen),
                id_taikhoan:  id_taikhoan

              },
              
              success: function(response){
                if(response ==1){
                    $('.alert.alert-info.alert-dismissible').text("Sửa thông tin thành công");
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-info.alert-dismissible').prop('hidden', false);
                    $("html, body").animate({scrollTop: 0}, 1000);
                }
                else{
                    $('.alert.alert-danger.alert-dismissible').text("Đã xảy ra lỗi, vui lòng thử lại sau");
                    $('.alert.alert-info.alert-dismissible').prop('hidden', true);
                    $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
                    $("html, body").animate({scrollTop: 0}, 1000);
                }
              }
          });

    })
</script>

