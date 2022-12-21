<?php
    
    require_once('../Controller/Controller.php');

    $Model = new ModelAll;
    $controller = new Controller;

    function count_all_member(){
        $controller = new Controller;

        try
        {

            $query_code = "SELECT COUNT(*) FROM `slider`";
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


            // $columnName = $tableName = null;
            $columnName = $tableName = null;
            $columnName = "*";
            $tableName = "slider";
            $limitPaging['POINT'] = $start;
            $limitPaging['LIMIT'] = $limit;
            $sliderList = $Model->selectData($columnName, $tableName, null, null, null, null, null, $limitPaging);
            return $sliderList;
        }
?>