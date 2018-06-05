<?php 
//session_start();
$user_id = $_SESSION['user_id'];

$sqlChat = "SELECT 
    chat.id,
    chat.message,
    chat.subject,
    chat.user_id,
    users.lastname,
    users.firstname,
    chat.time,
    chat.role_id,
    company.name,
    chat.status,
    replychat.message as reply_message,
replychat.subject as reply_subject,
replychat.user_id as reply_user_id,
replychat.create_at,
replychat.status as reply_status,
u.lastname as reply_lastname,
u.firstname as reply_firstname
FROM chat
LEFT JOIN users ON users.id = chat.user_id
LEFT JOIN company ON company.id = users.company_id
left join replychat on replychat.reply_chat_id = chat.id
left join users u on u.id = replychat.user_id
where chat.user_id = $user_id
    and  replychat.reply_user_id <> ''
order by chat.id DESC
";
$resultChat = $conn->query($sqlChat);
$resultChatData = array();
if ($resultChat->num_rows > 0) {
   
    while ($row = $resultChat->fetch_assoc()) {
       
    $resultChatData[$row['id']] = $row;
				}
} 
$sqlChatCount = "SELECT
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
users.firstname,
company.name
FROM
    replychat
LEFT JOIN users
ON
    users.id = replychat.user_id
LEFT JOIN company
ON
    company.id = users.company_id
WHERE
    replychat.status = false
AND replychat.reply_user_id  = $user_id";

//echo $sqlChatCount; die;
$resultChatCount = $conn->query($sqlChatCount);
$resultChatDataCount = array();
if ($resultChatCount->num_rows > 0) {
    while ($row = $resultChatCount->fetch_assoc()) {
    $resultChatDataCount[$row['id']] = $row;
				}
} 
foreach ($resultChatDataCount as $dataCount){
  
}
$count = count($resultChatDataCount);
//echo '<pre>'; print_r($count); die;


