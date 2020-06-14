

<?php


if(isset($_POST[ 'add-flightclass'])){ 
    extract($_POST); 
    $sql="insert into flightclass values ('$FlightNo',
                                            '$Class',
                                            '$AirlineCode',
                                            $Price_Adult,
                                            $Price_Children,
                                            $Price_Infant,
                                            $Tax)" ; 
    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    if(mysqli_affected_rows($conn)==1 )
        $msg="add flightschedule success!" ; 
    else 
        $msg="add flightschedule Fail!" ; 
    
}

if(isset($_POST[ 'add-flightschedule'])){
    
    extract($_POST); 
    
    $sql="INSERT INTO flightschedule VALUES ( '$FlightNo',  '$DepDateTime',  '$ArrDateTime',  '$DepAirport',  '$ArrAirport', $FlyMinute, '$Aircraft' )";

    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    if(mysqli_affected_rows($conn)==1) 
        $msg="add flightschedule success!" ; 
    else 
        $msg="add flightschedule Fail!" ; 
        
}



$scheduleStatus="" ;
$classStatus="active" ;

if(isset($_POST[ 'view-flightschedule'])){
    $scheduleStatus="active" ;
    $classStatus="" ;
}
?>

<?php
if(isset($_POST[ 'del-flightschedule'])){ 
    ?>
    <div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-list"></i>
            <h3>Affected passengers</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Customer ID </th>
                        <th> Surname </th>
                        <th> GivenName</th>
                        <th> Gender </th>
                        <th> Passport</th>
                        <th> Mobile No. </th>
                        <th> Nationality </th>

                    </tr>
                </thead>
                <tbody>
    <?php
    
    
    
    
    $sql="select * from flightbooking where flightNo = '{$_POST['FlightNo']}' and DepDateTime='{$_POST['DepDateTime']}'"; 
    $rs=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $sql="delete from flightbooking where flightNo = '{$_POST['FlightNo']}' and DepDateTime='{$_POST['DepDateTime']}'"; 
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $sql="DELETE FROM flightschedule WHERE FlightNo = '{$_POST['FlightNo']}' and DepDateTime='{$_POST['DepDateTime']}'" ; 
    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    
    while($rc = mysqli_fetch_assoc($rs)){
        $sql="select * from customer where CustID = '{$rc['CustID']}'"; 
        $rss=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if(mysqli_affected_rows($conn)==1){
            $rcc = mysqli_fetch_assoc($rss);
            extract($rcc);
?>

                    <tr>
                        <td>
                            <?php print $CustID; ?> </td>
                        <td>
                            <?php print $Surname; ?> </td>
                        <td>
                            <?php print $GivenName; ?> </td>
                        <td>
                            <?php print $Gender; ?> </td>
                        <td>
                            <?php print $Passport; ?> </td>
                        <td>
                            <?php print $MobileNo; ?> </td>
                        <td>
                            <?php print $Nationality; ?> </td>


                    </tr>

                    <?php } } ?>

                </tbody>
            </table>
        </div>
        <!-- /widget-content -->
    </div>
    <!-- /widget -->
</div>
<!-- /span6 -->
<?php } ?>


<div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Flight Inforamtion</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <?php if(isset($msg)){ ?>
                    <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?= "$msg"; ?>
                  
            </div>
            <?php } ?>
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="<?php print $classStatus; ?>">
                        <a href="#flightclass" data-toggle="tab">Add Flight Class</a>
                    </li>
                    <?php
                        if(isset($_POST[ 'view-flightschedule'])){
                    ?>
                    <li class="active">
                        <a href="#flightschedule" data-toggle="tab">Add / Del Flight Schedule</a>
                    </li>
                    <?php } ?>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane <?php print $classStatus; ?>" id="flightclass">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th> Flight No. </th>
                                    <th> Class </th>
                                    <th> Airline Code </th>
                                    <th> Adult Price </th>
                                    <th> Children Price </th>
                                    <th> Infant Price </th>
                                    <th> Tax </th>
                                    <th class="td-actions"> Add</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    <tr>
                                        <td>
                                            <input type="text" style="width: 50px;" name="FlightNo" pattern="^[A-Z][A-Z][0-9]{3}" title="Please enter a valid flight number. e.g. CX360"  placeholder="Number" value="" required>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="Class" placeholder="Class" value="" required>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="AirlineCode" value="<?php print strtoupper($_SESSION['account']); ?>" readonly required>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="Price_Adult" placeholder="1000" value="" required>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="Price_Children" placeholder="1001" value="" required>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="Price_Infant" placeholder="1002" value="" required>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="Tax" placeholder="0" value="" required>
                                        </td>

                                        <td class="td-actions">
                                            <button type="submit" name="add-flightclass" class="btn btn-small btn-success btn-icon-only icon-wrench"></button>
                                        </td>
                                    </tr>
                                </form>
                                <tr>
                                    <th> Flight No. </th>
                                    <th> Class </th>
                                    <th> Airline Code </th>
                                    <th> Adult Price </th>
                                    <th> Children Price </th>
                                    <th> Infant Price </th>
                                    <th> Tax </th>
                                    <th class="td-actions"> Select</th>
                                </tr>

                                <?php 
                                    $sql="Select * from flightclass where AirlineCode = '{$_SESSION['account']}'" ; 
                                    $rs=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                    while($rc=mysqli_fetch_assoc($rs)){ 
                                ?>
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    <tr>
                                        <td>
                                            <?php print $rc[ 'FlightNo']; ?>
                                            <input type="hidden" name="FlightNo" value="<?php print $rc[ 'FlightNo']; ?>"> </td>
                                        <td>
                                            <?php print $rc[ 'Class']; ?> </td>
                                        <td>
                                            <?php print $rc[ 'AirlineCode']; ?> </td>
                                        <td>
                                            $<?php print $rc[ 'Price_Adult']; ?> </td>
                                        <td>
                                            $<?php print $rc[ 'Price_Children']; ?> </td>
                                        <td>
                                            $<?php print $rc[ 'Price_Infant']; ?> </td>
                                        <td>
                                            $<?php print $rc[ 'Tax']; ?> </td>

                                        <td class="td-actions">
                                            <button type="submit" name="view-flightschedule" class="btn btn-small btn-success btn-icon-only icon-wrench"></button>
                                        </td>
                                    </tr>
                                </form>
                                <?php } ?>


                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane <?php print $scheduleStatus; ?>" id="flightschedule">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th> Flight No. </th>
                                    <th> Dep Date Time </th>
                                    <th> Arr Date Time </th>
                                    <th> Dep Airport </th>
                                    <th> Arr Airport </th>
                                    <th> FlyMinute </th>
                                    <th> Aircraft </th>
                                    <th class="td-actions"> Add </th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    <tr>
                                        <td>
                                            <input type="text" style="width: 50px;" name="FlightNo" value="<?php print $_POST['FlightNo']; ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 150px;" name="DepDateTime" required onchange="flymin()" id="dt">
                                        </td>
                                        <td>
                                            <input type="text" style="width: 150px;" name="ArrDateTime" required onchange="flymin()" id="at">
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="DepAirport" required>
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="ArrAirport" required>
                                        </td>
                                        <td >
                                            <input type='text' style="width: 50px;" name='FlyMinute' value='' readonly id="fm">
                                        </td>
                                        <td>
                                            <input type="text" style="width: 50px;" name="Aircraft" required>
                                        </td>

                                        <td class="td-actions">
                                            <button type="submit" name="add-flightschedule" class="btn btn-small btn-success btn-icon-only icon-wrench"></button>
                                        </td>
                                    </tr>
                                </form>
                                <tr>
                                    <th> Flight No. </th>
                                    <th> Dep Date Time </th>
                                    <th> Arr Date Time </th>
                                    <th> Dep Airport </th>
                                    <th> Arr Airport </th>
                                    <th> FlyMinute </th>
                                    <th> Aircraft </th>
                                    <th class="td-actions">Del</th>
                                </tr>

                                <?php 
                                    if(isset($_POST[ 'view-flightschedule'])){ 
                                        $sql="Select * from flightschedule where FlightNo = '{$_POST['FlightNo']}'" ; 
                                        $rs=mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                                        while($rc=mysqli_fetch_assoc($rs)){ 
                                ?>
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    <tr>
                                        <td>
                                            <?php print $rc[ 'FlightNo']; ?>
                                            <input type="hidden" name="FlightNo" value="<?php print $rc[ 'FlightNo']; ?>"> </td>
                                        <td>
                                            <?php print $rc[ 'DepDateTime']; ?> 
                                            <input type="hidden" name="DepDateTime" value="<?php print $rc[ 'DepDateTime']; ?>"></td>
                                        <td>
                                            <?php print $rc[ 'ArrDateTime']; ?> </td>
                                        <td>
                                            <?php print $rc[ 'DepAirport']; ?> </td>
                                        <td>
                                            <?php print $rc[ 'ArrAirport']; ?> </td>
                                        <td>
                                            <?php print $rc[ 'FlyMinute']; ?> </td>
                                        <td>
                                            <?php print $rc[ 'Aircraft']; ?> </td>

                                        <td class="td-actions" id="xx">
                                            <button type="submit" name="del-flightschedule" class="btn btn-small btn-success btn-icon-only icon-trash"></button>
                                        </td>
                                    </tr>
                                </form>
                                <?php 
                                        } 
                                    } 
                                ?>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            
        </div>
        <!-- /widget-content -->
    </div>
</div>

<script>
    function flymin() {
        var diff = Math.abs(new Date(document.getElementById("at").value) - new Date(document.getElementById("dt").value));
        var minutes = Math.floor(diff/60000);

        document.getElementById("fm").value = minutes ;
    }
</script>