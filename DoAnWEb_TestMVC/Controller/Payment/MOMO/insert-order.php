<?php 

session_start();
// require_once("config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");


// var_dump($__POST);

$Model = new ModelAll;

$columnName = $tableName = $whereValue = null;
$tableName = "donhang";
$columnName['id'] = $_POST['orderId'];;
$columnName['id_nguoidung'] = $_SESSION['SSCF_login_id'];
$columnName['giatri'] =$_POST['total_hidden'];
$columnName['tongtienhang'] =(int) $_POST['total_producPrice_hidden'] -(int) $_POST['discount_hidden'];
$columnName['tienship'] =$_POST['shipfee_hidden'];
$columnName['ngaydat'] = date("Y/m/d");
$columnName['pt_thanhtoan'] = 3;
$columnName['ghichu'] = $_POST['ghichu'];
$columnName['sdt'] = $_POST['sdt'];

$insertOrder = $Model->insertData($tableName,$columnName );

// var_dump()


$columnName = $tableName = $whereValue = null;
$tableName = "diachinhanhang";
$columnName['id_donhang'] = $_POST['orderId'];;
$columnName['id_nguoidung'] = $_SESSION['SSCF_login_id'];
$columnName['diachi'] =$_POST['tinh_thanhpho']. ", ".$_POST['quan_huyen']. ", ".$_POST['phuong_xa']. ", ".$_POST['diachi'];

$insertOrderAddress = $Model->insertData($tableName,$columnName );

if($insertOrderAddress == -1){
    var_dump("1");
    exit();
}

//Lấy sản phẩm của đơn hàng của khách hàng trong giỏ hàng
$columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
$columnName['1']= "sanpham.anh anhsp";
$columnName['2']= "sanpham.tensp tensp";
$columnName['3']= "sanpham.giagoc giagoc";
$columnName['4']= "sanpham.phantram phantram";
$columnName['5']= "danhmucsp.ten tendanhmuc";
$columnName['6']= "ct_giohang.soluong soluongsp";
$columnName['7']= "sanpham.id idsp";    
$tableName['MAIN'] = "giohang";
$tableName['1'] ='ct_giohang';
$tableName['2'] ='sanpham';
$tableName['3'] ='danhmucsp';
$whereValue['giohang.id_user'] = $_SESSION['SSCF_login_id'];

$joinCondition = array ("1"=>array ('giohang.id', 'ct_giohang.id_giohang'), "2"=>array('ct_giohang.id_sp', 'sanpham.id'), "3"=>array('danhmucsp.id', 'sanpham.id_danhmuc'));

$cartIntoOrder = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);

foreach($cartIntoOrder as $eachProduct){
    $columnName = $tableName = $whereValue = null;
    $tableName = "ctdh";
    $columnName['id_donhang'] = $_POST['orderId'];;
    $columnName['id_sp'] =  $eachProduct['idsp'];
    $columnName['soluong'] = $eachProduct['soluongsp'];
    $columnName['giasp'] = $eachProduct['giagoc']*$eachProduct['phantram'];
    $insertOrderDetail = $Model->insertData($tableName,$columnName );

    if($insertOrderDetail ==-1){
        var_dump("3");
        exit();
    }

}

$columnName = $tableName = $whereValue = null;
$tableName = "giohang";
$whereValue['id_user']= $_SESSION['SSCF_login_id'];
$deleteCart = $Model->deleteData($tableName,$columnName );

if($deleteCart ==-1){
    var_dump("4");

    exit();
}

$Model->connection->commit();
?>