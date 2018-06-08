<?php

require 'db.php';


$company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']: "";


$filter = " ";

$sql = "select substr(l.created_at,1,10) as date,
COUNT(CASE WHEN poi.id = 1 THEN poi.name END) AS 'column-1',
COUNT(CASE WHEN poi.id = 2 THEN poi.name END) AS 'column-2',
COUNT(CASE WHEN poi.id = 3 THEN poi.name END) AS 'column-3'
from log_simple_questions l
left join clients_contact cc on cc.phone = l.phone_number
left join point_of_interaction poi on poi.id = cc.point_of_interaction
where cc.company_id = $company_id and  l.answer<=6
" . $filter . "
group by substr(l.created_at,1,10)";





$result = $conn->query($sql);

$result_data_point = array();

if(!empty($result)){
  if ($result->num_rows > 0) {
      foreach ($result as $key => $row) {
          $date = $row['date'];
          $column1 = $row['column-1'];
          $column2 = $row['column-2'];
          $column3 = $row['column-3'];

          $result_data_point[$key] = array(
              'date' => $date,
              'column-1' => (int) $column1,
              'column-2' => (int) $column2,
              'column-3' => (int) $column3
          );
      }
  } else {
    //  echo "0 results";
  }
}

if (!empty($_POST['start']) && !empty($_POST['start'])) {

    $startDate = $conn->real_escape_string($_POST['start']);
    $endDate = $conn->real_escape_string($_POST['end']);
    $getParam = json_decode($_POST['getParam']);
//echo '<pre>'; print_r($getParam); die;
if (isset($getParam->point_of_interaction) && ! empty($getParam->point_of_interaction)) {
$point_of_interactionArr = $getParam->point_of_interaction;
$point_of_interaction = implode(",", $point_of_interactionArr);
$filter.= " and cc.point_of_interaction in ($point_of_interaction)";
}
if (isset($getParam->channel) && ! empty($getParam->channel)) {
$channelArr = $getParam->channel;
$channel = implode(",", $channelArr);
$filter.= " and cc.channel in ($channel)";

}
if (isset($getParam->avgcheck) && ! empty($getParam->avgcheck)) {

$avgcheckArr = $getParam->avgcheck;
$avgcheck = implode(",", $avgcheckArr);
$filter.= " and cc.checktitle in ($avgcheck)";
}

if (isset($getParam->product) && ! empty($getParam->product)){
$productArr = $getParam->product;
$product= implode(",", $productArr);
$filter.= " and cc.product in($product)";
}
if (isset($getParam->duration_of_serviceStart) && ! empty($getParam->duration_of_serviceStart)) {

    $duration_of_serviceStart = $getParam->duration_of_serviceStart;
    $duration_of_serviceEnd = $getParam->duration_of_serviceEnd;
    if($duration_of_serviceStart=='' && $duration_of_serviceEnd==''){

$filter.= "";

    }else{
$filter.= " and cc.duration_of_service BETWEEN " . $duration_of_serviceStart." and ".$duration_of_serviceEnd;
}
}
if (isset($getParam->servicetimeStart) && ! empty($getParam->servicetimeStart)) {

    $servicetimeStart = $getParam->servicetimeStart;
    $servicetimeEnd = $getParam->servicetimeEnd;
    if($servicetimeStart=='' && $servicetimeEnd==''){
$filter.= "";

    }else{
$filter.= " and cc.servicetime BETWEEN " . $servicetimeStart." and ".$servicetimeEnd;

}
}
if (isset($getParam->transactionsStart) && ! empty($getParam->transactionsStart)) {

    $transactionsStart = $getParam->transactionsStart;
    $transactionsEnd = $getParam->transactionsEnd;
    if($transactionsStart=='' && $transactionsEnd==''){

$filter.= "";

    }else{
$filter.= " and cc.transactions BETWEEN " . $transactionsStart." and ".$transactionsEnd;
}
}

if (isset($getParam->ageStart) && ! empty($getParam->ageStart)) {
$ageStart = $getParam->ageStart;
    $ageEnd = $getParam->ageEnd;
    if($ageStart=='' && $ageEnd==''){
$filter.= "";
    }else{
$filter.= " and cc.age BETWEEN " . $ageStart." and ".$ageEnd;
}
}

if(isset($getParam->gender) && ! empty($getParam->gender)){
$gender = $getParam->gender;
$filter.= " and cc.sex=" . $gender;
}



if(isset($getParam->product_id) && ! empty($getParam->product_id)){
$product_id = $getParam->product_id;
$filter.= " and cc.product_id=" . $product_id;
}

if(isset($getParam->stage_id) && ! empty($getParam->stage_id)){
$stage_id = $getParam->stage_id;
$filter.= " and cc.stage_id=" . $stage_id;
}





    $sql = "select substr(l.created_at,1,10) as date,
	COUNT(
        CASE WHEN poi.id = 3 AND l.answer >= 9 THEN poi.name
    END
) AS well_3,
COUNT(
    CASE WHEN poi.id = 3 AND l.answer <= 6 THEN poi.name
END
) AS bad_3,
COUNT(
    CASE WHEN poi.id = 2 AND l.answer >= 9 THEN poi.name
END
) AS well_2,
COUNT(
    CASE WHEN poi.id = 2 AND l.answer <= 6 THEN poi.name
END
) AS bad_2,
COUNT(
    CASE WHEN poi.id = 2 AND l.answer >= 9 THEN poi.name
END
) AS well_1,
COUNT(
    CASE WHEN poi.id = 2 AND l.answer <= 6 THEN poi.name
END
) AS bad_1,
COUNT(CASE WHEN poi.id = 1 THEN poi.name END) AS 'column-1',
COUNT(CASE WHEN poi.id = 2 THEN poi.name END) AS 'column-2',
COUNT(CASE WHEN poi.id = 3 THEN poi.name END) AS 'column-3'
from log_simple_questions l
left join clients_contact cc on cc.phone = l.phone_number
left join point_of_interaction poi on poi.id = cc.point_of_interaction
where
cc.company_id = $company_id
and
date(l.created_at)>=date('$startDate') and date(l.created_at)<=date('$endDate') and l.question_quee=2
$filter
group by substr(l.created_at,1,10)";




$result = $conn->query($sql);



$result_data_point = array();


if ($result->num_rows > 0) {
    foreach ($result as $key => $row) {
        $date = $row['date'];
        $total1 = $row['column-1'];
        $total2 = $row['column-2'];
        $total3 = $row['column-3'];

		$nps1 = !empty($row['well_1'])? round(($row['well_1']-$row['bad_1'])*100/$total1,2):0;
		$nps2 = !empty($row['well_2'])? round(($row['well_2']-$row['bad_2'])*100/$total2,2):0;
		$nps3 = !empty($row['well_3'])? round(($row['well_3']-$row['bad_3'])*100/$total3,2):0;

        $result_data_point[$key] = array(
            'date' => $date,
            'column-1' => (int) $nps1,
            'column-2' => (int) $nps2,
            'column-3' => (int) $nps3
        );
    }
} else {
//    echo "0 results";
}

        echo json_encode($result_data_point);
        die;

}


//json_encode($result_data);
//echo '<pre>'; print_R($result_data_point); die;
?>
