<?php
	class AdminController extends Controller
{
	public function loadLogin($email, $password)
	{
		$sql_code = "SELECT * FROM `taikhoan` JOIN `nguoidung` ON taikhoan.id = nguoidung.id_taikhoan WHERE `email`=:VALUE1 AND `matkhau`=:VALUE2";
		$query = $this->connection->prepare($sql_code);
		
		$values = array(
			':VALUE1' => $email,
			':VALUE2' => $password
			);
		$query->execute($values);
		
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();
		
		if($totalRowSelected > 0)
			return $dataList;
		else
			return 0;
	}	
	
}
?>