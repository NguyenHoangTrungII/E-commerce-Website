<?php
    include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
    // include("../Controller.php");
    // include("../PageController.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
    include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Controller/Controller.php");

    $ctrl = new Controller;

    $info_array = json_decode($_POST['info_acc'], true);
    foreach($info_array as $key=> $value) { 
        if($value ==""){
            echo "Không được để trống miền giá trị nào";
            exit();
        } 
    }

    //Kiểm tra mail đúng dịnh dạng không ?
    if (!filter_var($info_array['email'], FILTER_VALIDATE_EMAIL)) {
        echo "email không hợp lệ";
        exit();
    }

    $tableName = 'taikhoan';
    $value ='email';
    if($ctrl->checkValiation($info_array['email'], $tableName, $value ) ==1){
       echo 'Email không đã tồn tại trong hệ thống';
       exit();
    }

    //    //Kiểm mật khẩu nhập có đúng
    if ($info_array['pass'] != $info_array['passremind']) {
        echo "Mật khẩu không giống nhau";
        exit();
    }



    echo 1;



?>