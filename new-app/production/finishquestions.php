<?php

$company_id = !empty($_GET['company_id'])?$_GET['company_id']:"";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Веб-платформа</title>

<!-- Bootstrap-4 -->
<!--<link href="../vendors/bootstrap-4/css/bootstrap.min.css" rel="stylesheet"> -->



  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">


<!-- Bootstrap -->
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- Font Awesome -->
<link href="../vendors/font-awesome/css/font-awesome.min.css"
	rel="stylesheet">
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- bootstrap-progressbar -->
<link
	href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
	rel="stylesheet">
<!-- JQVMap -->
<link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css"
	rel="stylesheet">

<!-- Custom Theme Style -->
<link href="../build/css/custom.min.css" rel="stylesheet">

<link href="../build/css/kaz.css" rel="stylesheet">
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/amstock.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>

<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />


<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>


<!--<script src="/gentelella/src/js/lineChart2.js"></script>-->
<!--<script src="/gentelella/src/js/lineChart3.js"></script>-->
     <script src="../vendors/jquery/dist/jquery.min.js"></script>

<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<style>
.col-xs-15, .col-sm-15, .col-md-15, .col-lg-15 {
	position: relative;
	min-height: 1px;
	padding-right: 10px;
	padding-left: 10px;
}

.col-xs-15 {
	width: 20%;
	float: left;
}

@media ( min-width : 768px) {
	.col-sm-15 {
		width: 20%;
		float: left;
	}
}

@media ( min-width : 992px) {
	.col-md-15 {
		width: 20%;
		float: left;
	}
}

@media ( min-width : 1200px) {
	.col-lg-15 {
		width: 20%;
		float: left;
	}
}
</style>

</head>

<body class="nav-md">


	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="" class="site_title">
							<span>Веб-платформа!</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/img.jpg" alt="..."
								class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Добро пожаловать,</span>
							<h2>Гость</h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu"
						class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">


								<!--

								<li><a><i class="fa fa-edit"></i> Forms <span
										class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="form.html">General Form</a></li>
										<li><a href="form_advanced.html">Advanced Components</a></li>
										<li><a href="form_validation.html">Form Validation</a></li>
										<li><a href="form_wizards.html">Form Wizard</a></li>
										<li><a href="form_upload.html">Form Upload</a></li>
										<li><a href="form_buttons.html">Form Buttons</a></li>
									</ul></li>

								<li><a><i class="fa fa-desktop"></i> UI Elements <span
										class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="general_elements.html">General Elements</a></li>
										<li><a href="media_gallery.html">Media Gallery</a></li>
										<li><a href="typography.html">Typography</a></li>
										<li><a href="icons.html">Icons</a></li>
										<li><a href="glyphicons.html">Glyphicons</a></li>
										<li><a href="widgets.html">Widgets</a></li>
										<li><a href="invoice.html">Invoice</a></li>
										<li><a href="inbox.html">Inbox</a></li>
										<li><a href="calendar.html">Calendar</a></li>
									</ul></li>

								<li><a><i class="fa fa-table"></i> Tables <span
										class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="tables.html">Tables</a></li>
										<li><a href="tables_dynamic.html">Table Dynamic</a></li>
									</ul></li>
								<li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
										class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="chartjs.html">Chart JS</a></li>
										<li><a href="chartjs2.html">Chart JS2</a></li>
										<li><a href="morisjs.html">Moris JS</a></li>
										<li><a href="echarts.html">ECharts</a></li>
										<li><a href="other_charts.html">Other Charts</a></li>
									</ul></li>
								<li><a><i class="fa fa-clone"></i>Layouts <span
										class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
										<li><a href="fixed_footer.html">Fixed Footer</a></li>
									</ul></li>


									-->
							</ul>
						</div>
						<!--
						<div class="menu_section">
							<h3>Live On</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-bug"></i> Additional Pages <span
										class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="e_commerce.html">E-commerce</a></li>
										<li><a href="projects.html">Projects</a></li>
										<li><a href="project_detail.html">Project Detail</a></li>
										<li><a href="contacts.html">Contacts</a></li>
										<li><a href="profile.html">Profile</a></li>
									</ul></li>
								<li><a><i class="fa fa-windows"></i> Extras <span
										class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="page_403.html">403 Error</a></li>
										<li><a href="page_404.html">404 Error</a></li>
										<li><a href="page_500.html">500 Error</a></li>
										<li><a href="plain_page.html">Plain Page</a></li>
										<li><a href="login.html">Login Page</a></li>
										<li><a href="pricing_tables.html">Pricing Tables</a></li>
									</ul></li>
								<li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span
										class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="#level1_1">Level One</a>

										<li><a>Level One<span class="fa fa-chevron-down"></span></a>
											<ul class="nav child_menu">
												<li class="sub_menu"><a href="level2.html">Level Two</a></li>
												<li><a href="#level2_1">Level Two</a></li>
												<li><a href="#level2_2">Level Two</a></li>
											</ul></li>
										<li><a href="#level1_2">Level One</a></li>
									</ul></li>
								<li><a href="javascript:void(0)"><i class="fa fa-laptop"></i>
										Landing Page <span class="label label-success pull-right">Coming
											Soon</span></a></li>
							</ul>
						</div>
-->
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings"> <span
							class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a> <a data-toggle="tooltip" data-placement="top"
							title="FullScreen"> <span class="glyphicon glyphicon-fullscreen"
							aria-hidden="true"></span>
						</a> <a data-toggle="tooltip" data-placement="top" title="Lock"> <span
							class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a> <a data-toggle="tooltip" data-placement="top" title="Logout"
							href="login.html"> <span class="glyphicon glyphicon-off"
							aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>


						<ul class="nav navbar-nav navbar-right">
							<li class=""><a href="javascript:;"
								class="dropdown-toggle"  data-toggle="dropdown"
								aria-expanded="false">

                <?php if(!empty($company_id) && $company_id==2): ?>
                                <img src="https://www.eubank.kz/images/logo.png" style="width: 75%;" alt="">
                <?php endif ?>


                <?php if(!empty($company_id) && $company_id==5): ?>
                                  <img src="images/logo-nomad.png" style="width: 75%;" alt="">
                <?php endif ?>

							</a>

								</li>


						</ul>
					</nav>
				</div>
			</div>

<!DOCTYPE html>
<html
	lang="en">
<head>



<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">


</head>



<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3 style="color: #000;">Благодарим Вас за отзыв!</h3>
			</div>

			<div class="title_right">
				<div
					class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
										</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2></h2>
						<ul class="nav navbar-right panel_toolbox">

						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
<!--
					<h2>Спасибо за участие в опросе,<br> Ваше мнение важно для нас!</h2>
	<img src="../production/images/The_UserAlbum.com_social_network_logo.jpg" style="width: 25%;" />
-->


<?php if(!empty($company_id) && $company_id==5): ?>

<h2 style="color: black; line-height: 1.3em;">
  Мы очень ценим Ваше мнение и в знак <br>
  благодарности хотим предложить Вам <br>
  наши полисы по специальной цене <br>
</h2>

<br>
<br>

<a href="https://nomadpolis.kz/dsosed/" class="btn" style="background: #6f1b17; color: #fff;">Ответственность перед соседями</a>

<a href="https://nomadpolis.kz/dsosed/" class="btn" style="background: #e77716; color: #fff;">Подробнее</a>

<?php endif ?>


<?php if(!empty($company_id) && $company_id==2): ?>
<!--  <h2 style="color: black; line-height: 1.3em;">
      Спасибо за участие в опросе! <br>
  </h2>
-->
<?php endif ?>


						<!-- End SmartWizard Content -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

<div id="phone_number" style="display: none;">
<?php echo $phone_number;  ?>
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
<script
	src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
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
<script
	src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="../vendors/starrr/dist/starrr.js"></script>


</body>
</html>
