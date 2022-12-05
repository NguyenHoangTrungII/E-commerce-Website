<?php

    include('../../Model/ModelAll.php');
    include('../../Controller/EmployeeController.php');
    include("../../config/databse.php");
	include("../../config/site.php");


    $employeeCtroller = new EmployeeController;

    
    if(!empty($_POST['email_input']))
    {
        $notifyCheck = $employeeCtroller->checkEmailValiation($_POST['email_input']);
        echo $notifyCheck;
        
    }



?>