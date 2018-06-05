<?php
require 'php/getClientsRes.php';
require 'php/general.php';
?>


<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Детальный отчет  </h3>
              </div>
<!--
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>-->
            </div>

            <div class="clearfix"></div>

            <div class="row">




              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                    <?php if(isset($_GET['code']) && $_GET['code']==1): ?>Детракторы <?php endif; ?>
                    <?php if(isset($_GET['code']) && $_GET['code']==2): ?>Нейтралы <?php endif; ?>
                    <?php if(isset($_GET['code']) && $_GET['code']==3): ?>Промоутеры <?php endif; ?>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					     <li><a onClick="exportToExcel('refference_data');"><i class="fa fa-download"></i></a></li>
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
                  <div class="x_content">
                    <div id="refference_data" class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="font-size: 14px">
                      <thead>
                        <tr>
                          <th>№</th>
                          <th>ФИО</th>
                          <th>Тел</th>
                          <th>Организация</th>
                          <th>Канал опроса</th>
                          <th>Точка взаимодействия</th>
                          <th>Средний чек</th>
                          <th>Тип продукта</th>
                          <th>Возраст</th>
                          <th>Дата опроса</th>
                          <th>Вопросы</th>
                          <th>Ответ</th>

                        </tr>
                      </thead>


                      <tbody>
                        <?php $counter=1;  ?>
                      <?php foreach($result_data as $data): ?>

                        <tr>
                          <td>
                            <?php
                                    if($phone_number_start!==$data['phone']){
                                        $phone_number_start = $data['phone'];
                                        ++$counter;

                                    }
                             ?>
                            <?php echo $counter; ?>

                          </td>
                          <td><?php echo $data['lastname']." ".$data['firtsname'];  ?></td>
                          <td><?php echo $data['phone'];  ?></td>
                          <td><?php echo $data['organization'];  ?></td>

                          <td><?php echo $data['source_inf'];  ?></td>
                          <td><?php echo $data['poi_title'];  ?></td>
                          <td><?php echo $data['checktitle_title'];  ?></td>
                           <td><?php echo $data['title_product_name'];  ?></td>
                          <td><?php echo $data['age'];  ?></td>
                          <td><?php echo $data['created_at'];  ?></td>
                          <td><?php echo $data['question_quee'];  ?></td>
                          <td style="width: 25%"><?php echo $data['answer'];  ?></td>

                        </tr>
                       <?php endforeach; ?>
                      </tbody>
                    </table>
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

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>

    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

        <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

 <script type="text/javascript">




                                function exportToExcel1(name_html){



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
, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
return function(table, name) {
if (!table.nodeType) table = document.getElementById(table)
var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
window.location.href = uri + base64(format(template, ctx))
}
})()
</script>
  </body>
</html>
