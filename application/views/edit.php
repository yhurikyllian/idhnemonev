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
  
<!-- DATATABLE -->
<link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
              <h3>Indohun Event</h3>
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
                  <h2>Edit Data <small></small></h2>
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
                 <form class="form-horizontal form-label-left" action="<?php echo base_url();?>index.php/edit/show_table" method="post" novalidate>
                  <!-- <div class="form-horizontal form-label-left"> -->

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

                  
                    

                    <div class="form-horizontal item form-group" style="margin-bottom: 20px" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         
                         <button class="btn btn-info" id="load_table"><i class="glyphicon glyphicon-plus-sign"></i> Load Table</button>
                        
                        </div>
                    </div>
                    <!-- <div style="margin-top: 50px"> -->

                    </form>

                  <span class="section" >Edit Table <?php $sessionactivity = $this->session->userdata('activity'); echo $sessionactivity;?></span>

                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active" style="width: 19%"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Activity</a>
                        </li>
                        <li role="presentation" class="" style="width: 19%"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Session</a>
                        </li>
                        <li role="presentation" class="" style="width: 19%"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">User</a>
                        </li>
                        <li role="presentation" class="" style="width: 19%"><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Speaker</a>
                        </li>
                        <li role="presentation" class="" style="width: 19%"><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Report</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        
                           <table id="tes" class="table table-striped table-bordered" style="table-layout: fixed;width:100%">
                              <thead>
                                <tr>
                                <th>Edit</th>
                                
                                <?php 
                                
                                if($sessionactivity == ""){

                                  $data = $this->m_db->getTabel('project', "*"); 

                                } else {

                                  $data = $this->m_db->getEditTabel('project', $sessionactivity); 

                                }

                                if(count($data) == 0){} else {

                                foreach (array_keys($data[0]) as $d) {

                                if($d == "activity_description" || $d=="objectives" || $d=="output" || $d=="outcomes" || $d=="expertise" || $d=="external_support"){} else { ?>

                                <th><?php echo $d ?></th>

                                <?php    }  } ?>
                                
                                </tr>
                              </thead>
                              <tbody id="table-body">
                              <?php 
                              foreach($data as $d){ ?>
                              <tr>
                                <td><a href="<?php echo base_url()."index.php/edit/edit_activity/".$d['activity_code'] ?>"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a></td>
                              <?php

                                foreach(array_keys($data[0]) as $d2){
                                if($d2 == "activity_description" || $d2=="objectives" || $d2=="output" || $d2=="outcomes" || $d2=="expertise" || $d2=="external_support"){} else { ?>

                                <th><?php echo $d[$d2] ?></th>

                                <?php    }  } ?>

                                
                              
                              </tr>

                              <?php } }?>


                              </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                           <table id="tes3" class="table table-striped table-bordered" style="table-layout: fixed;width:100%">
                              <thead>
                                <tr>
                                <th>Edit</th>
                                <?php 

                                 if($sessionactivity == ""){

                                  $data = $this->m_db->getTabel('session', "*"); 

                                } else {

                                  $data = $this->m_db->getEditTabel('session', $sessionactivity); 

                                }

                                if(count($data) == 0){} else {

                                foreach (array_keys($data[0]) as $d) {

                                  if($d == "type_session"){} else { ?>

                                <th><?php echo $d ?></th>

                                <?php    }  } ?>
                                
                                </tr>
                              </thead>


                              <tbody id="table-body">
                              <?php 
                              foreach($data as $d){ ?>
                              <tr>
                              <td><a href="<?php echo base_url()."index.php/edit/edit_session/".$d['id_session'] ?>"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a></td>
                              <?php
                                foreach(array_keys($data[0]) as $d2){
                                if($d2 == "type_session"){} else { ?>

                                <th><?php echo $d[$d2] ?></th>

                                <?php    }  } ?>
                              
                              </tr>

                              <?php }} ?>
                              </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                           <table id="tes2" class="table table-striped table-bordered" style="table-layout: fixed;width:100%">
                              <thead>
                                <tr>
                                <th>Edit</th>
                                <?php 

                                 if($sessionactivity == ""){

                                  $data = $this->m_db->getTabel('user', "*"); 

                                } else {

                                  $data = $this->m_db->getEditTabelUser($sessionactivity); 

                                }

                                if(count($data) == 0){} else {


                                foreach (array_keys($data[0]) as $d) {

                                 ?>
                                 <th><?php echo $d ?></th>

                                                              
                                <?php } ?>
                                
                                </tr>
                              </thead>


                              <tbody id="table-body">
                              <?php 
                              foreach($data as $d){ ?>
                              <tr>
                              <td><a href="<?php echo base_url()."index.php/edit/edit_user/".$d['id_user'] ?>"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a></td>
                              <?php
                                foreach(array_keys($data[0]) as $d2){
                                echo "<td>".$d[$d2]."</td>";

                                }
                              
                                ?>
                              
                              </tr>

                              <?php } }?>


                              </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                           <table id="tes4" class="table table-striped table-bordered" style="table-layout: fixed;width:100%">
                              <thead>
                                <tr>
                                <th>Edit</th>
                                <?php 

                                if($sessionactivity == ""){

                                  $data = $this->m_db->getTabel('speaker', "*"); 

                                } else {

                                  $data = $this->m_db->getEditTabelSpeaker($sessionactivity); 

                                }

                                if(count($data) == 0){} else {

                                foreach (array_keys($data[0]) as $d) {

                                  if($d == "bio" || $d == "resume"){} else { ?>

                                <th><?php echo $d ?></th>

                                <?php    }  } ?>
                                
                                </tr>
                              </thead>


                              <tbody id="table-body">
                              <?php 
                              foreach($data as $d){ ?>
                              <tr>
                              <td><a href="<?php echo base_url()."index.php/edit/edit_speaker/".$d['id_speaker'] ?>"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a></td>
                              <?php
                                foreach(array_keys($data[0]) as $d2){
                                if($d2 == "bio" || $d2 == "resume"){} else { ?>

                                <th><?php echo $d[$d2] ?></th>

                                <?php    }  } ?>
                              
                              </tr>

                              <?php } }?>
                              </tbody>
                            </table>
                        </div>
                         <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                           <table id="tes5" class="table table-striped table-bordered" style="table-layout: fixed;width:100%">
                              <thead>
                                <tr>
                                <th>Edit</th>
                                <?php 

                                
                                 if($sessionactivity == ""){

                                  $data = $this->m_db->getTabel('project_report', "*"); 

                                } else {

                                  $data = $this->m_db->getEditTabel('project_report', $sessionactivity); 

                                }

                                if(count($data) == 0){} else {

                                foreach (array_keys($data[0]) as $d) {

                                  if($d == "results" || $d == "reflections"|| $d== "followup_plan"){} else { ?>

                                <th><?php echo $d ?></th>

                                <?php    }  } ?>
                                
                                </tr>
                              </thead>


                              <tbody id="table-body">
                              <?php 
                              foreach($data as $d){ ?>
                              <tr>
                              <td><a href="<?php echo base_url()."index.php/edit/edit_report/".$d['id_project_report'] ?>"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a></td>
                              <?php
                                foreach(array_keys($data[0]) as $d2){
                                if($d2 == "results" || $d2 == "reflections"|| $d2== "followup_plan"){} else { ?>

                                <th><?php echo $d[$d2] ?></th>

                                <?php    }  } ?>
                              
                              </tr>

                              <?php } }?>
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>

                   


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
                   

                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
    <!-- footer content -->
        <footer>
          <?php 
          $this->load->view("footer");
          $this->session->set_userdata('activity', "");

          ?>
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
    <!-- DATATABLE -->
    <script src="<?php echo base_url()."assets/"?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script type="text/javascript">

     $(document).ready(function() {
    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );
     
    $('table.table').DataTable( {
        // ajax:           '../ajax/data/arrays.txt',
        scrollX:      true,
        scrollCollapse: true,
        // paging:         false
    } );
 
    // Apply a search to the second table for the demo
    
} );
   
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
