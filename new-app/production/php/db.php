<?php




if(!isset($_SESSION))
   {
       session_start();
   }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new-app";


$conn = new mysqli($servername, $username, $password,$dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{

    if(!mysqli_set_charset($conn, "utf8")){
        echo "error"; die;
    }



}
$filter = "";
$filter_sub = "";

if (isset($_GET['point_of_interaction']) && ! empty($_GET['point_of_interaction'])) {
$point_of_interactionArr = $_GET['point_of_interaction'];
$point_of_interaction = implode(",", $point_of_interactionArr);
$filter.= "and cc.point_of_interaction in ($point_of_interaction)";
$filter_sub.= "and cc_sub.point_of_interaction = coalesce(cc.point_of_interaction,0)";
}
//ECHO $filter; echo '<br>'; echo $filter_sub; die;
if (isset($_GET['channel']) && ! empty($_GET['channel'])) {
//echo $_GET['channel']; die;
$channelArr = $_GET['channel'];
$channel = implode(",", $channelArr);
$filter.= " and cc.channel in ($channel)";
$filter_sub.= " and cc_sub.channel = coalesce(cc.channel,0)";
}
if (isset($_GET['avgcheck']) && ! empty($_GET['avgcheck'])) {

$avgcheckArr = $_GET['avgcheck'];
$avgcheck = implode(",", $avgcheckArr);
$filter.= " and cc.checktitle in ($avgcheck)";
$filter_sub.= " and cc_sub.checktitle = coalesce(cc.checktitle,0)";
}

if (isset($_GET['product']) && ! empty($_GET['product'])){
$productArr = $_GET['product'];
$product= implode(",", $productArr);
$filter.= " and cc.product in($product)";
$filter_sub.= " and cc_sub.product = coalesce(cc.product,0)";
}
if (isset($_GET['duration_of_serviceStart']) && ! empty($_GET['duration_of_serviceStart'])) {

    $duration_of_serviceStart = $_GET['duration_of_serviceStart'];
    $duration_of_serviceEnd = $_GET['duration_of_serviceEnd'];
    if($duration_of_serviceStart=='' && $duration_of_serviceEnd==''){

$filter.= "";
$filter_sub.= "and cc_sub.duration_of_service = coalesce(cc.duration_of_service,0)";
    }else{
$filter.= " and cc.duration_of_service BETWEEN " . $duration_of_serviceStart." and ".$duration_of_serviceEnd;
$filter_sub.= " and cc_sub.duration_of_service = coalesce(cc.duration_of_service,0)";
}
}

if (isset($_GET['servicetimeStart']) && ! empty($_GET['servicetimeEnd'])) {

    $servicetimeStart = $_GET['servicetimeStart'];
    $servicetimeEnd = $_GET['servicetimeEnd'];
    if($servicetimeStart=='' && $servicetimeEnd==''){
$filter.= "";
$filter_sub.= " and cc_sub.servicetime = coalesce(cc.servicetime,0)";
    }else{
$filter.= " and cc.servicetime BETWEEN " . $servicetimeStart." and ".$servicetimeEnd;
$filter_sub.= " and cc_sub.servicetime = coalesce(cc.servicetime,0)";
}
}
if (isset($_GET['transactionsStart']) && ! empty($_GET['transactionsEnd'])) {

    $transactionsStart = $_GET['transactionsStart'];
    $transactionsEnd = $_GET['transactionsEnd'];
    if($transactionsStart=='' && $transactionsEnd==''){

$filter.= "";
$filter_sub.= " and cc_sub.transactions = coalesce(cc.transactions,0)";
    }else{
$filter.= " and cc.transactions BETWEEN " . $transactionsStart." and ".$transactionsEnd;
$filter_sub.= " and cc_sub.transactions = coalesce(cc.transactions,0)";
}
}

if (isset($_GET['ageStart']) && ! empty($_GET['ageStart'])) {
$ageStart = $_GET['ageStart'];
    $ageEnd = $_GET['ageEnd'];
    if($ageStart=='' && $ageEnd==''){

$filter.= "";
$filter_sub.= " and cc_sub.age = coalesce(cc.age,0)";
    }else{
$filter.= " and cc.age BETWEEN " . $ageStart." and ".$ageEnd;
$filter_sub.= " and cc_sub.age = coalesce(cc.age,0)";

}
}
if (isset($_GET['gender']) && ! empty($_GET['gender'])) {

$gender = $_GET['gender'];

$filter.= " and cc.sex=" . $gender;
$filter_sub.= "and cc_sub.sex = coalesce(cc.sex,0)";
}

$product_id=0;
if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
$product_id = $_GET['product_id'];
$filter.= " and cc.product_id=" . $product_id;
$filter_sub.= "and cc_sub.product_id = coalesce(cc.product_id,0)";
}



$stage_id=0;
if(isset($_GET['stage_id']) && !empty($_GET['stage_id'])){
$stage_id = $_GET['stage_id'];
$filter.= " and cc.stage_id=" . $stage_id;
$filter_sub.= "and cc_sub.stage_id = coalesce(cc.stage_id,0)";
}
