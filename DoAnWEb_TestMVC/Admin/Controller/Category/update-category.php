<?php

    require_once('../../Model/ModelAll.php');
    require_once('../../Controller/Controller.php');
    require_once("../../config/databse.php");
	require_once("../../config/site.php");

    $controller = new Controller;
    $Model = new ModelAll;

    //encode
    $info_array = json_decode($_POST['other_data'], true);
    foreach($info_array as $key=> $value) { 
        if($value ==""){
            echo  0;
            exit();
        } 
    }

    $Model->connection->beginTransaction();

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'danhmucsp';
    $columnName['ten'] = $info_array['ten'];
    $columnName['anh'] = isset($_FILES['file_arr']['name']) ? "Category_Banner_". date("YmdHis")."_". $_FILES['file_arr']['name'] : $info_array['anh_cu'];
    $columnName['sothutu'] = $info_array['sothutu'];
    $columnName['hienthi'] = $info_array['hienthi'];
    $columnName['slug'] = $info_array['slug'];
    $whereValue['id'] = $info_array['id'];

    $categoryList = $Model->updateData($tableName, $columnName, $whereValue);
    // var_dump( !empty($_FILES['file_arr']));
    if($categoryList !=-1 ){
        
        // var_dump( $_FILES['file_arr']['name']);
        if(!empty($_FILES['file_arr'])){
            //di chuyển ảnh vào thư mục phù hợp
            move_uploaded_file($_FILES['file_arr']['tmp_name'], $GLOBALS['CATEGORY_DIRECTORY']. $columnName['anh']);
            //Thực sự là ảnh và tồn tại trong hệ thống mới xóa
            if($controller->checkImageValiation(pathinfo($info_array['anh_cu'], PATHINFO_EXTENSION)))
            {
                unlink($GLOBALS['CATEGORY_DIRECTORY'].$info_array['anh_cu']); 
                $Model->connection->commit();
                echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$columnName['anh']));
                exit();
                
                // var_dump($info_array['anh_cu']);
            }

            $Model->connection->commit();
            echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$columnName['anh']));
            exit();
        }
        
        $Model->connection->commit();
        echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$info_array['anh_cu']));
    }
    else
    {
        $Model->connection->rollBack();

        echo json_encode (array('tinhtrang'=>-1));
    }
    
?>