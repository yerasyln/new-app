<?php 
require 'db.php';

$sql = "SELECT 
    *
FROM
    group_questions
ORDER BY RAND()
LIMIT 5";

	$result = $conn->query($sql);

	$result_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$result_data[$row['id']] = $row;
		}
	} else {
		echo "0 results";
	}
//echo '<pre>'; print_r($result_data); die;

$random_keys=array_rand($result_data,5);


?>


