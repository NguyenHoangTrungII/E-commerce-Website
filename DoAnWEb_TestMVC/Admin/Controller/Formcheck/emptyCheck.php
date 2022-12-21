<?php

    require_once('../../Model/ModelAll.php');
    require_once('../../Controller/Controller.php');

    require_once('../../Controller/EmployeeController.php');
    require_once("../../config/databse.php");
	require_once("../../config/site.php");

    $employeeCtroller = new EmployeeController;
    $controller = new Controller;
    $Model = new ModelAll;

    //encode
    $info_array = json_decode($_POST['other_data'], true);


    foreach($info_array as $key=> $value) { 
        if($value == "" || $value == " "){
            echo  0;
            exit();
        } 
    }

    if(!isset($_FILES['file_arr'])){
        echo  0;
        exit();
    }

    $Model->connection->beginTransaction();

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'taikhoan';
    $columnName['id'] = null;
    $columnName['email'] = $info_array['email'];
    $columnName['matkhau'] = sha1($employeeCtroller->randomPassword());
    $columnName['trangthai'] = $info_array['trangthai']; 
    $columnName['vaitro'] = $info_array['vaitro']; 
    
    //Insert dữ  liệu vào bảng taikhoan sau đó lấy id mới nhất rồi tạo người dùng, 
    //nếu có lỗi xảy ra thì rollback
    //1  thành công
    $employeeInsert = $Model->insertData($tableName, $columnName);
    // var_dump($employeeInsert);
    if( isset($employeeInsert["NUMBER_OF_ROW_INSERTED"]) && $employeeInsert["NUMBER_OF_ROW_INSERTED"] > 0  && isset($_FILES['file_arr']['name'])){
                $tableName = $columnName = null;
                $tableName = 'nguoidung';
                $columnName['id_taikhoan'] = $employeeInsert["LAST_INSERT_ID"];
                $columnName['anh'] = "User_Employee_". date("YmdHis") . "_".$_FILES['file_arr']['name'];
                $columnName['tenhienthi'] = $info_array['email'];
                $columnName['hoten'] = $info_array['hoten'];
                $columnName['gioitinh'] = $info_array['gioitinh'];
                $columnName['ngaysinh'] = $info_array['ngaysinh'];
                $columnName['sdt'] = $info_array['sdt'];
                $columnName['diachi'] = $info_array['diachi']; 
                $columnName['tinh_thanhpho'] = $info_array['tinh_thanhpho']; 
                $columnName['quan_huyen'] = $info_array['quan_huyen']; 
                $columnName['phuong_xa'] = $info_array['phuong_xa'];


                $insertEmployeeUser = $Model->insertData($tableName, $columnName );
                if($insertEmployeeUser["NUMBER_OF_ROW_INSERTED"] > 0)
                    {
                        move_uploaded_file($_FILES['file_arr']['tmp_name'], $GLOBALS['USER_DIRECTORY']. $columnName['anh']);
                        $Model->connection->commit();
                        echo 1;
                    }
                else{
                    $Model->connection->rollBack();
                    echo -1;
                }
    }
    else{
        $Model->connection->rollBack();

        echo -1;
    }
    
?>