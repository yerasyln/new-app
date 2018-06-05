<?php

require 'db.php';


$sql="select * from questions";

$result = $conn->query($sql);

$question_data = array();

if ($result->num_rows > 0) {

	while ($row = $result->fetch_assoc()) {

		$question_data[$row['id']] = $row;

	}

}

$questionCount = count($question_data);

$users = getUsers($conn);


foreach ($users as $users_data){

	$question_quee = searchusersinlog($conn,$users_data['phone']);

     
	if($question_quee>5){
		echo "done successfully!";
		die;
	}
	
	
	if(trim($question_quee)=="404"){
		echo "No answers for last question occured for number ".$users_data['phone'];
		continue;
	}

	if($question_quee){
		// get lastquestion that has been asked
		$next_quee = ++$question_quee;
		$next_question = $question_data[$next_quee]['title'];

		if(!empty($next_question)){
			askQuestion($conn,$next_question, $users_data['phone'], $question_data[$next_quee]['id'],$question_data[$next_quee]['code'] );
		}
			
	}else{
		// no questions asked
		$first_question = $question_data[1]['title'];
		if(!empty($first_question)){
			askQuestion($conn,$first_question, $users_data['phone'], $question_data[1]['id'],$question_data[1]['code'] );
		}
			
	}

}


function getCurrentTime(){
	date_default_timezone_set('Asia/Almaty');
	return    date('Y-m-d H:i:s');

}


function askQuestion($conn, $question, $phone, $question_id, $question_quee){

	$current_date = "'".getCurrentTime()."'";

	$url = 'http://smsc.kz/sys/send.php?login=Datams&psw=Datams2017&phones='.$phone.'&mes='.$question.'&charset=utf-8&sender=77762015718';

	$new_url= trim($url);

	if(strpbrk($new_url, "\r\n")) {
		echo  "Illegal characters found in URL 23";
		die;
	}


	$ch = curl_init($new_url);
	$curl = 0;

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);
	if($response === false)
	{

		if(curl_error($ch))
		{
			echo 'error:' . curl_error($ch);
		}
		echo "error has been occured";
		echo "<pre>";
		echo $new_url;

	}
	else
	{
		echo "success";

		$sql="insert into logsms  (question_id,created_at, to_phone, question_quee) values($question_id,$current_date,$phone, $question_quee)";
		if ($conn->query($sql) === TRUE) {
			echo true;
		}

	}

	curl_close($ch);

}


function searchusersinlog($conn,$phone){

	$sql="select  question_quee,answer from logsms where to_phone = ".$phone."  order by  created_at desc limit 1";

	$result = $conn->query($sql);

	$users_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {

			$users_data[] = $row;

		}

	}else{
		return false;
	}


	if(!empty($users_data)){

		return   $users_data[0]['answer']!=null?$users_data[0]['question_quee']:404;
	}





}

function getUsers($conn){

	$sql="select  phone from clients_contact where id = 4";

	$result = $conn->query($sql);

	$users_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {

			$users_data[] = $row;

		}

	}

	return $users_data;

}











