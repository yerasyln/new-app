<?php
require 'db.php';

$question_id = 0;

$company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']:"0";



if (isset($_GET['question'])) {

    $question_id = $_GET['question'];

    $sql_simple_questions = "SELECT * FROM `simple_questions` WHERE `code` = " . $_GET['question'];

    $result = $conn->query($sql_simple_questions);

    $result_data = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $result_data = $row;
        }
    } else {
        echo "0 results";
    }

    // got simple questions

    $sql_per_year = "call  sp_sred_per_year($question_id) ";

    $result = $conn->query($sql_per_year);

    $total = array();
    if($result){
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $total[$row['id']] = $row;
        }
    } else {
        echo "0 results";
    }
  }
$conn->next_result();


    $array_bad = array();
    $array_good = array();
    $array_well = array();
    foreach ($total as $data) {
        $array_bad[] = $data['sred_bad'];
        $array_good[] = $data['sred_good'];
        $array_well[] = $data['sred_well'];
    }




    $sql_count_for_per_questions = "select
	count( main.answer ) as total,
	(
		select
			count( answer )
		from
			log_simple_questions
                join (select distinct(clients_contact.phone),clients_contact.company_id  from clients_contact ) cc on
			cc.phone = phone_number
		join company on
			company.id = cc.company_id

		where
      cc.company_id = $company_id
      and
			answer <= 6
			and question_quee = main.question_quee

	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions
    join (select distinct(clients_contact.phone),clients_contact.company_id  from clients_contact ) cc on
			cc.phone = phone_number
		join company on
			company.id = cc.company_id
		where
      cc.company_id = $company_id
      and
			answer between 7 and 8
			and question_quee = main.question_quee

	) as good,
	(
		select
			count( answer )
		from
			log_simple_questions
    join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact ) cc on
			cc.phone = phone_number
		join company on
			company.id = cc.company_id
		where
      cc.company_id = $company_id
      and
			answer >= 9
			and question_quee = main.question_quee

	) as well
from
	log_simple_questions main
        join (select distinct(clients_contact.phone),clients_contact.company_id  from clients_contact ) cc on
              cc.phone = main.phone_number
        join company on
              company.id = cc.company_id

where
  cc.company_id = $company_id
  and
	main.question_quee = ".$question_id ;

//  $sql_count_for_per_questions = "select * from clients_contact";


    $CountForQuestion = $conn->query($sql_count_for_per_questions);

  //  echo "<pre>"; print_r($conn); die;

    $count_for_question_bad = array();
    $count_for_question_good = array();
    $count_for_question_well = array();
    $count_for_question_total = array();

    $count_for_question_bad_percentage = 0;
    $count_for_question_good_percentage = 0;
    $count_for_question_well_percentage = 0;



    if ($CountForQuestion->num_rows > 0) {
        while ($row = $CountForQuestion->fetch_assoc()) {
            $count_for_question_bad[] = (int) $row['bad'];
            $count_for_question_good[] = (int) $row['good'];
            $count_for_question_well[] = (int) $row['well'];
            $count_for_question_total[] = (int) $row['total'];

        }
    }
    if(!empty($count_for_question_total[0])){
        $count_for_question_bad_percentage = round(($count_for_question_bad[0] * 100) / $count_for_question_total[0], 2) . "%";
    }else{
        $count_for_question_bad_percentage = 0;
    }
    if(!empty($count_for_question_good[0])){
      $count_for_question_good_percentage = round(($count_for_question_good[0] * 100) / $count_for_question_total[0], 2) . "%";
    }else{
      $count_for_question_good_percentage = 0;
    }

    if(!empty($count_for_question_well[0])){
      $count_for_question_well_percentage = round(($count_for_question_well[0] * 100) / $count_for_question_total[0], 2) . "%";
    }else{
      $count_for_question_well_percentage = 0;
    }




	 $sql = "select
            (
		select
			count(*)
		from
			log_simple_questions l join clients_contact cc on
			cc.phone = l.phone_number join point_of_interaction poi on
			poi.id = cc.point_of_interaction
			where cc.company_id = $company_id and l.question_quee=2 $filter
	) as total,
	count( l.answer ) col,
	poi.name,
        poi.code
from
	log_simple_questions l join clients_contact cc on
	cc.phone = l.phone_number join point_of_interaction poi on
	poi.id = cc.point_of_interaction
	where cc.company_id = $company_id and l.question_quee=2  $filter
group by
	poi.name
	";

      $res = $conn->query($sql);
      $ConnectionDot_arr = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $ConnectionDot_arr[] = $row;
            }
        }



if (!empty($ConnectionDot)) {

    foreach ($ConnectionDot as $data) {

        $ConnectionDot_arr[$data['code']] = array('label' => $data['name'], 'rate' => round((($data['col'] * 100) / $data['total']), 2) . "%");
    }
}




    $sql_response_rate = "select

	count(main.answer) as counter
from
	log_simple_questions main
where
	date(main.created_at)>= date(
		concat( year( now()), '-', '01-01' )
	)
	and date(main.created_at)<= date(
		concat( year( now()), '-', '12-31' )
	)
	and main.answer is not null and main.question_quee = $question_id
	group by month(main.created_at)
    order by date(main.created_at)";


    $response_rate = $conn->query($sql_response_rate);

    $response_rate_arr = array();

    if ($response_rate->num_rows > 0) {

        while ($row = $response_rate->fetch_assoc()) {
            $response_rate_arr[] = (int) $row['counter'];
        }
    }



    $sql_getQuestioin = "select

	count( main.phone_number ) as counter
from
	log_send_sms main
where
	date(main.created_at)>= date(
		concat( year( now()), '-', '01-01' )
	)
	and date(main.created_at)<= date(
		concat( year( now()), '-', '12-31' )
	)
group by
	month(main.created_at)
order by
	date(main.created_at)";
   // echo $sql_getQuestioin; die;
    $question_asked = $conn->query($sql_getQuestioin);

    $question_asked_arr = array();

    if ($question_asked->num_rows > 0) {
        while ($row = $question_asked->fetch_assoc()) {
            $question_asked_arr[] = (int) $row['counter'];
        }
    }


//echo '<pre>'; print_R($question_asked_arr[0]); die;

    $percentage_response_rate = array();

    for( $i=0; $i<=11; $i++){

        if(!empty($question_asked_arr[$i])){
                    if($question_asked_arr[$i]>0){
               $percentage_response_rate[$i]= round((($response_rate_arr[$i]*100)/$question_asked_arr[$i]),2);
               }
        }


    }

 //echo '<pre>'; print_R($percentage_response_rate[0]); die;






    $sql_channel = "select
	main.id,
	count( main.answer ) as total,
	date(main.created_at),
	p.name as channel_title,
    p.code,
	month(
		date(main.created_at)
	) as monthdate
from
	log_simple_questions main
join clients_contact cc on
	cc.phone = main.phone_number
join point_of_interaction p on
	p.id = cc.point_of_interaction
where
	main.question_quee = $question_id

and


date(main.created_at)>= date(
		concat( year( now()), '-', '01-01' )
	)
	and date(main.created_at)<= date(
		concat( year( now()), '-', '12-31' )
	)


group by
	month(
		date(main.created_at)
	),
	p.name
	order by date(main.created_at)
";

    $res_channel = $conn->query($sql_channel);

    $res_channel_arr_call_center_year = array();

    $res_channel_arr_help_desk_year = array();

    $res_channel_arr_office_year = array();

    if ($res_channel) {

        if ($res_channel->num_rows > 0) {

            while ($row = $res_channel->fetch_assoc()) {

                if ($row['code'] == "call-center") {
                    $res_channel_arr_call_center_year[] = $row['total'];
                }
                if ($row['code'] == "help_desk") {
                    $res_channel_arr_help_desk_year[] = $row['total'];
                }
                if ($row['code'] == "office") {
                    $res_channel_arr_office_year[] = $row['total'];
                }

            }
        }
    }

//     echo "<pre>"; print_r($res_channel_arr_call_center_year);
//     echo "<pre>"; print_r($res_channel_arr_help_desk_year);
//     echo "<pre>"; print_r($res_channel_arr_office_year); die;
}

if (!empty($_POST['start']) && !empty($_POST['end'])){



    $start = $_POST['start'];
    $end = $_POST['end'];


    $sql="  select

		(
			select
				count( answer )
			from
				log_simple_questions
	                join (select distinct(clients_contact.phone),clients_contact.company_id  from clients_contact ) cc on
				cc.phone = phone_number
			join company on
				company.id = cc.company_id
			join map_ref on
				map_ref.id = company.region
			where
        cc.company_id = $company_id
        and
				answer <= 6
				and question_quee = main.question_quee
	                        and mm.id = map_ref.id
	                           and date(main.created_at) = date(created_at)
		) as bad,
		(
			select
				count( answer )
			from
				log_simple_questions

	                join (select distinct(clients_contact.phone),clients_contact.company_id  from clients_contact ) cc on
				cc.phone = phone_number
			join company on
				company.id = cc.company_id
			join map_ref on
				map_ref.id = company.region

			where
        cc.company_id = $company_id
        and
				answer between 7 and 8
				and question_quee = main.question_quee
	                        and mm.id = map_ref.id
	                           and date(main.created_at) = date(created_at)
		) as good,
		(
			select
				count( answer )
			from
				log_simple_questions
	                join (select distinct(clients_contact.phone),clients_contact.company_id  from clients_contact ) cc on
				cc.phone = phone_number
			join company on
				company.id = cc.company_id
			join map_ref on
				map_ref.id = company.region

			where
        cc.company_id = $company_id
        and
				answer >= 9
				and question_quee = main.question_quee
	                        and mm.id = map_ref.id
	                   and date(main.created_at) = date(created_at)
		) as well,
		date(main.created_at) as date
		from
		log_simple_questions main
	        join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact ) cc on
	              cc.phone = main.phone_number
	        join company on
	              company.id = cc.company_id
	        join map_ref mm on
	              mm.id = company.region
	where
          cc.company_id = $company_id
          and
		      main.question_quee = 2

                and
                (date(main.created_at) >= date('$start')
                    and date(main.created_at) <= date('$end')
                )


	group by date(main.created_at)	";




    $queryNPS = $conn->query($sql);

    $queryNPS_arr = array();

    if($queryNPS){
        if($queryNPS->num_rows>0){
            while($row = $queryNPS->fetch_assoc()){
                $queryNPS_arr[]  = $row;
            }
        }
    }


    echo json_encode($queryNPS_arr);
    die;




}

?>
