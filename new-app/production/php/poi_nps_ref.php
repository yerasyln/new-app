<?php
require 'db.php';

$company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']:"0";

if(!empty($_POST['start']) && !empty($_POST['end'])){



    $start = $_POST['start'];
    $end = $_POST['end'];
    $getParam = !empty($_POST['getParam'])? json_decode($_POST['getParam']):"";


    $filter="";

    if(!empty($getParam->product_id)){
        $filter=" and cc.product_id = ".$getParam->product_id;
    }

    if(!empty($getParam->stage_id)){
        $filter.=" and cc.stage_id = ".$getParam->stage_id;
    }

    $sql = "select substr(l.created_at,1,10) as date,
COUNT(CASE WHEN poi.id = 1 THEN poi.name END) AS 'column-1',
COUNT(CASE WHEN poi.id = 2 THEN poi.name END) AS 'column-2',
COUNT(CASE WHEN poi.id = 3 THEN poi.name END) AS 'column-3'
from log_simple_questions l
left join clients_contact cc on cc.phone = l.phone_number
left join point_of_interaction poi on poi.id = cc.point_of_interaction
where l.question_quee=2 and date(l.created_at)>=date('$start') and date(l.created_at)<=date('$end')
and cc.company_id = $company_id $filter 
group by substr(l.created_at,1,10)";

// print_r($sql);exit();
$result = $conn->query($sql);

$result_data_point = array();

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
    //    echo "0 results";
}

echo json_encode($result_data_point);
die;




}
