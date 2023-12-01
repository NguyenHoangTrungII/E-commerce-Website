<?php
    
    require("../../config/databse.php");
    require("../../config/site.php");
    require("../../Model/ModelAll.php");


    $Model = new ModelAll;

    if (isset($_GET['ProviceId'])) 
    $Provice_id = $_GET['ProviceId'];
    // settype($Provice_id, "int");

    $columnName ="*";
    $tableName="quan_huyen";
    $whereValue["province_id"]= $Provice_id;
    // var_dump($Provice_id);

    $proviceSelected = $Model->selectData($columnName, $tableName, $whereValue);

    // var_dump($proviceSelected);

    echo json_encode($proviceSelected);
?>