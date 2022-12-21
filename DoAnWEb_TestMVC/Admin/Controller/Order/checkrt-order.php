<?php

    require_once('../../Model/ModelAll.php');
    require_once("../../config/databse.php");
	require_once("../../config/site.php");


    // $controller = new Controller;
    $Model = new ModelAll;

    if(isset($_POST['id_order']) && isset($_POST['statusChoosen'])){
        $tableName = $columnName = null;
        $tableName = 'donhang';
        $columnName['trangthai'] =$_POST['statusChoosen'];
        $whereValue['id'] = $_POST['id_order'];

        $statusOrderUpdate = $Model->updateData($tableName,  $columnName, $whereValue);
        // var_dump($statusProductUpdate);
        if($statusOrderUpdate==1){
            $Model->connection->commit();
            echo 1;
        }
        else{
            echo -1;
        }
    }



?>