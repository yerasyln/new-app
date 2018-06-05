<?php
require 'db.php';

if (isset($_GET['code']) && ! empty($_GET['code'])) {
    
    $sql = "select * from answers_options where id = " . $_GET['code'];
    
    $res = $conn->query($sql);
    $res_arr = array();
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $res_arr[] = $row;
        }
    }
    
 
    
    if (! empty($res_arr[0]['code']) && ! empty($res_arr[0]['question_id'])) {
        
        $code = $res_arr[0]['code'];
        $question_id = $res_arr[0]['question_id'];
        
        $sql_detailed = "select
	clients_contact.lastname,
	clients_contact.firtsname,
	company.name as organization,
	channel.name as source_inf,
	clients_contact.age,
	main.created_at,
    aa.title
from
	log_simple_questions main
join answers_options aa on
	aa.question_id = main.question_id
	and aa.code = main.answer
left join clients_contact on
	clients_contact.phone = main.phone_number
left join company on
	company.id = clients_contact.company_id
left join channel on
	clients_contact.channel = channel.id
where
	main.question_quee = (select code from simple_questions where id =$question_id )
	and aa.code = $code
";
        
        
        $result = $conn->query($sql_detailed);
        $result_data = array();
        if($result){
            
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $result_data[] = $row; 
                }
            }
        }
        
        
    }
}