<script type="text/javascript">
    function setReminder(bookingID, depDateTime, checkbox){
        var boolean;
        if (checkbox.checked){
            boolean = "false";
        } else {
            boolean = "true";
        }
        window.location.replace("require/setReminder.php?bookingID=" + bookingID + "&depDateTime=" + depDateTime + "&boolean=" + boolean);
    }
</script>

<?php
if(isset($_GET['flightNo'])){
?>

<div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
            <h3 id="flight">Flight Information</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Flight No </th>
                        <th> DepDateTime </th>
                        <th> ArrDateTime </th>
                        <th> DepAirport </th>
                        <th> ArrAirport </th>
                        <th> FlyMinute </th>
                        <th> Aircraft </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    //where CustID = '{$_SESSION['account']}'
                    $sql = "Select * from flightschedule where FlightNo = '{$_GET['flightNo']}'" ;
                    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                    while($rc = mysqli_fetch_assoc($rs)){ 
                    ?>
                    <tr>
                        <td> <?php print $rc[ 'FlightNo']; ?> </td>
                        <td> <?php print $rc[ 'DepDateTime']; ?> </td>
                        <td> <?php print $rc[ 'ArrDateTime']; ?> </td>
                        <td> <?php print $rc[ 'DepAirport']; ?> </td>
                        <td> <?php print $rc[ 'ArrAirport']; ?> </td>
                        <td> <?php print $rc[ 'FlyMinute']; ?> </td>
                        <td> <?php print $rc[ 'Aircraft']; ?> </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /widget-content -->
    </div>
</div>
<?php } ?>

<div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>All your Flight booking</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> BookingID </th>
                        <th> FlightNo </th>
                        <th> Class </th>
                        <th> OrderDate </th>
                        <th> StaffID </th>
                        <th> AdultNum </th>
                        <th> ChildNum </th>
                        <th> InfantNum </th>
                        <th> AdultPrice </th>
                        <th> ChildPrice </th>
                        <th> InfantPrice </th>
                        <th> TotalAmount </th>
                        <th> Reminder </th>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <?php 
                    //where CustID = '{$_SESSION['account']}'
                      $sql = "Select * from flightbooking where CustID = '{$_SESSION['account']}' order by cast(BookingID as SIGNED INTEGER) asc" ;
                      $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                      while($rc = mysqli_fetch_assoc($rs)){ 
                    ?>
                    
                    <tr>
                        <td> <?php print $rc[ 'BookingID']; ?> </td>
                        <td> <a href='index.php?function=view-booking&flightNo=<?php print $rc[ 'FlightNo']; ?>#flight'><?php print $rc['FlightNo']; ?></a>   </td>
                        <td> <?php print $rc[ 'Class']; ?> </td>
                        <td> <?php print $rc[ 'OrderDate']; ?> </td>
                        <td> <?php print $rc[ 'StaffID']; ?> </td>
                        <td> <?php print $rc[ 'AdultNum']; ?> </td>
                        <td> <?php print $rc[ 'ChildNum']; ?> </td>
                        <td> <?php print $rc[ 'InfantNum']; ?> </td>
                        <td> <?php print $rc[ 'AdultPrice']; ?> </td>
                        <td> <?php print $rc[ 'ChildPrice']; ?> </td>
                        <td> <?php print $rc[ 'InfantPrice']; ?> </td>
                        <td> <?php print $rc[ 'TotalAmt']; ?> </td>
                        <?php
                        if (isset($_SESSION['reminder'][$rc['BookingID']])) {
                            $checked = "checked";
                        } else {
                            $checked = "";
                        }
                        ?>
                        <td><input type="checkbox" name="reminder" id="reminder" <?php echo $checked; ?> onclick="setReminder(<?php print $rc[ 'BookingID']; ?>, '<?php print $rc[ 'DepDateTime']; ?>', this);" /></td>
                    </tr>
                    <?php } ?>
                    </form>
                </tbody>
            </table>
        </div>
        <!-- /widget-content -->
    </div>
</div>








<?php
            
if(isset($_GET['hotelID'])){
?>

<div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
            <h3 id="hotel">Hotel Information</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Hotel ID </th>
                        <th> ChiName </th>
                        <th> EngName </th>
                        <th> Star </th>
                        <th> Rating </th>
                        <th> Country </th>
                        <th> City </th>
                        <th> District </th>
                        <th> Address </th>
                        <th> Tel </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    //where CustID = '{$_SESSION['account']}'
                      $sql = "Select * from hotel where HotelID = '{$_GET['hotelID']}'" ;
                      $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                      while($rc = mysqli_fetch_assoc($rs)){ 
                    ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <tr>
                        <td> <?php print $rc[ 'HotelID']; ?> </td>
                        <td> <?php print $rc[ 'ChiName']; ?> </td>
                        <td> <?php print $rc[ 'EngName']; ?> </td>
                        <td> <?php print $rc[ 'Star']; ?> </td>
                        <td> <?php print $rc[ 'Rating']; ?> </td>
                        <td> <?php print $rc[ 'Country']; ?> </td>
                        <td> <?php print $rc[ 'City']; ?> </td>
                        <td> <?php print $rc[ 'District']; ?> </td>
                        <td> <?php print $rc[ 'Address']; ?> </td>
                        <td> <?php print $rc[ 'Tel']; ?> </td>

                    </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /widget-content -->
    </div>
</div>
<?php } ?>

<div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>All your hotel booking</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> BookingID </th>
                        <th> OrderDate </th>
                        <th> StaffID </th>
                        <th> HotelName </th>
                        <th> RoomType </th>
                        <th> Price </th>
                        <th> RoomNum </th>
                        <th> TotalAmt </th>
                        <th> Checkin </th>
                        <th> Checkout </th>
                        <th> Remark </th>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <?php 
                    //where CustID = '{$_SESSION['account']}'
                      $sql = "Select * from hotelbooking where CustID = '{$_SESSION['account']}' order by cast(BookingID as SIGNED INTEGER) asc" ;
                      $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                      while($rc = mysqli_fetch_assoc($rs)){ 
                          $sql = "Select * from hotel where HotelID = '{$rc['HotelID']}'" ;
                          $rsh = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                          $rch = mysqli_fetch_assoc($rsh);
                    ?>
                    
                    <tr>
                        <td> <?php print $rc[ 'BookingID']; ?> </td>
                        <td> <?php print $rc[ 'OrderDate']; ?> </td>
                        <td> <?php print $rc[ 'StaffID']; ?> </td>
                        <td> <a href='index.php?function=view-booking&hotelID=<?php print $rc[ 'HotelID']; ?>#hotel'><?php print $rch['ChiName']; ?></a>   </td>
                        <td> <?php print $rc[ 'RoomType']; ?> </td>
                        <td> <?php print $rc[ 'Price']; ?> </td>
                        <td> <?php print $rc[ 'RoomNum']; ?> </td>
                        <td> <?php print $rc[ 'TotalAmt']; ?> </td>
                        <td> <?php print $rc[ 'Checkin']; ?> </td>
                        <td> <?php print $rc[ 'Checkout']; ?> </td>
                        <td> <?php print $rc[ 'Remark']; ?> </td>
                    </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /widget-content -->
    </div>
</div>