<?php

require 'db.php';




if(isset($_POST['new_question']) && !empty($_POST['new_question'])){

	
	$questions = "'".$_POST['new_question']."'";

	$sql="insert into simple_questions ( code, title, status) values(' ',".$questions.",0)";


	if ($conn->query($sql) === TRUE) {
		echo true;
	}else{
		echo false;
		
	}

	
	

}