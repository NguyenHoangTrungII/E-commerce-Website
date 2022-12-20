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
if(isset($_POST['id_product']) && isset($_POST['id_order']))
{
    //Kiểm tra xem user đã đăng nhập chưa
    if(@$_SESSION['SSCF_login_id'] > 0)
    {
        $Model->connection->beginTransaction();
        $columnName = $tableName = $whereValue = null;
        $updateCartResult =null;
        $tableName = "ctdh";
        $columnName['trangthai'] = '5';
        $whereValue["id_donhang"] = $_POST['id_order'];
        $whereValue["id_sp"] =$_POST['id_product'];

        $updateCartResult = $Model->updateData($tableName, $columnName, $whereValue);
        if($updateCartResult ==-1){
            $Model->connection->rollBack();
            echo -1;
            exit();
        }

        //Kiểm tra xem tất cả đơn hàng của đơn mới update đã có trạng thái =5 hết ? rồi rồi chuyển trạng thái đơn hàng về 5 ( đã huy)
        $columnName = $tableName = $whereValue = null;
        $columnName="*";
        $tableName = "ctdh";
        $whereValue['trangthai'] = '1';
        $whereValue["id_donhang"] = $_POST['id_order'];

        $hasProduct = $Model->selectData($columnName, $tableName, $whereValue);

        // var_dump(isset($hasProduct));

        if(isset($hasProduct) && $hasProduct!= -1){
            //Tiến hành update
            $columnName = $tableName = $whereValue = null;
            $tableName = "donhang";
            $columnName['trangthai'] = '5';
            $whereValue["id"] = $_POST['id_order'];

            $updateOrder = $Model->updateData($tableName, $columnName, $whereValue);
            // var_dump($updateOrder);
            // $Model->connection->commit();
        }


        $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
        $columnName['1']= "sanpham.anh anhsp";
        $columnName['2']= "sanpham.tensp tensp";
        $columnName['3']= "sanpham.giagoc giagoc";
        $columnName['4']= "sanpham.phantram phantram";
        $columnName['5']= "danhmucsp.ten tendanhmuc";
        $columnName['6']= "donhang.trangthai tinhtrang";
        $columnName['7']= "sanpham.id idsp";
        $columnName['8']= "ctdh.soluong ";
        $columnName['9']= "ctdh.giasp ";
        $columnName['10']= "donhang.mavanchuyen ";
        $columnName['11'] = "donhang.ngaydat";
        $columnName['12'] = "donhang.id madonhang";
        $columnName['13']= "diachinhanhang.diachi diachi ";
        $tableName['MAIN'] = "donhang";
        $tableName['1'] ='ctdh';
        $tableName['2'] ='sanpham';
        $tableName['3'] ='danhmucsp';
        $tableName['4'] ='diachinhanhang';
        // $whereValue['donhang.id_nguoidung'] = $_SESSION['SSCF_login_id'];
        $whereValue["ctdh.id_sp"] =$_POST['id_product'];
        $whereValue["ctdh.id_donhang"] = $_POST['id_order'];

        $joinCondition = array ("1"=>array ('donhang.id', 'ctdh.id_donhang'), "2"=>array('ctdh.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'), "4"=>array('donhang.id', 'diachinhanhang.id_donhang'));

        $order_Cancel = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);

        // var_dump( $order_Cancel);

        $Accountdetailshtml = $Accountdetails->historyCloneOrder($order_Cancel);

        $Model->connection->commit();
        echo json_encode(array('tinhtrang'=>$updateCartResult, "html"=>$Accountdetailshtml));
    }
    else
    {
        echo json_encode(array('tinhtrang'=>-1));
    }
}
?>