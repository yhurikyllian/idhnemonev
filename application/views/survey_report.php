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

  <!--AJAX-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">

  <script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>

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

                  <form class="form-horizontal form-label-left" action="<?php echo base_url();?>index.php/index/event" method="post" novalidate>

                      <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                    </p> -->
                    <!-- <span class="section">Personal Info</span> -->
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Activity <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12" >
                      <select id="activity" class="form-control" name="activity" onchange="gantiactivity()">
                        <?php foreach($activity[0][0] as $d) {?>
                          <option value="<?php echo $d['activity_code'] ?>"><?php echo $d['activity_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <!-- <span class="section">Add Session</span> -->

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Session Title <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <select id="session" class="form-control" name="session_title">
                        <?php foreach($session[0][0][0] as $d){?>
                        <option value="<?php echo $d['id_session'] ?>"><?php echo $d['session_title'] ?></option>
                        <?php } ?>
                      </select>

                    </div>
                  </div>

                </form>


                <div class="form-horizontal form-label-left">


                  <div class ="item form-group">
                    <div class="control-label col-md-3 col-sm-3 col-xs-12" for="email"></div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <button class="btn btn-info" id="load_table2"><i class="glyphicon glyphicon-plus-sign"></i> Load Survey</button>

                    </div>
                  </div>

                  <div class="item form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Date</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input readonly="readonly" type="text" id="date_session" name="total" required="required" class="form-control col-md-3 col-xs-6" style="width: 20%">
                    </div>
                  </div>

                  <span class="section">Survey Result</span>
                  </div>
                  </div>
                  </div>
                  <div id="taro_survey">



                   

                    

                    
                      

                       

                          


                           

                            

                           


                            
                          </div>

                        </div>









                        <!-- <div class="ln_solid"></div> -->
                        <div class="form-group">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /page content -->
          <!-- footer content -->
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
      <script src="<?php echo base_url()."assets/"?>vendors/Chart.js/dist/Chart.js"></script>
      <!-- <script src="<?php echo base_url()."assets/"?>jsgue.js"></script> -->

      <script type="text/javascript">
        $(function(){
          $.ajaxSetup({
            type:"post",
            cache:false,
            dataType: "json"
          })

          $("#load_table").click(function(){

            $("#taro_survey").empty();

            var activity_code = document.getElementById("activity").value;
            var session = document.getElementById("session").value;
              // var tot = document.getElementById("tot");
              var date_session = document.getElementById("date_session");
              // tot.value = "fak";
              // alert(session+" "+activity_code);
              $.ajax({
                url:"<?php echo base_url('index.php/survey/load_table'); ?>",
                data: {activity_code:activity_code,session:session},
                success: function(a){



                  // alert(JSON.stringify(a.gender));
                  // alert(a.valuecountry.length);

                  var ele ="";
                  ele+="<div class='item form-group'>";
                  ele+="<label class='control-label col-md-3 col-sm-3 col-xs-12'>Total Participant";
                  ele+=    "</label>";
                  ele+=    "<div id='gender' class='col-md-6 col-sm-6 col-xs-12'>"
                  for(var i = 0; i<a.valuegender.length; i++){
                    ele+=      "<label id='male' class='control-label col-md-7 col-xs-12' align='left' style='text-align: left;width:100%'> "+a.valuegender[i]+" "+a.persengender[i]+"% </label>";
                  }
                  ele+=    "</div>";
                  ele+=  "</div>";

                  ele+=  "<div class='item form-group'>";
                  ele+=    "<label class='control-label col-md-3 col-sm-3 col-xs-12'>Country of Residence";
                  ele+=    "</label>";
                  ele+=    "<div id='country_of_residence' class='col-md-6 col-sm-6 col-xs-12'>";

                  for(var i = 0; i<a.valuecountry.length; i++){
                    ele+=      "<label id='male' class='control-label col-md-7 col-xs-12' align='left' style='text-align: left;width:100%'> "+a.valuecountry[i]+" "+a.persencountry[i]+"% </label>";
                  }

                  ele+=    "</div>";
                  ele+=  "</div>";

                  ele+=   "<div class='item form-group'>";
                  ele+=     "<label class='control-label col-md-3 col-sm-3 col-xs-12' >Type of Institution";
                  ele+=     "</label>";
                  ele+=     "<div id='institution_type' class='col-md-6 col-sm-6 col-xs-12'>";

                  for(var i = 0; i<a.valuetype.length; i++){
                    ele+=      "<label id='male' class='control-label col-md-7 col-xs-12' align='left' style='text-align: left;width:100%'> "+a.valuetype[i]+" "+a.persentype[i]+"% </label>";
                  }



                  ele+=       "</div>";
                  ele+=     "</div>";

                  ele+=     "<div class='item form-group'>";
                  ele+=       "<label class='control-label col-md-3 col-sm-3 col-xs-12' >Occupation";
                  ele+=       "</label>";
                  ele+=       "<div id ='occupation' class='col-md-6 col-sm-6 col-xs-12'>";

                  for(var i = 0; i<a.valueoccupation.length; i++){
                    ele+=      "<label id='male' class='control-label col-md-7 col-xs-12' align='left' style='text-align: left;width:100%'> "+a.valueoccupation[i]+" "+a.persenoccupation[i]+"% </label>";
                  }


                  ele+=          "<label class='control-label col-md-7 col-xs-12' align='left' style='text-align: left; width:100%'></label>";



                  ele+=          "</div>";
                  ele+=       "</div>";

                  ele+=     "<div class='item form-group'>";
                  ele+=        "<label class='control-label col-md-3 col-sm-3 col-xs-12' >Primary area of work";
                  ele+=        "</label>";
                  ele+=        "<div id='area_of_work' class='col-md-6 col-sm-6 col-xs-12'>";

                  for(var i = 0; i<a.valuearea.length; i++){
                    ele+=      "<label id='male' class='control-label col-md-7 col-xs-12' align='left' style='text-align: left;width:100%'> "+a.valuearea[i]+" "+a.persenarea[i]+"% </label>";
                  }         


                  ele+=            "<label class='control-label col-md-7 col-xs-12' align='left' style='text-align: left; width:100%'></label>";


                  ele+=         "</div>";
                  ele+=       "</div>";

                  ele+=       "<div class='item form-group'>";
                  ele+=          "<label class='control-label col-md-3 col-sm-3 col-xs-12'>Disciplinary Background";
                  ele+=         "</label>";
                  ele+=          "<div id='background' class='col-md-6 col-sm-6 col-xs-12'>";    

                  for(var i = 0; i<a.valuebackground.length; i++){
                    ele+=      "<label id='male' class='control-label col-md-7 col-xs-12' align='left' style='text-align: left;width:100%'> "+a.valuebackground[i]+" "+a.persenbackground[i]+"% </label>";
                  }   

                  ele+=             "</div>";
                  ele+=         "</div>";

                  ele+=        "<div style='margin-top: 40px'>";
                  ele+=         "<div class='col-md-1'></div>";
                  ele+=         "<div class='col-md-4'>";
                  ele+=         "<span class='section' align='center'>Survey Statement</span>";
                  ele+=         "</div>";
                  ele+=         "<div class='col-md-1'></div>";

                  ele+=         "<div class='col-md-1'></div>";
                  ele+=         "<div class='col-md-4'>";
                  ele+=         "<span class='section' align='center'>Average Value (1-7)</span>";
                  ele+=         "</div>";
                  ele+=         "<div class='col-md-1'></div>";
                  ele+=        "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 1</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q1+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 2</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q2+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 3</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q3+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 4</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q4+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 5</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q5+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 6</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q6+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 7</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q7+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 8</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q8+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 12</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q12+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 13</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q13+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 14</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q14+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 15</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q15+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 16</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q16+"</label>";
                  ele+=            "</div>";

                   ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>Questioner 17</label>";
                  ele+=             "</div>";

                  ele+=             "<div class='col-md-6' align='center'>";
                  ele+=             "<label>"+a.q17+"</label>";
                  ele+=            "</div>";

                  // alert("bisa");
                  

                  

                  date_session.value = a.session_date;


                  var element=$(ele);
                  element.hide();
                  element.prependTo("#taro_survey").fadeIn(1500);
                  

                }
              });


});

$("#load_table2").click(function(){

            $("#taro_survey").empty();

            var activity_code = document.getElementById("activity").value;
            var session = document.getElementById("session").value;
              // var tot = document.getElementById("tot");
              var date_session = document.getElementById("date_session");
              // tot.value = "fak";
              // alert(session+" "+activity_code);
              $.ajax({
                url:"<?php echo base_url('index.php/survey/load_table2'); ?>",
                data: {activity_code:activity_code,session:session},
                success: function(a){


                  var ele ="";
                  ele+= " <div class='row'>";
                  ele+= "  <div class='col-md-6 col-sm-6 col-xs-12'>";
                  ele+= "    <div class='x_panel'>";
                  ele+= "      <div class='x_title'>";
                  ele+= "        <h2>Gender <small>Sessions</small></h2>";
                  ele+= "        <ul class='nav navbar-right panel_toolbox'>";
                  ele+= "          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
                  ele+= "          </li>";
                  ele+= "          <li class='dropdown'>";
                  ele+= "            <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
                  ele+= "            <ul class='dropdown-menu' role='menu'>";
                  ele+= "              <li><a href='#''>Settings 1</a>";
                  ele+= "              </li>";
                  ele+= "              <li><a href='#''>Settings 2</a>";
                  ele+= "              </li>";
                  ele+= "            </ul>";
                  ele+= "          </li>";
                  ele+= "          <li><a class='close-link'><i class='fa fa-close'></i></a>";
                  ele+= "          </li>";
                  ele+= "        </ul>";
                  ele+= "        <div class='clearfix'></div>";
                  ele+= "      </div>";
                  ele+= "      <div class='x_content'>";
                  ele+= "        <canvas id='mybarChartgender'></canvas>";
                  ele+= "      </div>";
                  ele+= "    </div>";
                  ele+= "  </div>";

                  ele+= "  <div class='col-md-6 col-sm-6 col-xs-12'>";
                  ele+= "    <div class='x_panel'>";
                  ele+= "      <div class='x_title'>";
                  ele+= "        <h2>Country <small>Sessions</small></h2>";
                  ele+= "        <ul class='nav navbar-right panel_toolbox'>";
                  ele+= "          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
                  ele+= "         </li>";
                  ele+= "          <li class='dropdown'>";
                  ele+= "            <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
                  ele+= "            <ul class='dropdown-menu' role='menu'>";
                  ele+= "              <li><a href='#''>Settings 1</a>";
                  ele+= "              </li>";
                  ele+= "              <li><a href='#''>Settings 2</a>";
                  ele+= "              </li>";
                  ele+= "            </ul>";
                  ele+= "          </li>";
                  ele+= "          <li><a class='close-link'><i class='fa fa-close'></i></a>";
                  ele+= "          </li>";
                  ele+= "        </ul>";
                  ele+= "        <div class='clearfix'></div>";
                  ele+= "      </div>";
                  ele+= "     <div class='x_content'>";
                  ele+= "        <canvas id='mybarChartcountry'></canvas>";
                  ele+= "      </div>";
                  ele+= "    </div>";
                  ele+= "  </div>";
                  ele+= " </div>";



                   ele+= " <div class='row'>";
                  ele+= "  <div class='col-md-6 col-sm-6 col-xs-12'>";
                  ele+= "    <div class='x_panel'>";
                  ele+= "      <div class='x_title'>";
                  ele+= "        <h2>Type of Institution <small>Sessions</small></h2>";
                  ele+= "        <ul class='nav navbar-right panel_toolbox'>";
                  ele+= "          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
                  ele+= "          </li>";
                  ele+= "          <li class='dropdown'>";
                  ele+= "            <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
                  ele+= "            <ul class='dropdown-menu' role='menu'>";
                  ele+= "              <li><a href='#''>Settings 1</a>";
                  ele+= "              </li>";
                  ele+= "              <li><a href='#''>Settings 2</a>";
                  ele+= "              </li>";
                  ele+= "            </ul>";
                  ele+= "          </li>";
                  ele+= "          <li><a class='close-link'><i class='fa fa-close'></i></a>";
                  ele+= "          </li>";
                  ele+= "        </ul>";
                  ele+= "        <div class='clearfix'></div>";
                  ele+= "      </div>";
                  ele+= "      <div class='x_content'>";
                  ele+= "        <canvas id='mybarCharttype'></canvas>";
                  ele+= "      </div>";
                  ele+= "    </div>";
                  ele+= "  </div>";

                  ele+= "  <div class='col-md-6 col-sm-6 col-xs-12'>";
                  ele+= "    <div class='x_panel'>";
                  ele+= "      <div class='x_title'>";
                  ele+= "        <h2>Occupation <small>Sessions</small></h2>";
                  ele+= "        <ul class='nav navbar-right panel_toolbox'>";
                  ele+= "          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
                  ele+= "         </li>";
                  ele+= "          <li class='dropdown'>";
                  ele+= "            <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
                  ele+= "            <ul class='dropdown-menu' role='menu'>";
                  ele+= "              <li><a href='#''>Settings 1</a>";
                  ele+= "              </li>";
                  ele+= "              <li><a href='#''>Settings 2</a>";
                  ele+= "              </li>";
                  ele+= "            </ul>";
                  ele+= "          </li>";
                  ele+= "          <li><a class='close-link'><i class='fa fa-close'></i></a>";
                  ele+= "          </li>";
                  ele+= "        </ul>";
                  ele+= "        <div class='clearfix'></div>";
                  ele+= "      </div>";
                  ele+= "     <div class='x_content'>";
                  ele+= "        <canvas id='mybarChartoccupation'></canvas>";
                  ele+= "      </div>";
                  ele+= "    </div>";
                  ele+= "  </div>";
                  ele+= " </div>";

                   ele+= " <div class='row'>";
                  ele+= "  <div class='col-md-6 col-sm-6 col-xs-12'>";
                  ele+= "    <div class='x_panel'>";
                  ele+= "      <div class='x_title'>";
                  ele+= "        <h2>Area of Work<small>Sessions</small></h2>";
                  ele+= "        <ul class='nav navbar-right panel_toolbox'>";
                  ele+= "          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
                  ele+= "          </li>";
                  ele+= "          <li class='dropdown'>";
                  ele+= "            <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
                  ele+= "            <ul class='dropdown-menu' role='menu'>";
                  ele+= "              <li><a href='#''>Settings 1</a>";
                  ele+= "              </li>";
                  ele+= "              <li><a href='#''>Settings 2</a>";
                  ele+= "              </li>";
                  ele+= "            </ul>";
                  ele+= "          </li>";
                  ele+= "          <li><a class='close-link'><i class='fa fa-close'></i></a>";
                  ele+= "          </li>";
                  ele+= "        </ul>";
                  ele+= "        <div class='clearfix'></div>";
                  ele+= "      </div>";
                  ele+= "      <div class='x_content'>";
                  ele+= "        <canvas id='mybarChartarea'></canvas>";
                  ele+= "      </div>";
                  ele+= "    </div>";
                  ele+= "  </div>";

                  ele+= "  <div class='col-md-6 col-sm-6 col-xs-12'>";
                  ele+= "    <div class='x_panel'>";
                  ele+= "      <div class='x_title'>";
                  ele+= "        <h2>Background <small>Sessions</small></h2>";
                  ele+= "        <ul class='nav navbar-right panel_toolbox'>";
                  ele+= "          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
                  ele+= "         </li>";
                  ele+= "          <li class='dropdown'>";
                  ele+= "            <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
                  ele+= "            <ul class='dropdown-menu' role='menu'>";
                  ele+= "              <li><a href='#''>Settings 1</a>";
                  ele+= "              </li>";
                  ele+= "              <li><a href='#''>Settings 2</a>";
                  ele+= "              </li>";
                  ele+= "            </ul>";
                  ele+= "          </li>";
                  ele+= "          <li><a class='close-link'><i class='fa fa-close'></i></a>";
                  ele+= "          </li>";
                  ele+= "        </ul>";
                  ele+= "        <div class='clearfix'></div>";
                  ele+= "      </div>";
                  ele+= "     <div class='x_content'>";
                  ele+= "        <canvas id='mybarChartbackground'></canvas>";
                  ele+= "      </div>";
                  ele+= "    </div>";
                  ele+= "  </div>";
                  ele+= " </div>";

                  var quest = ['q1','q2','q3','q4','q5','q6','q7','q8','q12','q13','q14','q15','q16','q17'];

                  for (var i = 0; i<quest.length; i = i + 2){

                  ele+= " <div class='row'>";
                  ele+= "  <div class='col-md-6 col-sm-6 col-xs-12'>";
                  ele+= "    <div class='x_panel'>";
                  ele+= "      <div class='x_title'>";
                  ele+= "        <h2>"+quest[i]+"<small>Sessions</small></h2>";
                  ele+= "        <ul class='nav navbar-right panel_toolbox'>";
                  ele+= "          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
                  ele+= "          </li>";
                  ele+= "          <li class='dropdown'>";
                  ele+= "            <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
                  ele+= "            <ul class='dropdown-menu' role='menu'>";
                  ele+= "              <li><a href='#''>Settings 1</a>";
                  ele+= "              </li>";
                  ele+= "              <li><a href='#''>Settings 2</a>";
                  ele+= "              </li>";
                  ele+= "            </ul>";
                  ele+= "          </li>";
                  ele+= "          <li><a class='close-link'><i class='fa fa-close'></i></a>";
                  ele+= "          </li>";
                  ele+= "        </ul>";
                  ele+= "        <div class='clearfix'></div>";
                  ele+= "      </div>";
                  ele+= "      <div class='x_content'>";
                  ele+= "        <canvas id='mybarChart"+quest[i]+"'></canvas>";
                  ele+= "      </div>";
                  ele+= "    </div>";
                  ele+= "  </div>";

                  ele+= "  <div class='col-md-6 col-sm-6 col-xs-12'>";
                  ele+= "    <div class='x_panel'>";
                  ele+= "      <div class='x_title'>";
                  ele+= "        <h2>"+quest[i+1]+"<small>Sessions</small></h2>";
                  ele+= "        <ul class='nav navbar-right panel_toolbox'>";
                  ele+= "          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
                  ele+= "         </li>";
                  ele+= "          <li class='dropdown'>";
                  ele+= "            <a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
                  ele+= "            <ul class='dropdown-menu' role='menu'>";
                  ele+= "              <li><a href='#''>Settings 1</a>";
                  ele+= "              </li>";
                  ele+= "              <li><a href='#''>Settings 2</a>";
                  ele+= "              </li>";
                  ele+= "            </ul>";
                  ele+= "          </li>";
                  ele+= "          <li><a class='close-link'><i class='fa fa-close'></i></a>";
                  ele+= "          </li>";
                  ele+= "        </ul>";
                  ele+= "        <div class='clearfix'></div>";
                  ele+= "      </div>";
                  ele+= "     <div class='x_content'>";
                  ele+= "        <canvas id='mybarChart"+quest[i+1]+"'></canvas>";
                  ele+= "      </div>";
                  ele+= "    </div>";
                  ele+= "  </div>";
                  ele+= " </div>";
                  }
                  
                  
                  

                  

                  date_session.value = a.session_date;


                  var element=$(ele);
                  element.hide();
                  element.prependTo("#taro_survey").fadeIn(1500);

                  if ($('#mybarChartgender').length ){ 

                                  var ctx = document.getElementById("mybarChartgender");
                                  var mybarChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: a.valuegender,
                                      datasets: [{
                                        label: '# Participate',
                                        backgroundColor: "#26B99A",
                                        data: a.persengender
                                      }, ]
                                    },

                                    options: {
                                      scales: {
                                        yAxes: [{
                                          ticks: {
                                            beginAtZero: true
                                          }
                                        }]
                                      }
                                    }
                                  });

                                } 
                if ($('#mybarChartcountry').length ){ 

                                  var ctx = document.getElementById("mybarChartcountry");
                                  var mybarChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: a.valuecountry,
                                      datasets: [{
                                        label: '# Participate',
                                        backgroundColor: "#26B99A",
                                        data: a.persencountry
                                      }, ]
                                    },

                                    options: {
                                      scales: {
                                        yAxes: [{
                                          ticks: {
                                            beginAtZero: true
                                          }
                                        }]
                                      }
                                    }
                                  });

                                } 

                  if ($('#mybarCharttype').length ){ 

                                  var ctx = document.getElementById("mybarCharttype");
                                  var mybarChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: a.valuetype,
                                      datasets: [{
                                        label: '# Participate',
                                        backgroundColor: "#26B99A",
                                        data: a.persentype
                                      }, ]
                                    },

                                    options: {
                                      scales: {
                                        yAxes: [{
                                          ticks: {
                                            beginAtZero: true
                                          }
                                        }]
                                      }
                                    }
                                  });

                                } 
                  if ($('#mybarChartoccupation').length ){ 

                                  var ctx = document.getElementById("mybarChartoccupation");
                                  var mybarChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: a.valueoccupation,
                                      datasets: [{
                                        label: '# Participate',
                                        backgroundColor: "#26B99A",
                                        data: a.persenoccupation
                                      }, ]
                                    },

                                    options: {
                                      scales: {
                                        yAxes: [{
                                          ticks: {
                                            beginAtZero: true
                                          }
                                        }]
                                      }
                                    }
                                  });

                                } 
                                if ($('#mybarChartbackground').length ){ 

                                  var ctx = document.getElementById("mybarChartbackground");
                                  var mybarChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: a.valuebackground,
                                      datasets: [{
                                        label: '# Participate',
                                        backgroundColor: "#26B99A",
                                        data: a.persenbackground
                                      }, ]
                                    },

                                    options: {
                                      scales: {
                                        yAxes: [{
                                          ticks: {
                                            beginAtZero: true
                                          }
                                        }]
                                      }
                                    }
                                  });

                                } 
                                if ($('#mybarChartarea').length ){ 

                                  var ctx = document.getElementById("mybarChartarea");
                                  var mybarChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: a.valuearea,
                                      datasets: [{
                                        label: '# Participate',
                                        backgroundColor: "#26B99A",
                                        data: a.persenarea
                                      }, ]
                                    },

                                    options: {
                                      scales: {
                                        yAxes: [{
                                          ticks: {
                                            beginAtZero: true
                                          }
                                        }]
                                      }
                                    }
                                  });

                                } 

                                for (var i = 0; i<quest.length; i++){
                                   if ($('#mybarChart'+quest[i]).length ){ 

                                    var ctx = document.getElementById("mybarChart"+quest[i]);
                                    var mybarChart = new Chart(ctx, {
                                      type: 'bar',
                                      data: {
                                        labels: a.value[quest[i]],
                                        datasets: [{
                                          label: '# Participate',
                                          backgroundColor: "#26B99A",
                                          data: a.counts[quest[i]]
                                        }, ]
                                      },

                                      options: {
                                        scales: {
                                          yAxes: [{
                                            ticks: {
                                              beginAtZero: true
                                            }
                                          }]
                                        }
                                      }
                                    });

                                  } 
                                }


                }
              });


});
});


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

            gantiyear();
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
