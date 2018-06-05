<?php
require 'db.php';

$company_id = !empty($_SESSION['company_id'])?$_SESSION['company_id']:"";

function gradantBysize($data, $conn, $param, $filter, $company_id)
{
    
    $where = '';
    if($param==1){
        $where = " and answer <= 6";
    }else{
        $where = " and answer >= 9";
    }
    
    $res = $conn->query("select main.*, (

select
			count(*)
		from
			log_simple_questions
			
		where
			question_quee = 6
			and 
			phone_number in(
		select
			phone_number
		from
			log_simple_questions
			join clients_contact cc on cc.phone = phone_number
		where
			question_quee = 2
			and 
			cc.company_id = $company_id
			$where $filter		
	)


) as total from cloud_tag main");
    $res_arr = array();
    if ($res) {
        
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $res_arr[] = $row;
            }
        }
    }
    
    $total_anser = ! empty($res_arr[0]['total']) ? $res_arr[0]['total'] : "";
    $total = array();
    foreach ($data as $word => $rows) {
        if ($rows > 1) {
            $total[$word] = array(
                'count' => $rows,
                'persentage_value' => @(round(($rows * 100) / $total_anser)),
                'size' => $rows['size']
            
            );
        }
    }
    
    $result = array();
    foreach ($total as $word => $value) {
        
        foreach ($res_arr as $data_val) {
            $range = explode('-', trim($data_val['range']));
            $start = $range[0];
            $end = $range[1];
            if ($value['persentage_value'] >= $start && $value['persentage_value'] <= $end) {
                $value['size'] = $data_val['size'];
                
                $result[$word] = array(
                    'count' => $value['count'],
                    'persentage_value' => $value['persentage_value'],
                    'size' => $value['size']
                );
            }
        }
    }
    
//     echo "<pre>"; print_r($total);
//     echo "<pre>"; print_r($total_anser);
//     echo "<pre>"; print_r($result); die;
    
    return $result;
}

$result = $conn->query("select
	lower(group_concat(main.answer))  text
from
	log_simple_questions main
	join clients_contact cc on cc.phone = main.phone_number
where
	main.question_quee = 6
	and cc.company_id = $company_id
	and main.phone_number in(
		select
			phone_number
		from
			log_simple_questions
			join clients_contact cc on cc.phone = phone_number
		where
			question_quee = 2
			and answer <= 6
			and cc.company_id = $company_id
			
			
	)
	
		and
	
	(answer REGEXP '[Α-Ωα-ωА-Яа-я]')
	or 
	(answer REGEXP '^[a-zA-Z.]+$')
	
	
	");

$arr_result = array();
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            $arr_result[] = $row;
        }
    }
}

if (! empty($arr_result)) {
    $text = $arr_result[0]['text'];
} else {
    
    $text = "";
}

$preResult = array();

$text = str_replace(".", " ", $text);

$text = str_replace(",", " ", $text);

$test_arr = explode(' ', $text);



$new_arr = array();

foreach ($test_arr as $row) {
    
    $count = mb_strlen(trim($row));
    
    if ($count > 2) {
       $str = preg_replace('/\s+/u', '', $row);
       
        $new_arr[] = $str;
    }
}



$freqData = array();
foreach ($new_arr as $words) {

    array_key_exists($words, $freqData) ? $freqData[$words] ++ : $freqData[$words] = 1;
}



$bad_list = '';
arsort($freqData);

$final = array();
// / get data by cloud_tag
$final = gradantBysize($freqData, $conn,1,$filter, $company_id);

// echo "<pre>"; print_r($final); die;

/*
 * foreach ($freqData as $word => $count) {
 * if ($count > 1) {
 * $bad_list .= "$word ";
 * }
 * }
 */

$bad_words = array();
// $weights = array(9, 8, 7, 6, 5);
foreach ($final as $words => $data) {
    if (! empty($data)) {
        $bad_words[] = array(
            'text' => $words,
            'weight' => (int) $data['size'],
            'link' => '../production/detailedWord.php?word=' . $words . "&param=1"
        );
    }
}

// echo "<pre>"; print_r($bad_words); die;

$result = $conn->query("select
	lower(group_concat(main.answer))  text
from
	log_simple_questions main
	join clients_contact cc on cc.phone = main.phone_number
where
	main.question_quee = 6
	and cc.company_id = $company_id
	and main.phone_number in(
		select
			phone_number
		from
			log_simple_questions
			join clients_contact cc on cc.phone = phone_number
		where
			question_quee = 2
			and answer >=9 
			and cc.company_id = $company_id
	)");

$arr_result = array();
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            $arr_result[] = $row;
        }
    }
}

if (! empty($arr_result)) {
    $text = $arr_result[0]['text'];
} else {
    
    $text = "";
}

$text = str_replace(".", " ", $text);

$text = str_replace(",", " ", $text);

$test_arr = explode(' ', $text);

$new_arr = array();

foreach ($test_arr as $row) {
    
    $count = mb_strlen(trim($row));
    
    if ($count > 2) {
        $str = preg_replace('/\s+/u', '', $row);
        $new_arr[] = $str;
    }
}

$freqData = array();
foreach ($new_arr as $words) {
    array_key_exists($words, $freqData) ? $freqData[$words] ++ : $freqData[$words] = 1;
}

$good_list = '';
arsort($freqData);
// echo "<pre>"; print_r($freqData); die;
$final = gradantBysize($freqData, $conn,2,$filter, $company_id);

/*
 * foreach ($freqData as $word => $count) {
 * if ($count > 1) {
 * $good_list .= "$word ";
 * }
 * }
 */

// $weights = array(9, 8, 7, 6, 5);
foreach ($final as $words => $data) {
    if (! empty($data))
        $good_words[] = array(
            'text' => $words,
            'weight' => (int) $data['size'],
            'link' => '../production/detailedWord.php?word=' . $words . "&param=2"
        );
}

//echo "<pre>"; print_r($good_words); die;






