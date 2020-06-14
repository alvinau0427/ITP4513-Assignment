<div class="span6">
    <?php
    if (isset($_GET['flightNo'])){
    ?>
        <div class="widget widget-table action-table" ><a name="table"></a>
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Flight Class Detail</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th> Flight No </th>
                            <th> Class </th>
                            <th> Adult Price </th>
                            <th> Children Price </th>
                            <th> Infant Price </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //where CustID = '{$_SESSION['account']}'
                        $sql = "Select * from flightclass where FlightNo = '{$_GET['flightNo']}'" ;
                        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                        while($rc = mysqli_fetch_assoc($rs)){ 
                        ?>
                        <tr>
                            <td> <?php print $rc[ 'FlightNo']; ?> </td>
                            <td> <?php print $rc[ 'Class']; ?> </td>
                            <td> <?php print $rc[ 'Price_Adult']; ?> </td>
                            <td> <?php print $rc[ 'Price_Children']; ?> </td>
                            <td> <?php print $rc[ 'Price_Infant']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /widget-content -->
        </div>
    <?php 
    }
    
    $sql = "Select * from customer where customer.CustID = '{$_SESSION['account']}'" ;
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $rc = mysqli_fetch_assoc($rs);
    ?>
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
            <h3> Free ticket <font size="1"> - Currect Bonus Points : <?php echo $rc['BonusPoint'] ?>  [5 points = $1 price]</font></h3>
        </div>
        <!-- /widget-header -->
        <?php 
        //where CustID = '{$_SESSION['account']}'
        if (!isset($_GET['more'])){
            $sql = "Select * from flightschedule, flightclass, customer where flightschedule.FlightNo = flightclass.FlightNo and customer.CustID = '{$_SESSION['account']}' and customer.BonusPoint/5 > flightclass.Price_Adult limit 10" ;
        } else {
            $sql = "Select * from flightschedule, flightclass, customer where flightschedule.FlightNo = flightclass.FlightNo and customer.CustID = '{$_SESSION['account']}' and customer.BonusPoint/5 > flightclass.Price_Adult" ;
        }
        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
        if (mysqli_num_rows($rs) != 0) {
        ?>
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th> Flight No </th>
                            <th> DepAirport </th>
                            <th> ArrAirport </th>
                            <th> Date </th>
                            <th> View-Detail </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while($rc = mysqli_fetch_assoc($rs)){ 
                        ?>
                        <tr>
                            <td> <?php print $rc[ 'FlightNo']; ?> </td>
                            <td> <?php print $rc[ 'DepAirport']; ?> </td>
                            <td> <?php print $rc[ 'ArrAirport']; ?> </td>
                            <td> <?php print $rc[ 'DepDateTime']; ?> </td>
                            <td class="td-actions"><a href="index.php?flightNo=<?php print $rc[ 'FlightNo']; ?>#table" class="btn btn-small btn-success"><i class="btn-icon-only icon-info-sign"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
            if (!isset($_GET['more'])){
            ?>
                <div style="margin: 0 40%;"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?more=true">< more ></div>
        <?php
            }
        } else {
        ?>
            
            <div class="widget-content">
                <h6 class="bigstats">You do not have any free ticket available.</h6>
            </div>
        <?php
            }
        ?>
        <!-- /widget-content -->
    </div>
</div>

<div class="span6">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Reminder - Flight Ticket</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Flight No </th>
                        <th> Class </th>
                        <th> DepDateTime </th>
                        <th> ArrAirport </th>
                        <th> Aircraft </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					if(isset($_SESSION['reminder']) && count($_SESSION['reminder']) != 0) {
                        $string = "and (";
                        foreach($_SESSION['reminder'] as $bookingID){
                            $string .= "flightbooking.BookingID = $bookingID or ";
                        }
                        $string = substr($string, 0, count($string) - 5).")";
                        //where CustID = '{$_SESSION['account']}'
                        $sql = "Select * from flightbooking, flightschedule 
                                where flightbooking.FlightNo = flightschedule.FlightNo 
                                and flightbooking.DepDateTime = flightschedule.DepDateTime 
                                and flightbooking.CustID = '{$_SESSION['account']}' $string";
                        

                        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                        while($rc = mysqli_fetch_assoc($rs)){
                            $date = date('d', (strtotime("{$rc['DepDateTime']}") - strtotime("now") - 1));
                            if ($date <= 7 && $date >= 0) {

                            ?>
                                <tr>
                                    <td> <?php print $rc[ 'FlightNo']; ?> </td>
                                    <td> <?php print $rc[ 'Class']; ?> </td>
                                    <td> <?php print $rc[ 'DepDateTime']; ?> </td>
                                    <td> <?php print $rc[ 'ArrAirport']; ?> </td>
                                    <td> <?php print $rc[ 'Aircraft']; ?> </td>
                                </tr>
                            <?php 
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /widget-content -->
    </div>
    <!-- /widget -->

</div>