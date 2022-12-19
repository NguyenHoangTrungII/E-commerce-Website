<?php
    
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/Controller.php");
    require_once("../../Admin/Model/Pagination.php");
    require_once("../HomeController.php");
    require_once("../../config/site.php");



    $flag = false;
    $flag1= false;
    $sql = "  ";
    $sql1=" ";
    $info_array = json_decode($_POST['brand'], true);
    $price_array = json_decode($_POST['price'], true);

    foreach($info_array as $key=> $value) { 
        if($value != "" || $value != " "){
            $flag = true;
        } 
    }

    foreach($price_array as $key=> $value) { 
        if($value != "" || $value != " "){
            $flag1 = true;
        } 
    }

    if($flag == true){
        $sql ="AND (";
        foreach($info_array as $key=> $value) { 
            @$sql .= " id_thuonghieu"  ."=". "'" . $value . "'"." OR ";
        }

       $sql = trim($sql); $sql = rtrim($sql, "OR"); $sql = trim($sql); 
       $sql .= " )";

    }

    if($flag1 == true){
        $sql1 ="AND ( GIAGOC  BETWEEN ";
        foreach($price_array as $key => $value) { 
            // var_dump($value);
            @$sql1 .= $value." AND " ;
        }

        $sql1 = trim($sql1); $sql1 = rtrim($sql1, "AND"); $sql1 = trim($sql1); 
        $sql1 .= " )";

    }

    if(isset($_POST['order_by'])){
        if($_POST['order_by']==1){
            $sql2 = " order by giagoc*phantram asc ";
        }

        if($_POST['order_by']==2){
            $sql2 = " ORDER BY GIAGOC*PHANTRAM DESc";
        }

        if($_POST['order_by']==0){
            $sql2 = " ORDER BY NGAYTAO ASC";
        }
    }

    $controller = new Controller;
    $pagination = new Pagination;
    $homeController = new HomeController;
    $sql_code1="SELECT COUNT(*) FROM `sanpham` inner join `nhacungcap` on sanpham.id_thuonghieu  = nhacungcap.id INNER JOIN `danhmucsp` on sanpham.id_danhmuc = danhmucsp.id   WHERE id_danhmuc =:VALUE1  $sql  $sql1";
        
    $query = $controller->connection->prepare($sql_code1);

    $values = array(
        ':VALUE1' => $_SESSION['category_id'],
        );

    $query->execute($values);
    $rowSelected = $query->fetchColumn(); 


    //Phân trang

    $config = array(
    'current_page'  => isset($_POST['page']) ? $_POST['page'] : 1,
    'total_record'  => $rowSelected, 
    'limit'         => 10,
    'link_full'     => 'productlist.php?id='.$_SESSION['category_id'].'& fitterpage={page}',
    'link_first'    => 'productlist.php?id='.$_SESSION['category_id'].'',
    'range'         => 2
    );

    $pagination->init($config);

    $limit = $start= null;
    $limit = $pagination->get_config('limit');
    $start = $pagination->get_config('start');

    $sql_code="SELECT sanpham.id id_sp, danhmucsp.ten tendanhmuc, nhacungcap.tenncc tenncc, sanpham.tensp tensp, sanpham.anh , sanpham.giagoc, sanpham.phantram, sanpham.tinhtrang, sanpham.id_danhmuc
                
    FROM `sanpham` inner join `nhacungcap` on sanpham.id_thuonghieu  = nhacungcap.id INNER JOIN `danhmucsp` on sanpham.id_danhmuc = danhmucsp.id  WHERE id_danhmuc =:VALUE1  $sql  $sql1  $sql2 limit $start , $limit" ;


    $query = $controller->connection->prepare($sql_code);
    $values = array(
        ':VALUE1' => $_SESSION['category_id'],);

    $query->execute( $values);

    $menuMainProductList = $query->fetchAll(PDO::FETCH_ASSOC);

    $productListHtml =  $homeController->mainProduct($menuMainProductList);

    echo json_encode(array(
        'productListHtml' =>  $productListHtml,
        'paging' => $pagination->html()));

?>