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
    $old_thumbail = json_decode($_POST['img_old_thumbail'], true);

    // var_dump(count($_FILES['file_garelly_img']['name']));
    //Kiểm tra trống
    foreach($info_array as $key=> $value) { 
        if(trim($value)==""){
            echo  0;
            exit();
        } 
    }

    foreach($spec_array as $key=> $value) { 
        if($value==""){
            echo  0;
            exit();
        } 
    }


    if($_POST['summarynote_content'] == ""){
        echo 0;
        exit();
    }

    //Nếu không trống gì hết thì nhập dữ liệu
    $Model->connection->beginTransaction();

    // Lưu dữ liệu để nhập vào bảng sản phẩm -> nhập vào kho hàng -> nhập vào thongsokythuat . . .
    //nhows chinh ngaysua duoc null
    $tableName = $columnName = null;
    $tableName = 'sanpham';
    // $columnName['id'] = null;
    $columnName['id_danhmuc'] = $info_array['danhmuc'];
    $columnName['id_thuonghieu'] = $info_array['thuonghieu'];
    $columnName['slug'] = $info_array['slug']; 
    $columnName['tensp'] = $info_array['tensp']; 
    $columnName['giagoc'] = $info_array['giagoc']; 
    $columnName['phantram'] = $info_array['phantram']; 
    @$columnName['anh'] = $controller->checkNewImgaie($_FILES['file_thumbail_img']['name'], $info_array['anh_cu'], "Product_thub_".$info_array['tendanhmuc']);
    $columnName['baohanh'] = $info_array['baohanh']; 
    $columnName['ngaysx'] = $info_array['ngaysx']; 
    $columnName['ngaysua'] =  date("d/m/Y");
    $columnName['tinhtrang'] = $info_array['tinhtrang'];
    $whereValue['id'] = $info_array['id'];


    // var_dump(isset($_FILES['file_thumbail_img']));
    
    // Insert dữ  liệu vào bảng taikhoan sau đó lấy id mới nhất rồi tạo người dùng, 
    //nếu có lỗi xảy ra thì rollback
    //1  thành công
    $productUpdate = $Model->updateData($tableName, $columnName, $whereValue);
    // var_dump($productInsert);
    // Thanhf công  tiến hành insert dữ liệu vào cấu hình, mô tả và ho hàng theo id(sp) mới nhất vừa được thêm vào
    //Nếu update ảnh
    if(isset($_FILES['file_thumbail_img'])){
    // {var_dump('có vào');
        move_uploaded_file($_FILES['file_thumbail_img']['tmp_name'], $GLOBALS['PRODUCT_DIRECTORY'].$info_array['tendanhmuc']."/"."thumbnail/". $columnName['anh']);
        unlink($GLOBALS['PRODUCT_DIRECTORY'].$info_array['tendanhmuc']."/"."thumbnail/". $info_array['anh_cu']);
    }

    // var_dump($productUpdate);
    if($productUpdate != - 1){
         //Đổ dữ liệu vào ảnh sản phẩm
        if(isset($_FILES['file_garelly_img']['name'])){
             //Xóa ảnh
             $tableName10= $whereValue10=null;
             $tableName10="anhSP";
             $whereValue10['id_sp']=$info_array['id'];

            $garellyDelete = $Model->deleteData($tableName10, $whereValue10);
            if($garellyDelete == -1){
                $Model->connection->rollBack();
                echo json_encode(array('tinhtrang'=>-1, "anh_moi"=>$info_array['anh_cu'], "anh_garelly_cu"=>$old_thumbail));
                exit();

            }
             //Đổ dữ liệu vào ảnh sản phẩm
            for($i=0; $i < count($_FILES['file_garelly_img']['name']); $i++) {
                $tableName4 = $columnName4 = null;
                $tableName4 = 'AnhSP';
                $columnName4['id'] = null;
                $columnName4['id_sp']= $info_array['id'];
                // $columnName4['sothutu'] = $i+1;
                $columnName4['anh'] = "Product_".$info_array['tendanhmuc']."_garelly_".$_FILES['file_garelly_img']['name'][$i];
                $columnName4['ngaytao'] = date("d/m/Y");


                $imgInsert = $Model->insertData($tableName4, $columnName4);
                // var_dump( $imgInsert);
                if(!isset($imgInsert["NUMBER_OF_ROW_INSERTED"]) || $imgInsert["NUMBER_OF_ROW_INSERTED"] < 0){
                    $controller->unlinkProductImg($GLOBALS['PRODUCT_DIRECTORY'].$info_array['tendanhmuc']."/"."gallery/", "Product_".$info_array['tendanhmuc']."_gallery_", $_FILES['file_garelly_img']['name'], $i);
                    $Model->connection->rollBack();
                    echo json_encode (array('tinhtrang'=>-1, "anh_moi"=>$info_array['anh_cu'], "anh_garelly_cu"=>$old_thumbail));
                    exit();
                }

                move_uploaded_file($_FILES['file_garelly_img']['tmp_name'][$i], $GLOBALS['PRODUCT_DIRECTORY'].$info_array['tendanhmuc']."/"."gallery/". $columnName4['anh']);

            }

            $Model->connection->commit();

        }

        //Dữ liệu vào bảng motakithuat
        $tableName2 = $columnName2 = null;
        $tableName2 = 'motakithuat';
        $columnName2['noidung1'] = $_POST['summarynote_content'];
        $whereValue2['id_sp']= $info_array['id'];



        //Đổ dữ liệu vào cauhinh
        $tableName3 = $columnName3 = null;
        $tableName3 = 'cauhinh';
        $columnName3['noidung1'] = $_POST['specification'];
        $whereValue3['id_sp']= $info_array['id'];

        var_dump($columnName3);
        //Dữ liệu kho hàng
        // $tableName1 = $columnName1 = null;
        // $tableName1 = 'khohang';
        // $columnName1['id_sp']= $info_array['id'];
        // $columnName1['soluongton'] = $info_array['soluongton'];
        //Nhớ update khi đơn hàng thanh toán thành công
        // $columnName1['soluongdaban'] = 0;
        // $columnName1['ngaysua'] = $columnName['ngaysua'];

        $desInsert = $Model->updateData($tableName2, $columnName2, $whereValue2 );
        $specInsert = $Model->updateData($tableName3,  $columnName3, $whereValue3);
        // $Model->connection->commit();
        // $wareHouseInsert = $Model->insertData($tableName1,  $columnName1);

        // var_dump($desInsert);

        if($desInsert == -1 || $specInsert == - 1 ){
            $Model->connection->rollBack();
            echo json_encode (array('tinhtrang'=>-1, "anh_moi"=>$info_array['anh_cu'], "anh_garelly_cu"=>$old_thumbail));
            exit();
        }
        
        //Vượt qua hết thì thành công và commit
        $Model->connection->commit();
        echo json_encode (array('tinhtrang'=>1, "anh_moi"=>$columnName['anh'], "anh_garelly_cu"=>$old_thumbail));
        
    }
    else
    {
        if(isset($_FILES['file_thumbail_img']['tmp_name']))
        {
            unlink($GLOBALS['PRODUCT_DIRECTORY'].$info_array['tendanhmuc']."/"."thumbnail/". $columnName['anh']);
        }

        $Model->connection->rollBack();
        echo json_encode (array('tinhtrang'=>-1, "anh_moi"=>$info_array['anh_cu'], "anh_garelly_cu"=>$old_thumbail));
    }
    
?>