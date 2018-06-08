<?php
require 'db.php';
require_once 'filters.php';


$company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']:"";
$filters = new filters();
$is_nps = false;
$sql = "";

if (isset($_GET['nps_id']) && !empty($_GET['nps_id'])) {

    $nps_idArr = $_GET['nps_id'];
    $nps_id = implode(",", $nps_idArr);
//echo $nps_id; die;

    $is_nps = true;
    $res = $filters->getFiltrNPS_id($nps_id);

    $code = '';

    $counter = count($res);

    foreach ($res as $key => $val) {

        if ($counter > 0) {
            $code .= $val['code'] . ",";
        } else {
            $code .= $val['code'];
        }
    }

    $code = substr($code, 0, -1);
    if (!empty($res)) {
        switch ($code) {
            case "bad":
                $sql = $filters->getBadData();

                break;
            case "good":
                $sql = $filters->getGoodData();
                break;

            case "well":
                $sql = $filters->getWellData();
                break;

            default :

                $sql = $filters->getMultipleData($code);
                break;
        }
    }
}

if (!$is_nps) {


     $sql = "select
	count( answer ) as total,
	(
		select
			count( answer )
		from
			log_simple_questions
join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,clients_contact.avgcheck,
    clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id, clients_contact.product_id, clients_contact.stage_id from clients_contact ) cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer <= 6
			and question_quee = 2
      and cc_sub.company_id = $company_id
		    $filter_sub
	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions
		join (select distinct(clients_contact.phone),checktitle,
    clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,clients_contact.avgcheck,clients_contact.servicetime,
    clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id, clients_contact.product_id, clients_contact.stage_id from clients_contact ) cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer between 7 and 8
			and question_quee = 2
      and cc_sub.company_id = $company_id
		$filter_sub
	) as good,
	(
		select
			count( answer )
		from
			log_simple_questions
		join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,
    clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id, clients_contact.product_id, clients_contact.stage_id from clients_contact ) cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer >= 9
			and question_quee = 2
      and cc_sub.company_id = $company_id
			$filter_sub
	) as well,
	concat( round(((( select count( answer ) from log_simple_questions join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction, clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id, clients_contact.product_id, clients_contact.stage_id from clients_contact ) cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer <= 6 and question_quee = 2   and cc_sub.company_id = $company_id  $filter_sub )* 100 )/count(main.answer)), 2 ), '' ) as bad_rate,
	concat( round(((( select count( answer ) from log_simple_questions join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction, clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id, clients_contact.product_id, clients_contact.stage_id from clients_contact ) cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 2 and cc_sub.company_id = $company_id $filter_sub )* 100 )/count(main.answer)), 2 ), '' ) as good_rate,
	concat( round(((( select count( answer ) from log_simple_questions join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction, clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id, clients_contact.product_id, clients_contact.stage_id from clients_contact ) cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer >= 9 and question_quee = 2 and cc_sub.company_id = $company_id $filter_sub )* 100 )/count(main.answer)), 2 ), '' ) as well_rate
from
	log_simple_questions main
join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction, clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id, clients_contact.product_id, clients_contact.stage_id from clients_contact ) cc on
	cc.phone = main.phone_number
where
	main.question_quee = 2 and  cc.company_id = $company_id
	" . $filter . " ";
}

//echo $sql; die;


$result = $conn->query($sql);

$result_data_well = array();
$result_data_good = array();
$result_data_bad = array();

$result_data_totall = array();

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        if (isset($row['bad'])) {
            $result_data_bad['label'] = "Детракторы";
            $result_data_bad['param'] = 1;
            $result_data_bad['value'] = $row['bad'];
            $result_data_bad['bad_rate'] = $row['bad_rate'];
        }

        if (isset($row['good'])) {
            $result_data_good['label'] = "Нейтралы";
            $result_data_good['param'] = 2;
            $result_data_good['good_rate'] = $row['good_rate'];
            $result_data_good['value'] = $row['good'];
        }

        if (isset($row['well'])) {
            $result_data_well['label'] = "Промоутеры";
            $result_data_well['param'] = 3;
            $result_data_well['well_rate'] = $row['well_rate'];
            $result_data_well['value'] = $row['well'];
        }

        if (isset($row['total'])) {
            $result_data_totall['total'] = $row['total'];
        }

        // $result_data[$row['assessment']]=$row['rate'];
    }
} else {
    echo "0 results";
}

$sql = "SELECT
    main.id,
    main.code,
    main.title,
    main.created,
    main.status,
    main.question_type,
    (
    SELECT
        COUNT(*)
    FROM
        `log_simple_questions` ll

 join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,
    clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id, clients_contact.product_id, clients_contact.stage_id from clients_contact ) cc on cc.phone = ll.phone_number

    WHERE
        ll.question_id = main.id
        and cc.company_id = $company_id
        $filter
    GROUP BY
        `question_id`
) AS col_count
FROM
    `simple_questions` main
WHERE main.company_id = $company_id
and main.id not in (
	 select question_id from answers_options where question_id = main.id and is_comment=1
)
	";

  //  echo $sql; die;

$result = $conn->query($sql);

$total_question = array();

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $total_question[ (int) trim($row['code'])] = $row;
    }

    // echo "<pre>"; print_r($total_question); die;
}


$sql_region = "select
count( main.phone_number ) common,
	(
		select
			count( answer )
		from
			log_simple_questions
		join (select distinct(clients_contact.phone),clients_contact.company_id,checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,
    clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age  from clients_contact ) cc on
			cc.phone = phone_number
		join company on
			company.id = cc.company_id
		join map_ref on
			map_ref.id = company.region
		where
      cc.company_id = $company_id
      and
			answer <= 6
			and question_quee = 2
			and map_ref.id = mm.id
			$filter
	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions
		join (select distinct(clients_contact.phone),clients_contact.company_id,checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,
    clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age  from clients_contact ) cc on
			cc.phone = phone_number
		join company on
			company.id = cc.company_id
		join map_ref on
			map_ref.id = company.region
		where
      cc.company_id = $company_id
      and
			answer >= 9
			and question_quee = 2
			and map_ref.id = mm.id
			$filter
	) as well,
	mm.title as region_title,
        mm.id,
		mm.code
from
	log_simple_questions main
join (select distinct(clients_contact.phone),clients_contact.company_id,checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,
    clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age  from clients_contact ) cc on
	cc.phone = main.phone_number
join company on
	company.id = cc.company_id
join map_ref mm on
	mm.id = company.region
	where
  cc.company_id = $company_id
  and main.question_quee=2
	$filter
group by
	mm.title";



$res_region = $conn->query($sql_region);

$res_region_arr = array();

if ($res_region) {
    if ($res_region->num_rows > 0) {
        while ($row = $res_region->fetch_assoc()) {

              $rate  =   (round((($row['well'] * 100) / $row['common']), 2) - round((($row['bad'] * 100) / $row['common']), 2));


            $res_region_arr[$row['id']] = array( 'code'=>$row['code']  ,'label' => $row['region_title'], 'rate' => $rate);
        }
    }
}

/*
$map_ref_data = $filters->getMapData_ref();

foreach ($map_ref_data as $maps) {
    if (!isset($res_region_arr[$maps['id']])) {
        $res_region_arr[$maps['id']] = array('label' => $maps['title'], 'rate' => 0);
    }
}
*/


//echo "<pre>"; print_r($res_region_arr); die;

$map = $filters->getMapData($company_id);



foreach($res_region_arr as $row){

    if(isset($map[$row['code']])){
        $map[$row['code']]['number']=abs($row['rate']);
    }


}



$ConnectionDot = $filters->getDataForConnectionDot($lastWeek=false,$filter, $company_id);


$ConnectionDot_arr = array();

if (!empty($ConnectionDot)) {



    foreach ($ConnectionDot as $data) {

		if(!empty($data['total'])){
        $ConnectionDot_arr[$data['code']] = array('label' => $data['name'], 'rate' => round((($data['col'] * 100) / $data['total']), 2) . "%");
		}else{
		$ConnectionDot_arr[$data['code']] = array('label' => $data['name'], 'rate' =>  "0%");
		}
    }
}



//get common data

//csat data
$totalCSAT = $filters->getTotalCSAT($filter, $company_id, $filter_sub);


$totalCsat_is_down = false;




if($totalCSAT[0]['arif']>$totalCSAT[0]['lastweek']){
$totalCsat_is_down = true;
}else{
$totalCsat_is_down = false;
}


//nps data
$totalNPS_lastweek_query = $filters->getTotalNPS_lastWeek($company_id);

$totalNPS = $result_data_well['well_rate'] - $result_data_bad['bad_rate'];


$totalNPS = $totalNPS."%";

$totalNPS_lastweek_query =$totalNPS_lastweek_query."%";


$changeStatusForNPS = $totalNPS < $totalNPS_lastweek_query ? 1 : 0;


// all asked people
$Allaskedpeople = $filters->getAllASkedpeople($company_id, $filter);

$Allaskedpeople_lastweek = $filters->getAllASkedpeople($company_id,$filter,1);



$changeStatusForAllAsked = $Allaskedpeople<$Allaskedpeople_lastweek?1:0;


// total respond rate

$totalRespondrate = $filters->getTotalRespondRate($lastWeek = false,$filter,$filter_sub,  $company_id);

$totalRespondrate_lastweek = $filters->getTotalRespondRate(1,$filter,$filter_sub, $company_id);

$changeStatusTotalRespondRate = $totalRespondrate<$totalRespondrate_lastweek?1:0;




// nps point

$ConnectionDot_lastweek = $filters->getDataForConnectionDot(1,$filter, $company_id);


$ConnectionDot_arr_lastweek = array();

if (!empty($ConnectionDot_lastweek)) {

    foreach ($ConnectionDot_lastweek as $data) {

		if(!empty($data['col']) && !empty($data['total'])){
			$ConnectionDot_arr_lastweek[$data['code']] = array('label' => $data['name'], 'rate' => round((($data['col'] * 100) / $data['total']), 2) . "%");
		}else{
			$ConnectionDot_arr_lastweek[$data['code']] = array('label' => $data['name'], 'rate' =>  "0%");
		}


	}
}









$sql="select title from data_page where company_id = $company_id";
$res = $conn->query($sql);
$csat_title = "";
if($res){
  if($res->num_rows>0){
    while($row = $res->fetch_assoc()){
        $csat_title = $row['title'];
    }
  }
}









    $sql_count_for_per_questions = "select
	count( main.answer ) as total,
	(
		select
			count( answer )
		from
			log_simple_questions
		join(
				select
					distinct(clients_contact.phone),
					clients_contact.company_id,
					clients_contact.point_of_interaction,
          clients_contact.product_id,
          clients_contact.stage_id
				from
					clients_contact
			) cc_sub on
			cc_sub.phone = phone_number
		join company on
			company.id = cc_sub.company_id
			join point_of_interaction poi on poi.id =  cc_sub.point_of_interaction
		where
			cc_sub.company_id = $company_id
			and answer <= 6
			and poi.id = poi_main.id
			and log_simple_questions.question_quee = 2
      $filter_sub
	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions
		join(
				select
					distinct(clients_contact.phone),
					clients_contact.company_id,
					clients_contact.point_of_interaction,
          clients_contact.product_id,
          clients_contact.stage_id
				from
					clients_contact
			) cc_sub on
			cc_sub.phone = phone_number
		join company on
			company.id = cc_sub.company_id
			join point_of_interaction poi on poi.id =  cc_sub.point_of_interaction
		where
			cc_sub.company_id = $company_id
			and answer >= 9
			and poi.id = poi_main.id
			and log_simple_questions.question_quee = 2
      $filter_sub
	) as well,
	poi_main.name
from
	log_simple_questions main
join(
		select
			distinct(clients_contact.phone),
			clients_contact.company_id,
			clients_contact.point_of_interaction,
      clients_contact.product_id,
      clients_contact.stage_id
		from
			clients_contact
	) cc on
	cc.phone = main.phone_number
join company on
	company.id = cc.company_id
join point_of_interaction poi_main on poi_main.id =  cc.point_of_interaction
where

	cc.company_id = $company_id
	and main.question_quee = 2
	and poi_main.code='office'

  $filter
  "

  ;



    $CountForQuestion = $conn->query($sql_count_for_per_questions);
$office_nps = array();
    if ($CountForQuestion->num_rows > 0) {
        while ($row = $CountForQuestion->fetch_assoc()) {
      if(!empty($row['total'])){
            $value =(($row['well']*100)/$row['total'])-(($row['bad']*100)/$row['total'])."%";
            $office_nps['office'] = array('rate'=>$value);
      }

        }
    }


	///last week


	 $sql_count_for_per_questions = "select
	count( main.answer ) as total,
	(
		select
			count( answer )
		from
			log_simple_questions
		join(
				select
					distinct(clients_contact.phone),
					clients_contact.company_id,
					clients_contact.point_of_interaction,
          clients_contact.product_id,
          clients_contact.stage_id
				from
					clients_contact
			) cc on
			cc.phone = phone_number
		join company on
			company.id = cc.company_id
			join point_of_interaction poi on poi.id =  cc.point_of_interaction
		where
			cc.company_id = $company_id
			and answer <= 6
			and poi.id = poi_main.id
			and log_simple_questions.question_quee = 2  and  date( log_simple_questions.created_at )<= date(
		current_date - 7)
	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions
		join(
				select
					distinct(clients_contact.phone),
					clients_contact.company_id,
					clients_contact.point_of_interaction,
          clients_contact.product_id, clients_contact.stage_id
				from
					clients_contact
			) cc on
			cc.phone = phone_number
		join company on
			company.id = cc.company_id
			join point_of_interaction poi on poi.id =  cc.point_of_interaction
		where
			cc.company_id = $company_id
			and answer >= 9
			and poi.id = poi_main.id
			and log_simple_questions.question_quee = 2  and  date( log_simple_questions.created_at )<= date(
		current_date - 7)
	) as well,
	poi_main.name
from
	log_simple_questions main
join(
		select
			distinct(clients_contact.phone),
			clients_contact.company_id,
			clients_contact.point_of_interaction,
      clients_contact.product_id, clients_contact.stage_id
		from
			clients_contact
	) cc on
	cc.phone = main.phone_number
join company on
	company.id = cc.company_id
join point_of_interaction poi_main on poi_main.id =  cc.point_of_interaction
where
	cc.company_id = $company_id
	and main.question_quee = 2
	and poi_main.code='office' and  date( main.created_at )<= date(
		current_date - 7) " ;

		//echo $sql_count_for_per_questions; die;

    $CountForQuestion = $conn->query($sql_count_for_per_questions);
$office_nps_last_week = array();
    if ($CountForQuestion->num_rows > 0) {
        while ($row = $CountForQuestion->fetch_assoc()) {
      if(!empty($row['total'])){
            $value =round((($row['well']*100)/$row['total'])-(($row['bad']*100)/$row['total']),2)."%";
            $office_nps_last_week['office'] = array('rate'=>$value);
      }

        }
    }



//echo "<pre>"; print_r($office_nps_last_week ); die;
    //office week check
    if(empty($office_nps_last_week['office']['rate'])) $office_nps_last_week['office']['rate']=0;
    if(empty($office_nps['office']['rate'])) $office_nps['office']['rate']=0;

    $changeStatuscall_office = $office_nps['office']['rate']<$office_nps_last_week['office']['rate']?1:0;

///call center nps


$sql_count_for_per_questions_call_center = "select
count( main.answer ) as total,
(
select
  count( answer )
from
  log_simple_questions
join(
    select
      distinct(clients_contact.phone),
      clients_contact.company_id,
      clients_contact.point_of_interaction,
      clients_contact.product_id,
      clients_contact.stage_id
    from
      clients_contact
  ) cc_sub on
  cc_sub.phone = phone_number
join company on
  company.id = cc_sub.company_id
  join point_of_interaction poi on poi.id =  cc_sub.point_of_interaction
where
  cc_sub.company_id = $company_id
  and answer <= 6
  and poi.id = poi_main.id
  and log_simple_questions.question_quee = 2
  $filter_sub
) as bad,
(
select
  count( answer )
from
  log_simple_questions
join(
    select
      distinct(clients_contact.phone),
      clients_contact.company_id,
      clients_contact.point_of_interaction,
      clients_contact.product_id,
      clients_contact.stage_id
    from
      clients_contact
  ) cc_sub on
  cc_sub.phone = phone_number
join company on
  company.id = cc_sub.company_id
  join point_of_interaction poi on poi.id =  cc_sub.point_of_interaction
where
  cc_sub.company_id = $company_id
  and answer >= 9
  and poi.id = poi_main.id
  and log_simple_questions.question_quee = 2
  $filter_sub
) as well,
poi_main.name
from
log_simple_questions main
join(
select
  distinct(clients_contact.phone),
  clients_contact.company_id,
  clients_contact.point_of_interaction,
  clients_contact.product_id,
  clients_contact.stage_id
from
  clients_contact
) cc on
cc.phone = main.phone_number
join company on
company.id = cc.company_id
join point_of_interaction poi_main on poi_main.id =  cc.point_of_interaction
where
cc.company_id = $company_id
and main.question_quee = 2
and poi_main.code='call-center'
$filter
" ;



$CountForQuestion = $conn->query($sql_count_for_per_questions_call_center);
$call_center_nps = array();
if ($CountForQuestion->num_rows > 0) {
    while ($row = $CountForQuestion->fetch_assoc()) {
      if(!empty($row['total'])){
        $value =(($row['well']*100)/$row['total'])-(($row['bad']*100)/$row['total'])."%";
        $call_center_nps['call-center'] = array('rate'=>$value);
      }
    }
}






/// last week


$sql_count_for_per_questions_call_center = "select
count( main.answer ) as total,
(
select
  count( answer )
from
  log_simple_questions
join(
    select
      distinct(clients_contact.phone),
      clients_contact.company_id,
      clients_contact.point_of_interaction
    from
      clients_contact
  ) cc on
  cc.phone = phone_number
join company on
  company.id = cc.company_id
  join point_of_interaction poi on poi.id =  cc.point_of_interaction
where
  cc.company_id = $company_id
  and answer <= 6
  and poi.id = poi_main.id
  and log_simple_questions.question_quee = 2 and date( log_simple_questions.created_at )<= date(
		current_date - 7
	)
) as bad,
(
select
  count( answer )
from
  log_simple_questions
join(
    select
      distinct(clients_contact.phone),
      clients_contact.company_id,
      clients_contact.point_of_interaction
    from
      clients_contact
  ) cc on
  cc.phone = phone_number
join company on
  company.id = cc.company_id
  join point_of_interaction poi on poi.id =  cc.point_of_interaction
where
  cc.company_id = $company_id
  and answer >= 9
  and poi.id = poi_main.id
  and log_simple_questions.question_quee = 2  and date( log_simple_questions.created_at )<= date(
		current_date - 7
	)
) as well,
poi_main.name
from
log_simple_questions main
join(
select
  distinct(clients_contact.phone),
  clients_contact.company_id,
  clients_contact.point_of_interaction
from
  clients_contact
) cc on
cc.phone = main.phone_number
join company on
company.id = cc.company_id
join point_of_interaction poi_main on poi_main.id =  cc.point_of_interaction
where
cc.company_id = $company_id
and main.question_quee = 2
and poi_main.code='call-center'

and date( main.created_at )<= date(
		current_date - 7
	)

" ;

$CountForQuestion = $conn->query($sql_count_for_per_questions_call_center);
$call_center_nps_last_week = array();
if ($CountForQuestion->num_rows > 0) {
    while ($row = $CountForQuestion->fetch_assoc()) {
      if(!empty($row['total'])){
        $value = round((($row['well']*100)/$row['total'])-(($row['bad']*100)/$row['total']),2)."%";
        $call_center_nps_last_week['call-center'] = array('rate'=>$value);
      }
    }
}






if(empty($call_center_nps['call-center']['rate'])) $call_center_nps['call-center']['rate']=0;

if(empty($call_center_nps_last_week['call-center']['rate'])) $call_center_nps_last_week['call-center']['rate']=0;

// call center week check
$changeStatuscall_center_nps = $call_center_nps['call-center']['rate']<$call_center_nps_last_week['call-center']['rate']?1:0;






$sql_count_for_per_questions_help_desk = "select
count( main.answer ) as total,
(
select
  count( answer )
from
  log_simple_questions
join(
    select
      distinct(clients_contact.phone),
      clients_contact.company_id,
      clients_contact.point_of_interaction,
      clients_contact.product_id,
      clients_contact.stage_id
    from
      clients_contact
  ) cc_sub on
  cc_sub.phone = phone_number
join company on
  company.id = cc_sub.company_id
  join point_of_interaction poi on poi.id =  cc_sub.point_of_interaction
where
  cc_sub.company_id = $company_id
  and answer <= 6
  and poi.id = poi_main.id
  and log_simple_questions.question_quee = 2
  $filter_sub
) as bad,
(
select
  count( answer )
from
  log_simple_questions
join(
    select
      distinct(clients_contact.phone),
      clients_contact.company_id,
      clients_contact.point_of_interaction,
      clients_contact.product_id,
      clients_contact.stage_id
    from
      clients_contact
  ) cc_sub on
  cc_sub.phone = phone_number
join company on
  company.id = cc_sub.company_id
  join point_of_interaction poi on poi.id =  cc_sub.point_of_interaction
where
  cc_sub.company_id = $company_id
  and answer >= 9
  and poi.id = poi_main.id
  and log_simple_questions.question_quee = 2
  $filter_sub
) as well,
poi_main.name
from
log_simple_questions main
join(
select
  distinct(clients_contact.phone),
  clients_contact.company_id,
  clients_contact.point_of_interaction,
  clients_contact.product_id,
  clients_contact.stage_id
from
  clients_contact
) cc on
cc.phone = main.phone_number
join company on
company.id = cc.company_id
join point_of_interaction poi_main on poi_main.id =  cc.point_of_interaction
where
cc.company_id = $company_id
and main.question_quee = 2
and poi_main.code='help_desk'
$filter
" ;




$CountForQuestion = $conn->query($sql_count_for_per_questions_help_desk);
$help_desk_nps = array();
if ($CountForQuestion->num_rows > 0) {
    while ($row = $CountForQuestion->fetch_assoc()) {
      if(!empty($row['total'])){
        $value =(($row['well']*100)/$row['total'])-(($row['bad']*100)/$row['total'])."%";
        $help_desk_nps['help_desk'] = array('rate'=>$value);
      }
    }
}



//// last week check

$sql_count_for_per_questions_help_desk = "select
count( main.answer ) as total,
(
select
  count( answer )
from
  log_simple_questions
join(
    select
      distinct(clients_contact.phone),
      clients_contact.company_id,
      clients_contact.point_of_interaction
    from
      clients_contact
  ) cc on
  cc.phone = phone_number
join company on
  company.id = cc.company_id
  join point_of_interaction poi on poi.id =  cc.point_of_interaction
where
  cc.company_id = $company_id
  and answer <= 6
  and poi.id = poi_main.id
  and log_simple_questions.question_quee = 2 and date( log_simple_questions.created_at )<= date(
		current_date - 7
	)
) as bad,
(
select
  count( answer )
from
  log_simple_questions
join(
    select
      distinct(clients_contact.phone),
      clients_contact.company_id,
      clients_contact.point_of_interaction
    from
      clients_contact
  ) cc on
  cc.phone = phone_number
join company on
  company.id = cc.company_id
  join point_of_interaction poi on poi.id =  cc.point_of_interaction
where
  cc.company_id = $company_id
  and answer >= 9
  and poi.id = poi_main.id
  and log_simple_questions.question_quee = 2

  and date( log_simple_questions.created_at )<= date(
		current_date - 7
	)

) as well,
poi_main.name
from
log_simple_questions main
join(
select
  distinct(clients_contact.phone),
  clients_contact.company_id,
  clients_contact.point_of_interaction
from
  clients_contact
) cc on
cc.phone = main.phone_number
join company on
company.id = cc.company_id
join point_of_interaction poi_main on poi_main.id =  cc.point_of_interaction
where
cc.company_id = $company_id
and main.question_quee = 2
and poi_main.code='help_desk'

and date( main.created_at )<= date(
		current_date - 7
	)

" ;

$CountForQuestion = $conn->query($sql_count_for_per_questions_help_desk);
$help_desk_nps_last_week = array();
if ($CountForQuestion->num_rows > 0) {
    while ($row = $CountForQuestion->fetch_assoc()) {
      if(!empty($row['total'])){
        $value =round((($row['well']*100)/$row['total'])-(($row['bad']*100)/$row['total']),2)."%";
        $help_desk_nps['help_desk'] = array('rate'=>$value);
      }
    }
}




if(empty($help_desk_nps['help_desk']['rate'])) $help_desk_nps['help_desk']['rate']=0;

if(empty($help_desk_nps_last_week['help_desk']['rate'])) $help_desk_nps_last_week['help_desk']['rate']=0;

//help desk week check
$changeStatushelp_desk_nps = $help_desk_nps['help_desk']['rate']<$help_desk_nps_last_week['help_desk']['rate']?1:0;

//product and stage url

$url="";
if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
$url.="&product_id=".$_GET['product_id'];
}

if(isset($_GET['stage_id']) && !empty($_GET['stage_id'])){
$url.="&stage_id=".$_GET['stage_id'];
}




//die;

//echo "<pre>"; print_r($count_for_question_bad);
//die;
//
//echo "<pre>"; print_r($ConnectionDot_arr_lastweek);
//
//die;
?>
