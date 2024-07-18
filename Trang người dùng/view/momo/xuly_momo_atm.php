<?php
session_start();
header('Content-type: text/html; charset=utf-8');

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$serectKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

$orderInfo = "Thanh toán vé phim ".$_SESSION['tong']['tieu_de'];

if (isset($_SESSION['tong'][4]) && is_numeric($_SESSION['tong'][4])) {
    $gia = $_SESSION['tong'][4];
} else {
    $gia = $_SESSION['tong'][2];
}
$amount = $gia;

$orderId = time() . "";
$redirectUrl =  'http://localhost/phpS/CinePass%20h%E1%BB%87%20th%E1%BB%91ng%20b%C3%A1n%20v%C3%A9%20s%E1%BB%91%201%20Vi%E1%BB%87t%20Nam/Trang%20ng%C6%B0%E1%BB%9Di%20d%C3%B9ng/index.php?act=xacnhan';
$ipnUrl = 'http://localhost/phpS/CinePass%20h%E1%BB%87%20th%E1%BB%91ng%20b%C3%A1n%20v%C3%A9%20s%E1%BB%91%201%20Vi%E1%BB%87t%20Nam/Trang%20ng%C6%B0%E1%BB%9Di%20d%C3%B9ng/index.php?act=thanhtoan';
$extraData = "";

$requestId = time() . "";
$requestType = "payWithATM";
// $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
//before sign HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $serectKey);
$data = array(
    'partnerCode' => $partnerCode,
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
    'signature' => $signature
);
$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);  // decode json

//Just a example, please check more in there

header('Location: ' . $jsonResult['payUrl']);
