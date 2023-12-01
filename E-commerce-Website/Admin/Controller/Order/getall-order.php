<?php
    
    include('../Controller/Controller.php');

    $Model = new ModelAll;
    $controller = new Controller;

    function count_all_member(){
        $controller = new Controller;

        try
        {

            $query_code = "SELECT COUNT(*) FROM `donhang`";
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
    
        
        
        
        function getAll($limit, $start)
        {
            $Model = new ModelAll;


            $columnName = $tableName = null;
            // $columnName = "*";
            $columnName['1']="donhang.id";
            $columnName['2']="nguoidung.hoten";
            $columnName['3']="nguoidung.diachi";
            $columnName['4']="donhang.tongtienhang";
            $columnName['5']="donhang.mavanchuyen";
            $columnName['6']="donhang.trangthai";
            
            $tableName['MAIN'] = "donhang";
            $tableName['1'] ='nguoidung';
            $limitPaging['POINT'] = $start;
            $limitPaging['LIMIT'] = $limit;
            $joinCondition = array ("1"=>array ('donhang.id_nguoidung', 'nguoidung.id'));
            $orderList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, null, null, null, $limitPaging);
            return $orderList;
        }
?>