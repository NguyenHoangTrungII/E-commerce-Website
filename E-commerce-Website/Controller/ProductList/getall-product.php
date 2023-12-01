<?php
    
   
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/Controller.php");

    // include('../Controller/Controller.php');

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

    function count_all_member($idCategory){
        $controller = new Controller;

        try
        {

            $query_code = "SELECT COUNT(*) FROM `sanpham` JOIN `danhmucsp` ON sanpham.id_danhmuc = danhmucsp.id WHERE sanpham.id_danhmuc =:VALUE1";
            $query = $controller->connection->prepare($query_code);
            $values = array(
                ':VALUE1' => $idCategory,
                );
			$query->execute($values);

			$rowSelected = $query->fetchColumn(); 
			return $rowSelected ;
		}
		catch(Exception $e) 
		{
			return 0;
		}
            return 0;
        }
        
        
        
        function getAll($limit, $start, $idCategry)
        {
            $Model = new ModelAll;

            $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
            $columnName['1']="sanpham.id id_sp";
            $columnName['2']="danhmucsp.ten tendanhmuc";
            $columnName['3']="nhacungcap.tenncc tenncc";
            $columnName['4']="sanpham.tensp tensp";
            $columnName['5']="sanpham.anh";
            $columnName['6']="sanpham.giagoc";
            $columnName['7']="sanpham.phantram";
            $columnName['8']="sanpham.tinhtrang";
            $columnName['9']="sanpham.id_danhmuc";
            $tableName['MAIN'] = "sanpham";
            $tableName['1'] ='danhmucsp';
            $tableName['2'] ='nhacungcap';
            $whereValue['danhmucsp.id'] = $idCategry;
            $formatBy['ASC'] = "sanpham.id";
            $joinCondition = array ("1"=>array ('sanpham.id_danhmuc', 'danhmucsp.id'), "2"=>array('sanpham.id_thuonghieu', 'nhacungcap.id'));
            $limitPaging['POINT'] = $start;
            $limitPaging['LIMIT'] = $limit;
            $categoryList = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue, "=",  $formatBy, $limitPaging);
            return $categoryList;
        }
?>