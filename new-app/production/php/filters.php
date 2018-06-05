<?php
if(!isset($_SESSION))
   {
       session_start();
   }
require_once 'Connection.php';

class filters extends Connection {

  //var  $company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']:"";

    function getPoint_of_interaction() {
        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from point_of_interaction");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getCheckTitle() {
        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from checktitle");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getProduct() {
        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from product");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getChannel() {
        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from channel");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getCSAT_ref() {
        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from csat_ref");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getNPS_ref() {
        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from nps_ref");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getGender() {
        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from gender");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getNPS_id($id) {
        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from nps_ref where id  = " . $id);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getFiltrNPS_id($id) {

        $result = array();
        $final_arr = array();
        $result = $this->db->query("select * from nps_ref where id in($id)");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $final_arr[] = $row;
            }
        }

        return $final_arr;
    }

    function getBadData() {
        return "select
	count( answer ) as total,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer <= 6
			and question_quee = 1
	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer between 7 and 8
			and question_quee = 1
			and cc_sub.id = 0
	) as good,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer >= 9
			and question_quee = 1
			and cc_sub.id = 0
	) as well,
	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer <= 6 and question_quee = 1 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as bad_rate,
	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 1 and cc_sub.id = 0 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as good_rate,
	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer >= 9 and question_quee = 1 and cc_sub.id = 0 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as well_rate
from
	log_simple_questions main
join clients_contact cc on
	cc.phone = main.phone_number
where
	main.question_quee = 1
	and main.answer <= 6";
    }

    function getGoodData() {
        return "select
	count( answer ) as total,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer <= 6
			and question_quee = 1
			and cc_sub.id = 0
	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer between 7 and 8
			and question_quee = 1

	) as good ,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer >= 9
			and question_quee = 1
			and cc_sub.id = 0
	) as well,
	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer <= 6 and question_quee = 1 and cc_sub.id = 0 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as bad_rate,

	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 1 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as good_rate,

	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer >= 9 and question_quee = 1 and cc_sub.id = 0 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as well_rate


	from
	log_simple_questions main
join clients_contact cc on
	cc.phone = main.phone_number
where
	main.question_quee = 1
	and main.answer between 7 and 8";
    }

    function getWellData() {
        return "select
	count( answer ) as total,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer <= 6
			and question_quee = 1
			and cc_sub.id = 0
	) as bad,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer between 7 and 8
			and question_quee = 1
			and cc_sub.id = 0
	) as good,
	(
		select
			count( answer )
		from
			log_simple_questions
		join clients_contact cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer >= 9
			and question_quee = 1
	) as well,
	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer <= 6 and question_quee = 1 and cc_sub.id = 0 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as bad_rate,
	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 1 and cc_sub.id = 0 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as good_rate,
	concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 1 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as well_rate
from
	log_simple_questions main
join clients_contact cc on
	cc.phone = main.phone_number
where
	main.question_quee = 1
	and main.answer >= 9";
    }

    function getMultipleData($code) {

        if ($code == 'good,bad') {
            //echo 'good,bad';die;
            return "SELECT
    COUNT(answer) AS total,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer <= 6 and question_quee = 1) as bad,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer between 7 and 8 and question_quee = 1) as good,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer >= 9 and question_quee = 1 and cc_sub.id = 0) as well,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer <= 6 and question_quee = 1 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as bad_rate,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 1  )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as good_rate,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer >=9 and question_quee = 1 and cc_sub.id = 0 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as well_rate

FROM
    log_simple_questions main
join clients_contact cc on
	cc.phone = main.phone_number
where main.question_quee = 1 and main.answer in (1,2,3,4,5,6,7,8)";
        } elseif ($code == 'well,good') {
            // echo 'well,good';die;
            return "SELECT
    COUNT(answer) AS total,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer <= 6 and question_quee = 1 and cc_sub.id = 0) as bad,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer between 7 and 8 and question_quee = 1) as good,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer >= 9 and question_quee = 1) as well,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer <= 6 and question_quee = 1 and cc_sub.id = 0 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as bad_rate,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 1  )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as good_rate,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer >=9 and question_quee = 1)* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as well_rate
FROM
    log_simple_questions main
join clients_contact cc on
	cc.phone = main.phone_number
where main.question_quee = 1 and main.answer in (7,8,9,10)";
        } elseif ($code = 'well,bad') {
            return "SELECT
    COUNT(answer) AS total,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer <= 6 and question_quee = 1 ) as bad,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer between 7 and 8 and question_quee = 1 and cc_sub.id = 0) as good,
(select count( answer ) from log_simple_questions
join clients_contact cc_sub on	cc_sub.phone = log_simple_questions.phone_number where	answer >= 9 and question_quee = 1) as well,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer <= 6 and question_quee = 1 )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as bad_rate,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 1 and cc_sub.id = 0  )* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as good_rate,
concat( round(((( select count( answer ) from log_simple_questions join clients_contact cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer >=9 and question_quee = 1)* 100 )/( select count(*) from `log_simple_questions` where question_quee = 1 )), 2 ), '' ) as well_rate
FROM
    log_simple_questions main
join clients_contact cc on
	cc.phone = main.phone_number
where main.question_quee = 1 and main.answer in (1,2,3,4,5,6,9,10)";
        }
    }

    function getMapData($company_id) {
        $sql = "SELECT
  	main.phone_number,
    mm_main.code,
	
	(
    SELECT
        COUNT(answer)
    FROM
        log_simple_questions
    JOIN
        (
        SELECT DISTINCT
            (clients_contact.phone),
            clients_contact.company_id,
            clients_contact.point_of_interaction
        FROM
            clients_contact
    ) cc
ON
    cc.phone = phone_number
JOIN
    company
ON
    company.id = cc.company_id

WHERE
    cc.company_id = $company_id AND  log_simple_questions.question_quee = 2
) AS total,

    (
    SELECT
        COUNT(answer)
    FROM
        log_simple_questions
    JOIN
        (
        SELECT DISTINCT
            (clients_contact.phone),
            clients_contact.company_id,
            clients_contact.point_of_interaction
        FROM
            clients_contact
    ) cc
ON
    cc.phone = phone_number
JOIN
    company
ON
    company.id = cc.company_id
JOIN
    map_ref mm
ON
    mm.id = company.region
WHERE
    cc.company_id = $company_id and mm.id=mm_main.id AND answer <= 6 AND log_simple_questions.question_quee = 2
) AS bad,
(
SELECT
    COUNT(answer)
FROM
    log_simple_questions
JOIN
    (
    SELECT DISTINCT
        (clients_contact.phone),
        clients_contact.company_id,
        clients_contact.point_of_interaction
    FROM
        clients_contact
) cc
ON
    cc.phone = phone_number
JOIN
    company
ON
    company.id = cc.company_id
    
JOIN
    map_ref mm
ON
    mm.id = company.region    
    
WHERE
    cc.company_id = $company_id AND mm.id=mm_main.id AND answer >= 9 AND log_simple_questions.question_quee = 2
) AS well
FROM
    log_simple_questions main
JOIN
    (
    SELECT DISTINCT
        (clients_contact.phone),
        clients_contact.company_id
    FROM
        clients_contact
) cc
ON
    cc.phone = main.phone_number
JOIN
    company
ON
    company.id = cc.company_id
JOIN
    map_ref mm_main
ON
    mm_main.id = company.region
WHERE
    cc.company_id = $company_id AND main.question_quee = 2";
        $res = $this->db->query($sql);
        $total_res = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
				$nps = (($row['well']*100)/$row['total'])-(($row['bad']*100)/$row['total']);
					
                $total_res[$row['code']] = array('code'=>$row['code'], 'number'=>$nps);
            }
        }
//	echo "<pre>"; print_r($total_res); die;
        return $total_res;
    }

    function getMapData_ref() {
        $sql = "select  * from map_ref where code <>'kz-5085'";
        $res = $this->db->query($sql);
        $total_res = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $total_res[] = $row;
            }
        }

        return $total_res;
    }

    function getDataForConnectionDot($lastWeek=false,$filter, $company_id) {


       if($lastWeek==1){
            $filter1="and date( l.created_at )<= date(
		current_date - 7
	) ";
        }else {
            $filter1="";
        }


        $sql = "select
            (
		select
			count(*)
		from
			log_send_sms l join clients_contact cc on
			cc.phone = l.phone_number join point_of_interaction poi on
			poi.id = cc.point_of_interaction
			where cc.company_id = $company_id and  l.question_quee=2 $filter1 $filter
	) as total,
	count( l.answer ) col,
	poi.name,
        poi.code
from
	log_simple_questions l join clients_contact cc on
	cc.phone = l.phone_number join point_of_interaction poi on
	poi.id = cc.point_of_interaction
	where cc.company_id = $company_id and  l.question_quee=2  $filter1 $filter
group by
	poi.name
	";
	

        $res = $this->db->query($sql);
        $total_res = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $total_res[] = $row;
            }
        }

        return $total_res;
    }

    function getTotalCSAT($filter, $company_id) {

        $sql = "


		select
        round(sum(main.answer)/count( main.answer ),2) as arif,

	(
		select
			 round(sum(main.answer)/count( main.answer ),2) as last_arif
		from
			log_simple_questions main join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,
    clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id from clients_contact ) cc on
			cc.phone = phone_number
		where
			question_quee = 1
      and
      cc.company_id = $company_id
			and date( created_at )<= date(
				current_date - 7
			)
	) as lastweek,
	if(
		count( main.answer )<(
			select
				count( main.phone_number ) total
			from
				log_simple_questions main join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,
    clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id from clients_contact ) cc on
				cc.phone = phone_number
			where
				question_quee = 1
        and   cc.company_id = $company_id
				and date( created_at )<= date(
					current_date - 7
				)
		),
		1,
		0
	) as change_status
from
	log_simple_questions main join (select distinct(clients_contact.phone),checktitle,clients_contact.sex,clients_contact.channel,clients_contact.point_of_interaction,
    clients_contact.avgcheck,clients_contact.servicetime,clients_contact.product,clients_contact.duration_of_service,clients_contact.transactions,clients_contact.age, clients_contact.company_id from clients_contact ) cc on
	cc.phone = main.phone_number
where
	main.question_quee = 1
  and cc.company_id = $company_id
		$filter
	";



        $res = $this->db->query($sql);
        $total_res = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $total_res[] = $row;
            }
        }

        return $total_res;
    }

    function getTotalNPS_lastWeek($company_id) {

        $filter_sub = " and date( created_at )<= date(
		current_date - 7
	) ";



        $sql = "select
	count( answer ) as total,
	(
		select
			count( answer )
		from
			log_simple_questions
		join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact ) cc_sub on
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
		join (select distinct(clients_contact.phone) , clients_contact.company_id from clients_contact ) cc_sub on
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
		join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact ) cc_sub on
			cc_sub.phone = log_simple_questions.phone_number
		where
			answer >= 9
			and question_quee = 2
      and cc_sub.company_id = $company_id
			$filter_sub
	) as well,
	concat( round(((( select count( answer ) from log_simple_questions join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact ) cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer <= 6 and question_quee = 2 and cc_sub.company_id=$company_id $filter_sub )* 100 )/( select count(*) from `log_simple_questions` join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact ) cc_sub_down on cc_sub_down.phone = log_simple_questions.phone_number where question_quee = 2 and cc_sub_down.company_id = $company_id  $filter_sub )), 2 ), '' ) as bad_rate,
	concat( round(((( select count( answer ) from log_simple_questions join (select distinct(clients_contact.phone), clients_contact.company_id from clients_contact ) cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer between 7 and 8 and question_quee = 2 and cc_sub.company_id=$company_id $filter_sub )* 100 )/( select count(*) from `log_simple_questions` join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact ) cc_sub_down on cc_sub_down.phone = log_simple_questions.phone_number where question_quee = 2 and cc_sub_down.company_id = $company_id   $filter_sub )), 2 ), '' ) as good_rate,
	concat( round(((( select count( answer ) from log_simple_questions join (select distinct(clients_contact.phone), clients_contact.company_id from clients_contact ) cc_sub on cc_sub.phone = log_simple_questions.phone_number where answer >= 9 and question_quee = 2 and cc_sub.company_id=$company_id $filter_sub )* 100 )/( select count(*) from `log_simple_questions` join (select distinct(clients_contact.phone), clients_contact.company_id  from clients_contact ) cc_sub_down on cc_sub_down.phone = log_simple_questions.phone_number where question_quee = 2 and cc_sub_down.company_id = $company_id   $filter_sub )), 2 ), '' ) as well_rate
from
	log_simple_questions main
join (select distinct(clients_contact.phone), clients_contact.company_id from clients_contact ) cc on
	cc.phone = main.phone_number
where
	main.question_quee = 2
  and cc.company_id = $company_id
	" . $filter_sub;


        $result = $this->db->query($sql);

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

        return $result_data_well['well_rate'] - $result_data_bad['bad_rate'];
    }

    function getAllASkedpeople($company_id,$lastweek = false) {

        if ($lastweek == 1) {
            $filter_sub = " where date( created_at )<= date(
		current_date - 7
	) ";
        } else {
            $filter_sub = " where 1=1";
        }

        $sql = "select  count(*) all_asked from log_send_sms join( select distinct( clients_contact.phone ), clients_contact.company_id from clients_contact ) cc_sub_down on cc_sub_down.phone = log_send_sms.phone_number   $filter_sub and cc_sub_down.company_id = $company_id";
//echo $sql; die;
        $res = $this->db->query($sql);
        $total_res = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $total_res[] = $row;
            }
        }

        return $total_res;
    }



    function getTotalRespondRate($lastWeek = false,$filter, $company_id){


         if ($lastWeek == 1) {
            $filter_sub = " and date( created_at )<= date(
		current_date - 7
	) ";
        } else {
            $filter_sub = "";
        }

        $sql="select
	count(*) responded,
	(
		select
			count(*)
		from
			log_send_sms
join (select distinct(clients_contact.phone), clients_contact.company_id from clients_contact) cc_sub on
cc_sub.phone = log_send_sms.phone_number
                where  cc_sub.company_id = $company_id
                $filter_sub
	) total
from
	log_send_sms main

  join (select distinct(clients_contact.phone), clients_contact.company_id from clients_contact) cc on
  cc.phone = main.phone_number
where
	main.phone_number  in(
		select
			phone_number
		from
			log_simple_questions
        left join clients_contact cc on cc.phone = log_simple_questions.phone_number
        where
         cc.company_id = $company_id
        $filter
	)
and cc.company_id = $company_id
  $filter_sub";

//  echo $sql; die;
        $res = $this->db->query($sql);
        $total_res = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $total_res[] = $row;
            }
        }


        $final = 0;

        if(!empty($total_res[0]['responded'])){
            $final =  round(($total_res[0]['responded']*100)/$total_res[0]['total'],2)."%";
        }

        return $final;


    }

}
