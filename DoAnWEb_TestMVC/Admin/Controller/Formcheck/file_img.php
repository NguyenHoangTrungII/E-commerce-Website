<?php

    require_once('../../Controller/Controller.php');
    require_once("../../config/databse.php");
	require_once("../../config/site.php");
    
    $controller = new Controller;

    // var_dump("hihi");


    if (isset($_POST['file_extension'])){
        $file_ext = trim($_POST['file_extension']);
        echo $controller->checkImageValiation($file_ext);
    }
?>