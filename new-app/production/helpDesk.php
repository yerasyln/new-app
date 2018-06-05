<?php
require 'php/general.php';
?>

 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
              </div>
            </div>

              <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Служба поддержки</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                <div class="alert alert-success" id="alert" <?php if(isset($_GET['success']) && !empty($_GET['success']) ):  ?>style="display:block" <?php else: ?>  style="display:none" <?php endif;  ?> >
					Ваше сообщение успешно отправлено
					</div>
                                        	<div class="alert alert-danger" id="error" style="display:none"  >
					  <strong>Ошибка.</strong> Ваше сообщение не было отправлено
					</div>
                    <form id="myform" data-parsley-validate class="form-horizontal form-label-left" action="php/sendMess.php"  method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Тема
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="subject" name="subject" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Сообщение:<span class="required">*</span></label>

                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea id="mess" name="mess" class="form-control" rows="6" required="required"></textarea>
                         </div>
                        </div>

                    <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">
              Прикрепить файл
              </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="file" name="file"/>
              </div>
          </div>




                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <a href="index.php" class="btn btn-primary" role="button">Отмена</a>
                         <input type="submit" name="submit" class="btn btn-success submitBtn" value="Отправить"/>

                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>





          </div></div>

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
      console.log('asdasdasd');
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

</body>
</html>
