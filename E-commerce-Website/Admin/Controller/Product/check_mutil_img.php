<?php

    include('../../Controller/Controller.php');
    include("../../config/databse.php");
	include("../../config/site.php");
    
    $controller = new Controller;

    if (isset($_FILES['file_garelly_img']['name'])){

        //Lặp qua tất cả ảnh và kiểm tra tính hợp lệ của ảnh
        for($i=0; $i < count($_FILES['file_garelly_img']['name']); $i++) {

            if($controller->checkImage($_FILES['file_garelly_img']['type'][$i], $_FILES['file_garelly_img']['size'][$i], $_FILES['file_garelly_img']['error'][$i] )==0){
                echo 0;
                exit();
            }
            echo 1;
        }
    }
?>