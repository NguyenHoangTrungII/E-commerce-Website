<?php
include('../../Model/ModelAll.php');
require("../../config/databse.php");
require("../../config/site.php");

$Model= new ModelAll;

if(!empty($_POST['del_id']))
{
	// echo "5555";
	// $tableName = $columnName = $whereValue = null;
	// $columnName = "*";
	// $tableName = "taikhoan";
	// $whereValue["id"] = $POST['del_id'];
	// $getcustomerData = $eloquent->selectData($columnName, $tableName, @$whereValue);
	// atler($_POST['del_id']);
    $tableName = $whereValue = null;
	$tableName = "taikhoan";
	$whereValue["id"] = $_POST['del_id'];
	$deletecustomerData = $Model->deleteData($tableName, $whereValue);
    echo $deletecustomerData;
}