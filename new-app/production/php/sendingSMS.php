<?php

require 'db.php';



if(isset($_POST['question_id']) && !empty($_POST['question_id']) ){

	$str = "Добрый день! Ответьте пожалуйста на несколько вопросов (тест платформы) http://clientsurvey.kz/gentelella/production/askQuestions.php?phone_number=";
	
	if(isset($_POST['simple_question'])){
            
            if($_POST['simple_question']==1){
		$str = "Добрый день! Ответьте пожалуйста на несколько вопросов (тест платформы) http://clientsurvey.kz/gentelella/production/askSimpleQuestions.php?phone_number=";
            }else{
                $str = "Добрый день! Ответьте пожалуйста на несколько вопросов (тест платформы) http://clientsurvey.kz/gentelella/production/randomQuestions.php?phone_number=";
            }    
                
        }
	

	$is_sent = false;



	$sql = "SELECT phone FROM clients_contact where is_active=1 ";


	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$message = $str;
			
			$phone =$row['phone'];

			if(!empty($message)){
	
				if(!empty($phone)){
					$message= trim($message.$phone);
					
				}
                                
                                
                                
				$url = 'http://smsc.kz/sys/send.php?login=Datams&psw=Datams2017&phones='.$phone.'&mes='.$message.'&charset=utf-8';

			

				$new_url= trim($url);

				if(strpbrk($new_url, "\r\n")) {
					echo  "Illegal characters found in URL 23";
					die;
				}
					
				//echo $new_url; 

				$ch = curl_init($new_url);
				$curl = 0;

				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($ch);
				if($response === false)
				{
					echo "error has been occured";
					$is_sent=false;
					die;
				}
				else
				{
                                    
                                      $sql = "update clients_contact set is_send = 1   where phone = " . $phone;
                                      $conn->query($sql);
					echo $url;
					echo "<br>";
					$is_sent=true;
				}
				curl_close($ch);

			}

		}

	/*	if($is_sent){
			foreach($questions_ids as $id){
				if(!empty($id)){

					$sql = "UPDATE questions SET status=1 WHERE id = ".$id;

					if ($conn->query($sql) === TRUE) {
						echo true;
					}

				}

			}
		}*/


	}





}




if(isset($_POST['reset']) && !empty($_POST['reset']) ){


	$sql="update  questions set status = 0 ";

	if ($conn->query($sql) === TRUE) {
		echo true;
	}

}
