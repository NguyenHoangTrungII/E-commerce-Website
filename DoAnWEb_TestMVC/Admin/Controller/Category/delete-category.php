<?php
require_once('../../Model/ModelAll.php');
require_once("../../config/databse.php");
require_once("../../config/site.php");

$Model= new ModelAll;

if(!empty($_POST['del_id']))
{
    $tableName = $whereValue = null;
	$tableName = "danhmucsp";
	$whereValue["id"] = $_POST['del_id']; 
	$deletecategoryData = $Model->deleteData($tableName, $whereValue);
    echo $deletescategoryData;
}
$Model->connection->commit();