<?php
include('../Model/ModelAll.php');

$Model= new ModelAll;

if(!empty($_POST['del_id']))
{
	echo "vào";
    $tableName = $whereValue = null;
	$tableName = "taikhoan";
	$whereValue["id"] = $_POST['del_id'];
	$deletecustomerData = $Model->deleteData($tableName, $whereValue);
}	
//  ?>