<?php


require 'db.php';




if( isset($_GET['id']) && !empty($_GET['id']) ){



	$id = $_GET['id'];

	$sql="select  * from simple_questions  where id = ".$id;

	$result = $conn->query($sql);

	$result_data = array();


	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {

			$result_data[$row['id']] = $row;


		}



	}

}

?>