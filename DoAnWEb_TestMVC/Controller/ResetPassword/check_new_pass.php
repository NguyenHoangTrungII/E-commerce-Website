<?php 
    require_once("../../Admin/config/databse.php");
    require_once("../../Admin/Model/ModelAll.php");
    require_once("../../Model/Forgot-password.php");
?>

<?php
    $Model = new ModelAll;
    $forgotpass = new ForgotPassWord;

    if(isset($_POST['pass']) && isset($_POST['pass_remind']) && isset($_POST['id_acc'])){
        if($_POST['pass'] == $_POST['pass_remind']){

            $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
            $columnName['matkhau']=sha1($_POST['pass']);
            $tableName = 'taikhoan';
            $whereValue['id'] = $_POST['id_acc'];
            $updatePass = $Model->updateData( $tableName,$columnName, $whereValue);
            $Model->connection->commit();
            // var_dump($hasEmail);
            if( $updatePass !=-1){
                echo 1;
                exit();
            }   
            
            echo "Đã có lỗi xảy ra !! Vui lòng thử lại";

        }
        else {
            echo "Hai mật khẩu không giống nhau";
        }
    }
    else{
        echo "Không được để trống bất kỳ miền giá trị nào";
    }
?>