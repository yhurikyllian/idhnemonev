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

  <!-- Datatable -->
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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

                    <div class="form-horizontal item form-group" style="margin-bottom: 20px" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         
                         <button class="btn btn-info" id="load_table"><i class="glyphicon glyphicon-plus-sign"></i> Load Table</button>
                        
                        </div>
                    </div>
                    <div style="margin-top: 20px">
                    <span class="section" >Add New Attendance</span>
                    </div>
                    <div class="form-horizontal form-label-left">

                    <!-- <form action="<?php echo base_url()."search/byname"?>" method="post" > -->
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Search by name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="session_type" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                          <button id="search_name" class='btn btn-xs btn-danger search_name'><i class='glyphicon glyphicon-search'></i> Search</button>
                        </div>
                      </div>
                    <!-- </form> -->

                    <!-- <form action="<?php echo base_url()."search/byid"?>" method="post" >  -->
                        
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Search by id
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="id" name="session_type"  class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                          <button id="search_id" class='btn btn-xs btn-danger search_id'><i class='glyphicon glyphicon-search'></i>Search</button>
                        </div>
                      </div>
                    
                    </div>

                      <div class="form-horizontal form-label-left item form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Result
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <!-- <input type="text" id="result_user" name="session_type" readonly class="form-control col-md-7 col-xs-12"> -->
                          <select id="hasil_search" class="form-control" name="session_title">
                            
                            
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <button class="btn btn-info" id="tambah-data"><i class="glyphicon glyphicon-plus-sign"></i> Tambah </button>
                        </div>
                      </div>
                    
                    

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>ID</th>

                            <!-- <th>ID</th> -->
                            <th>Delete</th>
                            
                          </tr>
                        </thead>


                        <tbody id="table-body">

                         
                        </tbody>
                      </table>

                    <div class="ln_solid"></div>
                    
                  
                  <!-- </div> -->
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

<script type="text/javascript">

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

    $("#load_table").click(function(){
      var activity_code = document.getElementById("activity").value;
      $('#datatable').dataTable();
      // alert(activity_code);
      $.ajax({
        url:"<?php echo base_url('index.php/addattendees/load_table'); ?>",
        data: {activity_code:activity_code},
        success: function(a){
          var ele="";

          $("#table-body").empty();

          for(var i=0; i<a.jml; i++){
          
          ele+="<tr data-id='"+a.id[i]['id_userproject']+"'>";
          ele+="<td><span class='span-nama caption' data-id='"+a.id[i]['id_userproject']+"'></span>"+a.id[i]['name']+"</td>";
          ele+="<td><span class='span-nama caption' data-id='"+a.id[i]['id_userproject']+"'></span>"+a.id[i]['age']+"</td>";
          ele+="<td><span class='span-nama caption' data-id='"+a.id[i]['id_userproject']+"'></span>"+a.id[i]['phone']+"</td>";
          ele+="<td><span class='span-nama caption' data-id='"+a.id[i]['id_userproject']+"'></span>"+a.id[i]['id_or_passport']+"</td>";
          ele+="<td><button class='btn btn-xs btn-danger hapus-member' data-id='"+a.id[i]['id_userproject']+"'><i class='glyphicon glyphicon-remove'></i> Hapus</button></td>";
          ele+="</tr>";

          // dataset = [a.id[i][]]; 
          }

          var element=$(ele);
          element.hide();
          element.prependTo("#table-body").fadeIn(1500);

          $('#datatable').dataTable();

        }
      });
    });

    $("#tambah-data").click(function(){
      var id = document.getElementById("hasil_search").value;
      var activity_code = document.getElementById("activity").value;
      $.ajax({
        url:"<?php echo base_url('index.php/addattendees/input_user'); ?>",
        data: {id:id,activity_code:activity_code},
        success: function(a){
          
          // alert('coeg');
          var ele="";
          ele+="<tr data-id='"+a.id['id_userproject']+"'>";
          ele+="<td><span class='span-nama caption' data-id='"+a.id['id_userproject']+"'></span>"+a.id['name']+"</td>";
          ele+="<td><span class='span-nama caption' data-id='"+a.id['id_userproject']+"'></span>"+a.id['age']+"</td>";
          ele+="<td><span class='span-nama caption' data-id='"+a.id['id_userproject']+"'></span>"+a.id['phone']+"</td>";
          ele+="<td><span class='span-nama caption' data-id='"+a.id['id_userproject']+"'></span>"+a.id['id_or_passport']+"</td>";
          ele+="<td><button class='btn btn-xs btn-danger hapus-member' data-id='"+a.id['id_userproject']+"'><i class='glyphicon glyphicon-remove'></i> Hapus</button></td>";
          ele+="</tr>";

          var element=$(ele);
          element.hide();
          element.prependTo("#table-body").fadeIn(1500);

        }
      });
    });

    $("#search_name").click(function(){
      var nama = document.getElementById("name").value;
      // alert(nama);
      $.ajax({
        url:"<?php echo base_url('index.php/addattendees/search_nama'); ?>",
        data: {nama:nama},
        success: function(a){

          var result = document.getElementById("hasil_search");

          var selLength = result.options.length;
          for(var i=0;i<selLength;i++){
            result.options.remove(result.options);
          }

          if(a.jml>0){
              for (var i= 0;i<a.id.length; i++ ){
              var opt = document.createElement('option') ;
              opt.innerHTML = a.id[i]['name']+" = "+a.id[i]['id_or_passport'] ;
              opt.value =  a.id[i]['id_user'];
              result.add(opt);
              }
            }
            else {
                alert("tidak ditemukan");
          }
          
        }
      });
    });

    $("#search_id").click(function(){
      var id = document.getElementById("id").value;
      // alert(id);
      // alert(nama);
      $.ajax({
        url:"<?php echo base_url('index.php/addattendees/search_id'); ?>",
        data: {id:id},
        success: function(a){

          var result = document.getElementById("hasil_search");

          var selLength = result.options.length;
          for(var i=0;i<selLength;i++){
            result.options.remove(result.options);
          }

          if(a.jml>0){
              for (var i= 0;i<a.id.length; i++ ){
              var opt = document.createElement('option') ;
              opt.innerHTML = a.id[i]['id_or_passport'] ;
              opt.value =  a.id[i]['id_user'];
              result.add(opt);
              }
            }
            else {
                alert("tidak ditemukan");
          }

          }
      });
    });

    $(document).on("click",".hapus-member",function(){
      var id=$(this).attr("data-id");
      swal({
        title:"Hapus Member",
        text:"Yakin akan menghapus member ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Hapus",
        closeOnConfirm: true,
      },
      function(){
        $.ajax({
          url:"<?php echo base_url('index.php/addattendees/delete'); ?>",
          data:{id:id},
          success: function(){
            $("tr[data-id='"+id+"']").fadeOut("fast",function(){
              $(this).remove();
            });
          }
        });
      });
    });

    

  });

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
