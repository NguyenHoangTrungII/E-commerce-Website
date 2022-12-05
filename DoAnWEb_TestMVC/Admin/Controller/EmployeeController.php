<?php
    require_once('Controller.php');
    // include("../config/databse.php");
	// include("../config/site.php");
    // require_once('../../Model/ModelAll.php');

    // $Model = new ModelAll;


	class EmployeeController extends Controller
    {
        public function checkEmailValiation($email)
        {

            
            $email = Controller::test_input($email);
            if (!isset($email)) {
                
                $emailErr = 'Không được bỏ trống email';
            }
            else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = 'Email không hợp lệ';
                }
                else
                {
                    $tableName = 'taikhoan';
                    $value ='email';
                    if(Controller::checkValiation($email, $tableName, $value ) ==1){
                        $emailErr= 'Email không đã tồn tại trong hệ thống';
                    }
                    else
                    {
                        $emailErr= 1;
                    }
                }
            }

            return $emailErr;
        }
        
        public function checkPhoneNumberValiation($phoneNumber){
            //Loại bỏ kí tự không cần thiết
            $phoneNumber= str_replace(array('-', '.', ' '), '', $phoneNumber);

            // var_dump($phoneNumber);

            $phoneNumber = Controller::test_input($phoneNumber);

            //kiểm tra số theo đầu số nhà mạng việt nam
            if(!isset($phoneNumber)){
                return 'Không được bỏ trống số điện thoại';
            }
            else
            {
                if (!preg_match("/^0[0-9]{9}$/", $phoneNumber)) {
                    return $phoneErr ='Số diện thoại không hợp lệ';
                }
                else{
                    $tableName = $value = null;
                    $tableName = 'nguoidung';
                    $value ='sdt';
                    
                    if(Controller::checkValiation($phoneNumber, $tableName, $value) ==1){
                        return $phonelErr= 'Số điện đã tồn tại trong hệ thống';
                    }
                    else
                    {
                        return $phoneErr= 1;
                    }
                }
            }


        }


        // function getEmployeeIDbyEmail($email){
        //     $sql_code = "SELECT id FROM `taikhoan` WHERE `email`=:VALUE1";
		//     $query = $this->connection->prepare($sql_code);
		
        //     $values = array(
        //         ':VALUE1' => $email,
        //         );
        //     $query->execute($values);
		
        //     $dataList = $query->fetchAll(PDO::FETCH_ASSOC);
        //     $totalRowSelected = $query->rowCount();
		
        //     if($totalRowSelected > 0)
        //         return $dataList;
        //     else
        //         return 0;
        //     }	
        // }


        public function randomPassword() {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }

        // function insertNewEmployee($columnName){
        //     $tableName = $columnName = null;
        //     $tableName = 'taikhoan';
        //     $columnName['ten'] = $columnName['email'];
        //     $columnName['matkhau'] = sha1(self::randomPassword()); 
        //     $columnName['trangthai'] = 1; 
        //     $columnName['vaitro'] = 2; 
 

        //     $insertEmployee = self::$Model->insertData($tableName, $columnName );
            
        //     if( $insertEmployee["NUMBER_OF_ROW_INSERTED"] > 0){
        //         $tableName = $columnName = null;
        //         $tableName = 'nguoidung';
        //         $columnName['anh'] = $img;
        //         $columnName['tenhienthi'] = $email; 
        //         $columnName['hoten'] = $name; 
        //         $columnName['gioitinh'] = $birrthday; 
        //         $columnName['sdt'] = $phone; 
        //         $columnName['diachi'] = $address; 
        //         $columnName['tinh_thanh'] = $provice; 
        //         $columnName['quan_huyen'] = $district; 
        //         $columnName['phuong_xa'] = $town; 
        //         $insertEmployeeUser = self::$Model->insertData($tableName, $columnName );
        //         if($insertEmployeeUser["NUMBER_OF_ROW_INSERTED"] > 0)
        //             return 1;
        //         else{
        //             return -1;
        //         }
        //     }
        //     else{
        //         return -1;
        //     }
        // }
	
    }
?>