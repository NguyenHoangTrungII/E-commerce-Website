<?php

    include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
    include("../Controller.php");
    include("../PageController.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");;

    $Model = new ModelAll;

    //LKiểm  tra coupon có trong hệ thống hay không
    $columnName = $tableName = $whereValue =null;
    // $columnName = "*";
    $columnName="*";
    $tableName= "khuyenmai";
    $whereValue['makm'] = $_POST['makm'];
    $hasCoupoun = $Model->selectData($columnName, $tableName, $whereValue);

    // var_dump($hasCoupoun);

    if($hasCoupoun <= 0){
        echo "Mã khuyến mãi không tồn tại";
        exit();
    }

    // var_dump(date("Y-m0d"))
    if(date("Y-m-d") < $hasCoupoun[0]['tungay'] ||  !date("Y-m-d") > $hasCoupoun[0]['denngay']){
        echo "Hạn dùng mã giảm giá này chưa đến hoặc đã hết";
        exit();
    }


    //Kiểm tra định mức đơn hàng
    if($hasCoupoun[0]['toithieu'] <= $_POST['tongtien']){
        echo "Đơn của bạn không đủ điều kiện để dùng mã giảm giá";
        exit();
    }


    if( $hasCoupoun[0]['loaikm'] == 0){
        echo 1;
    }
    else{
        echo  2;
    }



    ?>