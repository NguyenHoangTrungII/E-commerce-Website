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

        if($info_array['matkhaumoi'] != $info_array['matkhaumoi2'] ){
            echo  "Mật khẩu mới không giống nhau";
            exit();

        }





        $columnName = $tableName = $whereValue = null;
        $tableName = "nguoidung";
        $columnName['1'] = "id_taikhoan";
        $whereValue["id"] =$_SESSION['SSCF_login_id'];

        $idaccount = $Model->selectData($columnName, $tableName, $whereValue);
        // var_dump($idaccount);

        //Tiến hành update
        $columnName = $tableName = $whereValue = null;
        $tableName = "taikhoan";
        $columnName="*";
        $whereValue["id"] =$idaccount[0]['id_taikhoan'];
        $whereValue["matkhau"] = sha1($info_array['matkhaucu']);


        $corretOldPass = $Model->selectData($columnName, $tableName, $whereValue);

        var_dump($whereValue);

        if($corretOldPass ==-1){
            echo -1;
            exit();
        }
        else if( count($corretOldPass) == 0) {
            echo "Mật khẩu cũ không chính xác";
            exit();
        }

        $columnName = $tableName = $whereValue = null;

        $tableName= "taikhoan";
        $columnName["matkhau"] = sha1($info_array['matkhaucu']);
        $whereValue["id"] =$idaccount[0]['id_taikhoan'];

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