<?php
include($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");
include("../Controller.php");
include("../PageController.php");


$control = new Controller;
$pageControl = new PageController;



@$searchData = $_POST['search'];

$result = $pageControl->searchAuto('sanpham', 'tensp', $searchData);

if($result > 0)
{
	foreach($result AS $eachData)
	{
		echo '<a class="list-group-item-action loadData">'. $eachData['tensp'] .'</a>';
	}
}
else
{
	echo '<a class="list-group-item-action loadData"> No Data Found </a>';
}
?>