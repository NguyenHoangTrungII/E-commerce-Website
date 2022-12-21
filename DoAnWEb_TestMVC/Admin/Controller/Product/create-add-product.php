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
    $spec_array = json_decode($_POST['specification'], true);

    // var_dump($info_array);
    //Kiểm tra trống
    foreach($info_array as $key=> $value) { 
        if($value==""){
            echo  0;
            exit();
        } 
    }

    foreach($spec_array as $key=> $value) { 
        if($value==" "){
            echo  0;
            exit();
        } 
    }


    if($_POST['summarynote_content'] == "" || !isset($_FILES['file_thumbail_img']) || count($_FILES['file_garelly_img']['name'])==0){
        echo 0;
        exit();
    }

    //Nếu không trống gì hết thì nhập dữ liệu



    $Model->connection->beginTransaction();

    // Lưu dữ liệu để nhập vào bảng sản phẩm -> nhập vào kho hàng -> nhập vào thongsokythuat . . .
    //nhows chinh ngaysua duoc null
    $tableName = $columnName = null;
    $tableName = 'sanpham';
    $columnName['id'] = null;
    $columnName['id_danhmuc'] = $info_array['danhmuc'];
    $columnName['id_thuonghieu'] = $info_array['thuonghieu'];
    $columnName['slug'] = $info_array['slug']; 
    $columnName['tensp'] = $info_array['tensp']; 
    $columnName['giagoc'] = $info_array['giagoc']; 
    $columnName['phantram'] = $info_array['phantram']; 
    $columnName['anh'] = "Product_".$info_array['danhmuc']."_thub_".$_FILES['file_thumbail_img']['name'];
    $columnName['baohanh'] = $info_array['baohanh']; 
    $columnName['ngaysx'] = $info_array['ngaysx']; 
    $columnName['ngaytao'] =  date("Y-m-d");
    $columNmame['tinhtrang'] = $info_array['tinhtrang'];


    
    // Insert dữ  liệu vào bảng taikhoan sau đó lấy id mới nhất rồi tạo người dùng, 
    //nếu có lỗi xảy ra thì rollback
    //1  thành công
    $productInsert = $Model->insertData($tableName, $columnName);
    // var_dump($productInsert);
    // Thanhf công  tiến hành insert dữ liệu vào cấu hình, mô tả và ho hàng theo id(sp) mới nhất vừa được thêm vào
    // move_uploaded_file($_FILES['file_thumbail_img']['tmp_name'], $GLOBALS['PRODUCT_DIRECTORY']."thumbail/". $columnName['anh']);
    move_uploaded_file($_FILES['file_thumbail_img']['tmp_name'], $GLOBALS['PRODUCT_DIRECTORY'].$info_array['tendanhmuc']."/"."thumbnail/". $columnName['anh']);


    if( isset($productInsert["NUMBER_OF_ROW_INSERTED"]) || $productInsert["NUMBER_OF_ROW_INSERTED"] > 0){
        

         //Đổ dữ liệu vào ảnh sản phẩm
         for($i=0; $i < count($_FILES['file_garelly_img']['name']); $i++) {
            $tableName4 = $columnName4 = null;
            $tableName4 = 'AnhSP';
            $columnName4['id'] = null;
            $columnName4['id_sp']= $productInsert["LAST_INSERT_ID"];
            // $columnName4['sothutu'] = $i+1;
            $columnName4['anh'] = "Product_".$info_array['tendanhmuc']."_gallery_".$_FILES['file_garelly_img']['name'][$i];
            $columnName4['ngaytao'] = $columnName['ngaytao'];


            $imgInsert = $Model->insertData($tableName4, $columnName4);
            // var_dump( $columnName4);
            if(!isset($imgInsert["NUMBER_OF_ROW_INSERTED"]) || $imgInsert["NUMBER_OF_ROW_INSERTED"] < 0){
                $controller->unlinkProductImg($GLOBALS['PRODUCT_DIRECTORY'].$info_array['tendanhmuc']."/"."gallery/", "Product_".$info_array['tendanhmuc']."_gallery_", $_FILES['file_garelly_img']['name'], $i);
                $Model->connection->rollBack();
                echo -1;
                exit();
            }

            move_uploaded_file($_FILES['file_garelly_img']['tmp_name'][$i], $GLOBALS['PRODUCT_DIRECTORY'].$info_array['tendanhmuc']."/"."gallery/". $columnName4['anh']);

        }

        //Dữ liệu vào bảng motakithuat
        $tableName2 = $columnName2 = null;
        $tableName2 = 'motakithuat';
        $columnName2['id'] = null;
        $columnName2['id_sp']= $productInsert["LAST_INSERT_ID"];
        $columnName2['noidung1'] = $_POST['summarynote_content'];


        //Đổ dữ liệu vào cauhinh
        $tableName3 = $columnName3 = null;
        $tableName3 = 'cauhinh';
        $columnName3['id'] = null;
        $columnName3['id_sp']= $productInsert["LAST_INSERT_ID"];
        $columnName3['noidung1'] = $_POST['specification'];
        
        //Dữ liệu kho hàng
        $tableName1 = $columnName1 = null;
        $tableName1 = 'khohang';
        $columnName1['id_sp']= $productInsert["LAST_INSERT_ID"];
        $columnName1['soluongton'] = $info_array['soluongton'];
        //Nhớ update khi đơn hàng thanh toán thành công
        $columnName1['soluongdaban'] = 0;
        // $columnName['tenhienthi'] = $info_array['email'];
        $columnName1['ngaynhap'] = $columnName['ngaytao'];

        $desInsert = $Model->insertData($tableName2, $columnName2 );
        $specInsert = $Model->insertData($tableName3,  $columnName3);
        $wareHouseInsert = $Model->insertData($tableName1,  $columnName1);

        // var_dump($columnName1);

        if(!isset($desInsert["NUMBER_OF_ROW_INSERTED"]) || $desInsert["NUMBER_OF_ROW_INSERTED"] < 0 || !isset($specInsert["NUMBER_OF_ROW_INSERTED"]) 
                || $specInsert["NUMBER_OF_ROW_INSERTED"] < 0 || !isset($wareHouseInsert["NUMBER_OF_ROW_INSERTED"]) || $wareHouseInsert["NUMBER_OF_ROW_INSERTED"] < 0 ){
                $Model->connection->rollBack();
                echo -1;
                exit();
        }
        
        //Vượt qua hết thì thành công và commit
        $Model->connection->commit();
        echo 1;
        
    }
    else{
        unlink($GLOBALS['PRODUCT_DIRECTORY']."thumbail/". $columnName['anh']);
        $Model->connection->rollBack();
        echo -1;
    }
    
?>