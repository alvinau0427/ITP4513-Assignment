<?php 

if(isset($_POST['checkin']) && isset($_POST['checkout'])) {
  
  $checkin = date('Y-m-d',strtotime($_POST['checkin']));
  $checkout = date('Y-m-d',strtotime($_POST['checkout']));
  
}
?>

<script type="text/javascript">
  var Price = 0;

    function loadTotalh(Price, checkbox) {
        var total = document.getElementById('totalh');
        var totalf = document.getElementById('totalf');
        var totalamth = document.getElementById('totalamth');
        var totalamtf = document.getElementById('totalamtf');
        var currectTotal = total.value * 1;

        if (checkbox.checked) {
            total.value = currectTotal + Price;
            
        } else if (total.value > 0){
            total.value = currectTotal - Price;
        }
        
        totalamth.value = total.value*1 + totalf.value*1;
        totalamtf.value = totalamth.value;
    }
    
</script>

<div class="span12">
  <div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-bookmark"></i>
        <h3>Hotel Information</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <h6 class="bigstats">
        <form action="" method="POST">
          <div class="control-group">
            Hotel Name:
            <input list="listHotelName" name="hotelName" style="margin:0 20px 0 10px;">
  
            <datalist id="listHotelName">
            <?php 
              $sql = "Select EngName from hotel group by EngName" ;
              $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
              while($rc = mysqli_fetch_assoc($rs)) {
            ?>
              <option value="<?php print $rc['EngName']; ?>">
                
            <?php 
              }
              $sql = "Select ChiName from hotel group by ChiName" ;
              $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
              while($rc = mysqli_fetch_assoc($rs)) {
            ?>   
              <option value="<?php print $rc['ChiName']; ?>">
            <?php } ?>

            </datalist> 
          </div>
          <br />
          
          <div class="control-group">
            Checkin Date:
            <input type="date" id="checkin" name="checkin" min="2000-01-02" style="margin:0 20px 0 10px;">
            
            Checkout Date:
            <input type="date" id="checkout "name="checkout" min="2000-01-02" style="margin:0 20px 0 10px;">
          
            <button type="submit" name="submit" class="btn btn-small btn-success btn-icon-only icon-ok"></button>
          </div>
          <br>
          <span style="float:right;">Total Amount of hotel(s): <input type="number" name="totalh" id="totalh" value="0" readonly></span><br /><br /><br />
          <span style="float:right;">Total Amount: <input type="number" name="totalamth" id="totalamth" value="0" readonly></span>
          
        </form>
      </h6>
      
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th> Hotel ID </th>
                  <th> Chinese Name </th>
                  <th> English Name </th>
                  <th> Address </th>
                  <th> Telephone </th>
                  <th> Room Type </th>
                  <th> Room Description </th>
                  <th> Price </th>
                  <th> Room Size </th>
                  <th> Book </th>
                  
                  <?php if(!empty($_POST['checkin']) && !empty($_POST['checkout'])) {?>
                    <th> Available Room </th>
                  <?php } ?>
                  
              </tr>
          </thead>
          <tbody>
            
              <?php 
              if (isset($_POST['submit'])){
              $sql="Select * from hotel as h, room as r 
                where r.HotelID = h.HotelID AND
                (h.EngName LIKE '{$_POST['hotelName']}%' OR h.ChiName LIKE '{$_POST['hotelName']}%')";
              } else {
                $sql="Select * from hotel as h, room as r 
                where r.HotelID = h.HotelID";
              }
              
              if(!empty($_POST['checkin']) && !empty($_POST['checkout'])) {
                $sql = "SELECT r.HotelID, r.ChiName, r.EngName, r.Address, r.Tel, r.RoomType, r.RoomDesc, r.Price, r.RoomSize ,
                (CASE WHEN hb.BookedRoom IS NULL THEN r.RoomNum ELSE r.RoomNum - hb.BookedRoom END) AS AvailableRoom
                        FROM (SELECT h.HotelID, h.ChiName, h.EngName, h.Address, h.Tel, r.RoomType, r.RoomDesc, r.Price, r.RoomSize, r.RoomNum
                              FROM room as r, hotel as h 
                              WHERE h.HotelID = r.HotelID) AS r
                        LEFT OUTER JOIN 
                        (SELECT HotelID, RoomType, SUM( RoomNum ) AS BookedRoom
                        	FROM hotelbooking
                        	WHERE Checkin < '{$checkout}'
                          AND Checkout > '{$checkin}'
                        	GROUP BY HotelID, RoomType) AS hb
                        ON r.HotelID = hb.HotelID AND r.RoomType = hb.RoomType
                        WHERE (r.EngName LIKE '{$_POST['hotelName']}%' OR r.ChiName LIKE '{$_POST['hotelName']}%');";
              }
              
              $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
              while($rc = mysqli_fetch_assoc($rs)){ 
              ?>
              
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
              <tr>
                  <td> 
                    <?php print $rc['HotelID']; ?> </td>
                  <td> 
                    <?php print $rc['ChiName']; ?> </td>
                  <td> 
                    <?php print $rc['EngName']; ?> <input type="hidden" name="RoomType" value="<?php print $rc[ 'RoomType']; ?>"></td>
                  <td> 
                    <?php print $rc['Address']; ?> </td>
                  <td> 
                    <?php print $rc['Tel']; ?> </td>
                  <td> 
                    <?php print $rc['RoomType']; ?></td>
                  <td> 
                    <?php print $rc['RoomDesc']; ?> </td>
                  <td> 
                    <?php print $rc['Price']; ?> </td>
                  <td> 
                    <?php print $rc['RoomSize']; ?> </td>
                  <td>
                  <input type="checkbox" name="hotel" id="tick" onclick="loadTotalh(<?php print $rc['Price']; ?>, this);" /> </td>
                    
                  <?php if(!empty($_POST['checkin']) && !empty($_POST['checkout'])) { ?>
                    <td> <?php print $rc['AvailableRoom']; ?> </td>
                  <?php } ?>
                  
              </tr>
              </form>
              <?php } ?>
          </tbody>
      </table>
    </div>
    <!-- /widget-content -->
  </div>
</div>