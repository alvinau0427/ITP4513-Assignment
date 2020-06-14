<?php
if (isset($_POST['submit'])) {
    $num = 0;
    if (strlen($_POST['MobileNo']) > 0 and strlen($_POST['Surname']) > 0) {
        extract($_POST);
        $sql = " select * from customer where MobileNo = '$MobileNo' and Surname = '$Surname'";
        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $num = mysqli_num_rows($rs);
        if (mysqli_num_rows($rs) == 1) {
            $rc = mysqli_fetch_assoc($rs);
            extract($rc);
        }
    } else if (strlen($_POST['Surname']) > 0) {
        extract($_POST);
        $sql = " select * from customer where Surname = '$Surname' ";
        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $num = mysqli_num_rows($rs);
        
    } else if (strlen($_POST['MobileNo']) > 0) {
        extract($_POST);
        $sql = " select * from customer where MobileNo = '$MobileNo' ";
        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $num = mysqli_num_rows($rs);
        if (mysqli_num_rows($rs) == 1) {
            $rc = mysqli_fetch_assoc($rs);
            extract($rc);
        }
        
    }
}

?>
<div class="span6">
  <div class="widget">
    <div class="widget-header"> 
      <i class="icon-search">
      </i>
      <h3>Search Customer's Hotel Booking
      </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <form id="edit-profile" class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="Surname">Surname
            </label>
            <div class="controls">
              <input list="type" id="Surname" name="Surname">
              <datalist id="type">
                <?php 
                  $sql = "Select DISTINCT(Surname) from customer" ;
                  $rsc = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                  while($rcs = mysqli_fetch_assoc($rsc)){ 
                ?>
                <option value="<?php print $rcs['Surname']; ?>">
                  <?php } ?>
              </datalist>
            </div>
            <!-- /controls -->
          </div>
          <!-- /control-group -->
          <div class="control-group">
            <label class="control-label" for="MobileNo">Mobile No.
            </label>
            <div class="controls">
              <input type="tel" id="MobileNo" name="MobileNo" pattern="[0-9]{8}" title="Please enter a valid telephone number. e.g. 23456789">
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
      <?php
      	if(isset($_POST['submit'])){
      ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;
        </button>
        <?= "There are ".$num." customer(s) that match your selection criteria."; ?>
      </div>
      <?php } ?>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th> Customer ID 
            </th>
            <th> Surname 
            </th>
            <th> Mobile No. 
            </th>
            <th> BookingID 
            </th>
            <th> Check-IN
            </th>
            <th> Check-OUT 
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
									if(isset($_POST['Surname'])){
          if(strlen($_POST['Surname']) > 0 and strlen($_POST['MobileNo']) == 0){
            while($rc = mysqli_fetch_assoc($rs)){ 
              extract($rc);
              $sql = " select * from hotelbooking where CustID = '$CustID' " ;
              $rsh = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              while($rch = mysqli_fetch_assoc($rsh)){
          ?>
          <tr>
            <td>
              <?php print $CustID; ?> 
            </td>
            <td>
              <?php print $Surname; ?> 
            </td>
            <td>
              <?php print $MobileNo; ?> 
            </td>
            <td>
              <?php print $rch[ 'BookingID']; ?> 
            </td>
            <td>
              <?php print $rch[ 'Checkin']; ?> 
            </td>
            <td>
              <?php print $rch[ 'Checkout']; ?> 
            </td>
          </tr>
          <?php } } } else { ?>
          <?php
            $sql = " select * from hotelbooking where CustID = '$CustID' " ;
            $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            while($rc = mysqli_fetch_assoc($rs)){
          ?>
          <tr>
            <td>
              <?php print $CustID; ?> 
            </td>
            <td>
              <?php print $Surname; ?> 
            </td>
            <td>
              <?php print $MobileNo; ?> 
            </td>
            <td>
              <?php print $rc[ 'BookingID']; ?> 
            </td>
            <td>
              <?php print $rc[ 'Checkin']; ?> 
            </td>
            <td>
              <?php print $rc[ 'Checkout']; ?> 
            </td>
          </tr>
          <?php } } } ?>
        </tbody>
      </table>
    </div>
    <!-- /widget-content -->
  </div>
  <!-- /widget -->
</div>
<!-- /span6 -->
