<?php
    
    require_once('../Controller/Controller.php');

    $Model = new ModelAll;
    $controller = new Controller;


    function count_all_member(){
        $controller = new Controller;

        try
        {

            $query_code = "SELECT COUNT(*) FROM `danhmucsp`";
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
            $tableName = 'danhmucsp';
            $columnName = "*";
            $limitPaging['POINT'] = $start; 
            $limitPaging['LIMIT'] = $limit; 
            $formatBy['ASC'] = "ID";
            $categoryList = $Model->selectData($columnName, $tableName, null, null, null, null,  $formatBy, $limitPaging);
            return $categoryList;
        }
?>