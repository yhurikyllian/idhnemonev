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
  <!-- Bootstrap -->
  <link href="<?php echo base_url()."assets"?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url()."assets"?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url()."assets"?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url()."assets"?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">    
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url()."assets"?>/build/css/custom.min.css" rel="stylesheet">

  <!-- jQuery -->
  <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

  <!-- Bootstrap -->

  <!-- styles -->
  <link href="<?php echo base_url()."assets/"?>css/styles.css" rel="stylesheet">

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>vendors/select/bootstrap-select.min.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url()."assets/"?>vendors/tags/css/bootstrap-tags.css" rel="stylesheet"> -->

  <link href="<?php echo base_url()."assets/"?>css/forms.css" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <?php $this->load->view("logo"); ?>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <?php $this->load->view("profile_info")?>
          <!-- /menu profile quick info -->

          <br />

          <?php $this->load->view("sidebar");?><!-- sidebar menu -->

          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <?php $this->load->view("menu_footer");?>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <?php $this->load->view("top_nav");?>
      <!-- /top navigation -->
 
   

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>INDOHUN EVENT</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>ADD SPEAKER <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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

                  <?php echo form_open_multipart('addspeaker/addspeaker', 'class="form-horizontal form-label-left"');?>
                  <!-- <form class="form-horizontal form-label-left" action="<?php echo base_url();?>index.php/addspeaker/addspeaker" method="post" novalidate> -->

                      <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                    </p> -->
                    <!-- <span class="section">Personal Info</span> -->

                    

                    <!-- <span class="section">Add Speaker</span> -->

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Title (Before Name) </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="title_b" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Full Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Title (After Name) </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="title_a" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Institution </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="institution" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Institution<span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" >
                      <select class="form-control" name="institution_type" style="width:100%">
                        <?php 
                        $speaker = array("University / higher education","Government / public sector","Bussiness / public sector","Non-Government / non-profit organization","Other");
                        foreach($speaker as $d){
                        ?>
                          
                        <option> <?php echo $d?> </option>
                        <?php } ?>
                      </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Position in institution </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="institution_pos" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation<span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" >
                      <select class="form-control" name="occupation" style="width:100%">
                        <?php 
                        $speaker = array("Student","Faculty Member and Teachers","Researcher / Scientist","Government Official","Other");
                        foreach($speaker as $d){
                        ?>
                          
                        <option> <?php echo $d?> </option>
                        <?php } ?>
                      </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Primary area of work<span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" >
                      <select class="form-control" name="primary_work" style="width:100%">
                        <?php 
                        $speaker = array("Human Health (Nursing, Public Health, Medicine)","Animal Health (Veterinary Medicine, Zoology)","Global Health (Tropical Medicine)","One Health (VPM, Ecosystem Health)","Environment / Conservation", "Public Policy & Governance", "Education & Educational Administration", "Other");
                        foreach($speaker as $d){
                        ?>
                          
                        <option> <?php echo $d?> </option>
                        <?php } ?>
                      </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Disciplinary Background<span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" >
                      <select class="form-control" name="d_background" style="width:100%">
                        <?php 
                        $speaker = array("Education","Medicine","Nursing","Public Health","Veterinary Medicine", "Wildlife & Conservation", "Other");
                        foreach($speaker as $d){
                        ?>
                          
                        <option> <?php echo $d?> </option>
                        <?php } ?>
                      </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Resume</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="4" name="resume"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Short Bio </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="short_bio" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>  

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Biography</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="4" name="bio"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="2" name="address"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="2" name="phone"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="email_speaker" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div> 

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Field of Expertice </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="foe" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>  

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Country<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <!-- <div id="countries_states2" class="bfh-selectbox bfh-countries" data-country="ID" data-name="country"></div> -->
                          <select id="countries_states1" class="form-control bfh-countries" data-country="ID" name="country" disabled></select>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Province<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <select class="form-control bfh-states" data-country="countries_states1" name="province"></select>
                          <!-- <div class="bfh-selectbox bfh-states" data-country="countries_states2" data-name="province"></div> -->

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</span>
                      </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <input type="file" class="control-label" name="photo[]" ></textarea>

                        </div>
                      </div>
                    </div>
                    

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">CV</span>
                      </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <input type="file" class="control-label" name="cv[]" ></textarea>

                        </div>
                      </div>
                    </div>                 

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
    <!-- footer content -->
        <footer>
          <?php $this->load->view("footer");?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()."assets"?>/vendors/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()."assets"?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()."assets"?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url()."assets"?>/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()."assets"?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()."assets"?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- validator -->
    <script src="<?php echo base_url()."assets"?>/vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()."assets"?>/build/js/custom.min.js"></script>

    <script src="<?php echo base_url()."assets/"?>vendors/form-helpers/js/bootstrap-formhelpers.js"></script>
    <script type="text/javascript">
   
    function ganti2() {
      alert("tai");
    }

    function ganti3() {  

      var session = document.getElementById("session");
      var activity = document.getElementById("activity");
      var title = document.getElementById("project_title1");
      var year = document.getElementById("project_year1");

        var selLength = year.options.length;
          for(var i=0;i<selLength;i++){
            year.options.remove(year.options);
          }

          

      // year

      <?php for($i=0 ; $i<count($title);$i++){?>

      if(title.value == "<?php echo $title[$i] ?>"){
        
      <?php for($j=0 ; $j<count($year[$i]);$j++){?>

        var opt = document.createElement('option') ;
        opt.innerHTML = "<?php echo $year[$i][$j] ?>" ;
        opt.value = "<?php echo $year[$i][$j] ?>" ;
        year.add(opt);
        

      <?php } ?>

        }

      <?php } ?>

      // activity

      gantiyear();
      gantiactivity()


    }

    function gantiyear() {  

      var activity = document.getElementById("activity");
      var year = document.getElementById("project_year1");

        var selLength = activity.options.length;
          for(var i=0;i<selLength;i++){
            activity.options.remove(activity.options);
          }

          <?php for($i=0 ; $i<count($title);$i++){?>

            <?php for($j=0 ; $j<count($year[$i]);$j++){?>

              if(year.value == "<?php echo $year[$i][$j] ?>"){

                <?php for($k=0 ; $k<count($activity[$j][$k]);$k++){?>

                  var opt = document.createElement('option') ;
                  opt.innerHTML = "<?php echo $activity[$i][$j][$k] ?>" ;
                  opt.value = "<?php echo $activity[$i][$j][$k] ?>" ;
                  activity.add(opt);
            
                <?php } ?>

              }

            <?php } ?>

            

          <?php } ?>

          gantiactivity()


    }

    function gantiactivity() {  

      var activity = document.getElementById("activity");
      var year = document.getElementById("project_year1");
      var session = document.getElementById("session");

        var selLength = session.options.length;
          for(var i=0;i<selLength;i++){
            session.options.remove(session.options);
          }

          <?php for($i=0 ; $i<count($title);$i++){?>

            <?php for($j=0 ; $j<count($year[$i]);$j++){?>

                <?php for($k=0 ; $k<count($activity[$j][$k]);$k++){?>
              
                  if(activity.value == "<?php echo $activity[$i][$j][$k]?>"){

                    <?php for($l=0 ; $l<count($session[$j][$k][$l]);$l++){?>

                    var opt = document.createElement('option') ;
                    opt.innerHTML = "<?php echo $session[$i][$j][$k][$l] ?>" ;
                    opt.value = "<?php echo $session[$i][$j][$k][$l] ?>" ;
                    session.add(opt);

                    <?php } ?>
                  }

                <?php } ?>

            <?php } ?>

          <?php } ?>


    }

    
  </script>


    

  </body>
  </html>
