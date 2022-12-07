<?php
    
    require("../../config/databse.php");
    require("../../config/site.php");
    require("../../Model/ModelAll.php");


    $Model = new ModelAll;

    $columnName['1'] ="id";
    $columnName['2'] ="tenncc";
    $tableName="nhacungcap";

    $brandSelected = $Model->selectData($columnName, $tableName);

    echo json_encode($brandSelected);
?>