<?php
	
	class PageController extends Controller
	{

		public function searchAuto($table, $column,$keyword)
		{
			$sql_code1 = "SELECT DISTINCT {$column} FROM {$table} WHERE {$column} LIKE '%{$keyword}%' OR {$column} LIKE '%{$keyword}%' ORDER BY {$column} ASC";
			$query = $this->connection->prepare($sql_code1);
			$query->execute();
			$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
			$totalRowSelected = $query->rowCount();
			
			if($totalRowSelected > 0)
				return $dataList;
			else
				return 0;
		}
	}
?>