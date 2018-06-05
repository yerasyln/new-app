<?php

require 'db.php';
$company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']:"";

if(isset($_GET['reqion_id']) && !empty($_GET['reqion_id'])){
    
    $reqion_id = $_GET['reqion_id'];
    
    $dataReqion_query = $conn->query("select  * from map_ref where id = ".$reqion_id); 
    $dataReqion_arr = array();
    
    if($dataReqion_query){
       if($dataReqion_query->num_rows>0){
           while($row = $dataReqion_query->fetch_assoc()){
             $dataReqion_arr = $row;  
           }
       } 
    }
    
  //  echo "<pre>"; print_r($dataReqion_arr); die;
    
    
    $sql_count_for_per_questions = "SELECT
    COUNT(main.answer) AS total,
    (
    SELECT
        COUNT(answer)
    FROM
        log_simple_questions
    JOIN
        (
        SELECT DISTINCT
            (clients_contact.phone),
            clients_contact.company_id
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
    map_ref
ON
    map_ref.id = company.region
WHERE
    answer <= 6 AND question_quee = main.question_quee AND mm.id = map_ref.id AND company.id = main_company.id
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
        clients_contact.company_id
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
    map_ref
ON
    map_ref.id = company.region
WHERE
    answer BETWEEN 7 AND 8 AND question_quee = main.question_quee AND mm.id = map_ref.id AND company.id = main_company.id
) AS good,
(
SELECT
    COUNT(answer)
FROM
    log_simple_questions
JOIN
    (
    SELECT DISTINCT
        (clients_contact.phone),
        clients_contact.company_id
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
    map_ref
ON
    map_ref.id = company.region
WHERE
    answer >= 9 AND question_quee = main.question_quee AND mm.id = map_ref.id AND company.id = main_company.id
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
    company AS main_company
ON
    main_company.id = cc.company_id
JOIN
    map_ref mm
ON
    mm.id = main_company.region
WHERE
    mm.id = $reqion_id AND main.question_quee = 2 AND main_company.id = $company_id";
    
	
	//echo $sql_count_for_per_questions; die;
    $CountForQuestion = $conn->query($sql_count_for_per_questions);
    
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
    
    $count_for_question_bad_percentage = round(($count_for_question_bad[0] * 100) / $count_for_question_total[0], 2) . "%";
    
    $count_for_question_good_percentage = round(($count_for_question_good[0] * 100) / $count_for_question_total[0], 2) . "%";
    
    $count_for_question_well_percentage = round(($count_for_question_well[0] * 100) / $count_for_question_total[0], 2) . "%";
    
    $totalByRegion = round($count_for_question_well_percentage - $count_for_question_bad_percentage,2) ;
    
    
    
    
    /// nps dinamyc
    
    $sql="

    select
	count(main.answer) as total,
	count( case when main.answer = 1 then main.answer end ) as 'very bad',
	count( case when main.answer = 2 then main.answer end ) as 'bad',
	count( case when main.answer = 3 then main.answer end ) as 'dont_know',
	count( case when main.answer = 4 then main.answer end ) as 'good',
	count( case when main.answer = 5 then main.answer end ) as 'very_good'
from
	log_simple_questions main
join (select distinct(clients_contact.phone) ,company_id from clients_contact ) cc on
	cc.phone = main.phone_number
	join company on company.id = cc.company_id
	join map_ref mm on mm.id = company.region 
	
where
	main.question_quee = 1
	and mm.id=$reqion_id
	and company.id = $company_id
";
    
   $csatData = $conn->query($sql);
   $csatArr = array();
   
   $bar_very_bad_value=array();
   $bar_bad_value=array();
   $bar_dont_know_value=array();
   $bar_good_value=array();
   $bar_very_good_value=array();
   
   
   $bar_very_bad_rate=array();
   $bar_bad_rate=array();
   $bar_dont_know_rate=array();
   $bar_good_rate=array();
   $bar_very_good_rate=array();
   
   $totalCSATBYregion = array();
   
    if($csatData){
        if($csatData->num_rows>0){
            while($row = $csatData->fetch_assoc()){
              
               $very_bad_rate =  round(($row['very bad']*100)/$row['total'],2)." %";
               $bad_rate =  round(($row['bad']*100)/$row['total'],2)." %";
               $dont_know_rate =  round(($row['dont_know']*100)/$row['total'],2)." %";
               $good_rate =  round(($row['good']*100)/$row['total'],2)." %";
               $very_good_rate =  round(($row['very_good']*100)/$row['total'],2)." %";
                
               
               $bar_very_bad_value =  $row['very bad'];
               $bar_very_bad_rate = $very_bad_rate;
               
               $bar_bad_value = $row['bad'];
               $bar_bad_rate = $bad_rate;
               
               $bar_dont_know_value = $row['dont_know'];
               $bar_dont_know_rate = $dont_know_rate;
               
               $bar_good_value = $row['good'];
               $bar_good_rate = $good_rate;
               
               $bar_very_good_value = $row['very_good'];
               $bar_very_good_rate = $very_good_rate;
               
               
               $totalCSATBYregion[] = $row['total'];
            
           }
       } 
    }
    
   
 ////// totall csat by region
 
    
    $queryCsat = $conn->query("select
	round( sum( main.answer )/ count( main.answer ), 2 ) as arif
from
	log_simple_questions main
join(
		select
			distinct(clients_contact.phone),
			company_id
		from
			clients_contact
	) cc on
	cc.phone = main.phone_number
join company on
	company.id = cc.company_id
join map_ref mm on
	mm.id = company.region
where
	main.question_quee = 1
	and company.id = $company_id
	and mm.id = $reqion_id");
    
    $csatbyregiond_arr=array();
    if($queryCsat){
        if($queryCsat->num_rows>0){
            while($row = $queryCsat->fetch_assoc()){
                $csatbyregiond_arr[] = $row;
            }
        }
    }
    
   // echo "<pre>"; print_r($csatbyregiond_arr); die;
     
}






if(!empty($_POST['start']) && !empty($_POST['end']) && !empty($_POST['region_id'])){
    
        
        
    $region_id = isset($_POST['region_id'])?$_POST['region_id']:"";
        
        
        $start = $_POST['start'];
        $end = $_POST['end'];
        
        
        
        $sql="select
	date(main.created_at) date,
	count( case when main.answer = 1 then main.answer end ) as 'very_bad',
		count( case when main.answer = 2 then main.answer end ) as 'bad',
			count( case when main.answer = 3 then main.answer end ) as 'dont_know',
				count( case when main.answer = 4 then main.answer end ) as 'good',
					count( case when main.answer = 5 then main.answer end ) as 'very_good'
from
	log_simple_questions main
join (select distinct(clients_contact.phone) ,company_id from clients_contact ) cc on
	cc.phone = main.phone_number
	join company on company.id = cc.company_id
	join map_ref mm on mm.id = company.region 

where
	main.question_quee = 1
	and company.id = $company_id
    and  mm.id=$region_id
	and date(main.created_at)>= date(' $start')
	and date(main.created_at)<= date('$end')
group by
	date(main.created_at)
order by
	date(main.created_at)";
        
        // echo $sql; die;
        
        $result = $conn->query($sql);
        
        $result_data_point = array();
        
        
        if ($result->num_rows > 0) {
            foreach ($result as $key => $row) {
                $date = $row['date'];
                $very_bad = $row['very_bad'];
                $bad = $row['bad'];
                $dont_know = $row['dont_know'];
                $good = $row['good'];
                $very_good = $row['very_good'];
                
                $result_data_point[$key] = array(
                    'date' => $date,
                    'very_bad' => (int) $very_bad,
                    'bad' => (int) $bad,
                    'dont_know' => (int) $dont_know,
                    'good' => (int) $good,
                    'very_good' => (int) $very_good,
                );
            }
        } else {
            echo "0 results";
        }
        
        
        
        echo json_encode($result_data_point);
        
        
        
        
        
    }























