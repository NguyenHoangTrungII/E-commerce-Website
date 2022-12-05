<?php
    
    require("../../config/databse.php");
    require("../../config/site.php");
    require("../../Model/ModelAll.php");


    $Model = new ModelAll;

   ##=======LẤY DỮ LIỆU=======##
    $columnName = $tableName = null;
    $columnName = "*";
    $tableName['MAIN'] = "taikhoan";
    $tableName['1'] ='nguoidung';
    $joinCondition = array ("1"=>array ('taikhoan.id', 'nguoidung.id_taikhoan'));
    $employeeList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition);
    ##=======LẤY DỮ LIỆU=======##

    echo json_encode($employeeList);
?>