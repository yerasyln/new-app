<?php 
require 'php/header.php';
require 'php/randomData.php';


?>
<!DOCTYPE html>
<html
	lang="en">
<head>


<style>
    .wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #9fe0a8;
    
}
.wizard li.active span.round-tab i{
    color: #9fe0a8;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 20%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #9fe0a8;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #9fe0a8;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}
.step1 .row {
    margin-bottom:10px;
}
.step_21 {
    border :1px solid #eee;
    border-radius:5px;
    padding:10px;
}
.step33 {
    border:1px solid #ccc;
    border-radius:5px;
    padding-left:10px;
    margin-bottom:10px;
}
.dropselectsec {
    width: 68%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.dropselectsec1 {
    width: 74%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.mar_ned {
    margin-bottom:10px;
}
.wdth {
    width:25%;
}
.birthdrop {
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    width: 16%;
    outline: 0;
    font-weight: normal;
}


/* according menu */
#accordion-container {
    font-size:13px
}
.accordion-header {
    font-size:13px;
	background:#ebebeb;
	margin:5px 0 0;
	padding:7px 20px;
	cursor:pointer;
	color:#fff;
	font-weight:400;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px
}
.unselect_img{
	width:18px;
	-webkit-user-select: none;  
	-moz-user-select: none;     
	-ms-user-select: none;      
	user-select: none; 
}
.active-header {
	-moz-border-radius:5px 5px 0 0;
	-webkit-border-radius:5px 5px 0 0;
	border-radius:5px 5px 0 0;
	background:#F53B27;
}
.active-header:after {
	content:"\f068";
	font-family:'FontAwesome';
	float:right;
	margin:5px;
	font-weight:400
}
.inactive-header {
	background:#333;
}
.inactive-header:after {
	content:"\f067";
	font-family:'FontAwesome';
	float:right;
	margin:4px 5px;
	font-weight:400
}
.accordion-content {
	display:none;
	padding:20px;
	background:#fff;
	border:1px solid #ccc;
	border-top:0;
	-moz-border-radius:0 0 5px 5px;
	-webkit-border-radius:0 0 5px 5px;
	border-radius:0 0 5px 5px
}
.accordion-content a{
	text-decoration:none;
	color:#333;
}
.accordion-content td{
	border-bottom:1px solid #dcdcdc;
}



@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
    </style>
<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">


</head>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Опросы</h3>
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
                
                
                <div class="container">
    <div class="row">
    	<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
      <li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" method="post" action="php/insertRandomQuestions.php">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1" name = "step1">
                        <div class="step1">
                            <div class="row">
                            
                         <h4>
<i><?php echo $result_data[$random_keys[0]]['title']; ?> </i>
</h4>
                          
                          	<br /> <br />
                  
                        <div class="row">
									<div class="col-md-6">
						  <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div >
                                                    <div class="radio">
                                                        <label> <input type="radio" class="flat" name="iCheck1"
                                                                       value="<?php echo $i . "_" . $result_data[$random_keys[0]]['id']; ?>"> <?php echo $i; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
										
										<br /> <br /> <br /><br />
									</div>
								</div>
                            
                        </div>
                        
                        
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Следующий</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step2">
                                                     
                         <h4>
<i><?php echo $result_data[$random_keys[1]]['title']; ?> </i>
</h4>
                                
                            <br /> <br />
                           
                                <div class="row">
                                   	<div class="col-md-6">
						  <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div >
                                                    <div class="radio">
                                                        <label> <input type="radio" class="flat" name="iCheck2"
                                                                       value="<?php echo $i . "_" . $result_data[$random_keys[1]]['id']; ?>"> <?php echo $i; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
										
										<br /> <br /> <br /><br />
									</div>
                                </div>
                            
                            <div class="step-22">
                            
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Предыдущий</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Следующий</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                                                                     
                         <h4>
<i><?php echo $result_data[$random_keys[2]]['title']; ?> </i>
</h4>
                                
                            <br /> <br /> 
                  
                     
                             <div class="row">
                                   	<div class="col-md-6">
						  <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div >
                                                    <div class="radio">
                                                        <label> <input type="radio" class="flat" name="iCheck3"
                                                                       value="<?php echo $i . "_" . $result_data[$random_keys[2]]['id']; ?>"> <?php echo $i; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
										
										<br /> <br /> <br /><br />
									</div>
                                </div>
                        
                           
           
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Предыдущий</button></li>

                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Следующий</button></li>
                        </ul>
                    </div>
                   <div class="tab-pane" role="tabpanel" id="step4">
                                                                      
                         <h4>
<i><?php echo $result_data[$random_keys[3]]['title']; ?> </i>
</h4>
                                
                           <br /> <br /> <br />
                        <div class="step44">
                     
                             <div class="row">
                                   	<div class="col-md-6">
						  <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div >
                                                    <div class="radio">
                                                        <label> <input type="radio" class="flat" name="iCheck4"
                                                                       value="<?php echo $i . "_" . $result_data[$random_keys[3]]['id']; ?>"> <?php echo $i; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
										
										<br /> <br /> <br /><br />
									</div>
                                </div>
                        
                           
                            
                            
                            
                            
                            
                            
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Предыдущий</button></li>
                  
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Следующий</button></li>
                        </ul>
                    </div>
                     <div class="tab-pane" role="tabpanel" id="step5">
                                                                      
                         <h4>
<i><?php echo $result_data[$random_keys[4]]['title']; ?> </i>
</h4>
                                
                           <br /> <br /> 
                        <div class="step55">
                     
                             <div class="row">
                                   	<div class="col-md-6">
						  <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div >
                                                    <div class="radio">
                                                        <label> <input type="radio" class="flat" name="iCheck5"
                                                                       value="<?php echo $i . "_" . $result_data[$random_keys[4]]['id']; ?>"> <?php echo $i; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
										
										<br /> <br /> <br /><br />
									</div>
                                </div>
                        
                           
                            
                            
                            
                            
                            
                            
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Предыдущий</button></li>
                          
                           <li> <input type="submit" class="btn btn-primary" value="Отправить"></li>
                            
                   
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
                
                
                
                
                
                
                
                
        </div>
</div>




        <!-- footer content -->
<footer>
	<div class="pull-right">
		Gentelella - Bootstrap Admin Template by <a
			href="https://colorlib.com">Colorlib</a>
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
    <script>
        $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


//according menu

$(document).ready(function()
{
    //Add Inactive Class To All Accordion Headers
    $('.accordion-header').toggleClass('inactive-header');
	
	//Set The Accordion Content Width
	var contentwidth = $('.accordion-header').width();
	$('.accordion-content').css({});
	
	//Open The First Accordion Section When Page Loads
	$('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
	$('.accordion-content').first().slideDown().toggleClass('open-content');
	
	// The Accordion Effect
	$('.accordion-header').click(function () {
		if($(this).is('.inactive-header')) {
			$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
		
		else {
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
	});
	
	return false;
});
        </script>

</body>
</html>
