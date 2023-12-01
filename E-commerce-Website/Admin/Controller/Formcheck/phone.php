<?php

    include('../../Model/ModelAll.php');
    include('../../Controller/EmployeeController.php');
    include("../../config/databse.php");
	include("../../config/site.php");

    $employeeCtroller = new EmployeeController;

    if(!empty($_POST['phone_input']))
{
	$notifyCheck = $employeeCtroller->checkPhoneNumberValiation($_POST['phone_input']);
	echo $notifyCheck;   
}


?>