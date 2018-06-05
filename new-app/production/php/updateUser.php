<?php 
require("db.php");

if(isset($_POST)){
	//echo "<pre>"; print_r($_POST);die;
	$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$patronymic = $_POST['patronymic'];  
$position = $_POST['position']; 
$login = $_POST['login']; 
$password = md5($_POST['password']); 

if($_POST['password']<>''){
      //echo 'not empty'; die;
   $updateSqlUsers ="UPDATE users
SET firstname='$firstname',lastname='$lastname',patronymic='$patronymic', position='$position',login='$login',password='$password'
WHERE id = $id";
	//echo $updateSql; die;
}else{
    // echo 'empty'; die;
   $updateSqlUsers ="UPDATE users
SET firstname='$firstname',lastname='$lastname',patronymic='$patronymic',position='$position',login='$login'
WHERE id = $id"; 
}



if (mysqli_query($conn, $updateSqlUsers)){
//You need to redirect
header("Location: /gentelella/production/profile.php?user_id=$id"); /* Redirect browser */
exit();
 }
else{
header("Location: editUser.php?id="."".$id);
}




mysqli_close($conn);

}







?>