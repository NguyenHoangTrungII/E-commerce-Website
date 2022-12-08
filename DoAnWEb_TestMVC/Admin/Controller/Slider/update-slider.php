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

    $controller->connection->beginTransaction();

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'slider';
    $columnName['tenslider'] = $info_array['tenslider'];
    @$columnName['url'] = isset($_FILES['file_arr']['name']) ? "Slider_".$_FILES['file_arr']['name'] : $info_array['anh_cu'];
    $columnName['sothutu'] = $info_array['sothutu'];
    $columnName['tinhtrang'] = $info_array['tinhtrang'];
    $whereValue['id'] = $info_array['id'];
    // var_dump($info_array['anh_cu']);

    $sliderUpdate = $Model->updateData($tableName, $columnName, $whereValue);
    // var_dump($employeeUpdate);
    if($sliderUpdate !=1 ){
        
        // var_dump( $_FILES['file_arr']['name']);
            if(!empty($_FILES['file_arr'])){
                //di chuyển ảnh vào thư mục phù hợp
                move_uploaded_file($_FILES['file_arr']['tmp_name'], $GLOBALS['SLIDES_DIRECTORY']. $columnName['url']);
                //Thực sự là ảnh và tồn tại trong hệ thống mới xóa
                if($controller->checkImageValiation(pathinfo($info_array['anh_cu'], PATHINFO_EXTENSION)))
                {
                    unlink($GLOBALS['SLIDES_DIRECTORY'].$info_array['anh_cu']); 
                    
                    var_dump($info_array['anh_cu']);
                }

            }
            echo 1;
    }
    else
    {
        $controller->connection->rollBack();

        echo -1;
    }
    
?>