<?php
require 'db.php';





function checknumberforask($conn, $phone_number)
{
	$sql = "select
	count(answer) as count_of_answers
from
	logquestions 
where
	phone_number = " . $phone_number;

	$result = $conn->query($sql);

	$result_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$result_data[] = $row;
		}
	} else {
		return 0;
	}

	if(!empty($result_data)){
		if($result_data[0]['count_of_answers']>=5){
			return  true;
		}else{
			return  false;
		}
	}


}

function insertLog($question_id, $phonenumber, $conn, $quee, $answer, $type)
{
	date_default_timezone_set('Asia/Almaty');

	$created_at = "'" . date('Y/m/d H:i:s') . "'";

	if (is_numeric($answer)) {
		$_new_answer = $answer;
	} else {
		$_new_answer = "'" . $answer . "'";
	}

	$sql = "insert into logquestions (question_id, phone_number, created_at, question_quee, answer, type)  values($question_id, $phonenumber, $created_at, $quee, $_new_answer, $type )";

	if ($conn->query($sql) == true) {
		return true;
	} else {
		return false;
	}
}

function getQuee($phonenumber, $conn)
{
	$sql = "select
	t1.*
from
	logquestions t1
where
	t1.created_at =(
		select
			max( created_at )
		from
			logquestions t2
		where
			t2.phone_number = t1.phone_number
	)
and 

t1.phone_number = " . $phonenumber;

	$result = $conn->query($sql);

	$result_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$result_data[] = $row;
		}
	} else {
		return 0;
	}

	if (! empty($result_data[0])) {
		return $result_data[0];
	}
}

if (isset($_POST['answers']) && ! empty($_POST['answers']) && isset($_POST['phone_number'])) {

	$question_id = 0;
	$phone_number = "'" . $_POST['phone_number'] . "'";

	$prev_data = getQuee($phone_number, $conn);

	if ($prev_data != 0) {

		$quee = $prev_data['question_quee'];
		$type = $prev_data['type'];
	} else {
		$quee = $prev_data;
	}

	$answer = $_POST['answers'];

	// first question id set to session
	if (isset($_POST['question_id'])) {
		$question_id = $_POST['question_id'];

		// define first answer is positive nor negaive
		if (($answer >= 1 && $answer <= 6)) {
			$type = 0;
		} elseif (($answer >= 9 && $answer <= 10)) {
			$type = 1;
		}

		if (($answer >= 7 && $answer <= 8)) {
			$type = - 1;
			$quee ++; // step one question
		}
	} else {
		$question_id = $prev_data['question_id'];
	}

	// next quee
	$new_quee = $quee + 1;

	// write log

	if ($question_id != 0 && ! empty($phone_number)) {

		if(!checknumberforask($conn,$phone_number)){
			insertLog($question_id, $phone_number, $conn, $new_quee, $answer, $type);
		}else{
			echo 404; die;
		}

	}

	$result_data = array();

	// all questions asked
	if ($new_quee >= 5) {
		echo 5;
		die();
	}

	if ($type != - 1) {
		$sql = "SELECT * FROM `sub_question` WHERE `parent_id` = " . $question_id . " and quee = " . $new_quee . " and type= " . $type;
	} else {
		// $new_quee++;
		$sql = " select * from questions where code = " . $new_quee;
	}

	$result = $conn->query($sql);

	$result_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$result_data = $row;
		}
	} else {
		echo "0 results";
	}

	if (isset($result_data['title'])) {
		echo json_encode($result_data);
	}
	// print_r();
} else {



	$sql = "SELECT * FROM `questions` ";


	$result = $conn->query($sql);

	$result_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$result_data[$row['code']] = $row;
		}
	} else {
		echo "0 results";
	}
}



