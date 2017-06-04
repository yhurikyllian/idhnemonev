  <?php  

  $table = $this->m_db->getTabel("auser", "*"); 
  $totaluser = count($table);
  $male = count($this->m_db->getGender("auser", "*","Male"));
  $female = count($this->m_db->getGender("auser", "*","Female"));

  ?>

  <div class="row tile_count">
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
      <div class="count"><?php echo $totaluser ?> Orang</div>
      <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
    </div>
   <!--  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
      <div class="count">123.50</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
    </div> -->
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
      <div class="count"><?php echo $male ?> Orang </div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
      <div class="count"><?php echo $female ?> Orang </div>
      <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
    </div>
    <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
      <div class="count">2,315</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div> -->
    <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
      <div class="count">7,325</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div> -->
  </div>