<?php
    include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");

    include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Controller/Controller.php");

    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");

    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/config/site.php");


    $ctrl = new Controller;
    $Model = new ModelAll;
    $info_per = json_decode($_POST['info_per'], true);
    $info_acc = json_decode($_POST['info_acc'], true);

    foreach($info_per as $key=> $value) { 
        if($value ==""){
            echo "Không được để trống miền giá trị nào";
            exit();
        } 
    }


    if (!preg_match("/^0[0-9]{9}$/", $info_per['sdt'])) {
        echo 'Số diện thoại không hợp lệ';
        exit();
    }
    else{
        $tableName = $value = null;
        $tableName = 'nguoidung';
        $value ='sdt';
        if($ctrl->checkValiation($info_per['sdt'], $tableName, $value) ==1){
           echo 'Số điện đã tồn tại trong hệ thống';
           exit();
        }
    }

    
    $Model->connection->beginTransaction();

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'taikhoan';
    $columnName['id'] = null;
    $columnName['email'] = $info_acc['email'];
    $columnName['matkhau'] = sha1($info_acc['pass']);
    $columnName['trangthai'] = 1; 
    $columnName['vaitro'] = 3; 
    
    //Insert dữ  liệu vào bảng taikhoan sau đó lấy id mới nhất rồi tạo người dùng, 
    //nếu có lỗi xảy ra thì rollback
    //1  thành công
    $CustomerInsert = $Model->insertData($tableName, $columnName);
    // var_dump($CustomerInsert);
    if( isset($CustomerInsert["NUMBER_OF_ROW_INSERTED"]) && $CustomerInsert["NUMBER_OF_ROW_INSERTED"] > 0){
        $tableName = $columnName = null;
        $tableName = 'nguoidung';
        $columnName['id_taikhoan'] = $CustomerInsert["LAST_INSERT_ID"];
        $columnName['anh'] = isset($_FILES['avatar']) ? "User_Customer_". date("YmdHis") . "_".$_FILES['avatar']['name'] : "User_Customer_no_avatar.png";
        $columnName['tenhienthi'] = $info_acc['tenhienthi'];
        $columnName['hoten'] = $info_per['hoten'];
        $columnName['gioitinh'] = $info_per['gioitinh'];
        $columnName['ngaysinh'] = $info_per['ngaysinh'];
        $columnName['sdt'] = $info_per['sdt'];
        $columnName['diachi'] = $info_per['diachi']; 
        $columnName['tinh_thanhpho'] = $info_per['tinh_thanhpho']; 
        $columnName['quan_huyen'] = $info_per['quan_huyen']; 
        $columnName['phuong_xa'] = $info_per['phuong_xa'];


        $insertEmployeeUser = $Model->insertData($tableName, $columnName );
        if($insertEmployeeUser["NUMBER_OF_ROW_INSERTED"] > 0)
            {
                if(isset($_FILES['avatar'])){
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $GLOBALS['USER_DIRECTORY']. $columnName['anh']);
                    $Model->connection->commit();
                    echo 1;
                    exit();
                }

                echo 1;
                exit();
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