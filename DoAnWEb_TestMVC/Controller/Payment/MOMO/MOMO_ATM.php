

<?php
header('Content-type: text/html; charset=utf-8');
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/Model/ModelAll.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Admin/config/databse.php");


$Model = new ModelAll;
$columnName = $tableName = $whereValue = null;
$tableName = "donhang";
$columnName = "*";
$formatBy['DESC'] = "ID";
$paginate['POINT'] = 0;
$paginate['LIMIT']=1;
$lastID = $Model->selectData($columnName,$tableName, NULL, NULL, NULL, NULL,$formatBy, $paginate );

if($lastID ==-1){
    exit();
}


function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

// ($_POST['total-hidden-abc'])
// (($lastID[0]['id']+1))
$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secertKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";
$amount = 1000000;
$orderId = (($lastID[0]['id']+349));
$redirectUrl = "http://localhost/DoAnWeb/DoAnWeb_testMVC/View/invoice.php";
$ipnUrl = "http://localhost/DoAnWeb/DoAnWeb_testMVC/View/invoice.php";
$extraData = date('YmdHis');
$adressInfo = $_POST['tinh_thanhpho']. ", ".$_POST['quan_huyen']. ", ".$_POST['phuong_xa']. ", ".$_POST['diachi'];


// if (!empty($_POST['flag'])) {

$requestId = time() . "";
$requestType = "payWithATM";
// $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
//before sign HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $secertKey);
$data = array('partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature);
$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);  // decode json

//Just a example, please check more in there

header('Location: ' . $jsonResult['payUrl']);


// }
?>