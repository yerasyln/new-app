<?php
require 'db.php';




$sql="select  * from simple_questions ";


$result = $conn->query($sql);

$result_data = array();


if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
  
    	$result_data[$row['id']] = $row;
        
        
    }
    
}


//echo "<pre>"; print_r($result_data); die;




