<?php 
    session_start();
    require_once("getall-product.php");
    require_once("../../Admin/Model/Pagination.php");
    require_once("../HomeController.php");
    require_once("../../Admin/Model/ModelAll.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
    require_once("../../config/site.php");


    $pagination = new Pagination;
    $homeController = new HomeController;

    $config = array(
    'current_page'  => isset($_POST['page']) ? $_POST['page'] : 1,
    'total_record'  => count_all_member($_SESSION['category_id']), 
    'limit'         => 5,
    'link_full'     => 'productlist.php?id='.$_SESSION['category_id'].'& fitterpage={page}',
    'link_first'    => 'productlist.php?id='.$_SESSION['category_id'].'',
    'range'         => 3
    );
;
    // var_dump($config);

    $pagination->init($config);

    // Lấy limit, start
    $limit = $start= null;
    $limit = $pagination->get_config('limit');
    $start = $pagination->get_config('start');


    // Lấy danh sách sản phẩm
    $productList = getAll($limit, $start, $_SESSION['category_id']);

    $productListHtml =  $homeController->mainProduct($productList);

    // var_dump($productListHtml);
    echo json_encode(array(
        'productListHtml' =>  $productListHtml,
        'paging' => $pagination->html()));

?>