<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()."assets" ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()."assets" ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url()."assets" ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url()."assets" ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()."assets" ?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo base_url();?>index.php/login/login_form" method="post" name="login">
              <h1>Login Form</h1>
                        <div id="form-login">
                          <input class="form-control" type="text" type="text" placeholder="Username" size="40" name="username" value="<?php echo set_value('username');?>" class="inputan"> <?php echo form_error('username');?> 
                          <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo set_value('password');?>"> <?php echo form_error('password');?>
                          <!--  -->
                          
                          <div align="center" style="margin-left: 30%">
                          
                            <input class="btn btn-default submit" type="submit" name="login" value="Login">
                          
                          </div>
                        </div>
                      </form>

              
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
