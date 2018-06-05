<?php
require 'php/general.php';

if(isset($_GET)){
    $id = $_GET['id'];
    
}
$sql = "select * from users where id = $id";

$result = $conn->query($sql);

$result_data = array();

if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()) {
        // echo "<pre>"; print_r($row);
    $result_data[$row['id']] = $row;
		
		}
        
} else {
  //  echo "0 results";
}

?>
   <div class="right_col" role="main">
          <div class="">

 <div class="clearfix"></div>
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Редактировать запись<small>  </small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<?php 
                                        
foreach($result_data as $data){
    
    //echo '<pre>'; print_R($result_data);die;
	$id = $data['id'];
	$firstname = $data['firstname'];
	$lastname = $data['lastname'];
$patronymic = $data['patronymic'];  
$status = $data['status'];  
$company_id = $data['company_id'];  
$role_id = $data['role_id'];  
$position = $data['position'];  
$login = $data['login']; 
$password = $data['password']; 
}


$sqlCompany_id = "select * from company where id = $company_id";

$resultCompany_id = $conn->query($sqlCompany_id);

$result_dataCompany_id = array();

if ($resultCompany_id->num_rows > 0) {
   
    while ($row5 = $resultCompany_id->fetch_assoc()) {
        // echo "<pre>"; print_r($row);
    $result_dataCompany_id[$row5['id']] = $row5;
		
		}
        
} else {
  //  echo "0 results";
}
foreach ($result_dataCompany_id as $dataCompany_id){
    
    $comp_id = $dataCompany_id['id'];
    $comp_name = $dataCompany_id['name'];
}
//echo '<pre>'; print_r($result_dataCompany_id); die;

$sqlCompanyAll = "select * from company";

$resultCompanyAll = $conn->query($sqlCompanyAll);

$result_dataCompanyAll = array();

if ($resultCompanyAll->num_rows > 0) {
   
    while ($row6 = $resultCompanyAll->fetch_assoc()) {
        // echo "<pre>"; print_r($row);
    $result_dataCompanyAll[$row6['id']] = $row6;
		
		}
        
} else {
  //  echo "0 results";
}

?>
                    <h4>Поля отмеченные * обязательны для заполнения</h4>
                    <form  method="POST" action="php/updateUser.php" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">Код
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="id" name="id" required="required" value="<?php echo $id;?>" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Имя<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="firstname"  value="<?php echo $firstname;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Фамилия<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="lastname"  value="<?php echo $lastname;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="patronymic">Очество</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="patronymic"  value="<?php echo $patronymic;?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                          
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_id">Компания
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <input type="text" value="<?php echo $comp_name;?>"  class="form-control col-md-7 col-xs-12" readonly>
                            
                            
                 
                        </div>
                      </div>
                          
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Должность
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
   <input type="text" id="last-name" name="position"  value="<?php echo $position;?>"  class="form-control col-md-7 col-xs-12">
                       
                        </div>
                      </div>
          
                       
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="login">Логин<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
   <input type="text" id="last-name" name="login"  value="<?php echo $login;?>" required="required" class="form-control col-md-7 col-xs-12">
                       
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Пароль
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
   <input type="password" id="last-name" name="password"  placeholder="*******" class="form-control col-md-7 col-xs-12">
                       
                        </div>
                      </div>
                        
					  

                      
                
                     
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         
                          <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
   </div>

    <footer>
        <div class="pull-right">
           Powered by DMS survey platform

        </div>
        <div class="clearfix"></div>
    </footer>

