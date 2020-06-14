<?php
  if (isset($_POST['submit'])) {
      $data    = array();
      $roomNum = 0;
      $sql     = "Select * from hotelbooking where HotelID = {$_SESSION['account']}";
      $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      while ($rc = mysqli_fetch_assoc($rs)) {
          $checkin    = strtotime($rc['Checkin']);
          $checkout   = strtotime($rc['Checkout']);
          $s_checkin  = strtotime($_POST['checkin']);
          $s_checkout = strtotime($_POST['checkout']);
          if ($s_checkin <= $checkin and $s_checkout >= $checkout) {
              foreach ($data as $i => $k) {
                  if (strcmp($i, $rc['RoomType']) == 0) {
                      $data["{$rc['RoomType']}"]['Amt'] += $rc['TotalAmt'];
                      $data["{$rc['RoomType']}"]['RoomNum'] += $rc['RoomNum'];
                      continue 2;
                  }
              }
              $data["{$rc['RoomType']}"]['Amt']     = $rc['TotalAmt'];
              $data["{$rc['RoomType']}"]['RoomNum'] = $rc['RoomNum'];
          }
      }

      $type = array();
      $amt  = array();
      $num  = array();
      foreach ($data as $i => $k) {
          array_push($type, $i);
          array_push($amt, $k['Amt']);
          array_push($num, $k['RoomNum']);
      }
  }
?>
<div class="span6">
  <div class="widget">
    <div class="widget-header"> 
      <i class="icon-search">
      </i>
      <h3>Search Hotel Room Status
      </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <form id="edit-profile" class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="checkin">From:
            </label>
            <div class="controls">
              <input type="date" name="checkin" required>
            </div>
            <!-- /controls -->
          </div>
          <!-- /control-group -->
          <div class="control-group">
            <label class="control-label" for="checkout">To:
            </label>
            <div class="controls">
              <input type="date" name="checkout" required>
            </div>
            <!-- /controls -->
          </div>
          <!-- /control-group -->
          <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="submit">Search
            </button>
            <button class="btn">Cancel
            </button>
          </div>
          <!-- /form-actions -->
        </fieldset>
      </form>
    </div>
    <!-- /widget-content -->
  </div>
</div>

<div class="span6">
  <div class="widget widget-table action-table">
    <div class="widget-header"> 
      <i class="icon-th-list">
      </i>
      <h3>Table of result
      </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th> Room Type 
            </th>
            <th> Booked room number
            </th>
            <th> Revenue 
            </th>
          </tr>
        </thead>
        <tbody>
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php 
              if(isset($_POST['submit'])){
              	foreach($data as $i => $k){
            ?>
            <tr>
              <td>
                <?= $i; ?>
              </td>
              <td>
                <?= $k['RoomNum']; ?>
              </td>
              <td>
                <?= "$".$k['Amt']; ?>
              </td>
            </tr>
            <?php } } ?>
          </form>
          <?php
            if(isset($_POST['submit'])){
           		if(count($num)>0){
          ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;
            </button>
            <?= "There are ".count($type)." record(s) that match your selection criteria."; ?>
          </div>
          <?php }else{ ?>
          <div class="alert">
            <button type="button" class="close" data-dismiss="alert">&times;
            </button>
            <?= "No record matches!" ?>
          </div>
          <?php } } ?>
        </tbody>
      </table>
    </div>
    <!-- /widget-content -->
  </div>
</div>

<div class="span12">
  <div class="widget">
    <div class="widget-header">
      <i class="icon-bar-chart">
      </i>
      <h3>Bar Chart of revenue
      </h3>
    </div> 
    <!-- /widget-header -->
    <div class="widget-content">
      <canvas id="bar-chart" class="chart-holder" height="500" width="1000">
      </canvas>
    </div> 
    <!-- /widget-content -->
  </div> 
  <!-- /widget -->
</div> 
<!-- /span6 -->


<script src="js/chart.min.js" type="text/javascript">
</script>

<script>
  var barChartData = {
    labels: ['<?php print implode(" ',' ",$type); ?>'],
    datasets: [
      {
        fillColor: "rgba(151,187,205,0.5)",
        strokeColor: "rgba(151,187,205,1)",
        data: ['<?php print implode(" ',' ",$amt); ?>']
      }
    ]
  }
  var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
</script>
