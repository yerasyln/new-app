<?php
require 'php/questionDetailData.php';
require 'php/general.php';

?>


<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">

				<h4>
					<i><?php echo isset($result_data['title'])?$result_data['title']:"";  ?></i>
				</h4>

			</div>


		</div>



		<script src="../build/js/highcharts.js"></script>
		<script src="../build/js/exporting.js"></script>


		<div class="clearfix"></div>

		<div class="row">


          <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Распределение ответов</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li>
                     	<a onClick="exportToExcel('bar_questions_name');"><i class="fa fa-download"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" >

									<?php  if(!empty($result_answers)): ?>

                  <?php foreach($result_answers as $bar_data): ?>
                  <h4>
                      	<b><?php echo $bar_data['label']; ?>&nbsp;&nbsp;</b>
                  </h4>

                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $bar_data['rate'];  ?>;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>


                      <h4><b><?php echo $bar_data['value']." (".$bar_data['rate'].")";  ?></b></h4>

                    <div class="clearfix"></div>

                <?php endforeach; ?>
							<?php else: ?>

								<h4>
											<b>Пусто</b>
								</h4>

										<div class="progress">
											<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 0;  ?>;">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>


										<h4><b><?php echo "0 (0)";  ?></b></h4>

									<div class="clearfix"></div>


								<?php endif; ?>

             <div id="bar_questions_name" style="display: none;">
             		<table class="table">
             		<tr>
             		<?php foreach($result_answers as $bar_data): ?>
             			<th><?php echo $bar_data['label'];  ?></th>
             		<?php endforeach; ?>
             		</tr>
             		<tr>
             		<?php foreach($result_answers as $bar_data): ?>
             		<th><?php echo $bar_data['value'];  ?></th>
             		<?php endforeach; ?>
             		</tr>
             		</table>
                 </div>
                  </div>
                </div>

              </div>


			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Response rate</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li>
								<a onClick="exportToExcel('respond_rate_question_export');"><i class="fa fa-download"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content" style="height: 53%">


				            <div id="reportrange_nps_question" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                           </div>


						<div id="respond_rate_question" style="height: 385px; width: 100%;"></div>

						<div id="respond_rate_question_export"></div>

					</div>
              <div style="height: 130px;" ></div>
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


<script>

 var getData = <?php echo json_encode($_GET); ?>;

var data_question_detail  = <?php echo json_encode($result_answers);  ?>;


var question_asked_arr = <?php echo  $question_asked_arr!=null?  json_encode($question_asked_arr): null; ?>

<?php if($response_rate_arr!=null): ?>
var response_rate_arr = <?php echo   json_encode($response_rate_arr); ?>
<?php else: ?>
var response_rate_arr = null;
<?php endif; ?>

var percentage_response_rate = <?php echo  json_encode( $percentage_response_rate) ?>;

</script>





<script type="text/javascript">
var exportToExcel = (function() {
var uri = 'data:application/vnd.ms-excel;base64,'
, template = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:x='urn:schemas-microsoft-com:office:excel' xmlns='http://www.w3.org/TR/REC-html40'><head><!--[if gte mso 9]><?xml version='1.0' encoding='UTF-8' standalone='yes'?><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name></x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>"
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
return function(table, name) {
	if (!table.nodeType) table = document.getElementById(table)
	var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
window.location.href = uri + base64(format(template, ctx))
}
})()
</script>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
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






</body>
</html>
