 <form class="form-horizontal form-label-left" action="<?php echo base_url();?>index.php/addevent/addevent" method="post" novalidate>

 <!-- <div class="form-horizontal form-label-left"> -->

                      <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                    </p> -->
                    <!-- <span class="section">Personal Info</span> -->

                    <?php 
                    
                    $title = array("EPT 1 - RESPOND"," EPT 2 - OHW","OH - SMART","OHLN");
                    $year[0] = array("EPT 1 - RESPOND : Y1"," EPT 1 - RESPOND : Y2");
                    $year[1] = array("EPT 2 - OHW : Y1 - Y5"," EPT 2 - OHW : Y6 - Y10");
                    $year[2] = array("OH - SMART : Y1 - Y5","OH - SMART : Y6 - Y10");
                    $year[3] = array("OHLN : Y1","OHLN : Y2");
                    $activity[0][0] = array("fucking1");
                    $activity[0][1] = array("sucking1");
                    $activity[1][0] = array("fucking2");
                    $activity[1][1] = array("sucking2");
                    $activity[2][0] = array("fucking3");
                    $activity[2][1] = array("sucking3");
                    $activity[3][0] = array("fucking4");
                    $activity[3][1] = array("sucking4");
                    $session[0][0][0] = array("taik1");
                    $session[0][0][1] = array("taik2");
                    $session[0][1][0] = array("taik3");
                    $session[0][1][1] = array("taik4");
                    $session[1][0][0] = array("taik5");
                    $session[1][0][1] = array("taik6");
                    $session[1][1][0] = array("taik7");
                    $session[1][1][1] = array("taik8");
                    $session[2][0][0] = array("taik9");
                    $session[2][0][1] = array("taik10");
                    $session[2][1][0] = array("taik11");
                    $session[2][1][1] = array("taik12");
                    $session[3][0][0] = array("taik13");
                    $session[3][0][1] = array("taik14");
                    $session[3][1][0] = array("taik15");
                    $session[3][1][1] = array("taik16");

                    
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
                          <option>EPT 1 - RESPOND : Y1</option>
                          
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Activity <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" >
                        <select id="activity" class="form-control" name="activity" onchange="gantiactivity()">
                          <option>EPT 1 - RESPOND : Y1</option>
                         
                        </select>
                      </div>
                    </div>

                    <!-- <span class="section">Add Session</span> -->

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Session Title <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       
                        <select id="session" class="form-control" name="session_title">
                          <option>EPT 1 - RESPOND : Y1</option>
                          <option>EPT 2 - OHW : Y1 - Y5</option>
                          <option>OH - SMART : Y1 - Y5</option>
                          <option>OHLN : Y1</option>
                        </select>
                      
                      </div>
                    </div>

                    <span class="section">Add New Attendance</span>

 					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Search by name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="search_name" name="session_type" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                          <input formaction="<?php echo base_url()."search/byname"?>" id="search_name" type="submit" value="Search">
                        </div>
                      </div>
                    <!-- </form> -->

                    <!-- <form action="<?php echo base_url()."search/byid"?>" method="post" >  -->
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Search by id
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="search_id" name="session_type"  class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                          <input formaction="<?php echo base_url()."search/byid"?>" id="search_id" type="submit" value="Search">
                        </div>
                      </div>

                      <input  id="search_id" type="submit" value="Search">

</form>
