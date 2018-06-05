<?php 
require 'db.php';

$sql = "select substr(l.created_at,1,10) as date,
COUNT(CASE WHEN poi.id = 1 THEN poi.name END) AS 'call-center',
COUNT(CASE WHEN poi.id = 2 THEN poi.name END) AS 'Техподдержка',
COUNT(CASE WHEN poi.id = 3 THEN poi.name END) AS 'Ручной ввод'
from log_simple_questions l 
left join clients_contact cc on cc.phone = l.phone_number
left join point_of_interaction poi on poi.id = cc.point_of_interaction
group by substr(l.created_at,1,10)
";

	$result = $conn->query($sql);

	$result_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$result_data[$row['date']] = $row;
		}
	} else {
		echo "0 results";
	}
       $json = json_encode($result_data);
        
      echo '<pre>'; print_R($result_data); die;
        
?>
