<?php
require 'db.php';

$company_id = $_SESSION['company_id']? $_SESSION['company_id']: "";


if (isset($_GET['question'])) {

    $question_quee = $_GET['question'];



    $result_data=array();

    $sql_get_questions = "select * from simple_questions where code=".$question_quee;

    $res = $conn->query($sql_get_questions);
    if($res){
        if($res->num_rows>0){
            while($row=$res->fetch_assoc()){
                $result_data[]=$row;
            }
        }
    }


   // echo "<pre>"; print_r($result_data); die;




    $sql = "select
count(main.answer) total,
	(select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number  where cc.company_id = $company_id and question_quee=main.question_quee and answer=1) very_bad,
	(select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and  question_quee=main.question_quee and answer=2) bad,
	(select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and question_quee=main.question_quee and answer=3) dont_know,
	(select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and question_quee=main.question_quee and answer=4) good,
	(select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and question_quee=main.question_quee and answer=5) very_good,


	round(((select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and question_quee=main.question_quee and answer=1)*100)/count(main.answer),2) very_bad_rate,
	round(((select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and question_quee=main.question_quee and answer=2)*100)/count(main.answer),2) bad_rate,
	round(((select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and question_quee=main.question_quee and answer=3)*100)/count(main.answer),2) dont_know_rate,
	round(((select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and question_quee=main.question_quee and answer=4)*100)/count(main.answer),2) good_rate,
	round(((select count(answer) from log_simple_questions join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = log_simple_questions.phone_number where cc.company_id = $company_id and question_quee=main.question_quee and answer=5)*100)/count(main.answer),2) very_good_rate


from
	log_simple_questions main
	join (select distinct(clients_contact.phone), company_id from clients_contact ) cc on cc.phone = main.phone_number
where
  cc.company_id = $company_id
  and
	main.question_quee = $question_quee

 ";


   $bar_data = $conn->query($sql);

    $bar_very_bad_arr=array();
    $bar_bad_arr=array();
    $bar_dont_know_arr=array();
    $bar_good_arr=array();
    $bar_very_good_arr=array();


	    $bar_very_bad_rate=array();
    $bar_bad_rate=array();
    $bar_dont_know_rate=array();
    $bar_good_rate=array();
    $bar_very_good_rate=array();


    if($bar_data){

        if($bar_data->num_rows>0){

            while($row=$bar_data->fetch_assoc()){

                $bar_very_bad_arr = $row['very_bad'];
                $bar_bad_arr = $row['bad'];
                $bar_dont_know_arr = $row['dont_know'];
                $bar_good_arr = $row['good'];
                $bar_very_good_arr = $row['very_good'];



				    $bar_very_bad_rate = $row['very_bad_rate'];
                $bar_bad_rate = $row['bad_rate'];
                $bar_dont_know_rate = $row['dont_know_rate'];
                $bar_good_rate = $row['good_rate'];
                $bar_very_good_rate = $row['very_good_rate'];



            }

        }

    }



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
join (select distinct(clients_contact.phone) ,point_of_interaction from clients_contact ) cc on cc.phone = main.phone_number
join point_of_interaction p on
	p.id = cc.point_of_interaction
where
	main.question_quee = $question_quee

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




    $sql_sred = "
select

(
		select
			count(phone_number)
		from
			log_send_sms
      join (select distinct(clients_contact.phone), clients_contact.company_id   from clients_contact ) cc on cc.phone = phone_number
      where cc.company_id = $company_id
	) as not_responde,

	round(sum(answer)/count(answer),2) as arif,
	count(answer) as col

from
	log_simple_questions
	 join (select distinct(clients_contact.phone), clients_contact.company_id   from clients_contact ) cc on cc.phone = phone_number
where
  cc.company_id = $company_id
  and
	question_quee =$question_quee
	";



    $sred_data = $conn->query($sql_sred);
    $sred_data_arr = array();
    if($sred_data){
        if($sred_data->num_rows>0){
            while($row = $sred_data->fetch_assoc()){
              if(!empty($row['not_responde'])){
				        $response_rate = round(($row['col'] * 100)/$row['not_responde'],2);
                $sred_data_arr[] = array('arif'=>$row['arif'],'col'=>$row['col'],'resp'=>$response_rate);
              }
            }

        }

   }








   ////Техподдержка

   $sql_sred_teck = "


select
    (
		select
			count(phone_number)
		from
			log_send_sms
      join (select distinct(clients_contact.phone) ,point_of_interaction, company_id from clients_contact ) cc on
      	cc.phone = log_send_sms.phone_number
        where
          cc.company_id = $company_id
	) as not_responde,

	sum( main.answer ),
	round( sum( main.answer )/ count( main.answer ), 2 ) as arif,
	count( main.answer ) as col

from
	log_simple_questions main
join (select distinct(clients_contact.phone) ,point_of_interaction, company_id from clients_contact ) cc on
	cc.phone = main.phone_number
join point_of_interaction poi on
	poi.id = cc.point_of_interaction
where
  cc.company_id = $company_id
  and
	main.question_quee = $question_quee
	and cc.point_of_interaction =(
		select
			id
		from
			point_of_interaction
		where
			code = 'help_desk'
	)

";

   //echo $sql_sred_teck; die;

   $sred_data_help_desc = $conn->query($sql_sred_teck);
   $sred_data_help_desc_arr = array();
   if($sred_data_help_desc){

       if($sred_data_help_desc->num_rows>0){

           while($row = $sred_data_help_desc->fetch_assoc()){
             if(!empty($response_rate)){
                    $response_rate = round(($row['col'] * 100)/$row['not_responde'],2);
                    $sred_data_help_desc_arr[] = array('arif'=>$row['arif'],'col'=>$row['col'],'resp'=>$response_rate);
              }
           }

       }

   }



   ////CallCenter

   $sql_sred_call_center = "
select

	 (
		select
			count(phone_number)
		from
			log_send_sms
      join (select distinct(clients_contact.phone) ,point_of_interaction, company_id from clients_contact ) cc on
      	cc.phone = log_send_sms.phone_number
      where cc.company_id = $company_id
	) as not_responde,

	sum( main.answer ),
	round( sum( main.answer )/ count( main.answer ), 2 ) as arif,
	count( main.answer ) as col

from
	log_simple_questions main
join (select distinct(clients_contact.phone) ,point_of_interaction, company_id from clients_contact ) cc on
	cc.phone = main.phone_number
join point_of_interaction poi on
	poi.id = cc.point_of_interaction
where
  cc.company_id = $company_id
  and
	main.question_quee = $question_quee
	and cc.point_of_interaction =(
		select
			id
		from
			point_of_interaction
		where
			code = 'call-center'
	)
	";

   //echo $sql_sred_call_center; die;

   $sred_data_call = $conn->query($sql_sred_call_center);
   $sred_data_call_arr = array();
   if($sred_data_call){

       if($sred_data_call->num_rows>0){

           while($row = $sred_data_call->fetch_assoc()){
             if(!empty($row['not_responde'])){
        		   $response_rate = round(($row['col'] * 100)/$row['not_responde'],2);

               $sred_data_call_arr[] = array('arif'=>$row['arif'],'col'=>$row['col'],'resp'=>$response_rate);
             }
           }

       }

   }





   //office

   $sql_sred_office = "
select


 (
		select
			count(phone_number)
		from
			log_send_sms
      join (select distinct(clients_contact.phone) ,point_of_interaction, company_id from clients_contact ) cc on
      	cc.phone = log_send_sms.phone_number
where cc.company_id = $company_id
	) as not_responde,
	sum( main.answer ),
	round( sum( main.answer )/ count( main.answer ), 2 ) as arif,
	count( main.answer ) as col
from
	log_simple_questions main
join (select distinct(clients_contact.phone) ,point_of_interaction, company_id from clients_contact ) cc on
	cc.phone = main.phone_number
join point_of_interaction poi on
	poi.id = cc.point_of_interaction
where
  cc.company_id = $company_id
  and
	main.question_quee = $question_quee
	and cc.point_of_interaction =(
		select
			id
		from
			point_of_interaction
		where
			code = 'office'
	)
	";

   //echo $sql_sred_office; die;

   $sred_data_office = $conn->query($sql_sred_office);
   $sred_data_office_arr = array();
   if($sred_data_office){

       if($sred_data_office->num_rows>0){

           while($row = $sred_data_office->fetch_assoc()){
             if(!empty($row['not_responde'])){
		           $response_rate = round(($row['col'] * 100)/$row['not_responde'],2);
               $sred_data_office_arr[] = array('arif'=>$row['arif'],'col'=>$row['col'],'resp'=>$response_rate);
             }
           }

       }

   }


  // echo "<pre>"; print_r( $sred_data_office_arr); die;


   //  response dashbord




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
	and main.answer is not null and main.question_quee = $question_quee
	group by month(main.created_at)
    order by date(main.created_at)";



   $response_rate = $conn->query($sql_response_rate);

   $response_rate_arr = array();

   if ($response_rate->num_rows > 0) {

       while ($row = $response_rate->fetch_assoc()) {
           $response_rate_arr[] = (int) $row['counter'];
       }
   }

   $response_rate->close();
   $conn->next_result();

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


//   / echo "<pre>"; print_r($sred_data_help_desc_arr); die;


      $sql_get_answers_options = "select
	id,
	title,
	(
		select
			count( log_simple_questions.answer )
		from
			log_simple_questions
		join(
				select
					distinct(clients_contact.phone),
					company_id
				from
					clients_contact
			) cc on
			cc.phone = log_simple_questions.phone_number
		join answers_options ao on
			ao.code = log_simple_questions.answer
			and ao.question_id = log_simple_questions.question_id
		where
			cc.company_id = $company_id
			and log_simple_questions.question_quee = $question_quee
			and ao.id = answers_options.id
	) as counter,
	(
		select
			count( log_simple_questions.answer )
		from
			log_simple_questions
		join(
				select
					distinct(clients_contact.phone),
					company_id
				from
					clients_contact
			) cc on
			cc.phone = log_simple_questions.phone_number
		where
			cc.company_id = $company_id
			and log_simple_questions.question_quee = $question_quee
	) total
from
	answers_options
where
	question_id =(
		select
			id
		from
			simple_questions
		where
			simple_questions.company_id = $company_id
			and simple_questions.code = $question_quee
	)";

      $result = $conn->query($sql_get_answers_options);

      $data_detail_answer_option_arr = array();
      if($result){
          if($result->num_rows>0){
              while($row = $result->fetch_assoc()){
                  $data_detail_answer_option_arr[] = array('title'=>$row['title'], 'counter'=>$row['counter'], 'total'=>$row['total'], 'rate'=>($row['counter']*100)/$row['total']."%");
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

      

}




if(!empty($_POST['start']) && !empty($_POST['end'])){

    $start = $_POST['start'];
    $end = $_POST['end'];

  $sql="select
	date(main.created_at) date,
	count( case when p.code = 'call-center' then p.name end ) as 'column-1',
	count( case when p.code = 'help_desk' then p.name end ) as 'column-2',
	count( case when p.code = 'office' then p.name end ) as 'column-3'
from
	log_simple_questions main
join (select distinct(clients_contact.phone) ,point_of_interaction, company_id from clients_contact ) cc on
	cc.phone = main.phone_number
join point_of_interaction p on
	p.id = cc.point_of_interaction
where
  cc.company_id = $company_id
  and
	main.question_quee = 1
	and date(main.created_at)>= date('$start')
	and date(main.created_at)<= date('$end')
group by
	date(main.created_at)
order by
	date(main.created_at)
	";

//echo $sql; die;


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
        echo "0 results";
    }



    echo json_encode($result_data_point);
    die;



}
