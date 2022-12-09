<?php
    
    include('../Controller/Controller.php');


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

            $query_code = "SELECT COUNT(*) FROM `sanpham`";
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
            $columnName['2']="danhmucsp.ten";
            $columnName['3']="nhacungcap.tenncc";
            $columnName['4']="sanpham.tensp";
            $columnName['5']="sanpham.anh";
            $columnName['6']="sanpham.giagoc";
            $columnName['7']="sanpham.phantram";
            $columnName['8']="sanpham.tinhtrang";
            $tableName['MAIN'] = "sanpham";
            $tableName['1'] ='danhmucsp';
            $tableName['2'] ='nhacungcap';
            $limitPaging['POINT'] = $start;
            $limitPaging['LIMIT'] = $limit;
            $joinCondition = array ("1"=>array ('sanpham.id_danhmuc', 'danhmucsp.id'), "2"=>array('sanpham.id_thuonghieu', 'nhacungcap.id'));
            $employeeList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, null, null, null, $limitPaging);
            return $employeeList;
        }
?>