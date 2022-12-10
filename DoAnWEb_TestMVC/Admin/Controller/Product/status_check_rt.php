<?php

    include('../../Model/ModelAll.php');
    include('../../Controller/EmployeeController.php');
    include("../../config/databse.php");
	include("../../config/site.php");


    $controller = new Controller;
    $Model = new ModelAll;

    if(isset($_POST['id_product']) && isset($_POST['status'])){
        $tableName = $columnName = null;
        $tableName = 'sanpham';
        $columnName['tinhtrang'] =$_POST['status'];
        $whereValue['id'] = $_POST['id_product'];

        $statusProductUpdate = $Model->updateData($tableName,  $columnName, $whereValue);
        // var_dump($statusProductUpdate);
        if($statusProductUpdate==1){
            $Model->connection->commit();
            echo 1;
        }
        else{
            echo -1;
        }
    }



?>