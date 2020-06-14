<script type="text/javascript">
    var adultPrice = 0;
    var childrenPrice = 0;
    var infantPrice = 0;
    
    function loadTotal(adultPrice, childrenPrice, infantPrice, checkbox) {
        var total = document.getElementById('totalf');
        var adultNum = document.getElementById('adultNum').value;
        var childrenNum = document.getElementById('childrenNum').value;
        var infantNum = document.getElementById('infantNum').value;
        
        var totalh = document.getElementById('totalh');
        var totalamtf = document.getElementById('totalamtf');
        var totalamth = document.getElementById('totalamth');

        var currectTotal = total.value * 1;
        
        var totalPrice = adultNum * adultPrice + childrenNum * childrenPrice + infantNum * infantPrice;
    
        if (checkbox.checked) {
            this.adultPrice += adultPrice;
            this.childrenPrice += childrenPrice;
            this.infantPrice += infantPrice;
            total.value = currectTotal + totalPrice;
            
        } else if (total.value > 0){
            this.adultPrice -= adultPrice;
            this.childrenPrice -= childrenPrice;
            this.infantPrice -= infantPrice;
            total.value = currectTotal - totalPrice;
        }
        
        totalamtf.value = total.value*1 + totalh.value*1;
        totalamth.value = totalamtf.value;
    }
    
    function changeNum() {
        document.getElementById('totalf').value = adultPrice * document.getElementById('adultNum').value + 
                                                 childrenPrice * document.getElementById('childrenNum').value + 
                                                 infantPrice * document.getElementById('infantNum').value;
    }
</script>

<div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Flight Information</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content"> 
            <h6 class="bigstats">
                <form id="searchForm" action="index.php?function=search-flight" method="POST">
                    <div class="control-group">
                        Airline Name:
                        <input list="listAirlineName" name="airlineName" id="airlineName" style="margin:0 20px 0 10px;">
    
                        <datalist id="listAirlineName">
                        <?php 
                          $sql = "Select airlineName from airline" ;
                          $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                          while($rc = mysqli_fetch_assoc($rs)){ 
                        ?>
                          <option value="<?php print $rc['airlineName']; ?>">
    
                        <?php } ?>
                        </datalist> 
     
                        ARRIVAL AIRPORT:
                        <input list="listArrAirport" name="arrAirport" id="arrAirport" style="margin:0 20px 0 10px;">
    
                        <datalist id="listArrAirport">
                        <?php 
                          $sql = "Select arrAirport from flightschedule group by arrAirport" ;
                          $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                          while($rc = mysqli_fetch_assoc($rs)){ 
                        ?>
                          <option value="<?php print $rc['arrAirport']; ?>">
    
                        <?php } ?>
                        </datalist> 
                    </div>
                    <br />
                    <div class="control-group">
                        DEPARTURE DATE (OR TIME):
                        <input type="date" name="depDate" style="margin:0 20px 0 10px;">
                        ARRIVAL DATE (OR TIME):
                        <input type="date" name="arrDate" style="margin:0 20px 0 10px;">
                        
                        <button type="submit" name="submit" class="btn btn-small btn-success btn-icon-only icon-ok"></button>
                    </div>
                    
                    <div class="control-group">
                        <br />
                        Adult Number: <input type="number" name="adultNum" id="adultNum" min="1" value="1" style="margin:0 20px 0 10px;" onchange="changeNum();">
                        Children Number: <input type="number" name="childrenNum" id="childrenNum" min="0" value="0" style="margin:0 20px 0 10px;" onchange="changeNum();">
                        Infant Number: <input type="number" name="infantNum" id="infantNum" min="0" value="0" style="margin:0 20px 0 10px;" onchange="changeNum();">
                    </div>
                    <br />
                    <span style="float:right;">Total Amount of air ticket(s): <input type="number" name="totalf" id="totalf" value="0" readonly></span><br><br><br>
                    <span style="float:right;">Total Amount: <input type="number" name="totalamtf" id="totalamtf" value="0" readonly></span>
                    
                </form>
             </h6>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Flight No. </th>
                        <th> Departure Airport </th>
                        <th> Departure Time </th>
                        <th> Arrival Airport </th>
                        <th> Arrival Time </th>
                        <th> Class </th>
                        <th> Adult Price </th>
                        <th> Children Price </th>
                        <th> Infant Price </th>
                        <th> Tax </th>
                        <th> Book </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])){
                        $sql="Select * from flightclass, flightschedule, airline 
                                where flightclass.FlightNo = flightschedule.FlightNo 
                                and flightclass.AirlineCode = airline.AirlineCode 
                                and airline.airlineName LIKE '{$_POST['airlineName']}%' 
                                and flightschedule.ArrAirport LIKE '{$_POST['arrAirport']}%'
                                and flightschedule.DepDateTime LIKE '{$_POST['depDate']}%'
                                and flightschedule.ArrDateTime LIKE '{$_POST['arrDate']}%'";
                        } else {
							$sql="Select * from flightclass, flightschedule, airline 
                                where flightclass.FlightNo = flightschedule.FlightNo 
                                and flightclass.AirlineCode = airline.AirlineCode";
						}
                                
                        $rs=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($rc=mysqli_fetch_assoc($rs)){ ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <tr>
                                <td>
                                    <?php print $rc[ 'FlightNo']; ?>
                                    <input type="hidden" name="FlightNo" value="<?php print $rc[ 'FlightNo']; ?>"> </td>
                                <td> 
                                    <?php print $rc[ 'DepAirport']; ?> </td>
                                <td> 
                                    <?php print $rc[ 'DepDateTime']; ?>  </td>
                                <td> 
                                    <?php print $rc[ 'ArrAirport']; ?> </td>
                                <td>
                                    <?php print $rc[ 'ArrDateTime']; ?> </td>
                                <td>
                                    <?php print $rc[ 'Class']; ?> </td>
                                <td>
                                    <?php print $rc[ 'Price_Adult']; ?> </td>
                                <td>
                                    <?php print $rc[ 'Price_Children']; ?> </td>
                                <td>
                                    <?php print $rc[ 'Price_Infant']; ?> </td>
                                <td>
                                    <?php print $rc[ 'Tax']; ?> </td>
                                <td>
                                    <input type="checkbox" name="tick" id="tick" onclick="loadTotal(<?php print $rc[ 'Price_Adult']; ?>, <?php print $rc[ 'Price_Children']; ?>, <?php print $rc[ 'Price_Infant']; ?>, this);" /> </td>
                            </tr>
                        </form>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
        <!-- /widget-content -->
    </div>
</div>
