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