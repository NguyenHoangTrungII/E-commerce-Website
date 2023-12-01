<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
include("../Controller.php");
include("../PageController.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");


$Model = new ModelAll;
if(isset($_POST['id_product']))
{
    //Kiểm tra xem user đã đăng nhập chưa
    if(@$_SESSION['SSCF_login_id'] > 0)
    {
        //Kiểm tra xem sản phẩm đã có trong giỏ hàng
        $columnName = $tableName = null;
        $columnName = "*";
        $tableName['MAIN'] = "giohang";
        $tableName['1'] ='ct_giohang';
        $whereValue['id_user']= $_SESSION['SSCF_login_id'];
        $whereValue['id_sp'] = $_POST['id_product'];
        $joinCondition = array ("1"=>array ('giohang.id', 'ct_giohang.id_giohang'));
        $cartItemList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);
        // var_dump( $cartItemList);
        
        //Nếu có -> update số lượng
        if(!empty($cartItemList))
        {
            $columnName = $tableName = $whereValue = null;
            $updateCartResult =null;
            $tableName = "ct_giohang";
            $columnName["soluong"] = $cartItemList[0]['soluong'] + 1;
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
            
            echo $updateCartResult;
            
        }
        //Nếu không -> thêm mới
        else
        {
            //Kiểm tra xem khách hàng đã có giỏ hàng trong hệ thống chưa
            $columnName1 = $tableName1 = $whereValue1 = null;
            $columnName1 = "*";
            $tableName1 = "giohang";
            $whereValue1['id_user']= $_SESSION['SSCF_login_id'];
            $hasCartDatabase = $Model->selectData($columnName1, $tableName1, $whereValue1);


            
            if(empty( $hasCartDatabase)){
                $columnName = $tableName = null;
                $tableName ='giohang';
                $columnName['id_user']= $_SESSION['SSCF_login_id'];
                $columnName['ngaytao'] = date("Y/m/d");
                $createCart = $Model->insertData($tableName, $columnName);
                $_SESSION['new_cart'] = $createCart["LAST_INSERT_ID"] ;
            }


            //Sau đó thêm mới sản phẩm
            $columnValue2 = $tableName2 = null;
            $tableName2 = "ct_giohang";
            $columnValue2["id_sp"] = $_POST['id_product'];
            $columnValue2["id_giohang"] = empty($_SESSION['new_cart'])? $hasCartDatabase[0]['id'] : $_SESSION['new_cart'] ;
            $columnValue2["soluong"] = 1; ;
            $addToCartResult = $Model->insertData($tableName2, $columnValue2);
            $Model->connection->commit();
            $_SESSION['new_cart'] ="";
            if(($addToCartResult) !=-1){
                echo $addToCartResult["NUMBER_OF_ROW_INSERTED"];
            }
            else{
                echo -1;
            }
            
        }
    }
    else
    {
        echo -1;
    }
}
?>