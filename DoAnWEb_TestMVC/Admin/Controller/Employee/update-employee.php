<?php

    include('../../Model/ModelAll.php');
    include('../../Controller/Controller.php');
    include('../../Controller/EmployeeController.php');
    include("../../config/databse.php");
	include("../../config/site.php");

    $employeeCtroller = new EmployeeController;
    $controller = new Controller;
    $Model = new ModelAll;

    //encode
    $info_array = json_decode($_POST['other_data'], true);
    foreach($info_array as $key=> $value) { 
        if($value ==" "){
            echo  json_encode (array('tinhtrang'=>0));
            exit();
        } 
    }

    $controller->connection->beginTransaction();

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'taikhoan';
    $columnName['email'] = $info_array['email'];
    $columnName['trangthai'] = $info_array['trangthai']; 
    $columnName['vaitro'] = $info_array['vaitro'];
    $whereValue['id'] = $info_array['id'];

    $employeeUpdate = $Model->updateData($tableName, $columnName, $whereValue);
    // var_dump($employeeUpdate);
    if($employeeUpdate != -1 ){
        $tableName = $columnName = $whereValue =null;
        $tableName = 'nguoidung';
        // $columnName['tenhienthi'] = $info_array['email'];
        $columnName['hoten'] = $info_array['hoten'];
        $columnName['gioitinh'] = $info_array['gioitinh'];
        $columnName['ngaysinh'] = $info_array['ngaysinh'];
        $columnName['sdt'] = $info_array['sdt'];
        $columnName['diachi'] = $info_array['diachi']; 
        $columnName['tinh_thanhpho'] = $info_array['tinh_thanhpho']; 
        $columnName['quan_huyen'] = $info_array['quan_huyen']; 
        $columnName['phuong_xa'] = $info_array['phuong_xa'];
        $whereValue['id_taikhoan'] = $info_array['id'];
        @$columnName['anh'] = $controller->checkNewImgaie($_FILES['file_arr']['name'], $info_array['anh_cu'], "User_Employee_");

        $updateEmployeeUser = $Model->updateData($tableName, $columnName, $whereValue );
        // var_dump( $_FILES['file_arr']['name']);
        if($updateEmployeeUser!=-1)
        {
            if(!empty($_FILES['file_arr'])){
                //di chuyển ảnh vào thư mục phù hợp
                move_uploaded_file($_FILES['file_arr']['tmp_name'], $GLOBALS['USER_DIRECTORY']. $columnName['anh']);
                // var_dump($_FILES['file_arr']['tmp_name']);
                // var_dump($GLOBALS['USER_DIRECTORY']. $columnName['anh']);
                //Thực sự là ảnh và tồn tại trong hệ thống mới xóa
                if($controller->checkImageValiation(pathinfo($info_array['anh_cu'], PATHINFO_EXTENSION))){
                    // var_dump($GLOBALS['USER_DIRECTORY'].$info_array['anh_cu']);
                    unlink($GLOBALS['USER_DIRECTORY'].$info_array['anh_cu']);
                    echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$columnName['anh']));
                    exit();
                }
                
                $controller->connection->commit();
                echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$columnName['anh']));
                exit();
            }
            $controller->connection->commit();
            echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$info_array['anh_cu']));

        }
        else{
            $controller->connection->rollBack();
            echo json_encode (array('tinhtrang'=>-1));
        }
    }

    else
    {
        $controller->connection->rollBack();

        echo json_encode (array('tinhtrang'=>-1));
    }
    
?>