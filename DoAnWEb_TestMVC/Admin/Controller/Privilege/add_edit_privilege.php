<?php
    
    require_once('../../Model/ModelAll.php');
    require_once('../../Controller/Controller.php');
    require_once('../../Controller/EmployeeController.php');
    require_once("../../config/databse.php");
	require_once("../../config/site.php");

    $employeeCtroller = new EmployeeController;
    $controller = new Controller;
    $Model = new ModelAll;

    //encode
    $id_nhomquyen = json_decode($_POST['id_nhomquyen'], true);
    $id_quyen = json_decode($_POST['id_quyen'], true);

    // var_dump(count($id_nhomquyen));
    $tableName = $columnName = $whereValue = null;
    $tableName = 'ct_quyen';
    $whereValue['id_taikhoan'] = $_POST['id_taikhoan'];

    $hasPrivilege = $Model->deleteData($tableName, $whereValue);
    if( $hasPrivilege !=-1){
        for($i=0; $i < count($id_nhomquyen); $i++){

                $tableName = $columnName = $whereValue = null;
                $tableName = 'ct_quyen';
                $columnName['id_nhomquyen'] = $id_nhomquyen[$i];
                $columnName['id_quyen'] = $id_quyen[$i];
                $columnName['id_taikhoan'] = $_POST['id_taikhoan'];
                $privilegeUpdate = $Model->insertData($tableName, $columnName);
                $Model->connection->commit();
    
                if($privilegeUpdate ==-1){
                    echo -1;
                    exit();
                }
            }
        }

    echo 1;
?>