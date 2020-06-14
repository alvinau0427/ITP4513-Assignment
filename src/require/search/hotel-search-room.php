<?php
if (isset($_POST['submit'])) {
    $roomNum = 0;
    $sql     = "Select * from hotelbooking where HotelID = {$_SESSION['account']} and RoomType = '{$_POST['type']}'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while ($rc = mysqli_fetch_assoc($rs)) {
        $checkin    = strtotime($rc['Checkin']);
        $checkout   = strtotime($rc['Checkout']);
        $s_checkin  = strtotime($_POST['checkin']);
        $s_checkout = strtotime("{$_POST['checkin']}+{$_POST['day']} days");
        if ($s_checkin <= $checkin and $s_checkout >= $checkin and $s_checkout <= $checkout) {
            $roomNum += $rc['RoomNum'];
        } else if ($s_checkin >= $checkin and $s_checkout <= $checkout) {
            $roomNum += $rc['RoomNum'];
        } else if ($s_checkin >= $checkin and $s_checkin <= $checkout and $s_checkout >= $checkout) {
            $roomNum += $rc['RoomNum'];
        } else if ($s_checkin <= $checkin and $s_checkout >= $checkout) {
            $roomNum += $rc['RoomNum'];
        }
        
    }
    $sql = "Select * from room where HotelID = {$_SESSION['account']} and RoomType = '{$_POST['type']}'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($rs) == 1) {
        $rc = mysqli_fetch_assoc($rs);
        $roomTotalNum = $rc['RoomNum'];
    }
    
    $show_checkout = date('Y-m-d', strtotime("{$_POST['checkin']}+{$_POST['day']} days"));
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
            <label class="control-label" for="checkin">Check-in date:
            </label>
            <div class="controls">
              <input type="date" name="checkin" required>
            </div>
            <!-- /controls -->
          </div>
          <!-- /control-group -->
          <div class="control-group">
            <label class="control-label" for="day">No. of nights to stay:
            </label>
            <div class="controls">
              <input type="text"  name="day" pattern="[0-9]{1,9}" tilte="Please enter the required format. e.g. 1" required>
            </div>
            <!-- /controls -->
          </div>
          <!-- /control-group -->
          <div class="control-group">
            <label class="control-label" for="type">Room type:
            </label>
            <div class="controls">
              <input list="type" name="type" required>
              <datalist id="type">
                <?php 
                  $sql = "Select * from room where HotelID = {$_SESSION['account']}" ;
                  $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                  while($rc = mysqli_fetch_assoc($rs)){ 
                ?>
                <option value="<?php print $rc['RoomType']; ?>">
                  <?php } ?>
              </datalist>
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
      <i class="icon-list">
      </i>
      <h3>Result of Searching
      </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th> Room type
            </th>
            <th> Check-in date 
            </th>
            <th> Check-out date 
            </th>
            <th> No. of nights
            </th>
            <th> No. of Available
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          	if(isset($_POST['submit'])){
          ?>
          <tr>
            <td>
              <?php print $_POST['type']; ?> 
            </td>
            <td>
              <?php print $_POST['checkin']; ?> 
            </td>
            <td>
              <?php print $show_checkout; ?> 
            </td>
            <td>
              <?php print $_POST['day']; ?> 
            </td>
            <td>
              <?php print $roomTotalNum-$roomNum; ?> 
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /widget-content -->
  </div>
  <!-- /widget -->
</div>
<!-- /span6 -->
