<?php
require 'php/getQuestions.php';
require 'php/general.php';

?>


<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">

				<h4>
					<i><?php echo $result_data['title'];  ?></i>
				</h4>

			</div>


		</div>


		<script src="../build/js/highcharts.js"></script>
		<script src="../build/js/exporting.js"></script>


		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Динамика NPS</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>

							<li><a onClick="exportToExcel('average_nps_export');" ><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>


						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">



						<div id="reportrange_nps_average" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      		<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      		<span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                   		 </div>

						<div id="average" style="height: 350px; width:100%;"></div>

						<div id="average_nps_export" ></div>

					</div>
				</div>
			</div>


			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>NPS</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li>
								<a onClick="exportToExcel('echart_pie_export');" ><i class="fa fa-download" aria-hidden="true"></i></a>
              </li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div id="echart_pie" style="height: 350px;"></div>

						<div id="echart_pie_export" style="display: none;" >
						<table class="table">
    					 <tr>
    					 	<th>Промоутеры</th>
    					 	<th>Нейтралы</th>
    					 	<th>Детракторы</th>
    					 </tr>
    					 <tr>
    					 <td><?php echo $count_for_question_well_percentage; ?></td>
    					 <td><?php echo $count_for_question_good_percentage; ?></td>
    					 <td><?php echo $count_for_question_bad_percentage; ?></td>
    					 </tr>
					 	</table>
						</div>

						 <div style="height:20px;"></div>


					</div>
				</div>
			</div>


			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Динамика NPS точки контакта</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li>
								<a onClick="exportToExcel('poi_nps_export');"><i class="fa fa-download"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div id="reportrange_nps_poi" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      		<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      		<span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                   		 </div>



					 <div id="poi_nps" style="height:350px; width:100%"></div>

					  <div id="poi_nps_export" ></div>


					</div>
				</div>
			</div>


			 <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Точки контакта</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li>
    									<a onClick="exportToExcel('bar_poi_nps');"><i class="fa fa-download"></i></a>
    							</li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height: 60%">
                    <h4>
                      	<b>Call-center&nbsp;&nbsp;</b>
                  	</h4>

                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo !empty($ConnectionDot_arr['call-center']['rate'])?$ConnectionDot_arr['call-center']['rate']: 0;  ?>;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>

                 <h4>
                      <b><?php echo !empty($ConnectionDot_arr['call-center']['rate'])? $ConnectionDot_arr['call-center']['rate']: 0;  ?></b>
                  </h4>
                    <div class="clearfix"></div>

                  <h4>
                      <b>Офис продаж&nbsp;&nbsp;</b>
                    </h4>

                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo  !empty($ConnectionDot_arr['office']['rate'])? $ConnectionDot_arr['office']['rate']:0;  ?>;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>

                      <h4><b><?php echo !empty($ConnectionDot_arr['office']['rate'])? $ConnectionDot_arr['office']['rate']:0;  ?></b></h4>

                    <div class="clearfix"></div>


                   <h4>
                      <b>Техподдержка&nbsp;&nbsp;&nbsp;</b>
                   </h4>

                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo !empty($ConnectionDot_arr['help_desk']['rate'])? $ConnectionDot_arr['help_desk']['rate']:0;  ?>;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>

                     <h4><b>
                      <?php echo !empty($ConnectionDot_arr['help_desk']['rate'])? $ConnectionDot_arr['help_desk']['rate']:0;  ?></b>
                     </h4>
                    <div class="clearfix"></div>

				  <div id="bar_poi_nps" style="display: none;">
    				  <table class="table">
    				  <tr>
    				  	<th>Call-centr</th>
    				  	<th>Офис продаж</th>
    				  	<th>Техподдержка</th>
    				  </tr>
    				  <tr>
    				  	<td><?php echo $ConnectionDot_arr['call-center']['rate']; ?></td>
    				  	<td><?php echo $ConnectionDot_arr['office']['rate']; ?></td>
    				  	<td><?php echo $ConnectionDot_arr['help_desk']['rate']; ?></td>
    				  </tr>
    				  </table>
				  </div>

				   <div style="height:63px;"></div>

                  </div>

                </div>
              </div>

            </div>


	<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>NPS Response rate</h2>

							<ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li>
    											<a onClick="exportToExcel('chart_nps_response_rate_export');"><i class="fa fa-download"></i></a>
    								</li>

                  </ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">

                        <div id="reportrange_nps_detail" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                       </div>

						<div id="chart_nps_response_rate" style="height: 350px;"></div>

						<div id="chart_nps_response_rate_export" style="display: none;"></div>

					</div>
				</div>
			</div>




			<!--<script src="http://code.highcharts.com/js/highcharts.src.js"></script>-->



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



    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- ECharts -->
<script src="../vendors/echarts/dist/echarts.min.js"></script>
<script src="../vendors/echarts/map/js/world.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>



<script>

var question_asked_arr = <?php echo  $question_asked_arr!=null?  json_encode($question_asked_arr): null; ?>

<?php if($response_rate_arr!=null): ?>
var response_rate_arr = <?php echo   json_encode($response_rate_arr); ?>
<?php else: ?>
var response_rate_arr = null;
<?php endif; ?>

if(response_rate_arr=='undefined' || response_rate_arr==null){

	question_asked_arr = null;
}



var count_for_question_total = <?php echo json_encode($count_for_question_total); ?>

var count_for_question_bad = <?php echo  $count_for_question_bad!=null?  json_encode($count_for_question_bad): null; ?>

var count_for_question_good = <?php echo $count_for_question_good!=null?  json_encode($count_for_question_good): null; ?>

var count_for_question_well = <?php echo $count_for_question_well!=null?  json_encode($count_for_question_well): null; ?>



var count_for_question_bad_percentage = <?php echo    json_encode($count_for_question_bad_percentage); ?>

var count_for_question_good_percentage = <?php echo   json_encode($count_for_question_good_percentage); ?>

var count_for_question_well_percentage = <?php echo   json_encode($count_for_question_well_percentage); ?>



function exportToExcel11(name_html){



    var table = $('#'+name_html).html();



    var htmls = "";
    var uri = 'data:application/vnd.ms-excel;base64,';
    var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>';
    var base64 = function(s) {
    return window.btoa(unescape(encodeURIComponent(s)))
    };

    var format = function(s, c) {
    return s.replace(/{(\w+)}/g, function(m, p) {
    return c[p];
    })
    };

    htmls = table;

    var ctx = {
    worksheet : 'Worksheet',
    table : htmls
    }


    var link = document.createElement("a");
    link.download = "export.xls";
    link.href = uri + base64(format(template, ctx));
    link.click();

}





</script>


<script>
var getData = <?php echo json_encode($_GET); ?>;

var percentage_response_rate = <?php echo  json_encode( $percentage_response_rate) ?>;

//alert();


var res_channel_arr_call_center_year = <?php echo  json_encode($res_channel_arr_call_center_year)  ?>;

var res_channel_arr_help_desk_year = <?php echo  json_encode($res_channel_arr_help_desk_year)  ?>;


var res_channel_arr_office_year = <?php echo  json_encode($res_channel_arr_office_year)  ?>;


//alert(res_channel_arr_call_center_year);




var array_bad_obj = <?php echo json_encode($array_bad); ?>;
var array_good_obj = <?php echo json_encode($array_good); ?>;
var array_well_obj = <?php echo json_encode($array_well); ?>;

var arr_bad =[];
var arr_good =[];
var arr_well =[];

for( var i in array_bad_obj ) {
    if (array_bad_obj.hasOwnProperty(i)){
    	arr_bad.push(parseFloat(array_bad_obj[i]));
    }
}

for( var i in array_good_obj ) {
    if (array_good_obj.hasOwnProperty(i)){
    	arr_good.push(parseFloat(array_good_obj[i]));
    }
}

for( var i in array_well_obj ) {
    if (array_well_obj.hasOwnProperty(i)){
    	arr_well.push(parseFloat(array_well_obj[i]));
    }
}













</script>


<script>


var getData = <?php echo json_encode($_GET); ?>;


var questions = <?php echo json_encode($count_question ); ?>;

var respond = <?php echo json_encode($count_respond ); ?>;





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





</body>
</html>
