<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'php/detailedRegionData.php';
require 'php/general.php';
?>


<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">

				<h4>
                                    <i><?php echo !empty($dataReqion_arr['title'])? $dataReqion_arr['title']:"";  ?></i>
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
						<h2>NPS</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a onClick="exportToExcel('echart_pie_region_export')"><i class="fa fa-download"></i></a></li>
							
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div id="echart_pie_region" style="height: 380px;"></div>
						<br>	
						<p>NPS <b><?php echo !empty($totalByRegion)? $totalByRegion."%":""; ?></b></p>
						
						<div id="echart_pie_region_export" style="display:none">
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
					</div>
                                        
				</div>
                    
			</div>
                    
                    
                    
                    
                    
                    
                    
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Динамика NPS</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a onClick="exportToExcel('nps_dynamic_rep_export')"><i class="fa fa-download"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
                                        <div id="reportrange_NPS_region" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                            </div>
					<div class="x_content">
		
					<div id="nps_dynamic_rep" style="height:380px;"></div>
					<div id="nps_dynamic_rep_export" ></div>
					<br>
					
					</div>
				</div>
			</div>
                    
                    
                    <div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>CSAT</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a onClick="exportToExcel('echart_csat_region_export')"><i class="fa fa-download"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div id="echart_csat_region" style="height: 380px;"></div>
						<div id="echart_csat_region_export" style="display: none;">
						<table class="table">
						<tr>
							<th>очень удовлетворен</th>
							<th>удовлетворен</th>
							<th>не знаю</th>
							<th>не удовлетворен</th>
							<th>очень не удовлетворен</th>
						</tr>
						<tr>
							<td><?php echo $bar_very_good_rate;  ?></td>
							<td><?php echo $bar_good_rate; ?></td>
							<td><?php echo $bar_dont_know_rate; ?></td>
							<td><?php echo $bar_bad_rate ?></td>
							<td><?php echo $bar_very_bad_rate ?></td>
						</tr>
						</table>
						</div>
	
						<p>количества респондентов <b><?php echo $totalCSATBYregion[0]; ?></b></p>
						
						<p>общий CSAT <b><?php echo isset($csatbyregiond_arr[0]['arif'])?$csatbyregiond_arr[0]['arif']:""; ?></b></p>
                                                    
					</div>
                                        
				</div>
                    
			</div>
                    
                    
                    
                    
                    
                    
                    
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Динамика CSAT</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a onClick="exportToExcel('char_CSAT_region_export')"><i class="fa fa-download"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
                                       
					<div class="x_content">
					
					 <div id="reportrange_CSAT_region" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                            </div>

					<div id="char_CSAT_region" style="height:408px; width: 100%"></div>
				   	<div id="char_CSAT_region_export"></div>
					
					</div>
				</div>
			</div>


    <!-- ////////////////////////////////////////////////////  Display NONE!!!     /////////////////////////////////////////  -->                


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

<!-- amCharts javascript sources -->
		<script type="text/javascript" src="../lib/amcharts.js"></script>
		<script type="text/javascript" src="../lib/serial.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


<script type="text/javascript">

var getData = <?php echo json_encode($_GET); ?>;
    
var count_for_question_total = <?php echo $count_for_question_total!=null? json_encode($count_for_question_total):""; ?>

var count_for_question_bad = <?php echo  $count_for_question_bad!=null?  json_encode($count_for_question_bad): null; ?>

var count_for_question_good = <?php echo $count_for_question_good!=null?  json_encode($count_for_question_good): null; ?>

var count_for_question_well = <?php echo $count_for_question_well!=null?  json_encode($count_for_question_well): null; ?>



var count_for_question_bad_percentage = <?php echo $count_for_question_bad_percentage!=null?   json_encode($count_for_question_bad_percentage):""; ?>

var count_for_question_good_percentage = <?php echo $count_for_question_good_percentage!=null?  json_encode($count_for_question_good_percentage):""; ?>

var count_for_question_well_percentage = <?php echo $count_for_question_well_percentage!=null?  json_encode($count_for_question_well_percentage):""; ?>
    
var totalByRegion = <?php echo $totalByRegion!=null?   json_encode($totalByRegion):""; ?>
    
////////////////////////////////////csat



  	var bar_very_bad_value =  <?php  echo isset($bar_very_bad_value)? json_encode( $bar_very_bad_value):""; ?>;	
   	var bar_very_bad_rate  =  <?php echo isset($bar_very_bad_rate)? json_encode($bar_very_bad_rate):""; ?>;     
               
    var  bar_bad_value =      <?php echo isset($bar_bad_value)? json_encode($bar_bad_value):"";  ?> ;
    var  bar_bad_rate   =    <?php echo isset($bar_bad_rate)? json_encode($bar_bad_rate):""; ?>;
               
    var bar_dont_know_value =  <?php echo isset($bar_dont_know_value)? json_encode($bar_dont_know_value):""; ?>;
    var bar_dont_know_rate =   <?php echo isset($bar_dont_know_rate)? json_encode($bar_dont_know_rate):""; ?>;    

    var  bar_good_value = <?php echo isset($bar_good_value)? json_encode($bar_good_value):""; ?>;         
    var  bar_good_rate = <?php echo isset($bar_good_rate)? json_encode($bar_good_rate):""; ?>;        
               
               
    var  bar_very_good_value  =   <?php echo isset($bar_very_good_value)? json_encode($bar_very_good_value):""; ?>;
    var  bar_very_good_rate    =  <?php echo isset($bar_very_good_rate)? json_encode($bar_very_good_rate):""; ?>;




    function exportToExcel(name_html){



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


</body>
</html>
