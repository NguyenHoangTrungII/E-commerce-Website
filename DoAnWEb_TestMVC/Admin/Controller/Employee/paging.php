<?php
    session_start();
    require_once("../../config/databse.php");
    require_once("../../Controller/Controller.php");
    require_once("../../Model/Pagination.php");
    require_once("../../Model/ModelAll.php");
    require_once("getall-employee.php");
?>
<?php

$pagination = new Pagination;

  $config = array(
    'current_page'  => isset($_POST['page']) ? $_POST['page'] : 1,
    'total_record'  => count_all_member(), 
    'limit'         => 2,
    'link_full'     => 'list-employeecopy.php?page={page}',
    'link_first'    => 'list-employeecopy.php',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $start= null;
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');


// Lấy danh sách thành viên
$employeeList = getAll($limit, $start);

// var_dump($_POST['flag']==true);
echo json_encode($employeeList) ;


// var_dump($employeeList);

?>