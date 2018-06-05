<?php
require 'db.php';

//echo "<pre>"; print_r($_SESSION); die;
$company_id = !empty($_SESSION['company_id'])? $_SESSION['company_id']:"";

if((isset($_POST['start']) && !empty($_POST['start'])) &&   (isset($_POST['end']) && !empty($_POST['end']))     ){

$start = $_POST['start'];
$end = $_POST['end'];
$getParam = json_decode($_POST['getParam']);
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


$sql="select
		count(main.phone_number) as total,
	(
		select
			count( answer )
		from
			log_simple_questions join clients_contact cc on
			cc.phone = phone_number
		where
      cc.company_id = $company_id
      and
			answer <= 6
			and question_quee = main.question_quee
			and date(created_at) = date(main.created_at)
	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions join clients_contact cc on
			cc.phone = phone_number
		where
      cc.company_id = $company_id
      and
			answer between 7 and 8
			and question_quee = main.question_quee
				and date(created_at) = date(main.created_at)
	) as good,
	(
		select
			count( answer )
		from
			log_simple_questions join clients_contact cc on
			cc.phone = phone_number
		where
      cc.company_id = $company_id
      and
			answer >= 9
			and question_quee = main.question_quee
				and date(created_at) = date(main.created_at)
	) as well,
	date(main.created_at) as date
from
	log_simple_questions main join clients_contact cc on
	cc.phone = main.phone_number
where
cc.company_id = $company_id
and
	main.question_quee = 2
and (date(main.created_at)>=date('$start') and date(main.created_at)<=date('$end'))
$filter
group by
	date(main.created_at)
order by
	main.created_at
";

 // echo $sql; die;

$res_query = $conn->query($sql);

$res_arr=array();

if($res_query){

    if($res_query->num_rows>0){

        while($row = $res_query->fetch_assoc()){
				$nps = $row['well']-$row['bad'];
				
				$res_arr[] = array(

                'date' => $row['date'],
                'bad'=> (int) $row['bad'],
                'good'=>(int) $row['good'],
                'well'=>(int) $row['well'],
				'nps%'=>(int) round(($nps*100)/$row['total']),
            );

        }

    }
}




echo json_encode($res_arr);

die;




}
