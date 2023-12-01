<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");

class Controller
{
	public $connection;
	
	### CONNECTION MANAGER
	public function __construct()
	{
		$this->connection = new PDO('mysql:host='.$GLOBALS['DBHOST'].';dbname='.$GLOBALS['DBNAME'].';charset=utf8', $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}

    public function getTitle($string){
        if($string == "index"){
            return "Trang chủ";
        }
        else if($string == "productlist")
        {
            return "Danh sách sản phẩm";
        }
        else if($string == "productdetail")
        {
            return "Chi tiết sản phẩm";
        }
        else if($string == "contact")
        {
            return "Liên hệ";
        }
        else if($string == "cart")
        {
            return "Giỏ hàng";
        }
        else if($string == "accountdetails")
        {
            return "Tài khoản";
        }
        else if($string == "about-us")
        {
            return "Về chúng tôi";
        }
        else if($string == "signup")
        {
            return "Đăng ký";
        }
        else if($string == "login")
        {
            return "Đăng nhập";
        }

    }

    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }

    public function getListMainProduct($categoryShow)
    {
        $Model = new ModelAll;
        $categoryArray = [];
        $ProductsArray = [];
        for($i =0 ; $i < count($categoryShow);  $i++){
            $categoryName = $categoryShow[$i]['id'];
            // var_dump($categoryName);
            $sql_code="SELECT DISTINCT id_thuonghieu, nhacungcap.tenncc, danhmucsp.ten FROM `sanpham` inner join `nhacungcap` on sanpham.id_thuonghieu  = nhacungcap.id INNER JOIN `danhmucsp` on sanpham.id_danhmuc = danhmucsp.id WHERE danhmucsp.id =:VALUE1";
            $query = $this->connection->prepare($sql_code);
            
            $values = array(
                ':VALUE1' => $categoryName,
                );
                
            $query->execute($values);
            
            $menuMainProductList = $query->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($menuMainProductList);
            $categoryArray[$i]= json_encode($menuMainProductList);

            //Lấy tất cả sản phẩm trong danh mục đó vào
            $columnName = $tableName = null;
            // $columnName = "*";
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
            $whereValue['danhmucsp.id'] = $categoryShow[$i]['id'];

            // var_dump($whereValue);

            $formatBy['ASC'] = "sanpham.id";
            $joinCondition = array ("1"=>array ('sanpham.id_danhmuc', 'danhmucsp.id'), "2"=>array('sanpham.id_thuonghieu', 'nhacungcap.id'));
            $productList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue, "=", $formatBy);
            // var_dump($productList);
            $ProductsArray[$i]= json_encode($productList);

        }

        $mainProductList = [];
        $mainProductList['category'] = $categoryArray;
        $mainProductList['product'] = $ProductsArray;
        return  $mainProductList ;
    }


    public function checkDiscountMoney($discountMoney){
        if($discountMoney == 0)
            return 1;
        else{
            return (1 - $discountMoney/100);
        }
    }

    
}