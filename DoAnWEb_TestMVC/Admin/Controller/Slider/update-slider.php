<?php

    include('../../Model/ModelAll.php');
    include('../../Controller/Controller.php');
    include("../../config/databse.php");
	include("../../config/site.php");

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
    // var_dump($info_array);

    $Model->connection->beginTransaction();

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'slider';
    $columnName['tenslider'] = $info_array['tenslider'];
    $columnName['url'] = isset($_FILES['file_arr']['name']) ? "Slider_". date("YmdHis")."_". $_FILES['file_arr']['name'] : $info_array['anh_cu'];
    $columnName['sothutu'] = $info_array['sothutu'];
    $columnName['tinhtrang'] = $info_array['tinhtrang'];
    $whereValue['id'] = $info_array['id'];

    $sliderUpdate = $Model->updateData($tableName, $columnName, $whereValue);
    // var_dump( $columnName['url']);
    if($sliderUpdate ==-1 ){
        
        // var_dump( $_FILES['file_arr']['name']);
            if(!empty($_FILES['file_arr'])){
                //di chuyển ảnh vào thư mục phù hợp
                move_uploaded_file($_FILES['file_arr']['tmp_name'], $GLOBALS['SLIDES_DIRECTORY']. $columnName['url']);
                //Thực sự là ảnh và tồn tại trong hệ thống mới xóa
                if($controller->checkImageValiation(pathinfo($info_array['anh_cu'], PATHINFO_EXTENSION)))
                {
                    unlink($GLOBALS['SLIDES_DIRECTORY'].$info_array['anh_cu']); 
                    // unlink($GLOBALS['USER_DIRECTORY'].$info_array['anh_cu']);
                    echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$columnName['url']));
                    exit();
                    
                    // var_dump($info_array['anh_cu']);
                }
                $Model->connection->commit();
                echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$columnName['url']));
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