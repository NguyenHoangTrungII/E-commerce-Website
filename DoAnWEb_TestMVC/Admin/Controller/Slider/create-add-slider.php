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
        if($value==""){
            echo  0;
            exit();
        } 
    }
    if(empty($_FILES['file_arr']['name']))
    {
        echo 0;
        exit();
    }

    $controller->connection->beginTransaction();

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'slider';
    $columnName['id'] = null;
    $columnName['tenslider'] = $info_array['tenslider'];
    $columnName['url'] = "Slider_". date("YmdHis") . "_".$_FILES['file_arr']['name'];
    $columnName['sothutu'] = $info_array['sothutu'];
    $columnName['tinhtrang'] = $info_array['tinhtrang']; 

    // var_dump($columnName);
    

    $sliderInsert = $Model->insertData($tableName, $columnName);
    // var_dump($sliderInsert["NUMBER_OF_ROW_INSERTED"] );
    if(isset($sliderInsert["NUMBER_OF_ROW_INSERTED"]) && $sliderInsert["NUMBER_OF_ROW_INSERTED"] > 0)
        {
            move_uploaded_file($_FILES['file_arr']['tmp_name'], $GLOBALS['SLIDES_DIRECTORY']. $columnName['url']);
            echo 1;
        }
    else{
        $controller->connection->rollBack();
        echo -1;
    }

?>