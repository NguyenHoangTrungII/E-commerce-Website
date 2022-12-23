
<?php 
	class Controller
	{
		public $connection;
		public function __construct()
		{

			$this->connection = new PDO('mysql:host='.$GLOBALS['DBHOST'].';dbname='.$GLOBALS['DBNAME'].';charset=utf8', $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}

		public function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		public function checkValiation($data, $tableName, $value){
			$sql_code = "SELECT * FROM $tableName  WHERE $value=:VALUE1";
			$query = $this->connection->prepare($sql_code);
			
			$values = array(
				':VALUE1' => $data,
				);
			$query->execute($values);
			
			$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
			$totalRowSelected = $query->rowCount();
			
			if($totalRowSelected > 0)
				return 1;
			else
				return 0;
		}

		public function checkImageValiation($fileType)
		{
			if(($fileType == "jpeg")
			|| ($fileType == "jpg")
			|| ($fileType == "pjpeg")
			|| ($fileType == "png"))
			{
				return 1;
			}
			else if (!empty($fileType)){
				return 0;
			}
			else {
				return -1;
			}
		}
		
		public function makePass() 
		{
			$alphabet = "56789abcdefghijklmnopqrstuwxyz@#%#@ABCDEFGHIJKLMNOPQRSTUWXYZ01234";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) 
			{
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}

		public function checkNewImgaie($new_img, $old_img, $string){
			if(isset($new_img)){
				return $string. date("YmdHis") . "_".$new_img;
			} else{
				return $old_img;
			}
		}

		public function unlinkProductImg($source, $extra_source, $file_arr, $number){
			for($i =0 ; $i < $number; $i++){
				unlink($source.$extra_source. $file_arr[$number]);
			}
		}



		public function spaceCheck($str){
			if (str_contains($str, ' ')) {
				return true;
			}
			else
				return false;
		}

		public function checkImage($fileType, $fileSize, $fileError)
		{
			if ((($fileType == "image/gif")
			|| ($fileType == "image/jpeg")
			|| ($fileType == "image/jpg")
			|| ($fileType == "image/pjpeg")
			|| ($fileType == "image/x-png")
			|| ($fileType == "image/png"))
			&& ($fileSize < 52428800)
			&& ($fileError <= 0))
			{
				return 1;
			}
			else 
			return 0;
		}

		public function checkprivilege($privilege, $linkPrivilege =false, $role){
			$uri = $linkPrivilege != false ? $linkPrivilege : $_SERVER['REQUEST_URI'];
			if($role == 1){
				return true;
				exit();
			}

			if(empty($privilege)){
				return false;
				exit();
			}
			
			$privilege = implode("|", $privilege);
				preg_match('/'.$privilege.'/', $uri, $match);
				return !empty($match);
			
		}

	}


?>