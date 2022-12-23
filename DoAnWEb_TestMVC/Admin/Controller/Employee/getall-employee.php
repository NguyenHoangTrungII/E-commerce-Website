<?php
    // session_start();
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

            $query_code = "SELECT COUNT(*) FROM `taikhoan` JOIN `nguoidung` ON taikhoan.id = nguoidung.id_taikhoan WHERE vaitro =:VALUE1 AND taikhoan.id!=:VALUE2";
            $query = $controller->connection->prepare($query_code);
            $values = array(
				':VALUE1' => 2,
                ':VALUE2' =>  $_SESSION['SMC_login_account_id'],
				);
			$query->execute($values);
			$rowSelected = $query->fetchColumn(); 
			return $rowSelected ;

            // var_dump($query_code);
		}
		catch(Exception $e) 
		{
			return 0;
		}
            return 0;
        }
        
        
        
        function getAll($limit, $start)
        {
            $controller = new Controller;


        try
        {

            $query_code = "SELECT * FROM `taikhoan` JOIN `nguoidung` ON taikhoan.id = nguoidung.id_taikhoan WHERE vaitro =:VALUE1 AND taikhoan.id !=:VALUE2 LIMIT ".$start ." ,". $limit;
            $query = $controller->connection->prepare($query_code);

            // var_dump($query_code);
            $values = array(
				':VALUE1' => 2,
                ':VALUE2' =>  $_SESSION['SMC_login_account_id'],
				);
			$query->execute($values);
			$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
            $totalRowSelected = $query->rowCount();
            
            if($totalRowSelected > 0)
                return $dataList;
            else
                return 0;
            }
		catch(Exception $e) 
		{
			return 0;
		}
            return 0;
    }
?>