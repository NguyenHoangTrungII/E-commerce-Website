<?php
    
    include('../Controller/Controller.php');

    $Model = new ModelAll;
    $controller = new Controller;

    function count_all_member(){
        $controller = new Controller;

        try
        {

            $query_code = "SELECT COUNT(*) FROM `khohang`";
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
            $columnName['1']="khohang.id_sp";
            $columnName['2']="sanpham.tensp";
            $columnName['3']="khohang.soluongton";
            $columnName['4']="khohang.soluongdaban";
            $columnName['5']="khohang.ngaynhap";
            $columnName['6']="khohang.ngaysua";
            
            $tableName['MAIN'] = "khohang";
            $tableName['1'] ='sanpham';
            $limitPaging['POINT'] = $start;
            $limitPaging['LIMIT'] = $limit;
            $joinCondition = array ("1"=>array ('khohang.id_sp', 'sanpham.id'));
            $warehouseList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, null, null, null, $limitPaging);
            return $warehouseList;
        }
?>