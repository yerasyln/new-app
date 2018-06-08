<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'db.php';

$company_id = !empty($_SESSION['company_id'])? $_SESSION['company_id']: "0";

if(!empty($_POST['start']) && !empty($_POST['end']) && !empty($_POST['question_id']) ){


  $getParam = !empty($_POST['getParam'])? json_decode($_POST['getParam']):"";

    $start = $_POST['start'];
    $end = $_POST['end'];
    $question_id = $_POST['question_id'];


    $filter = "";
    if(!empty($getParam->product_id)){
        $filter = " and cc_sub.product_id = ". $getParam->product_id;
    }

    if(!empty($getParam->stage_id)){
        $filter.= " and cc_sub.stage_id = ". $getParam->stage_id;
    }



    $sql="select
	date(main.created_at) date,
	(select count(*) from log_send_sms
  join (select distinct(clients_contact.phone) ,point_of_interaction, company_id, product_id, stage_id from clients_contact ) cc_sub on
  	cc_sub.phone = log_send_sms.phone_number
   where cc_sub.company_id = $company_id and  (date(created_at)=date(main.created_at)  ) $filter   ) as 'column-1',
	count( main.phone_number ) as 'column-2',
	count( main.phone_number )*100/(select count(*) from log_send_sms
  join (select distinct(clients_contact.phone) ,point_of_interaction, company_id, product_id, stage_id from clients_contact ) cc_sub on
  	cc_sub.phone = log_send_sms.phone_number
   where cc_sub.company_id = $company_id  and (date(created_at)= date(main.created_at)   ) $filter ) as  'column-3'
from
	log_simple_questions main
join (select distinct(clients_contact.phone) ,point_of_interaction, company_id, product_id, stage_id from clients_contact ) cc_sub on
	cc_sub.phone = main.phone_number

where
  cc_sub.company_id = $company_id
  and
	main.question_quee = $question_id
	and date(main.created_at)>= date('$start')
	and date(main.created_at)<= date('$end')
  $filter
group by
	date(main.created_at)
order by
	date(main.created_at)
	";



    $result = $conn->query($sql);

    $result_data_point = array();

if ($result->num_rows > 0) {
		$count=0;
		$day=0;
        foreach ($result as $key => $row) {
            $date = $row['date'];
            $column1 = $row['column-1'];
            $column2 = $row['column-2'];
            $column3 = $row['column-3'];

			if(!empty($column1)){
				$count+=$column1;
				$day+=$column2;
				$result_data_point[] = array(
					'date' => $date,
					'column-1' => (int) $count,
					'column-2' => (int) $day,
					'column-3' => (float) round(($day*100/$count),2)
				);
			}
        }
    } else {
        echo "0 results";
    }


    echo json_encode($result_data_point);
    die;



}
