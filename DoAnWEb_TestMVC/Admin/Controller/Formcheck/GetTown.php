<?php
    
    require("../../config/databse.php");
    require("../../config/site.php");
    require("../../Model/ModelAll.php");


    $Model = new ModelAll;

    if (isset($_GET['DistrictId'])) 
    $District_id = $_GET['DistrictId'];
    // settype($Provice_id, "int");

    $columnName ="*";
    $tableName="phuong_xa";
    $whereValue["district_id"]= $District_id;
    // var_dump($Provice_id);

    $proviceSelected = $Model->selectData($columnName, $tableName, $whereValue);

    // var_dump($proviceSelected);

    echo json_encode($proviceSelected);
?>