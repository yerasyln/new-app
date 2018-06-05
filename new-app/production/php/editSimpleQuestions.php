<?php


require 'db.php';




if(isset($_POST['edit_question']) && !empty($_POST['edit_question'])  &&   isset($_POST['id_question']) && !empty($_POST['id_question']) ){

	
	$questions = "'".$_POST['edit_question']."'";
	
	$id = $_POST['id_question'];

	$sql="Update simple_questions set title  = ".$questions."  where id = ".$id;

	

	if ($conn->query($sql) === TRUE) {
		echo true;
	}else{
		echo false;
		
	}


}



?>