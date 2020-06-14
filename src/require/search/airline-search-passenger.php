<script type="text/javascript">
    function setBonusPoint(data){
        window.location.replace("require/setBonusPoint.php?bookingID=" + data);
    }
</script>

<div class="span5">
    <div class="widget">
        <div class="widget-header"> <i class="icon-search"></i>
            <h3>Search Customer's Flight Booking</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <form id="edit-profile" class="form-horizontal" method="post" action="">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="Surname">Surname</label>
                        <div class="controls">
                            
                            <input list="type" id="Surname" name="Surname" pattern="[A-Za-z]{1,15}" title="Please enter a vaild surname e.g. Chan" placeholder="Last Name">
                            
                            <datalist id="type">
                            <?php 
                            //where CustID = '{$_SESSION['account']}'
                              $sql = "Select distinct(Surname) from customer" ;
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
                        <label class="control-label" for="MobileNo">Mobile No.</label>
                        <div class="controls">
                            <input type="tel" id="MobileNo" name="MobileNo" pattern="[0-9]{8}" title="Please enter a valid telephone number. e.g. 23456789" placeholder="Mobile Number">
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit">Search</button>
                        <button class="btn">Cancel</button>
                    </div>
                    <!-- /form-actions -->
                </fieldset>
            </form>
        </div>
        <!-- /widget-content -->
    </div>
</div>

<div class="span7">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-list"></i>
            <h3>Result of Searching</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Customer ID </th>
                        <th> Name </th>
                        <th> Mobile No. </th>
                        <th> Booking ID </th>
                        <th> Flight No </th>
                        <th> Total Amount </th>
                        <th> Bonus Point </th>
                        <th> Assignment </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					if(isset($_POST['submit'])){
                    $sql = " select * from flightbooking, customer 
                            where flightbooking.CustID = customer.CustID
							and flightbooking.FlightNo LIKE '{$_SESSION['account']}%'							
                            and customer.Surname LIKE '{$_POST['Surname']}%' 
                            and customer.MobileNo LIKE '{$_POST['MobileNo']}%'" ;
					} else {
						$sql = " select * from flightbooking, customer 
                            where flightbooking.CustID = customer.CustID
							and flightbooking.FlightNo LIKE '{$_SESSION['account']}%'" ;
					}
                    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    while($rc = mysqli_fetch_assoc($rs)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $rc['CustID']; ?> </td>
                        <td>
                            <?php echo "{$rc['Surname']} {$rc['GivenName']}"; ?> </td>
                        <td>
                            <?php echo $rc['MobileNo']; ?> </td>
                        <td>
                            <?php echo $rc['BookingID']; ?> </td>
                        <td>
                            <?php echo $rc['FlightNo']; ?> </td>
                        <td>
                            <?php echo $rc['TotalAmt']; ?> </td>
                        <td>
                            <?php echo $rc['TotalAmt']; ?> </td>
                        <td class="td-actions">
                            <?php
                            if (isset($_SESSION["assign"][$rc['BookingID']])){
                              echo "assigned";
                            } else { ?>
                              <button type="submit" name="assign" class="btn btn-small btn-success btn-icon-only icon-ok" onclick="setBonusPoint(<?php echo $rc['BookingID'] ?>);"></button>
                            <?php
                            }
                            ?> </td>
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