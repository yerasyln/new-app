<?php
require 'db.php';

$company_id = 0;
if(isset($_GET['phone_number'])){
    $questionsCount = 0;
    $company_id = 0;
    $phone_number = $_GET['phone_number'];
      $sql ="select
            (
              select
                questionsCount
              from
                company
              where
                id = clients_contact.company_id
            ) as questionsCount,
            company_id
          from
            clients_contact
          where
          phone like '%$phone_number%'";

        $result = $conn->query($sql);

        if($result){
            if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){
                        $questionsCount = $row['questionsCount'];
                        $company_id = $row['company_id'];
                  }
            }
        }

}


    $sqlOptions = "SELECT
    sp.id,
    sp.code,
    sp.title,
    sp.created,
    sp.status,
    sp.question_type,
ao.code as answer_code,
ao.title as answer_options,
ao.is_comment
FROM
    simple_questions sp
left join answers_options ao on ao.question_id = sp.id
where sp.company_id=$company_id

";


    $resultOptions = $conn->query($sqlOptions);
    $result_dataOptions = array();
    if ($resultOptions->num_rows > 0) {
        while ($row = $resultOptions->fetch_assoc()) {

            $result_dataOptions[] = $row;
        }
    }






//echo '<pre>'; print_r($result_dataOptions); die;
