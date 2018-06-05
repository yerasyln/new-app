<?php 
require 'db.php';
$phone_number='77789933211';
if(isset($_GET['phone'])){
 $phone_number=$_GET['phone'];
 //
    
}
if(isset($_POST)){
    //echo '<pre>'; print_r($_POST); 
   $iCheck1 = (explode( '_', $_POST['iCheck1'])); 
   $iCheck2 = (explode( '_', $_POST['iCheck2'])); 
   $iCheck3 = (explode( '_', $_POST['iCheck3'])); 
   $iCheck4 = (explode( '_', $_POST['iCheck4'])); 
   $iCheck5 = (explode( '_', $_POST['iCheck5'])); 
  //echo '<pre>'; print_r($iCheck1); 
   $array1 = array(
        'question_id' => $iCheck1[1],
        'answer' => $iCheck1[0], 
        'phone_number'=> $phone_number,
                'question_quee'=> '1'
    );
    $array2 = array(
        'question_id' => $iCheck2[1],
        'answer' => $iCheck2[0], 
        'phone_number'=> $phone_number,
                'question_quee'=> '2'
    );
    $array3 = array(
        'question_id' => $iCheck3[1],
        'answer' => $iCheck3[0], 
        'phone_number'=> $phone_number,
                'question_quee'=> '3'
    );
    $array4 = array(
        'question_id' => $iCheck4[1],
        'answer' => $iCheck4[0], 
        'phone_number'=> $phone_number,
                'question_quee'=> '4'
    );
    $array5 = array(
        'question_id' => $iCheck5[1],
        'answer' => $iCheck5[0], 
        'phone_number'=> $phone_number,
        'question_quee'=> '5'
    );
    //echo '<pre>'; print_R($array1);die;
    
    $allarray = array(
    '0'=>$array1,
    '1'=>$array2,
        '2'=>$array3,
        '3'=>$array4,
        '4'=>$array5
        
    );
    
        
    foreach($allarray as $arr){
        $question_id = $arr['question_id'];
        $answer = $arr['answer'];
        $phonenumber = $arr['phone_number'];
        $question_quee = $arr['question_quee'];
        date_default_timezone_set('Asia/Almaty');
	$created_at = "'" . date('Y/m/d H:i:s') . "'";

    
    $sql = "insert into log_random_questions (created_at, question_id, question_quee, phone_number, answer)  "
            . "values($created_at,$question_id,$question_quee, $phonenumber, $answer )";

//	$conn->query($sql);
		
    if ($conn->query($sql)) {
   echo '<meta http-equiv="refresh" content="0; url=/gentelella/production/finishquestions.php"/>';
} else {
  echo '<meta http-equiv="refresh" content="0; url=/gentelella/production/finishquestions.php?error=1"/>';
}
   
    }

       
mysqli_close($conn);                          
    } 
    

?>