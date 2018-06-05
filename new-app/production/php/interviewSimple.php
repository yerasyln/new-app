<?php

require 'db.php';


function insertLog($question_id, $phonenumber, $conn, $quee, $answer) {
    date_default_timezone_set('Asia/Almaty');

    $created_at = "'" . date('Y/m/d H:i:s') . "'";

    if (is_numeric($answer)) {
        $_new_answer = $answer;
    } else {
        $_new_answer = "'" . $answer . "'";
    }

    $sql = "insert into log_simple_questions (question_id, phone_number, created_at, question_quee, answer)  values($question_id, $phonenumber, $created_at, $quee, $_new_answer )";

  //  echo $sql ;

    if ($conn->query($sql) == true) {


        $sql = "UPDATE `log_simple_questions`
        SET `phone_number` = replace
        (REPLACE(REPLACE(`phone_number`, ' ', ''), '\t', ''), '\n', '');";

        if ($conn->query($sql) == true) {

        }

        return true;
    } else {
        return false;
    }
}

function getQuee($simple_question_id, $conn) {
    $sql = "SELECT code FROM `simple_questions` where id = " . $simple_question_id;

    $result = $conn->query($sql);

    $result_data = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $result_data[] = $row;
        }
    } else {
        return 0;
    }

    if (!empty($result_data[0])) {
        return $result_data[0];
    }
}

function checknumberforask($conn, $phone_number, $questionsCount) {
   $phone_number =  preg_replace('/\s+/', '', $phone_number);

    $sql = "select count(answer) as count_of_answers from log_simple_questions  where phone_number =".$phone_number;


    $result = $conn->query($sql);

    $result_data = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $result_data[] = $row;
        }
    } else {
        return 0;
    }

    if (!empty($result_data)) {
        if ($result_data[0]['count_of_answers'] >= $questionsCount) {
            return true;
        } else {
            return false;
        }
    }
}

if (isset($_POST['answers']) && isset($_POST['phone_number']) && isset($_POST['question_id']) ) {
  //  echo "<pre>";  print_r($_POST); die;
    $phone_number = "'" . $_POST['phone_number'] . "'";
    $answer = $_POST['answers'];
    $question_id = $_POST['question_id'];
    $lastQuestion = isset($_POST['lastquestion'])?$_POST['lastquestion']:"";

    $questionsCount = isset($_POST['questionCount'])?$_POST['questionCount']:"";

    $quee = getQuee($question_id, $conn);

    $new_quee = $quee['code'];


    if (!checknumberforask($conn, $phone_number, $questionsCount)) {
        insertLog($question_id, $phone_number, $conn, $new_quee, $answer);
    } else {
        echo 404;
        die;
    }

    if($lastQuestion){
      echo 6;
      die();
    }

    if ($new_quee >= 6) {
        echo 6;
        die();
    }
} else {



    $sql = "SELECT * FROM `simple_questions` where company_id = ".$company_id;




    $result = $conn->query($sql);
	


    $result_data = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $result_data[ (int) trim($row['code'])] = $row;
        }
    } else {
        echo "0 results";
    }
	
	
}
