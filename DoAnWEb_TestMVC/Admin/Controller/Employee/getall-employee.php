<?php
    
   
    // include('../Model/ModelAll.php');
    include('../Controller/Controller.php');

    // include('../../Controller/EmployeeController.php');
    // include("../../config/databse.php");
	// include("../../config/site.php");


    $Model = new ModelAll;
    $controller = new Controller;

   ##=======LẤY DỮ LIỆU=======##
    $columnName = $tableName = null;
    $columnName = "*";
    $tableName['MAIN'] = "taikhoan";
    $tableName['1'] ='nguoidung';
    $joinCondition = array ("1"=>array ('taikhoan.id', 'nguoidung.id_taikhoan'));
    $employeeList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition);
    ##=======LẤY DỮ LIỆU=======##

    // echo json_encode($employeeList);

    function count_all_member(){
        $controller = new Controller;

        try
        {

            $query_code = "SELECT COUNT(*) FROM `taikhoan` JOIN `nguoidung` ON taikhoan.id = nguoidung.id_taikhoan";
            $query = $controller->connection->prepare($query_code);
			$query->execute();
			$rowSelected = $query->fetchColumn(); 
			return $rowSelected ;
		}
		catch(Exception $e) 
		{
			return 0;
		}
            return 0;
        }
        
        
        
        function getAllEmployee($limit, $start)
        {
            // $controller = new Controller;
            // $sql_code = 'SELECT * FROM `taikhoan` JOIN `nguoidung` ON taikhoan.id = nguoidung.id_taikhoan LIMIT '.(int)$start . ','.(int)$limit;
            // $query = $controller->connection->prepare($sql_code);
            
            // $query->execute();
            
            // $dataList = $query->fetchAll(PDO::FETCH_ASSOC);
            // $totalRowSelected = $query->rowCount();
            
            // if($totalRowSelected > 0)
            //     return $dataList;
            // else
            //     return 0;
            $Model = new ModelAll;


            $columnName = $tableName = null;
            $columnName = "*";
            $tableName['MAIN'] = "taikhoan";
            $tableName['1'] ='nguoidung';
            $limitPaging['POINT'] = $start;
            $limitPaging['LIMIT'] = $limit;
            $joinCondition = array ("1"=>array ('taikhoan.id', 'nguoidung.id_taikhoan'));
            $employeeList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, null, null, null, $limitPaging);
            return $employeeList;
        }
?>