<?php
include('../Model/ModelAll.php');
include('../Controller/EmployeeController.php');

$Model= new ModelAll;
$employeeCtroller = new EmployeeController;

if(!empty($_POST['del_id']))
{
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

if(!empty($_POST['email_input']))
{
	$notifyCheck = $employeeCtroller->checkEmailValiation($_POST['email_input']);
	echo $notifyCheck;
    
}

if(!empty($_POST['phone_input']))
{
	$notifyCheck = $employeeCtroller->checkPhoneNumberValiation($_POST['phone_input']);
	echo $notifyCheck;   
}

?>

