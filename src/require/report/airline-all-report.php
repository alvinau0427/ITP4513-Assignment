<?php
// d. can create an analysis report by providing different options for the user to choose : 
// * Grouping option : group the data by flight no. or by flight class 
// * Period filter : select flights which departs within a date period 
// * Output option : output the total number of passengers or the total revenue 
// * Format option : output in the form of text or graphical chart 
?>
<div class="span3">
  <div class="widget widget-table action-table">
    <div class="widget-header"> 
      <i class="icon-th-list">
      </i>
      <h3>Searching options
      </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"> 
      <h6 class="bigstats">
        <form id="searchForm" action="" method="POST">
          Grouping option:
          <div class="control-group">
            <select name="groupBy">
              <option value="FlightNo">Flight Number
              </option>
              <option value="Class">Flight Class
              </option>
            </select>
          </div>
          <br />
          Period filter:
          <div class="control-group">
            Form:
            <br>
            <input type="date" name="from">
            <br>
            To:
            <br>
            <input type="date" name="to">
          </div>
          <br>
          Output option:
          <div class="control-group">
            <select name="output">
              <option value="revenue">Revenue
              </option>
              <option value="passengers">Passengers
              </option>
            </select>
          </div>
          Format option:
          <div class="control-group">
            <select name="format">
              <option value="graphical">Graphical Chart
              </option>
              <option value="text">Text
              </option>
            </select>
          </div>
          <button type="submit" name="Create" class="btn btn-primary">Create
          </button>
          <button class="btn">Cancel
          </button>
        </form>
      </h6>
      <?php if(isset($msg)) print "<p color='red'>$msg</p>"; ?>
    </div>
    <!-- /widget-content -->
  </div>
</div>

<div class="span9">
  <div class="widget widget-table action-table">
    <div class="widget-header"> 
      <i class="icon-th-list">
      </i>
      <h3>Report
      </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        
        
        
        
        
      <?php 
        if(isset($_POST['Create'])){
            $type = array();
            $amt  = array();
            extract($_POST);
            if(strlen($from) > 0)
                $statement = "flightschedule.ArrDateTime >= '$from'";
            else
                $statement = "'1' = '1'";
                
            if(strlen($to) > 0)
                $statement1 = "flightschedule.ArrDateTime <= '$to'";
            else
                $statement1 = "'1' = '1'";
            
            $sql = "select *, count(BookingID) as count, sum(TotalAmt) as sum from flightbooking, flightschedule 
                    where flightbooking.FlightNo = flightschedule.FlightNo 
                    and flightbooking.DepDateTime = flightschedule.DepDateTime
                    and $statement
                    and $statement1
                    group by flightbooking.$groupBy";
            $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            while($rc = mysqli_fetch_assoc($rs)){
                if($groupBy == "Class")
                    $type[] = $rc['Class'];
                else
                    $type[] = $rc['FlightNo'];
                    
                if($output == "passengers")
                    $amt[] = $rc['count'];
                else
                    $amt[] = $rc['sum'];  
            }
            if(strcmp("text",($_POST['format'])) == 0){
        ?>
        <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th> 
              <?php echo $_POST['groupBy'] ?> 
            </th>
            <th> 
              <?php echo $_POST['output'] ?> 
            </th>
          </tr>
        </thead>
        <tbody>
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
              <?php
                for($i = 0; $i < count($type); $i++) {
                ?>
            <tr>
              <td> 
                <?php print $type[$i]; ?> 
              </td>
              <td> 
                <?php print $amt[$i]; ?> 
              </td>
            </tr>
            <?php }  ?>
          </form>
        </tbody>
      </table>
      <?php } else { ?> 
      <canvas id="bar-chart" class="chart-holder" height="470" width="850">
      </canvas>
      <?php } } ?>

      
      
      
      
      
    </div>
    <!-- /widget-content -->
  </div>
</div>

<script src="js/chart.min.js" type="text/javascript">
</script>
<script>
  var barChartData = {
    labels: ['<?php print implode(" ',' ",$type); ?>'],
    datasets: [
      {
        fillColor: "rgba(151,187,205,0.5)",
        strokeColor: "rgba(151,187,205,1)",
        data: [<?php print implode(" , ",$amt); ?>]
      }
    ]
  }
  var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
</script>
