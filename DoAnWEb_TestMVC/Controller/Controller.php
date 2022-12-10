<?php 
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
}