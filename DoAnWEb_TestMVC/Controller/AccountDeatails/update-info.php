<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
include("../Controller.php");
include("../PageController.php");
require_once("../AccountDetails.php");
require_once('../../config/site.php');
require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");


$Model = new ModelAll;
$Accountdetails = new AccountDetails;
if(isset($_POST))
{


    //Kiểm tra xem user đã đăng nhập chưa
    if(@$_SESSION['SSCF_login_id'] > 0)
    {
        $info_array = json_decode($_POST['data'], true);
        foreach($info_array as $key=> $value) { 
            if($value ==""){
                echo  "Không đươc bỏ trống miền giá trị bắt buộc";
                exit();
            } 
        }



        $columnName = $tableName = $whereValue = null;
        $tableName = "nguoidung";
        $columnName['1'] = "id_taikhoan";
        $whereValue["id"] =$_SESSION['SSCF_login_id'];

        $idaccount = $Model->selectData($columnName, $tableName, $whereValue);

        //Tiến hành update
        $columnName = $tableName = $whereValue = null;
        $tableName = "taikhoan";
        $columnName['email'] = $info_array['email'];
        $whereValue["id"] =$idaccount[0]['id_taikhoan'];

        $updateAccount = $Model->updateData($tableName, $columnName, $whereValue);

        if($updateAccount ==-1){
            echo -1;
            exit();
        }

        $columnName = $tableName = $whereValue = null;
        $tableName= "nguoidung";
        $columnName['sdt'] = $info_array['sdt'];
        $columnName['tenhienthi'] = $info_array['tenhienthi'];
        $columnName['tinh_thanhpho'] = $info_array['tinh_thanhpho'];
        $columnName['quan_huyen'] = $info_array['quan_huyen'];
        $columnName['phuong_xa'] = $info_array['phuong_xa'];
        $columnName['diachi'] = $info_array['diachi'];
        $columnName['hoten'] = $info_array['hoten'];

        $whereValue["id"] =$_SESSION['SSCF_login_id'];

        $updateUser = $Model->updateData($tableName, $columnName, $whereValue);

        if($updateUser ==-1){
            echo -1;
            exit();
        }

        $Model->connection->commit();
        echo 1;
        

        
    }
    else
    {
        echo -1;
    }
}
?>