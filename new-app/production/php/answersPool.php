<?php

require 'db.php';

$allResponse  =  getallResp($conn);


foreach($allResponse as $data){


	if(checkphonetosendquestion($conn,$data )){

		echo "successfully updated ".$data['phone'];	
		
	}else{
		
		echo "no question asked ".$data['phone'];
	
	}


}



function checkphonetosendquestion($conn, $data){

	$sql="select
	t1.*
from
	logsms t1
where
	t1.created_at =(
		select
			max( created_at )
		from
			logsms t2
		where
			t2.to_phone = t1.to_phone
	)
and 

t1.to_phone = ".$data['phone'];



	$result = $conn->query($sql);

	$result_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {

			$result_data[] = $row;

		}

	}else{
		return false;
	}

	if(!empty($result_data)){

		$sql="update logsms set answer=".$data['message']." , answer_date='".$data['received']."' where id  =  ".$result_data[0]['id'];

		if ($conn->query($sql) === TRUE) {
			echo true;
		}
		return true;
	}

}


function getallResp($conn){

	$sql="select
				t1.*
			from
				reponse t1
			where
				t1.received =(
					select
						max( received )
					from
						reponse t2
					where
						t2.phone = t1.phone
				)
	";

	$result = $conn->query($sql);

	$result_data = array();

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {

			$result_data[] = $row;

		}

	}

	return $result_data;


}