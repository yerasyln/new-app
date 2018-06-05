<?php 
require 'php/general.php';
//require 'db.php';
if(isset($_GET)){

    $user_id = $_GET['user_id'];
}


$sqlUsers = "select u.id,u.firstname,u.lastname,u.patronymic,u.status,c.name as company_name,c.region,u.role_id,r.name as role_name,u.`position`,u.login,u.password from users u
left join company c on c.id = u.company_id 
left join role r on r.id = u.role_id
where u.id = $user_id";
$resultUsers = $conn->query($sqlUsers);
$resultUsersData = array();
if ($resultUsers->num_rows > 0) {
   
    while ($row = $resultUsers->fetch_assoc()) {
      
    $resultUsersData[$row['id']] = $row;
				}
} else {
    echo "0 results";
}

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>Личные данные</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/user.png" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                        <?php 
//echo '<pre>'; print_R($resultUsersData); die;

 foreach ($resultUsersData as $userData){
     $id = $userData['id'];
     $firstname = $userData['firstname'];
     $lastname = $userData['lastname'];
     $patronymic = $userData['patronymic'];
     $status = $userData['status'];
     $company = $userData['company_name'];
     $region = $userData['region'];
     $role = $userData['role_name'];
     $position = $userData['position'];
     $login = $userData['login'];
     $password = $userData['password'];
     
 }

?>
                      <h3><?php echo $lastname." ".$firstname." ".$patronymic;?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-university user-profile-icon"></i> <?php echo $company;?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $position;?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                         <?php echo $role;?>
                        </li>
                      </ul>

                      <a class="btn btn-success" href="editUser.php?id=<?php echo $user_id;?>"><i class="fa fa-edit m-right-xs"></i> Изменить данные</a>
                      <br/>


                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <footer>
        <div class="pull-right">
        Powered by DMS survey platform


        </div>
        <div class="clearfix"></div>
    </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>