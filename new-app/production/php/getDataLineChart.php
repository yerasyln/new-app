<?php
require 'db.php';


$selectSql = "select * from linechart";




$resultSelectSql = $conn->query($selectSql);

$data = array();

if ($resultSelectSql->num_rows > 0) {
  
     while ($row = $resultSelectSql->fetch_assoc()) {
    echo '<pre>'; print_R($row); 
     $data['date'] = $row['date'];
     $data['value'] = $row['value'];
         
     }
     



}else{
    echo '0 results';
}
?>