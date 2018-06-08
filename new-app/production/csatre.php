<?php

require 'php/csatGetData.php';
require 'php/general.php';

?>


<style>

.row.vertical-divider {
  overflow: hidden;
}
.row.vertical-divider > div[class^="col-"] {
  text-align: center;
  padding-bottom: 100px;
  margin-bottom: -100px;
  border-left: 3px solid #F2F7F9;
  border-right: 3px solid #F2F7F9;
}
.row.vertical-divider div[class^="col-"]:first-child {
  border-left: none;
}
.row.vertical-divider div[class^="col-"]:last-child {
  border-right: none;
}

</style>


<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">

				<h4>
					<i><?php echo !empty($result_data[0]['title'])? $result_data[0]['title']:"";  ?></i>
				</h4>

			</div>


		</div>

		  <div class="row top_tiles " style="margin: 10px 0;">
              <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>Общий показатель</span>
                <h3><b><?php echo !empty($sred_data_arr[0]['arif'])? $sred_data_arr[0]['arif']:0;  ?> </b>
                 <span>|</span>
                 <b><?php echo !empty($sred_data_arr[0]['col'])? $sred_data_arr[0]['col']:0;  ?></b>
                  <span>|</span>
                 <b><?php echo !empty($sred_data_arr[0]['resp'])? $sred_data_arr[0]['resp']."%":0;  ?></b>
                </h3>

                  <span style="font-size: 11px;"><?php echo !empty($csat_title)? $csat_title :"CSAT" ?></span><span>|</span>
                  <span style="font-size: 10px;"> всего опрошенных</span><span>|</span>
                  <span style="font-size: 11px;"> response rate</span>

                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>

              </div>


              <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>Call-center</span>
                <h3><b><?php echo isset($sred_data_call_arr[0]['arif'])? $sred_data_call_arr[0]['arif']:0;  ?> </b>
                 <span>|</span>
                 <b><?php echo isset($sred_data_call_arr[0]['col'])? $sred_data_call_arr[0]['col']:0;  ?></b>
                  <span>|</span>
                 <b><?php echo isset($sred_data_call_arr[0]['resp'])? $sred_data_call_arr[0]['resp']."%":0;  ?></b>
                </h3>

                  <span style="font-size: 11px;"><?php echo !empty($csat_title)? $csat_title :"CSAT" ?></span><span>|</span>
                  <span style="font-size: 10px;"> всего опрошенных</span><span>|</span>
                  <span style="font-size: 11px;"> response rate</span>
                <span class="sparkline_two" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>Офис продаж</span>
                <h3><b><?php echo isset($sred_data_office_arr[0]['arif'])? $sred_data_office_arr[0]['arif']:0;  ?> </b>
                 <span>|</span>
                 <b><?php echo isset($sred_data_office_arr[0]['col'])? $sred_data_office_arr[0]['col']:0;  ?></b>
                  <span>|</span>
                 <b><?php echo isset($sred_data_office_arr[0]['resp'])? $sred_data_office_arr[0]['resp']."%":0;  ?></b>
                </h3>

                  <span style="font-size: 11px;"><?php echo !empty($csat_title)? $csat_title :"CSAT" ?></span><span>|</span>
                  <span style="font-size: 10px;"> всего опрошенных</span><span>|</span>
                  <span style="font-size: 11px;"> response rate</span>
                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>Тех.поддержка</span>
                 <h3><b><?php echo isset($sred_data_help_desc_arr[0]['arif'])? $sred_data_help_desc_arr[0]['arif']:0;  ?> </b>
                 <span>|</span>
                 <b><?php echo isset($sred_data_help_desc_arr[0]['col'])? $sred_data_help_desc_arr[0]['col']:0;  ?></b>
                  <span>|</span>
                 <b><?php echo isset($sred_data_help_desc_arr[0]['resp'])? $sred_data_help_desc_arr[0]['resp']."%":0;  ?></b>
                </h3>

                  <span style="font-size: 11px;"><?php echo !empty($csat_title)? $csat_title :"CSAT" ?></span><span>|</span>
                  <span style="font-size: 10px;"> всего опрошенных</span><span>|</span>
                  <span style="font-size: 11px;"> response rate</span>
                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
              </div>

            </div>



            <div id="getData"><?php !empty($_GET)?$_GET:""

                                ?>	</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-8 col-sm-8 col-xs-9">
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo !empty($csat_title)? $csat_title :"CSAT в динамике" ?> </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>

						<li><a onClick="exportToExcel('chart_csat_export')" ><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>
						</ul>
						<div class="clearfix"></div>
					</div>
		<div id="reportrange_csat" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
					<div class="x_content">


					 <div id="chart_csat" style="height:350px;"></div>

					 <div id="chart_csat_export" ></div>

					<br>
					<br>

					</div>
				</div>
			</div>



			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo !empty($csat_title)? $csat_title :"CSAT " ?> </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>

							<li><a onClick="exportToExcel('csat_export')" ><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<h4>Уровни удовлетворенности</h4>
						<div>

              <?php foreach($data_detail_answer_option_arr as $detail_answer_option):  ?>
                <p>
                <?php echo $detail_answer_option['title']; ?> <span><?php echo $detail_answer_option['counter']." (". $detail_answer_option['rate'] .")";  ?></span>
                </p>
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                            style="width: <?php echo $detail_answer_option['rate']; ?>;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              <?php endforeach; ?>




							<div class="clearfix"></div>
						</div>



						<div id="csat_export" style="display:none;">
						<table class="table">
              <?php foreach($data_detail_answer_option_arr as $data_detail_answer_option): ?>
                <tr>
                  <td><?php echo $data_detail_answer_option['title']; ?></td>
                  <td><?php echo $data_detail_answer_option['counter']." (".$data_detail_answer_option['rate'].")"; ?></td>
                </tr>
              <?php endforeach ?>
						</table>
						</div>

						<div class="clearfix"></div>
					 <div style="height: 35px"></div>

					</div>
				</div>
			</div>


						<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo !empty($csat_title)? $csat_title :"CSAT Response rate" ?> </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
					<li><a onClick="exportToExcel('chart_csat_response_rate_export')" ><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>

						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">



                   <div id="reportrange_csat_response" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>

						<div id="chart_csat_response_rate" style="height: 350px;"></div>

						<div id="chart_csat_response_rate_export" ></div>

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
		Powered by DMS survey platform
	</div>
	<div class="clearfix"></div>
</footer>
<!-- /footer content -->


<script>

var question_asked_arr = <?php echo  $question_asked_arr!=null?  json_encode($question_asked_arr): null; ?>

<?php if($response_rate_arr!=null): ?>
var response_rate_arr = <?php echo   json_encode($response_rate_arr); ?>
<?php else: ?>
var response_rate_arr = null;
<?php endif; ?>

var percentage_response_rate = <?php echo  json_encode( $percentage_response_rate) ?>;




</script>


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
 var getData = <?php echo json_encode($_GET); ?>;

var getData = <?php echo json_encode($_GET); ?>;
var res_channel_arr_call_center_year = <?php echo  json_encode($res_channel_arr_call_center_year)  ?>;
var res_channel_arr_help_desk_year = <?php echo  json_encode($res_channel_arr_help_desk_year)  ?>;
var res_channel_arr_office_year = <?php echo  json_encode($res_channel_arr_office_year)  ?>;


function exportToExcel111(name_html){



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
