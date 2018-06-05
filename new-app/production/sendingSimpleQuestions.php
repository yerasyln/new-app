<?php

require 'php/getSimpleQuestions.php';
require 'php/db.php';
require 'php/header.php';


?>

<!DOCTYPE html>
<html
	lang="en">
<head>



<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<style type="text/css">
.loader{

	  margin: 0;
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    margin-right: -50%;
		    transform: translate(-50%, -50%);

}
  
  </style>
  


</head>



<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Отправка смс</h3>
			</div>

			<div class="title_right">
				<div
					class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control"
							placeholder="Search for..."> <span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button> </span>
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
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i> </a>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown" role="button" aria-expanded="false"><i
									class="fa fa-wrench"></i> </a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a>
									</li>
									<li><a href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i> </a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div>
						<div class="x_content">


							<table id="datatable-buttons2"
								class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>№</th>
										<th>Вопрос</th>
										<th>Статус</th>
										<th></th>
									</tr>
								</thead>


								<tbody id="loading_page">

								<?php  foreach($result_data as $data): ?>
									<tr>
										<td id="id_question"><?php echo $data['id']; ?></td>
										<td><?php echo $data['title']; ?></td>
										<td><?php if($data['status']==0): ?>
											<div style="font-size: 14px;">
												<span class="label label-info">Не отправлен</span>
											</div> <?php else:  ?>
											<div style="font-size: 14px;">
												<span class="label label-success">Отправлен<?php endif;  ?>
												</span>
											</div></td>
										<td><input type="radio" class="form-radio-input"
											name="questions[]" id="questions_simple[]"
											value="<?php echo $data['id']; ?>" /></td>

									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
			<div class="loader" style="display:none">
				<img src="images/loading.gif"  />
			</div>



		</div>
	</div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
	<div class="pull-right">
		Gentelella - Bootstrap Admin Template by <a
			href="https://colorlib.com">Colorlib</a>
	</div>
	<div class="clearfix"></div>
</footer>
<!-- /footer content -->

<script type="text/javascript">



//var button =  "<a class='btn btn-default buttons-print btn-sm' tabindex='0' aria-controls='datatable-buttons' href='#'> <span>Print2</span></a>";
//alert(JSON.stringify($("#datatable-buttons_wrapper").find('.dt-buttons btn-group').html("<h1>TEST</h1>")));
//$('.dt-buttons').html(button);

</script>



<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script
	src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script
	src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script
	src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script
	src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script
	src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script
	src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script
	src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script
	src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


</body>
</html>

