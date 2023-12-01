<?php 

    include("../Model/ModelAll.php");
    include("../config/databse.php");
    include("../config/site.php");
    include("../Model/Pagination.php");
    ##================PHÂN TRANG=================##

    $pagination =  new Pagination;
    $config = array(
        'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
        'total_record'  => $pagination->count_all_member(), 
        'limit'         => 3,
        'link_full'     => 'list-employee.php?page={page}',
        'link_first'    => 'list-employee.php',
        'range'         => 9
    );
  
  
  $pagination->init($config);
  
  // Lấy limit, start
  $limit = $pagination->get_config('limit');
  $start = $pagination->get_config('start');
  
  // var_dump($limit);
  
  
  // Lấy danh sách thành viên
  $member = $pagination->getAllEmployee($limit, $start);
  
  // Kiểm tra nếu là ajax request thì trả kết quả
  if(isset($_GET['page'])) {
    // var_dump("chưa vào");
    echo (json_encode(array(
        'member' => $member,
        'paging' => $pagination->html()
    )));
  }
  
?>