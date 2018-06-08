<?php
session_start();
require 'db.php';

	if (isset($_POST['username']) and isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $pass = md5($password);

						$new_pass = $conn->real_escape_string($pass);
						$new_username = $conn->real_escape_string($username);

    $sql = "select * from users where users.password = '$new_pass' and users.login = '$new_username' and users.status=1 and role_id = 3";

                    $result = $conn->query($sql);
             if($result->num_rows > 0){
                   while ($row = $result->fetch_assoc())
    $result_data[$row['id']] = $row;
    foreach ($result_data as $data){
    $role_id = $data['role_id'];
    $user_id = $data['id'];
		$company_id = $data['company_id'];
}
//if($role_id==1){
//header("Location: /administrator/production/index.php");
//}else{
header("Location: /gentelella/production/index.php");
//}
             }else{
                    header("Location: /gentelella/production/login.php?error=1");
             }
$_SESSION = array(
   'user_id'=>$user_id,
    'role_id'=>$role_id,
		'company_id'=>$company_id
);






}
