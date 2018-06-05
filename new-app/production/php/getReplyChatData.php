<?php

if(isset($_GET['id']) && !empty($_GET['id'])){
    $message_id = $_GET['id'];
    

$sqlReplyChat = "SELECT
    replychat.id,
    replychat.subject,
    replychat.message,
    replychat.reply_user_id,
    replychat.reply_chat_id,
    replychat.user_id,
    replychat.create_at,
    replychat.role_id,
    replychat.status,
users.lastname,
users.firstname
FROM
    replychat
left join users on users.id = replychat.user_id
WHERE
    replychat.reply_chat_id = $message_id
ORDER BY
    id DESC";
$resultReplyChat = $conn->query($sqlReplyChat);
$resultReplyChatData = array();
if ($resultReplyChat->num_rows > 0) {
    while ($row = $resultReplyChat->fetch_assoc()) {
    $resultReplyChatData[$row['id']] = $row;
				}
}
}
//echo '<pre>'; print_r($resultReplyChatData); die;