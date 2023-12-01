<?php

    include('../../Model/ModelAll.php');
    include('../../Controller/EmployeeController.php');
    include("../../config/databse.php");
	include("../../config/site.php");


    $controller = new Controller;
    $Model = new ModelAll;

    if(isset($_POST['slug'])){

        if(trim($_POST['slug']=="")){
            echo "Không được để trống";
            exit();
        }

        if(($controller->spaceCheck(trim($_POST['slug']))))
        {
            // Thông báo chuỗi nhập vào có khoảng trắng
            echo "Chuỗi chứa ký tự không được cho phép";
            exit();
            
        }

        $new_slug =  trim($_POST['slug']);

        //reset
        $tableName = $columnName = null;
        $data = $new_slug;
        $value = 'slug';
        $tableName ='sanpham';
        // $tableName = "sanpham";
        // $columnName="*";
        // $whereValue['slug'] = $new_slug;
        // $whereCondition = "LIKE";

        // $slugCheck = $Model->selectData( $columnName, $tableName, $whereValue);
        // var_dump($slugCheck);
        if($controller->checkValiation($data, $tableName, $value)){
            //Nếu tồn tại
            echo "slug đã tồn tại trong hệ thống";
            exit();
        }
        else{
            echo 1;
        }

    }



?>