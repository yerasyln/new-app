<?php
require 'db.php';

if(isset($_GET['question'])){
    
    $sql = "SELECT * FROM `questions` WHERE `id` = ".$_GET['question'];

    $result = $conn->query($sql);
    
    $result_data = array();
    
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            $result_data = $row;
        }
    } else {
        echo "0 results";
    }
    
    
    
   
    
}



$sql = "SELECT * FROM respond_average_per_year ";

$result = $conn->query($sql);

$total = array();

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $total[$row['id']] = $row;
    }
} else {
    echo "0 results";
}




$sql = "SELECT id, count_question FROM respond_rate_per_year ";

$result = $conn->query($sql);

$count_question = array();

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $count_question[$row['count_question']]=$row['count_question'];
    }
} else {
    echo "0 results";
}



$sql = "SELECT id, count_respond FROM respond_rate_per_year ";

$result = $conn->query($sql);

$count_respond = array();

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $count_respond[$row['id']] = $row['count_respond'];
    }
} else {
    echo "0 results";
}





$sql = "SELECT * FROM respond_rate_per_year ";

$result = $conn->query($sql);

$total_respond = array();

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $total_respond[$row['id']] = $row;
    }
} else {
    echo "0 results";
}





$count_question=array_values($count_question);

$count_respond=array_values($count_respond);

//echo "<pre>"; print_r(); 
// echo "<pre>"; print_r($count_respond);

 //die;




?>