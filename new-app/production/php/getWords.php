<?php

require 'db.php';


$result = $conn->query("select group_concat(answer) as text, phone_number from log_simple_questions where question_quee = 6  ");

$arr_result = array();
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $arr_result[] = $row;
        }
    }
}

if (!empty($arr_result)) {
    $text = $arr_result[0]['text'];
} else {

    $text = "";
}

$freqData = array();
foreach (str_word_count($text, 1) as $words) {
    array_key_exists($words, $freqData) ? $freqData[$words] ++ : $freqData[$words] = 1;
}

$list = '';
arsort($freqData);

foreach ($freqData as $word => $count) {
    if ($count > 2) {
        $list .= "$word ";
    }
}
if (empty($list)) {
    $list = " ";
}

$words = array();

$weights = array(9, 8, 7, 6, 5);



foreach (explode(' ', $list) as $data) {
    $words[] = array('text' => $data, 'weight' => (int) $weights[array_rand($weights)] , 'link' =>'../production/detailedWord.php?word='.$data);
}




