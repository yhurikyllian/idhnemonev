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
  <link href="<?php echo base_url()."assets/"?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url()."assets/"?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url()."assets/"?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url()."assets/"?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url()."assets/"?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url()."assets/"?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url()."assets/"?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url()."assets/"?>/build/css/custom.min.css" rel="stylesheet">

  <!-- Datatable -->
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
        <!-- top tiles -->
        <?php $this->load->view('top_tiles'); ?>

        <!-- Table -->


        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>List Peserta <small>Users</small></h2>
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
                <!-- <p class="text-muted font-13 m-b-30">
                  DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                </p> -->
                <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>No.Ponsel</th>
                      <th>Pekerjaan</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Detail</th>


                    </tr>
                  </thead>


                  <tbody>

                    <?php

                    $table = $this->m_db->getTabel("auser", "*"); 
                    foreach ($table as $d) {?>
                    <tr>
                      <td><?php echo $d['name'] ?></td>
                      <td><?php echo $d['phone'] ?></td>
                      <td><?php echo $d['email'] ?></td>
                      <td><?php echo $d['job'] ?></td>
                      <td><?php echo $d['gender'] ?></td>
                      <td><form action="<?php echo base_url()."index.php/print_page/cetak_masuk/".urlencode(urlencode($d['id_user'])); ?>"><input type="submit" value="Detail" class ="btn btn-primary" />  </form></td>

                      
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">




          <?php 

          $male = count($this->m_db->getGender("auser", "*","Male"));
          $female = count($this->m_db->getGender("auser", "*","Female"));

          ?>


          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
              <h2>Gender</h2>
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
                <table class="" style="width:100%">
                  <tr>
                    <th style="width:37%;">
                      <p>Top 5</p>
                    </th>
                    <th>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <p class="">Device</p>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <p class="">Progress</p>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <canvas id="myChart" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">
                        <tr>
                          <td>
                            <p><i class="fa fa-square blue"></i>Male </p>
                          </td>
                          <td id="male_count" value="50"><?php echo $male ?></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square green"></i>Female </p>
                          </td>
                          <td id="female_count" value="50"><?php echo $female ?></td>
                        </tr>

                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          


          <!-- Start to do list -->
          
          <!-- End to do list -->

          <!-- start of weather widget -->

          <!-- end of weather widget -->
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
<script src="<?php echo base_url()."assets/"?>/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url()."assets/"?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/"?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url()."assets/"?>/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url()."assets/"?>/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url()."assets/"?>/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url()."assets/"?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()."assets/"?>/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url()."assets/"?>/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo base_url()."assets/"?>/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url()."assets/"?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url()."assets/"?>/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()."assets/"?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url()."assets/"?>/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()."assets/"?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Datatable -->
<!-- Datatables -->
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

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url()."assets/"?>/build/js/custom.min.js"></script>

<script>
 $(document).ready(function() {});

 $.getScript('http://www.chartjs.org/assets/Chart.js',function(){

  var data = [{
    value: document.getElementById ( "male_count" ).textContent,
    color: "#3498DB"
  }, {
    value: document.getElementById ( "female_count" ).textContent,
    color: "#1ABB9C"
  }

  ]

  var options = {
    animation: false
  };

    //Get the context of the canvas element we want to select
    var c = $('#myChart');
    var ct = c.get(0).getContext('2d');
    var ctx = document.getElementById("myChart").getContext("2d");
    /*************************************************************************/
    myNewChart = new Chart(ct).Doughnut(data, options);

  })
</script>

</body>
</html>
