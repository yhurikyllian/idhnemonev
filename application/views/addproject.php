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

  <!-- AJAx -->
  

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
                  <h2>ADD NEW PROJECT <small></small></h2>
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

                  <?php echo form_open_multipart('addproject/addproject', 'class="form-horizontal form-label-left"');?>

                  <!-- <form class="form-horizontal form-label-left" action="<?php echo base_url();?>index.php/addproject/addproject" method="post" novalidate> -->

                      <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                    </p> -->
                    <!-- <span class="section">Personal Info</span> -->

                    <!-- <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Title <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="project_title">
                          <option>EPT 1 - RESPOND</option>
                          <option>EPT 2 - OHW</option>
                          <option>OH - SMART</option>
                          <option>OHLN</option>
                        </select>
                      </div>
                    </div> -->

                   <?php 

                   $project = $this->m_db->getProject();
                      for ($i=0; $i<count($project); $i++){
                        $title[$i] = $project[$i]["project_title"];
                        
                          
                          for($j=0; $j<count($title); $j++ ){
                          $year[$i] = $this->m_db->getYear($title[$i]);
                          
                          for($k=0; $k<count($year[$i]); $k++){
                          
                          $activity[$i][$k] = $this->m_db->getActivity($year[$i][$k]["project_year"]);
                                
                            for($l=0; $l<count($activity[$i][$k]); $l++){

                               $session[$i][$k][$l] = $this->m_db->getSession($activity[$i][$k][$l]['activity_code']);
                            }
                          }
                          
                          }
                          // $year[$i][$j] = $project[$i]["project_year"];
                       }
                    // echo "<pre>";
                    // print_r($session);

                    // echo "</pre>";

                   ?>
                   <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Title <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <select id="project_title1" class="form-control" name="project_title" onchange="ganti3()">

                        <?php foreach($title as $d) {?>
                        <option value="<?php echo $d ?>"><?php echo $d ?></option>
                        <?php } ?>

                      </select>

                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Year <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12" >
                      <select id="project_year1" class="form-control" name="project_year" onchange="gantiyear()">
                        <?php foreach($year[0] as $d) {?>
                        <option><?php echo $d['project_year'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  

                  

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Activity Code and Number <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="activity_code" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Activity Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="activity_name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Start Date <span class="required"></span>
                      </label>
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-3 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="First Name" aria-describedby="inputSuccess2Status" name="start_date">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">End Date <span class="required"></span>
                      </label>
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-3 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="First Name" aria-describedby="inputSuccess2Status" name="end_date">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Range Date <span class="required"></span>
                      </label>
                      <div class="col-md-4">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="input-prepend input-group">
                                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                <input type="text" style="width: 200px" name="range_date" id="reservation" class="form-control" value="01/01/2016 - 01/25/2016" />
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Country<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <!-- <div id="countries_states2" class="bfh-selectbox bfh-countries" data-country="ID" data-name="country"></div> -->
                          <select id="countries_states1" class="form-control bfh-countries" data-country="ID" name="country"></select>

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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">City
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <input type="text" id="email" name="city"  class="form-control col-md-7 col-xs-12">

                        </div>
                      </div>
                    </div>

 

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Venue Address<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" required="required" rows="3" name="venue_address"></textarea>

                        </div>
                      </div>
                    </div>

                    

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Activity Type<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>
                        <?php $activityType = array ("Training", "Workshop", "Fieldwork or applied experience", "Meeting", "Seminar or Lecture", "Community outreach", "Advocacy or policy engagement", "Curriculum or course development", "Communication or media development"," Other"); 

                          

                          foreach ($activityType as $d) { ?>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="activityType[]" value="<?php echo $d; ?>"> <?php echo $d; ?>
                            </label>
                          </div>

                          <?php } ?>

                          
                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Target Audience<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>
                        <?php $TargetAudience = array ("General public", "Student","Faculty members and teachers","Researchers and scientist", "Government officials","Other"); 

                          

                          foreach ($TargetAudience as $d) { ?>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="targetAudience[]" value="<?php echo $d; ?>"> <?php echo $d; ?>
                            </label>
                          </div>

                          <?php } ?>

                          
                        </div>
                      </div>
                    </div>

                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Activity Description and Background</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="2" name="activity_desc"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Objective</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="2" name="objective"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Anticipated Output</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="2" name="anticipated_output"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Anticipated Outcome</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="2" name="anticipated_outcame"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Local Expertise</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="2" name="local_expertise"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">External Support</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <textarea class="form-control" rows="2" name="external_support"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Agenda</span>
                      </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>

                          <input type="file" class="control-label" name="agenda[]" multiple="multiple"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">One Health Core Competencies<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>
                        <?php $activityType = array ("Training", "Workshop", "Fieldwork or applied experience", "Meeting", "Seminar or Lecture", "Community outreach", "Advocacy or policy engagement", "Curriculum or course development", "Communication or media development"," Other"); 

                          

                          foreach ($activityType as $d) { ?>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="one_health_core[]" value="<?php echo $d; ?>"> <?php echo $d; ?>
                            </label>
                          </div>

                          <?php } ?>

                          
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

    <script src="<?php echo base_url()."assets/"?>vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
    <script type="text/javascript">
   
   function ganti3() {  

          var session = document.getElementById("session");
          var activity = document.getElementById("activity");
          var title = document.getElementById("project_title1");
          var year = document.getElementById("project_year1");

          var selLength = year.options.length;
          for(var i=0;i<selLength;i++){
            year.options.remove(year.options);
          }

          <?php for($i=0 ; $i<count($title);$i++){?>

            if(title.value == "<?php echo $title[$i] ?>"){

                  <?php for($j=0 ; $j<count($year[$i]);$j++){?>

                  var opt = document.createElement('option') ;
                  opt.innerHTML = "<?php echo $year[$i][$j]['project_year'] ?>" ;
                  opt.value = "<?php echo $year[$i][$j]['project_year'] ?>" ;
                  year.add(opt);

                  <?php } ?>

            }

          <?php } ?>

            // gantiyear();
            // gantiactivity();
        }

        function gantiyear(){

            var session = document.getElementById("session");
            var activity = document.getElementById("activity");
            var title = document.getElementById("project_title1");
            var year = document.getElementById("project_year1");

            var selLength = activity.options.length;
            for(var i=0;i<selLength;i++){
              activity.options.remove(activity.options);
            }

            <?php for($i=0 ; $i<count($title);$i++){?>

              

                    <?php for($j=0 ; $j<count($year[$i]);$j++){?>

                      if(year.value == "<?php echo $year[$i][$j]['project_year'] ?>"){

                        <?php for($k=0 ; $k<count($activity[$i][$j]);$k++){?>

                        var opt = document.createElement('option') ;
                        opt.innerHTML = "<?php echo $activity[$i][$j][$k]['activity_name'] ?>" ;
                        opt.value = "<?php echo $activity[$i][$j][$k]['activity_code'] ?>" ;
                        activity.add(opt);

                        <?php } ?>

                      }

                    <?php } ?>


            <?php } ?>

            gantiactivity();
        }

        function gantiactivity() {  

            var session = document.getElementById("session");
            var activity = document.getElementById("activity");
            var title = document.getElementById("project_title1");
            var year = document.getElementById("project_year1");

            var selLength = session.options.length;
            for(var i=0;i<selLength;i++){
              session.options.remove(session.options);
            }

            <?php for($i=0 ; $i<count($title);$i++){?>

              

                    <?php for($j=0 ; $j<count($year[$i]);$j++){?>

                      

                        <?php for($k=0 ; $k<count($activity[$i][$j]);$k++){?>

                          if(activity.value == "<?php echo $activity[$i][$j][$k]['activity_code'] ?>"){

                            <?php for($l=0 ; $l<count($session[$i][$j][$k]);$l++){?>

                            var opt = document.createElement('option') ;
                            opt.innerHTML = "<?php echo $session[$i][$j][$k][$l]['session_title'] ?>" ;
                            opt.value = "<?php echo $session[$i][$j][$k][$l]['id_session'] ?>" ;
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
