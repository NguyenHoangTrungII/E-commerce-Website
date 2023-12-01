<?php
    
    require("../../config/databse.php");
    require("../../config/site.php");
    require("../../Model/ModelAll.php");


    $Model = new ModelAll;

    $columnName ="*";
    $tableName="tinh_thanhpho";

    $proviceSelected = $Model->selectData($columnName, $tableName);

    // var_dump($proviceSelected);

    echo json_encode($proviceSelected);
?>