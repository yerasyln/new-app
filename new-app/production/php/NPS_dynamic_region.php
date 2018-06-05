<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require 'db.php';

$company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']:"";


if(  !empty($_POST['region_id']) && !empty($_POST['start']) && !empty($_POST['end'])    ){
    
    $region_id = $_POST['region_id'];  
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
				answer <= 6
				and question_quee = main.question_quee
				and company.id = main_company.id
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
				answer between 7 and 8
				and question_quee = main.question_quee
				and company.id = main_company.id
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
				answer >= 9
				and question_quee = main.question_quee
				and company.id = main_company.id
	                        and mm.id = map_ref.id 
	                   and date(main.created_at) = date(created_at)     
		) as well,
		date(main.created_at) as date
		from
		log_simple_questions main
	        join (select distinct(clients_contact.phone),clients_contact.company_id  from clients_contact ) cc on
	              cc.phone = main.phone_number
	        join company as main_company on
	              main_company.id = cc.company_id
	        join map_ref mm on
	              mm.id = main_company.region
	where
	        mm.id = $region_id
	        and 
		main.question_quee = 2
            and main_company.id=$company_id    
                and 
                (date(main.created_at) >= date('$start') 
                    and date(main.created_at) <= date('$end')
                )    

		
	group by date(main.created_at)	";
    
    
     //echo $sql; die;
    
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