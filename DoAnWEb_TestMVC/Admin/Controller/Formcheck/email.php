<?php

    require_once('../../Model/ModelAll.php');
    require_once('../../Controller/EmployeeController.php');
    require_once("../../config/databse.php");
	require_once("../../config/site.php");


    $employeeCtroller = new EmployeeController;

    
    if(!empty($_POST['email_input']))
    {
        $notifyCheck = $employeeCtroller->checkEmailValiation($_POST['email_input']);
        echo $notifyCheck;
        
    }



?>