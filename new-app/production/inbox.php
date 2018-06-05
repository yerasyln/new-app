<?php
require 'php/general.php';
require 'php/getReplyChatData.php';
//require 'deleteChat.php';
?>
<div class="right_col" role="main">
          <div class="">

     
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Сообщений от пользователей<small></small></h2>
                   <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
                          
                        <button id="compose" class="btn btn-sm btn-success btn-block" type="button"  data-toggle="modal" data-target="#myModal">  Написать</button>
                        <?php $i = 0;?>
                            <?php foreach ($resultChatData as $chatData):?>
                     <?php if(++$i > 5) break;?>
                        <a href="inbox.php?id=<?php echo $chatData['id'];?>">
                          <div class="mail_list">
                            <div class="left">
                                <?php if($chatData['reply_status']==false):?>
                               <i class="fa fa-envelope"></i>
                               
                               <?php else:?>
                          <i class="fa fa-eye"></i>
                               <?php endif;?>
                           </div>
                            <div class="right">
                              <h3><?php echo 'Техподдержка';?><small><?php echo $chatData['create_at'];?></small></h3>
                              <p><font size="2"><b>Тема:</b> </font> <?php echo substr($chatData['subject'],0,200);?></p>
                              <p><?php echo substr($chatData['reply_message'],0,250)."...";?></p>
                            </div>
                          </div>
                        </a>
                         <?php endforeach;?>
                      </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                      <?PHP if(isset($_GET['id']) && !empty($_GET['id'])):
                          $id = $_GET['id'];
                          if(isset($_GET['id']) && !empty($_GET['id'])){
                              $updateSqlChata ="UPDATE replychat SET replychat.status='1' WHERE  replychat.reply_chat_id = $id";
                           //   echo $updateSqlChata; die;
                                mysqli_query($conn, $updateSqlChata);
	
                          }
                          ?>
                      
                      
                      <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                              <div class="btn-group">
                     
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#replyModal"><i class="fa fa-reply"></i>  Ответить</button>
                             
                             
                              </div>
                            </div>
                             
                            <div class="col-md-4 text-right">
                              <p class="date"> <?php echo $resultChatData[$id]['time'];?></p>
                            </div>
                              <br><br>
                            <div class="col-md-12">
                                <span><font size="4"> Тема: </font><?php echo $resultChatData[$id]['subject'];?></span>
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                  <font size="3"> От кого: </font><span> <?php echo $resultChatData[$id]['lastname'].' '.$resultChatData[$id]['firstname'];?></span><br>
                                
                                   <font size="3"> Компания: </font><span><?php echo $resultChatData[$id]['name'];?></span>
                                
                              </div>
                            </div>
                          </div>
                            <br>
                          <div class="view-mail">
                              <font size="2">  <b><i><?php echo $resultChatData[$id]['lastname'].' '.$resultChatData[$id]['firstname'];?>: </i></b></font>
                            <p><?php echo $resultChatData[$id]['message'];?></p>
                            </div>
                            <hr>
                              
                            
                            
                            <!--start otvet ot administratora -->
                           
                            <?php foreach ($resultReplyChatData as $ReplyChatData):?>
                            <div class="mail_heading row">
                            
                            <div class="col-md-12">
                                <font size="2"> <b><i>Техподдержка: </i></b></font>
                                <span><?php  echo $ReplyChatData['message'];?></span>
                            </div>
                                <div class="col-md-12 text-right">
                              <p class="date"> <?php  echo $ReplyChatData['create_at'];?></p>
                            </div>
                                
                                
                                </div>
                            <hr>    
                            <?php endforeach;?>
                            <!-- end otvet ot administratora-->
                          
                            
                            
                            
                            
                            
                          <!--<div class="attachment">
                            <p>
                              <span><i class="fa fa-paperclip"></i> 3 attachments — </span>
                              <a href="#">Download all attachments</a> |
                              <a href="#">View all images</a>
                            </p>
                            <ul>
                              <li>
                                <a href="#" class="atch-thumb">
                                  <img src="images/inbox.png" alt="img" />
                                </a>

                                <div class="file-name">
                                  image-name.jpg
                                </div>
                                <span>12KB</span>


                                <div class="links">
                                  <a href="#">View</a> -
                                  <a href="#">Download</a>
                                </div>
                              </li>

                              <li>
                                <a href="#" class="atch-thumb">
                                  <img src="images/inbox.png" alt="img" />
                                </a>

                                <div class="file-name">
                                  img_name.jpg
                                </div>
                                <span>40KB</span>

                                <div class="links">
                                  <a href="#">View</a> -
                                  <a href="#">Download</a>
                                </div>
                              </li>
                              <li>
                                <a href="#" class="atch-thumb">
                                  <img src="images/inbox.png" alt="img" />
                                </a>

                                <div class="file-name">
                                  img_name.jpg
                                </div>
                                <span>30KB</span>

                                <div class="links">
                                  <a href="#">View</a> -
                                  <a href="#">Download</a>
                                </div>
                              </li>

                            </ul>
                          </div>
                          -->
                        </div>

                      </div>
                      <?Php endif;?>
                      
                      <!-- /CONTENT MAIL -->
                      
                        <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
                 <div class="alert alert-success" id="alert" style="display:none">
					Сообщение успешно отправлено 
		</div>
          <div class="alert alert-danger" id="error" style="display:none"  >
					  <strong>Ошибка.</strong> Ваше сообщение не было отправлено
					</div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Написать техподдержке</h4>
      </div>
      <div class="modal-body">
 
                    	
                    <form id="myform" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                      <div class="form-group">
          
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <input type="text" id="subject" name="subject" placeholder="Тема" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <div class="form-group">
                       
                         <div class="col-md-12 col-sm-6 col-xs-12">
                             <textarea id="mess" name="mess" class="form-control" placeholder="Сообщение объязательно" rows="6" required="required"></textarea>
                         </div>
                        </div>
                            
                    <div class="form-group">
      
             <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="file" name="file"/>   
              </div>
          </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                        
                         <input type="submit" name="submit" class="btn btn-success submitBtn" value="Отправить"/>
                        </div>
                      </div>

                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>

  </div>
</div>
<!-- modal end -->


<!-- ReplyModal -->
<div id="replyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
                 <div class="alert alert-success" id="alertReply" style="display:none">
					Сообщение успешно отправлено 
		</div>
          <div class="alert alert-danger" id="errorReply" style="display:none"  >
					  <strong>Ошибка.</strong> Ваше сообщение не было отправлено
					</div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ответить</h4>
      </div>
      <div class="modal-body">
 
                    	
                    <form id="replyForm" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                      <div class="form-group">
          
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <input type="text" id="subject" name="subject" value="<?php echo $resultChatData[$id]['subject'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <div class="form-group">
                       
                         <div class="col-md-12 col-sm-6 col-xs-12">
                             <textarea id="mess" name="mess" class="form-control" placeholder="Сообщение объязательно" rows="6" required="required"></textarea>
                         </div>
                        </div>
                            
                    <div class="form-group">
      
             <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="file" name="file"/>   
              </div>
          </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                        
                         <input type="submit" name="submit" class="btn btn-success submitBtn" value="Отправить"/>
                        </div>
                      </div>

                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>

  </div>
</div>
<!-- Replymodal end -->                      


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  <!-- footer content -->
    <footer>
        <div class="pull-right">
          Powered by DMS survey platform 
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    
    <script src="../build/js/tagsCloud.js"></script>
    
  
    
    
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script
    src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>


    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>
<!-- amCharts javascript sources -->
		<script type="text/javascript" src="../lib/amcharts.js"></script>
		<script type="text/javascript" src="../lib/serial.js"></script>

    <script type="text/javascript">
$(document).ready(function(e){
    $("#myform").on('submit', function(e){
        e.preventDefault();
        $.ajax({
          
            type: 'POST',
            url: 'php/sendMess.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#myform').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == true){
                    $('#myform')[0].reset();
                    $("alert").html(msg); 
         $('#alert').css('display','block');	
     $("#alert").fadeTo(4000, 500).slideUp(500, function(){    
	$("#alert").slideUp(500);
        });
                }else{
                                 $("error").html(msg); 
         $('#error').css('display','block');	
     $("#error").fadeTo(4000, 500).slideUp(500, function(){    
	$("#error").slideUp(500);
        });
                }
                $('#myform').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });                  
      //file type validation
    $("#file").change(function() {

        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/pdf"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4]) || (imagefile==match[5]))){
            alert('Выберите файл в формате (JPEG/JPG/PNG/DOCX/XLSX/PDF).');
            $("#file").val('');
            return false;
        }
    });
});          

</script>   
<script type="text/javascript">
$(document).ready(function(e){
    $("#replyForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
          
            type: 'POST',
            url: 'php/sendMess.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#replyForm').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == true){
                    $('#replyForm')[0].reset();
                    $("alertReply").html(msg); 
         $('#alertReply').css('display','block');	
     $("#alertReply").fadeTo(4000, 500).slideUp(500, function(){    
	$("#alertReply").slideUp(500);
        });
                }else{
                                 $("errorReply").html(msg); 
         $('#errorReply').css('display','block');	
     $("#errorReply").fadeTo(4000, 500).slideUp(500, function(){    
	$("#errorReply").slideUp(500);
        });
                }
                $('#replyForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });                  
      //file type validation
    $("#file").change(function() {

        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/pdf"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4]) || (imagefile==match[5]))){
            alert('Выберите файл в формате (JPEG/JPG/PNG/DOCX/XLSX/PDF).');
            $("#file").val('');
            return false;
        }
    });
});          


</script>   
</body>
</html>

