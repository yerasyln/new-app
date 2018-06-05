<?php



require 'php/getQuestionsForEdit.php';

 

require 'php/general.php';

require 'php/editQuestions.php';






?>




<!DOCTYPE html>
<html lang="en">
  <head>
 

   
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<script>

</script>

  </head>

  
  



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Изменить вопрос</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div >
                  <div class="x_content">
  					
  					
                    
                    
                    <br>
                       <div id="step-4">
					   
					   <div class="alert alert-success" id="alert" style="display:none">
					  <strong>Успешно</strong>сохранен.
					</div>
					
					<div class="alert alert-danger" id="error" style="display:none"  >
					  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
					</div>
                 
                       <button type="button"  id="sending" class="btn btn-round btn-primary" onclick="edit()">Изменить</button>
     
	                   <button type="button" id="loading" style="display:none"  class="btn btn-round btn-warning"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>

                     <div  id="refresh" >   
					  <?php foreach($result_data as $data): ?>
					  	<span id="id_question" style="display:none"><?php echo $data['id']; ?></span>
					 <textarea  class="form-control" id="question" rows="10"  cols="20" >
                   
							 
			
								<?php echo  $data['title'];  ?>
	
							  
                 
					 </textarea>
					 <?php endforeach;  ?>
					 </div>

                    </div>
  				 
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

<script type="text/javascript">

//var button =  "<a class='btn btn-default buttons-print btn-sm' tabindex='0' aria-controls='datatable-buttons' href='#'> <span>Print2</span></a>";
//alert(JSON.stringify($("#datatable-buttons_wrapper").find('.dt-buttons btn-group').html("<h1>TEST</h1>")));
//$('.dt-buttons').html(button);




   function edit(){

	 var question  =  $('#question').val().trim(); 
	 var id_question = $('#id_question').text().trim();
	
	 
	$('#loading').css('display','block');	
	$('#sending').css('display','none');

	
		$.post("php/editQuestions.php",
    		    {
    		        edit_question:question,
					id_question:id_question					
    		    },
    		    function(data, status){
					
				
					
        		 if(data==true){
        			 
						$('#loading').css('display','none');
						$('#sending').css('display','block');
						$('#question').load(location.href+" #loading_page>*","");
						$('#alert').css('display','block');	
						$("#alert").fadeTo(2000, 500).slideUp(500, function(){
						$("#alert").slideUp(500);
						});
						
				}else{
					
					$('#error').css('display','block');	
						$("#error").fadeTo(2000, 500).slideUp(500, function(){
						$("#error").slideUp(500);
						});
					
				}   
    		    
    		        
         });
		
	 


	} 





</script>



<!-- jQuery -->
   <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
        <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
     <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>

	
  </body>
</html>