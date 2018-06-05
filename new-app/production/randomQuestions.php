
<?php 
require 'php/header.php';
require 'php/randomData.php';
//echo '<pre>'; print_r($result_data); die;
if (isset($_GET['phone_number']) && !empty($_GET['phone_number'])) {

    $phone_number = $_GET['phone_number'];
}
?>
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

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i> </a>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                        data-toggle="dropdown" role="button" aria-expanded="false"><i
                                            class="fa fa-wrench"></i> </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a></li>
                                        <li><a href="#">Settings 2</a></li>
                                    </ul></li>
                                <li><a class="close-link"><i class="fa fa-close"></i> </a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="alert alert-success" id="alert" style="display: none;">
                                <strong>Success!</strong> all questions asked.
                            </div>

                            <div class="alert alert-error" id="alert_error"
                                 style="display: none;">
                                <strong>Error!</strong> all questions already asked to this
                                number.
                                <?php echo $phone_number; ?>
                            </div>


                            <!-- Smart Wizard -->
                            <p></p>
                            <div id="wizard" class="form_wizard wizard_horizontal">
                                <ul class="wizard_steps">
                                    <li><a href="#step-1"> <span class="step_no">1</span> <span
                                                class="step_descr"> Шаг 1<br /> </span> </a></li>
                                    <li><a href="#step-2"> <span class="step_no">2</span> <span
                                                class="step_descr"> Шаг 2<br /> </span> </a></li>
                                    <li><a href="#step-3"> <span class="step_no">3</span> <span
                                                class="step_descr"> Шаг 3<br /> </span> </a></li>
                                    <li><a href="#step-4"> <span class="step_no">4</span> <span
                                                class="step_descr"> Шаг 4<br /> </span> </a></li>

                                    <li><a href="#step-5"> <span class="step_no">5</span> <span
                                                class="step_descr"> Шаг 5<br /> </span> </a></li>
                                    <li><a href="#step-6"> </a></li>
                                </ul>

                                <div id="step-1">
                                    <h2 class="StepTitle">Шаг 1</h2>

                                    <h4>
                                        <i><?php echo $result_data[$random_keys[0]]['title']; ?> </i>
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div >
                                                    <div class="radio">
                                                        <label> <input type="radio" class="flat" name="iCheck"
                                                                       value="<?php echo $i . "_" . $result_data[$random_keys[0]]['id']; ?>"> <?php echo $i; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                            <br /> <br /> <br />
                                        </div>
                                    </div>
                                </div>

                                <div id="step-2">
                                    <h2 class="StepTitle">Шаг 2</h2>

                                    <h4>
                                        <i><?php echo $result_data[$random_keys[1]]['title']; ?> </i>
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div class="radio">
                                                    <label> <input type="radio" class="flat" name="iCheck"
                                                                   value="<?php echo $i . "_" . $result_data[$random_keys[1]]['id']; ?>"> <?php echo $i; ?>
                                                    </label>
                                                </div>
                                            <?php endfor; ?>

                                        </div>
                                    </div>


                                </div>

                                <div id="step-3">
                                    <h2 class="StepTitle">Шаг 3</h2>
                                    <h4>
                                        <i><?php echo $result_data[$random_keys[2]]['title']; ?> </i>
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div class="radio">
                                                    <label> <input type="radio" class="flat" name="iCheck"
                                                                   value="<?php echo $i . "_" . $result_data[$random_keys[2]]['id']; ?>"> <?php echo $i; ?>
                                                    </label>
                                                </div>
                                            <?php endfor; ?>

                                        </div>
                                    </div>


                                </div>
                                <div id="step-4">
                                    <h2 class="StepTitle">Шаг 4</h2>
                                    <h4>
                                        <i><?php echo $result_data[$random_keys[3]]['title']; ?> </i>
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div class="radio">
                                                    <label> <input type="radio" class="flat" name="iCheck"
                                                                   value="<?php echo $i . "_" . $result_data[$random_keys[3]]['id']; ?>"> <?php echo $i; ?>
                                                    </label>
                                                </div>
                                            <?php endfor; ?>

                                        </div>
                                    </div>


                                </div>
                                <div id="step-5">
                                    <h2 class="StepTitle">Шаг 5</h2>
                                    <h4>
                                        <i><?php echo $result_data[$random_keys[4]]['title']; ?> </i>
                                    </h4>
                                 
                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <div class="radio">
                                                    <label> <input type="radio" class="flat" name="iCheck"
                                                                   value="<?php echo $i . "_" . $result_data[$random_keys[4]]['id']; ?>"> <?php echo $i; ?>
                                                    </label>
                                                </div>
                                            <?php endfor; ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- End SmartWizard Content -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <div id="phone_number" style="display: none;">
        <?php echo $phone_number; ?>
    </div>

    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a
                href=""></a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
</div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        
        // Smart Wizard         
        $('#wizard').smartWizard({
            onLeaveStep: leaveAStepCallback

        });

        function leaveAStepCallback(obj, context) {
          
            return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
        }


        // Your Step validation logic
        function validateSteps(numberStep) {

            if (numberStep !== 5) {
                var value = 0;
                $("input[type=radio]:checked").each(function () {
                    value = $(this).val();
                });

                if (value === 0) {
                    alert("Необходимо выбрать правильный ответ");
                    return false;
                } else {
                    return true;
                }
            }else{

                var answer = $('#editor-one').text();
                
                if (answer.replace(/\s/g,"") == "") {
                    alert("Необходимо оставить комментарий");
                    return false;
                } else {
                    return true;
                }
            }


        }

    });
</script>




<script>


    function sendToDB() {


        var value = 0;

        $("input[type=radio]:checked").each(function () {
            value = $(this).val();
        });



        if (value == 0) {
            var answer = $('#editor-one').text();

            var phone_number = $('#phone_number').text();

            $.post("php/interviewSimple.php",
                    {
                        answers: answer,
                        question_id: 5,
                        phone_number: phone_number
                    },
                    function (data, status) {
                        if (data == 5) {
                            window.location.replace("../production/finishquestions.php");
                        }
                    });
        }

        if (value.indexOf('_') > -1)
        {

            var arr = value.split('_');

            var answer = arr[0];

            var question_id = arr[1];

            var phone_number = $('#phone_number').text();

            $.post("php/interviewSimple.php",
                    {
                        answers: answer,
                        question_id: question_id,
                        phone_number: phone_number
                    },
                    function (data, status) {

                        if (data) {

                            if (data == 404)
                            {
                                $('#alert_error').css('display', 'block');
                                $('#next').css('display', 'none');
                                return false;
                            }


                        }

                    });
        }



        $("input[type=radio]:checked").each(function () {

            $(this).prop('checked', false);
            value = 0;
        });


    }


</script>



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

