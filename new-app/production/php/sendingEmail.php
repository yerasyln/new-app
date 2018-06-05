<?php

//echo $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."gentelella".DIRECTORY_SEPARATOR.'phpmailer/JPhpMailer.php' ; die;
require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "gentelella" . DIRECTORY_SEPARATOR . 'phpmailer/JPhpMailer.php';
require 'db.php';


$str = 'Перейдите пожалуйста по ссылке http://prostartup.kz/gentelella/production/askQuestions.php?phone_number=';

if (isset($_POST['simple_question'])) {
    $str = 'Перейдите пожалуйста по ссылке http://prostartup.kz/gentelella/production/askSimpleQuestions.php?phone_number=';
}




$sql = "SELECT email, phone FROM clients_contact WHERE is_active=1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $phone = $row['phone'];
        $message = $str.$phone;
   
        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';

        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'hitch_911@mail.ru';
        $mail->Password = 'magnat78900456';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setLanguage('ru');
        $mail->setFrom('hitch_911@mail.ru', '');
        $mail->addAddress($row['email'], '');
        $mail->isHTML(false);

        $mail->Subject = 'Опрос';
        $mail->Body = $message;
        $mail->AltBody = '';

        if (!$mail->send()) {
            echo 'Ошибка при отправке. Ошибка: ' . $mail->ErrorInfo;
        } else {
         //   echo $message;
         //  echo "<br>";
         //   echo $email;
         //   echo "<br>";
            $sql = "update clients_contact set is_send = 1   where phone = " . $phone;
            $conn->query($sql);
            echo 'Сообщение успешно отправлено';
        }
    }
}

