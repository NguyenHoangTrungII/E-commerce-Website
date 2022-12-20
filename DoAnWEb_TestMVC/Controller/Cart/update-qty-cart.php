<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
include("../Controller.php");
include("../PageController.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");


$Model = new ModelAll;
if(isset($_POST['id_product']) && isset($_POST['qty_change']))
{
    //Kiểm tra xem user đã đăng nhập chưa
    if(@$_SESSION['SSCF_login_id'] > 0)
    {
        //Lấy giỏ hàng của khách hàng
        $columnName = $tableName = null;
        $columnName = "*";
        $tableName['MAIN'] = "giohang";
        $tableName['1'] ='ct_giohang';
        $whereValue['id_user']= $_SESSION['SSCF_login_id'];
        $joinCondition = array ("1"=>array ('giohang.id', 'ct_giohang.id_giohang'));
        $cartItemList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
        
        $columnName = $tableName = $whereValue = null;
        $updateCartResult =null;
        $tableName = "ct_giohang";
        $columnName["soluong"] = $_POST['qty_change'];
        $whereValue["id_giohang"] = $cartItemList[0]['id_giohang'];
        $whereValue["id_sp"] =$_POST['id_product'];

        $updateCartResult = $Model->updateData($tableName, $columnName, $whereValue);
        $Model->connection->commit();

        //update lại ngày cập nhật giỏ hàng
        $columnName = $tableName = $whereValue = null;
        $tableName = "giohang";
        $columnName['ngaysua'] = date("Y/m/d");
        $whereValue['id'] = $cartItemList[0]['id_giohang'];
        $updateDateResult = $Model->updateData($tableName, $columnName, $whereValue);
        
        $Model->connection->commit();
        echo $updateCartResult;
    }
    else
    {
        echo -1;
    }
}
?>