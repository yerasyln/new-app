<?php
require 'db.php';

$company_id = !empty($_SESSION['company_id'])? $_SESSION['company_id']: "0";

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

    // /// get answers

    $sql_simple_questions = "select
	aa.id as param,
    aa.title as label ,
	  count( main.answer ) as value,
    concat(round((count( main.answer )/(select count(*) from log_simple_questions ll
    join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact) cc_sub on
    cc_sub.phone = ll.phone_number
    where cc_sub.company_id = $company_id and  ll.question_quee = main.question_quee) * 100),2),'%') as rate
from
	log_simple_questions main
  join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact) cc on
  cc.phone = main.phone_number
join answers_options aa on
	aa.question_id = main.question_id
	and aa.code = main.answer
where
  cc.company_id = $company_id
  and
	main.question_quee = $question_id
group by
	aa.title
 " ;

    $result = $conn->query($sql_simple_questions);

    $result_answers = array();
if(!empty($result)){
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $value = (int) $row['value'];
            $result_answers[] =array('label'=> $row['label'],'value'=>$value, 'rate'=>$row['rate'],'param'=>$row['param']);

        }
    } else {
      //  echo "0 results"; 
    }
  }

    //get statistic data


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
	 and main.question_quee = $question_id
	group by month(main.created_at)
    order by date(main.created_at)";



    $response_rate = $conn->query($sql_response_rate);

    $response_rate_arr = array();

    if ($response_rate->num_rows > 0) {

        while ($row = $response_rate->fetch_assoc()) {
            $response_rate_arr[] = (int) $row['counter'];
        }
    }

//$response_rate->close();
  //  $conn->next_result();



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

    $question_asked = $conn->query($sql_getQuestioin);

    $question_asked_arr = array();

    if ($question_asked->num_rows > 0) {
        while ($row = $question_asked->fetch_assoc()) {
            $question_asked_arr[] = (int) $row['counter'];
        }
    }


    $percentage_response_rate = array();
    for( $i=0; $i<=count($response_rate_arr); $i++){
        if(isset($response_rate_arr[$i]) && isset($question_asked_arr[$i]) ){
            $percentage_response_rate[$i]= round((($response_rate_arr[$i]*100)/$question_asked_arr[$i]),2);
        }
    }



   // echo "<pre>"; print_r($statisticDataArray); die;



}
