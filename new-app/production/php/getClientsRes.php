<?php

require 'db.php';

$company_id = !empty($_SESSION['company_id'])? $_SESSION['company_id']: "0";

echo "<meta charset='utf-8'>";
/*
 $res_query = $conn->query("select
	clients_contact.lastname,
	clients_contact.firtsname,
	clients_contact.phone,
	company.name as organization,
	channel.name as source_inf,
	point_of_interaction.name as poi_title,
	clients_contact.avgcheck,
	checktitle.name as checktitle_title,
	product.name as title_product_name,
	clients_contact.age,
	log_simple_questions.created_at,
	log_simple_questions.answer
from
	log_simple_questions, clients_contact,company, channel, point_of_interaction, checktitle,product
where

	 clients_contact.phone = phone_number
	and company.id = clients_contact.company_id
	and clients_contact.channel = channel.id
	and point_of_interaction.id = clients_contact.point_of_interaction
	and checktitle.id  = clients_contact.checktitle
	and product.id  = clients_contact.product"
         );

 */

   $res_query = $conn->query("select
  	clients_contact.lastname,
  	clients_contact.firtsname,
  	clients_contact.phone,
  	company.name as organization,
  	channel.name as source_inf,
  	point_of_interaction.name as poi_title,
  	clients_contact.avgcheck,
  	checktitle.name as checktitle_title,
  	product.name as title_product_name,
  	clients_contact.age,
  	log_simple_questions.created_at,
  	log_simple_questions.question_quee as question_quee,
  	log_simple_questions.answer
  from
  	log_simple_questions

  left join clients_contact on  clients_contact.phone = log_simple_questions.phone_number
  	left join company on company.id = clients_contact.company_id
  	left join channel on clients_contact.channel = channel.id
  	left join point_of_interaction on point_of_interaction.id = clients_contact.point_of_interaction
  left join checktitle on checktitle.id  = clients_contact.checktitle
  left join product on product.id  = clients_contact.product

  where clients_contact.company_id = $company_id

  order by log_simple_questions.phone_number, log_simple_questions.question_quee, log_simple_questions.created_at
");
 $result_data = array();

 if($res_query){

     if($res_query->num_rows>0){

         while($row = $res_query->fetch_assoc()){

             $result_data[] = $row;

         }

     }

 }

// get first phone number
$phone_number_start = 0;
 if(!empty($result_data)){

      if(!empty($result_data[0]['phone'])){
          $phone_number_start  = $result_data[0]['phone'];
      }


 }




 //echo '<pre>'; print_r($phone_number_start); die;


?>
