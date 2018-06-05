<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> DMS survey platform</title>
<link rel="icon" type="image/png" href="images/LogoDMS.png"/>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		  <?php if(isset($_GET['error']) && $_GET['error']==1):?>

                  <div class="alert alert-danger" id="error">
					 Вы ввели неправильный логин или пароль.
		</div>
              <?php endif;?>

              <form method="POST" action="php/autorize.php">
              <h1>Вход на портал</h1>
              <div>
                <input type="text" class="form-control" autocomplete="off" name="username" placeholder="Пользователь" required=""/>
              </div>
              <div>
                <input type="password" class="form-control" autocomplete="off" name="password" placeholder="Пароль" required=""/>
              </div>
              <div>
                    <div>
                        <input type="submit" class="btn btn-default submit" value="Вход"/>
              </div>

              <!--  <a class="reset_pass" href="#">Забыли свой пароль?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
             <!--   <p class="change_link">Новый пользователь?
                  <a href="#signup" class="to_register"> Регистрация? </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                  <!--<h1><i class="fa fa-paw"></i> Веб-портал!</h1>-->
                  <p>©2018 copyright all rights reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Создать аккаунт</h1>
              <div>
                <input type="text" class="form-control" placeholder="Пользователь" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="E-mail" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Пароль" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Отправить</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Уже есть аккаунт?
                  <a href="#signin" class="to_register"> Вход </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                 <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>-->
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
	<script>

  window.setTimeout(function(){


    $('#error').css('display','none');
    }, 4000);


</script>


  <script src="../vendors/jquery/dist/jquery.min.js"></script>

  </body>
</html>
