<?php

    require_once('../../Model/ModelAll.php');
    require_once('../../Controller/Controller.php');

    require_once("../../config/databse.php");
	require_once("../../config/site.php");

    $controller = new Controller;
    $Model = new ModelAll;

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

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'danhmucsp';
    $columnName['id'] = null;
    $columnName['ten'] = $info_array['tendanhmuc'];
    $columnName['anh'] = "Category_Banner". date("YmdHis") . "_".$_FILES['file_arr']['name'];
    $columnName['slug'] = $info_array['slug'];
    $columnName['sothutu'] = $info_array['sothutu']; 
    $columnName['hienthi']= $info_array['hienthi'];
    

    $categoryInsert = $Model->insertData($tableName, $columnName);
    // var_dump($sliderInsert["NUMBER_OF_ROW_INSERTED"] );
    if(isset($categoryInsert["NUMBER_OF_ROW_INSERTED"]) && $categoryInsert["NUMBER_OF_ROW_INSERTED"] > 0)
        {
            move_uploaded_file($_FILES['file_arr']['tmp_name'], $GLOBALS['CATEGORY_DIRECTORY']. $columnName['anh']);
            $Model->connection->commit();
            echo 1;
        }
    else{
        echo -1;
    }

?>