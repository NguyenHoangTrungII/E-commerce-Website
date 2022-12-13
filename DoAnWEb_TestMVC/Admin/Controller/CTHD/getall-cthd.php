<?php
    
    include('../Controller/Controller.php');


    $Model = new ModelAll;
    $controller = new Controller;


    function count_all_member(){
        $controller = new Controller;

        try
        {

            $query_code = "SELECT COUNT(*) FROM `cthd` WHERE id=";
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
            $columnName['1']="sanpham.id";
            $columnName['2']="sanpham.tensp";
            $columnName['3']="sanpham.anh";
            $columnName['4']="cthd.giasp";
            $columnName['5']="cthd.soluong";
            
            $tableName['MAIN'] = "sanpham";
            $tableName['1'] ='cthd';
            $whereValue['ctdh.id_donhang']= $_GET['id'];
            $limitPaging['POINT'] = $start;
            $limitPaging['LIMIT'] = $limit;
            $joinCondition = array ("1"=>array ('sanpham.id', 'cthd.id_sp'));
            $cthdList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue, null, null, $limitPaging);
            return $cthdList;
        }
?>