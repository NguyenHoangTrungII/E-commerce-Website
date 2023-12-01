<?php
include('../../Model/ModelAll.php');
include('../../Controller/Controller.php');
require("../../config/databse.php");
require("../../config/site.php");

$Model= new ModelAll;
$controller = new Controller;

if(!empty($_POST['id_order']) && !empty($_POST['id_sp']))
{

    $query_code = 'SELECT COUNT(*) FROM `ctdh` WHERE id_donhang= '.$_POST["id_order"].'';
    $query = $controller->connection->prepare($query_code);
    $query->execute();
    $rowSelected = $query->fetchColumn(); 

    $tableName = $whereValue = null;
    $tableName = "ctdh";
    $whereValue["id_donhang"] = $_POST['id_order'];
    $whereValue["id_sp"] = $_POST['id_sp'];
    $deletecthdData = $Model->deleteData($tableName, $whereValue);
    
    // var_dump($deletecthdData);
    // var_dump($rowSelected);

    if($rowSelected ==1 && $deletecthdData==1)
    {

        $tableName = $whereValue = null;
        $tableName = "donhang";
        $whereValue["id"] = $_POST['id_order'];
        $deleteorderData = $Model->deleteData($tableName, $whereValue);
        $Model->connection->commit();
        echo $deleteorderData;  
        exit();
    }
    $Model->connection->commit();
    echo $deletecthdData;


}