<?php
session_start();
require 'db.php';

//echo "<pre>"; print_r($_FILES); die;
if(isset($_POST['mess']) && !empty($_POST['mess'])){
    $subject = $_POST['subject'];
    $mess = $_POST['mess'];
$user_id = $_SESSION['user_id'];
$role_id = $_SESSION['role_id'];
$dateTime = date_create('now')->format('Y-m-d H:i:s');

 if(is_uploaded_file($_FILES["file"]["tmp_name"])){
   $filename = $_FILES["file"]["name"];
//   echo end(explode(".",$filename)); die;
     $newfilename = rand(1,99999) . '.' . end(explode(".",$_FILES["file"]["name"]));
     move_uploaded_file($_FILES["file"]["tmp_name"], "uploadfile/".$newfilename);

   } else {
      //echo("Ошибка загрузки файла");
   }
  if( !empty($_FILES["file"]["name"])){
       $dir = "php/uploadfile/".$newfilename;
       }else{
          $dir ="";
       }



$insertSql = "INSERT INTO chat (message,subject,user_id,time,role_id,upload_dir) VALUES ('$mess','$subject','$user_id','$dateTime','$role_id','$dir');";

	if (mysqli_query($conn, $insertSql) === TRUE) {
		echo true;


	}else{
		echo false;

	}

  header('Location: ' . "../helpDesk.php?success=1", true);
}
?>
