<?php
    
    require("../../config/databse.php");
    require("../../config/site.php");
    require("../../Model/ModelAll.php");


    $Model = new ModelAll;

    $columnName['1'] ="id";
    $columnName['2'] ="ten";
    $tableName="danhmucsp";

    $categorySelected = $Model->selectData($columnName, $tableName);

    // var_dump($categorySelected);

    echo json_encode($categorySelected);
?>