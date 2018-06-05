<?php

require 'db.php';



if(isset($_GET['word'])  && !empty($_GET['word']) && !empty($_GET['param'])){
    
    
    $param = $_GET['param'];
    $where = "";
    if($param==1){
            $where = " and phone_number in(
    		select
    			phone_number
    		from
    			log_simple_questions
    			join clients_contact cc on cc.phone = phone_number
    		where
    			question_quee = 2
    			and answer <= 6
    			
    			
    			
    	)";
    }else{
        
        $where = " and phone_number in(
    		select
    			phone_number
    		from
    			log_simple_questions
    			join clients_contact cc on cc.phone = phone_number
    		where
    			question_quee = 2
    			and answer >= 9
            
            
            
    	)";
        
    }
    
    $word = $_GET['word'];
    
    $sql=  "select
	clients_contact.lastname,
	clients_contact.firtsname,
	company.name as organization,
	channel.name as source_inf,
	clients_contact.age,
	log_simple_questions.created_at,
        log_simple_questions.answer
from
	log_simple_questions, clients_contact,company, channel
where
	question_quee = 6
	and answer like '%$word%'
	and clients_contact.phone = phone_number
	and company.id = clients_contact.company_id
	and clients_contact.channel = channel.id
    
$where

";
    
   // echo $sql ; die;
    
    $result_query=  $conn->query($sql);
    $result_data = array();
    if($result_query){
        
        if($result_query->num_rows>0){
            
            while($row = $result_query->fetch_assoc()){
                $result_data[]=$row;
            }
            
        }
        
    }
    
   // echo "<pre>"; print_r($result_data); die;
    
    
}
