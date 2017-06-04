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

	<!-- AKAx -->
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

									<!-- <form class="form-horizontal form-label-left" action="<?php echo base_url();?>index.php/project_report/input" method="post" novalidate> -->
									<form class="form-horizontal form-label-left" action="<?php echo base_url();?>index.php/addevent/addevent" method="post" novalidate>
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

              <span class="section">Chart</span>

              <div class="col-md-2 col-sm-2 col-xs-12" align="center">

              	<button class="btn btn-info" id="tambah-data"><i class="glyphicon glyphicon-plus-sign"></i> Add Chart </button>

              </div>

              <div class="taro_setting">                

                    <!-- <div class="col-md-3 col-sm-3 col-xs-12 text-right" >
                      <select id="project_title1" class="form-control" name="project_title" style="" onchange="ganti3()">

                        <option>Gender</option>

                      </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12" align="center">
                      <?php echo "<textarea>Tes\nCoy\nshit\nfuck\nyou</textarea>"?>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12" align="center">
                      <select id="project_title1" class="form-control" name="project_title" onchange="ganti3()">

                        <option>fak</option>

                      </select>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12" align="right">


                      <button class='btn btn-info' id='display_chart'><i class='fa fa-repeat'></i> Process </button>


                  </div>  -->
              </div>
              <div id="printablearea" class="taro_chart" style="margin-top: 100px" >
                    <!-- 
                    <div class="tampil_line_chart" style="">
                      <div class="col-md-2 col-sm-2 col-xs-12"></div>

                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Line graph<small>Sessions</small></h2>
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
                            <canvas id="lineChart2"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tampil_bar_chart">
                      <div class="col-md-2 col-sm-2 col-xs-12"></div>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Bar graph <small>Sessions</small></h2>
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
                            <canvas id="mybarChart2"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="tampil_pie_chart">

                    <div class="col-md-2 col-sm-2 col-xs-12">

                    </div>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Bar graph <small>Sessions</small></h2>
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
                          <canvas id="pieChart2"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
              </div> -->

          <!-- <input type="button" onclick="printDiv('printableArea')" value="print a div!" /> -->
          </div>




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
<script src="<?php echo base_url()."assets"?>/build/js/custom.js"></script>

<script src="<?php echo base_url()."assets/"?>vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
<script src="<?php echo base_url()."assets/"?>vendors/Chart.js/dist/Chart.js"></script>
<?php $counter=0; ?>
<script type="text/javascript">

	$(function(){
		$.ajaxSetup({
			type:"post",
			cache:false,
			dataType: "json"
		})

		$("#tes").click(function(){

			$("#taro_survey").empty();

			alert("tes");
			var activity_code = document.getElementById("activity").value;
			var session = document.getElementById("session").value;
              // var tot = document.getElementById("tot");
              var date_session = document.getElementById("date_session");
              // tot.value = "fak";
              // alert(session+" "+activity_code);
              
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

  			function getRandomColor() {
			    var letters = '0123456789ABCDEF';
			    var color = '#';
	    		for (var i = 0; i < 6; i++ ) {
	        	color += letters[Math.floor(Math.random() * 16)];
	    		}
	    		return color;
				}		
  			var counter = 0;


  			function tes(clicked_id){

          // alert(clicked_id);

  				var id = document.getElementById("jenis_chart"+clicked_id).value;
  				var type2 = document.getElementById('gender'+clicked_id);
  				var type = type2.options[type2.selectedIndex].text;
  				var type_value = type2.value;
  				var activity_code = document.getElementById("activity").value;
  				var session = document.getElementById("session").value;
  				// var date_session = document.getElementById("date_session");

  				$.ajaxSetup({
  					type:"post",
  					cache:false,
  					dataType: "json"
  				})

  				$.ajax({
  					url:"<?php echo base_url('index.php/survey/load_chart'); ?>",
  					data: {activity_code:activity_code,session:session,type_value:type_value},
  					success: function(a){
  						$(".taro_chart"+clicked_id).empty();
  						// alert(type_value);
  						var warna = [];
  						for(var i = 0; i<a.valuechart.length;i++){
  						 	warna.push(getRandomColor());
  						 }


  						if (id == "line") {

                $(".taro_chart"+clicked_id).empty();

  							var ele = "";


  							ele+=    "<div class='tampil_line_chart'>";
  							ele+=      "<div class='col-md-2 col-sm-2 col-xs-12'></div>";

  							ele+=     "<div class='col-md-10 col-sm-10 col-xs-12'>";
  							ele+=       "<div class='x_panel'>";
  							ele+=         "<div class='x_title'>";
  							ele+=           "<h2>"+type+"<small>Sessions</small></h2>";
  							ele+=           "<ul class='nav navbar-right panel_toolbox'>";
  							ele+=             "<li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
  							ele+=             "</li>";
  							ele+=             "<li class='dropdown'>";
  							ele+=              "<a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
  							ele+=              "<ul class='dropdown-menu' role='menu'>";
  							ele+=                "<li><a href='#''>Settings 1</a>";
  							ele+=                "</li>";
  							ele+=                "<li><a href='#''>Settings 2</a>";
  							ele+=                "</li>";
  							ele+=              "</ul>";
  							ele+=            "</li>";
  							ele+=           "<li><a class='close-link'><i class='fa fa-close'></i></a>";
  							ele+=            "</li>";
  							ele+=          "</ul>";
  							ele+=          "<div class='clearfix'></div>";
  							ele+=        "</div>";
  							ele+=        "<div class='x_content'>";
  							ele+=         "<canvas id='lineChart"+clicked_id+"'></canvas>";
  							ele+=        "</div>";
  							ele+=      "</div>";
  							ele+=    "</div>";
  							ele+=  "</div>";



  							var element = $(ele);
  							element.hide();
  							element.prependTo(".taro_chart"+clicked_id).fadeIn(500);

  							if ($('#lineChart'+clicked_id).length ){ 

  								var ctx = document.getElementById("lineChart"+clicked_id);
  								var lineChart = new Chart(ctx, {
  									type: 'line',
  									data: {

  										labels: ["January", "February", "March", "April", "May", "June", "<?php echo "Yuni" ?>"],
  										datasets: [{
  											label: "My First dataset",
  											backgroundColor: "rgba(38, 185, 154, 0.31)",
  											borderColor: "rgba(38, 185, 154, 0.7)",
  											pointBorderColor: "rgba(38, 185, 154, 0.7)",
  											pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
  											pointHoverBackgroundColor: "#fff",
  											pointHoverBorderColor: "rgba(220,220,220,1)",
  											pointBorderWidth: 1,
  											data: [31, 74, 6, 39, 20, 85, 7]
  										}, {
  											label: "My Second dataset",
  											backgroundColor: "rgba(3, 88, 106, 0.3)",
  											borderColor: "rgba(3, 88, 106, 0.70)",
  											pointBorderColor: "rgba(3, 88, 106, 0.70)",
  											pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
  											pointHoverBackgroundColor: "#fff",
  											pointHoverBorderColor: "rgba(151,187,205,1)",
  											pointBorderWidth: 1,
  											data: [82, 23, 66, 9, 99, 4, 2]
  										}]
  									},
  								});

  							}


  					} else if (id == "bar"){
                $(".taro_chart"+clicked_id).empty();
  							var ele = ""

  							ele+= "<div class='tampil_bar_chart'>";
  							ele+=          "<div class='col-md-2 col-sm-2 col-xs-12'></div>";
  							ele+=         "<div class='col-md-10 col-sm-10 col-xs-12'>";
  							ele+=            "<div class='x_panel'>";
  							ele+=              "<div class='x_title'>";
  							ele+=                "<h2>"+type+"<small>Sessions</small></h2>";
  							ele+=                "<ul class='nav navbar-right panel_toolbox'>";
  							ele+=                  "<li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
  							ele+=                  "</li>";
  							ele+=                  "<li class='dropdown'>";
  							ele+=                     "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
  							ele+=                    "<ul class='dropdown-menu' role='menu'>";
  							ele+=                      "<li><a href='#''>Settings 1</a>";
  							ele+=                     "</li>";
  							ele+=                     "<li><a href='#''>Settings 2</a>";
  							ele+=                     "</li>";
  							ele+=                   "</ul>";
  							ele+=                 "</li>";
  							ele+=                 "<li><a class='close-link'><i class='fa fa-close'></i></a>";
  							ele+=                 "</li>";
  							ele+=               "</ul>";
  							ele+=               "<div class='clearfix'></div>";
  							ele+=             "</div>";
  							ele+=             "<div class='x_content'>";
  							ele+=               "<canvas id='mybarChart"+clicked_id+"'></canvas>";
  							ele+=             "</div>";
  							ele+=           "</div>";
  							ele+=         "</div>";
  							ele+=       "</div>";
  							ele+=       "<div class='clearfix'></div>";
  							ele+=      "</div>";

  							var element = $(ele);
  							element.hide();
  							element.prependTo(".taro_chart"+clicked_id).fadeIn(500);

  							if ($('#mybarChart'+clicked_id).length ){ 

  								var ctx = document.getElementById("mybarChart"+clicked_id);
  								var mybarChart = new Chart(ctx, {
  									type: 'bar',
  									data: {
  										labels: a.valuechart,
  										datasets: [{
  											label: '#'+type+' Participate',
  											backgroundColor: "#26B99A",
  											data: a.nilaichart
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

  					} else if (id == "pie"){
                $(".taro_chart"+clicked_id).empty();
  							var ele = ""

  							ele+= "<div class='tampil_bar_chart'>";
  							ele+=          "<div class='col-md-2 col-sm-2 col-xs-12'></div>";
  							ele+=         "<div class='col-md-10 col-sm-10 col-xs-12'>";
  							ele+=            "<div class='x_panel'>";
  							ele+=              "<div class='x_title'>";
  							ele+=                "<h2>"+type+"<small>Sessions</small></h2>";
  							ele+=                "<ul class='nav navbar-right panel_toolbox'>";
  							ele+=                  "<li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>";
  							ele+=                  "</li>";
  							ele+=                  "<li class='dropdown'>";
  							ele+=                     "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>";
  							ele+=                    "<ul class='dropdown-menu' role='menu'>";
  							ele+=                      "<li><a href='#''>Settings 1</a>";
  							ele+=                     "</li>";
  							ele+=                     "<li><a href='#''>Settings 2</a>";
  							ele+=                     "</li>";
  							ele+=                   "</ul>";
  							ele+=                 "</li>";
  							ele+=                 "<li><a class='close-link'><i class='fa fa-close'></i></a>";
  							ele+=                 "</li>";
  							ele+=               "</ul>";
  							ele+=               "<div class='clearfix'></div>";
  							ele+=             "</div>";
  							ele+=             "<div class='x_content'>";
  							ele+=               " <canvas id='pieChart"+clicked_id+"'></canvas>";
  							ele+=             "</div>";
  							ele+=           "</div>";
  							ele+=         "</div>";
  							ele+=       "</div>";
  							ele+=       "<div class='clearfix'></div>";
  							ele+=      "</div>";

  							var element = $(ele);
  							element.hide();
  							element.prependTo(".taro_chart"+clicked_id).fadeIn(500);

  							if ($('#pieChart'+clicked_id).length ){

  								var ctx = document.getElementById("pieChart"+clicked_id);
  								var data = {
  									datasets: [{
  										data: a.nilaichart,
  										backgroundColor: warna,
								            label: 'My dataset' // for legend
								        }],
								        labels: a.valuechart
								    };

								    var pieChart = new Chart(ctx, {
								    	data: data,
								    	type: 'pie',
								    	otpions: {
								    		legend: false
								    	}
								    });

								}

								}			
								}
								});


  	
  	}

    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

  	$(function(){

  		$.ajaxSetup({
  			type:"post",
  			cache:false,
  			dataType: "json"
  		})


  		$(document).on("click","td",function(){
      // $(this).find("span[class~='caption']").hide();
      // $(this).find("input[class~='editor']").fadeIn().focus();
  });


  		$("#tambah-data").click(function(){

          // alert("bisa");
          // var id = document.getElementById("hasil_search").value;
          var ele = "";
          ele+="<div class='col-md-12 col-sm-12 col-xs-12 text-right' ></div>";
          ele+="<div class='col-md-2 col-sm-2 col-xs-12 text-right' ></div>";
          
          // ele+="<div class='col-md-2 col-sm-2 col-xs-12' align='center'>";
          // ele+="</div>";

          ele+="<div class='col-md-4 col-sm-4 col-xs-12 text-right' >";
          ele+="<select id='gender"+counter+"' class='form-control' name='project_title' onchange=''>";
          ele+="<option value='gender'>Gender</option>";
          ele+="<option value='country'>Country</option>";
          ele+="<option value='type_institution'>Type of Institution</option>";
          ele+="<option value='pos_institution'>Position on Institution</option>";
          ele+="<option value='occupation'>Occupation</option>";
          ele+="<option value='area_of_work'>Area of Work</option>";
          ele+="<option value='disciplinary'>Disciplinary Background</option>";
           ele+="<option value='q1'>Questioner 1</option>";
           ele+="<option value='q2'>Questioner 2</option>";
           ele+="<option value='q3'>Questioner 3</option>";
           ele+="<option value='q4'>Questioner 4</option>";
           ele+="<option value='q5'>Questioner 5</option>";
           ele+="<option value='q6'>Questioner 6</option>";
           ele+="<option value='q7'>Questioner 7</option>";
           ele+="<option value='q8'>Questioner 8</option>";
           ele+="<option value='q12'>Questioner 12</option>";
           ele+="<option value='q13'>Questioner 13</option>";
           ele+="<option value='q14'>Questioner 14</option>";
           ele+="<option value='q15'>Questioner 15</option>";
           ele+="<option value='q16'>Questioner 16</option>";
           ele+="<option value='q17'>Questioner 17</option>";
          
          ele+="</select>";
          ele+="</div>";
          // ele+="<div class='col-md-3 col-sm-3 col-xs-12' align='center'>";


          // ele+="</div>";
          ele+="<div class='col-md-4 col-sm-4 col-xs-12' align='center'>";
          ele+="<select id='jenis_chart"+counter+"' class='form-control' name='project_title' onchange=''>";
          ele+="<option value='line'>Line Chart</option>";
          ele+="<option value='bar'>Bar Chart</option>";
          ele+="<option value='pie'>Pie Chart</option>";
          ele+="</select>";
          ele+="</div>";
          ele+="<div class='col-md-2 col-sm-3 col-xs-12' align='right'>";
          ele+="<button class='btn btn-info' id='"+counter+"' onclick='tes(this.id)'><i class='fa fa-repeat'></i> Process </button>";
           // ele+="<button class='btn btn-info' id='"+counter+"' onclick=''><i class='fa fa-repeat'></i> Process </button>";
           ele+="</div>";
           ele+="<div style='margin-top:20px' class='col-md-12 col-sm-12 col-xs-12 taro_chart"+counter+"'></div>";





           var element = $(ele);
           element.hide();
           element.prependTo(".taro_setting").fadeIn(500);


            counter++;



       });





  	});

  </script>




</body>
</html>
