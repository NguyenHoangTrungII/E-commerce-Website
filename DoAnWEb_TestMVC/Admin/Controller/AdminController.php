<?php
	class AdminController extends Controller
{
	public function loadLogin($email, $password)
	{
		$sql_code = "SELECT * FROM `taikhoan` JOIN `nguoidung` ON taikhoan.id = nguoidung.id_taikhoan WHERE `email`=:VALUE1 AND `matkhau`=:VALUE2 AND (`vaitro` =:VALUE3 OR `vaitro` =:VALUE4)";
		$query = $this->connection->prepare($sql_code);
		
		$values = array(
			':VALUE1' => $email,
			':VALUE2' => $password,
			':VALUE3' => 1,
			':VALUE4' => 2
			);
		$query->execute($values);
		
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();
		
		if($totalRowSelected > 0)
			return $dataList;
		else
			return 0;
	}
	
	// public function checkNewImgaie($new_img, $old_img, $string){
	// 	if(isset($new_img)){
	// 		return "User_Employee_". date("YmdHis") . "_".$new_img;
	// 	} else{
	// 		return $old_img;
	// 	}
	// }
	
}
?>