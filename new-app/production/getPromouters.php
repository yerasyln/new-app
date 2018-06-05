<?php
require 'db.php';

$company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']:"";


if (isset($_GET['code'])) {

    $param = $_GET['code'];

    if ($param == 1) {
        $sql = "select
	clients_contact.phone,
    log_simple_questions.answer,
	company.name as organization,
	channel.name as source_inf,
	clients_contact.age,
	log_simple_questions.created_at,
	(select answer from log_simple_questions where phone_number =clients_contact.phone and question_quee=4 ) as comments
from
	log_simple_questions, clients_contact,company, channel
where
	question_quee = 2
	and answer <= 6
	and clients_contact.phone = phone_number
	and company.id = clients_contact.company_id
	and clients_contact.channel = channel.id
  and clients_contact.company_id = $company_id
	";


    }

    if ($param == 2) {
        $sql = "select
	clients_contact.phone,
    log_simple_questions.answer,
	company.name as organization,
	channel.name as source_inf,
	clients_contact.age,
	log_simple_questions.created_at,
	(select answer from log_simple_questions where phone_number =clients_contact.phone and question_quee=4 ) as comments
from
	log_simple_questions, clients_contact,company, channel
where
	question_quee = 2
	and answer between 7 and 8
	and clients_contact.phone = phone_number
	and company.id = clients_contact.company_id
	and clients_contact.channel = channel.id
  and clients_contact.company_id = $company_id
	";
    }

    if ($param == 3) {
        $sql = "select
	clients_contact.phone,
    log_simple_questions.answer,
	company.name as organization,
	channel.name as source_inf,
	clients_contact.age,
	log_simple_questions.created_at,
	(select answer from log_simple_questions where phone_number =clients_contact.phone and question_quee=4 ) as comments
from
	log_simple_questions, clients_contact,company, channel
where
	question_quee = 2
	and answer >= 9
	and clients_contact.phone = phone_number
	and company.id = clients_contact.company_id
	and clients_contact.channel = channel.id
  and clients_contact.company_id = $company_id
	";
    }
} else {

    $sql = "SELECT * FROM `clients`";
}
$result = $conn->query($sql);

$result_data = array();

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $result_data[] = $row;
    }
} else {
    echo "0 results";
}

?>
