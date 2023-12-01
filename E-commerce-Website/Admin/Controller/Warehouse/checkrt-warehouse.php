<?php

    include('../../Model/ModelAll.php');
    include("../../config/databse.php");
	include("../../config/site.php");


    // $controller = new Controller;
    $Model = new ModelAll;

    if(isset($_POST['id']) && isset($_POST['stock'])){
        $tableName = $columnName = null;
        $tableName = 'khohang';
        $columnName['soluongton'] =$_POST['stock'];
        $whereValue['id_sp'] = $_POST['id'];

        $stockWarehouseUpdate = $Model->updateData($tableName,  $columnName, $whereValue);
        // var_dump($stockWarehouseUpdate);
        if($stockWarehouseUpdate==1){
            $Model->connection->commit();
            echo 1;
        }
        else{
            echo -1;
        }
    }



?>