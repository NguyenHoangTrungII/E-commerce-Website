<?php 
    require_once("../../Admin/config/databse.php");
    require_once("../../Admin/Model/ModelAll.php");
    require_once("../../Model/Forgot-password.php");
?>

<?php
    $Model = new ModelAll;
    $forgotpass = new ForgotPassWord;

    if(isset($_POST['email'])){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
            $columnName['1']="email";
            $columnName['2']="taikhoan.id";
            $columnName['3']="hoten";
            $tableName['MAIN'] = 'taikhoan';
            $tableName['1'] = 'nguoidung';
            $whereValue['email'] = $_POST['email'];
            $joinCondition = array ("1"=>array ('taikhoan.id', 'nguoidung.id_taikhoan'));
            $hasEmail = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue, "=");
            // var_dump($hasEmail);
            if(!empty($hasEmail)){
                $check = $forgotpass->setTokenForgetPass($hasEmail[0]['id']);
                $check_mailSend = $forgotpass->sentMailResetPass( $hasEmail, $check['URL']);

                // var_dump($check);
                // var_dump(($check_mailSend));

                if($check != 1  && $check_mailSend !=-1){
                    echo 1;
                    exit();
                }
                else{
                    echo "có lỗi xảy ra !! Vui lòng thử lại";
                    exit();
                }
            }   
            
            echo -1;

        }
        else {
            echo "Email của bạn không hợp lệ";
        }
        
}
?>