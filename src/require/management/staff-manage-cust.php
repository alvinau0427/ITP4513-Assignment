<?php 

    if(isset($_POST['updateCustomer'])){
        extract($_POST);
        $sql = "update customer set Surname='$Surname', 
                                    GivenName='$GivenName',
                                    Passport='$Passport'
                                    
                                    where CustID = '$CustID'" ;
                                    
      mysqli_query($conn, $sql) or die(mysqli_error($conn));
      
      if (!empty($airCustID) && !empty($airBooking)){
          $sql = "update flightbooking set CustID = '$airCustID'
                                    
                                    where FlightNo = '$airBooking'" ;
                                    
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
      }
      
      if (!empty($hotelCustID) && !empty($hotelBooking)){
          $sql = "update hotelbooking, hotel set hotelbooking.CustID = '$hotelCustID'
                                    
                                    where hotelbooking.HotelID = hotel.HotelID and hotel.EngName = '$hotelBooking'" ;
      
          mysqli_query($conn, $sql) or die(mysqli_error($conn));
      }
      
      
      if(mysqli_affected_rows($conn) >= 1 ){
        $updateMsg = "Update success!";
        }else
        $updateMsg = "Update Fail!";
    }
    
    if(isset($_POST['addCustomer'])){
        extract($_POST);
        $sql = "insert into customer values ('$CustID', '$Password', '$Surname', '$GivenName', '$DateOfBirth', '$Gender', '$Passport', '$MobileNo', '$Nationality', 0)";
        
      mysqli_query($conn, $sql) or die(mysqli_error($conn));
      if(mysqli_affected_rows($conn) == 1 ){
        $addMsg = "Add success!";
        }else
        $addMsg = "Add Fail!";
    }



  if(isset($_GET[ 'custid']) && strlen($_GET[ 'custid'])> 0){ 
    $sql = "Select * from customer where CustID = '{$_GET['custid']}'"; 
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    $rc = mysqli_fetch_assoc($rs); extract($rc); 
  } 
  if(isset($_GET['del-custid']) && strlen($_GET['del-custid']) > 0){ 
    $sql = "DELETE FROM customer WHERE CustID = '{$_GET['del-custid']}'"; 
    mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
  } 
?>


<div class="span6">
    <div class="widget">
        <div class="widget-header"> <i class="icon-bookmark"></i>
            <h3>Add/Update Customer Information</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            

						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active">
						    <a href="#updatecustomer" data-toggle="tab">Update a customer</a>
						  </li>
						  <li><a href="#addcustomer" data-toggle="tab">Add a new customer</a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane active" id="updatecustomer">
								  
								  <form id="edit-profile" class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
									<fieldset>

                    <div class="control-group">
                        <label class="control-label" for="CustID">Cust ID</label>
                        <div class="controls">
                            <input type="text" class="span4 disabled" id="CustID" name="CustID" value="<?php if(isset($CustID)) print $CustID; ?>" readonly>
                            <p class="help-block">Your username is for logging in and cannot be changed.</p>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Surname">Surname</label>
                        <div class="controls">
                            <input type="text" class="span4" id="Surname" name="Surname" pattern="[A-Za-z]{1,15}" title="Please enter a vaild surname e.g. Chan" placeholder="Last Name" value="<?php if(isset($Surname)) print $Surname; ?>" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="GivenName">Given Name</label>
                        <div class="controls">
                            <input type="text" class="span4" id="GivenName" name="GivenName" pattern="[A-Za-z ]{1,15}" title="Please enter a vaild givenName. e.g. Siu Ming" placeholder="First Name" value="<?php if(isset($GivenName)) print $GivenName; ?>" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Passport">Passport</label>
                        <div class="controls">
                            <input type="text" class="span4" id="Passport" name="Passport" pattern="^[A-Za-z][0-9]{7,8}$" title="Please enter a vaild passport. e.g. A123457" placeholder="Passport" value="<?php if(isset($Passport)) print $Passport; ?>" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->
                    
                    <div class="control-group">
                        <label class="control-label" for="hotelCustID">Cust ID in hotel</label>
                        <div class="controls">
                            <input type="text" class="span4" id="hotelCustID" name="hotelCustID" pattern="^[C][0-9]{3}$" title="Please enter a vaild CustID. e.g. C001" placeholder="Cust ID in hotel" value="<?php //print ; ?>">
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->
                    
                    <div class="control-group">
                        <label class="control-label" for="hotelBooking">Hotel Booking</label>
                        <div class="controls">
                            <input list="hotellist" class="span4" id="hotelBooking" name="hotelBooking" placeholder="Select one" value="<?php //print ; ?>" >
                            <datalist id="hotellist" name="hotellist">
                            <?php 
                            //where CustID = '{$_SESSION['account']}'
                              $sql = "Select * from hotelbooking, hotel where hotelbooking.HotelID = hotel.HotelID and hotelbooking.CustID = '$CustID'" ;
                              $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                              while($rc = mysqli_fetch_assoc($rs)){ 
                            ?>
                              <option value="<?php print $rc['EngName']; ?>">

                            <?php } ?>
                            </datalist>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->
                    
                    <div class="control-group">
                        <label class="control-label" for="airCustID">Cust ID in flight</label>
                        <div class="controls">
                            <input type="text" class="span4" id="airCustID" name="airCustID" pattern="^[C][0-9]{3}$" title="Please enter a vaild CustID. e.g. C001" placeholder="Cust ID in flight" value="<?php //print ; ?>" >
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->
                    
                    <div class="control-group">
                        <label class="control-label" for="airBooking">Flight Booking</label>
                        <div class="controls">
                            <input list="airlist" class="span4" id="airBooking" name="airBooking" placeholder="Select one" value="<?php //print ; ?>" >
                            <datalist id="airlist" name="airlist">
                            <?php 
                            //where CustID = '{$_SESSION['account']}'
                              $sql = "Select * from flightbooking where CustID = '$CustID'" ;
                              $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                              while($rc = mysqli_fetch_assoc($rs)){ 
                            ?>
                              <option value="<?php print $rc['FlightNo']; ?>">

                            <?php } ?>
                            </datalist>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <br>
                    <?php if(isset($updateMsg)) print "<p color='red'>$updateMsg</p>"; ?>
                    <br />


                    <div class="form-actions">
                        <button type="submit" name="updateCustomer" class="btn btn-primary">Save</button>
                        <button class="btn">Cancel</button>
                    </div>
                    <!-- /form-actions -->
                </fieldset>
            </form>
								
								
			</div>
			
			<div class="tab-pane" id="addcustomer">
				
				<form id="edit-profile" class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
				<fieldset>

                    <div class="control-group">
                        <label class="control-label" for="CustID">Cust ID</label>
                        <div class="controls">
                            <input type="text" class="span4" id="CustID" name="CustID" pattern="^[C][0-9]{3}$" title="Please enter a vaild customer id. e.g. C001" placeholder="Customer ID" value="" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Password">Password</label>
                        <div class="controls">
                            <input type="password" class="span4" id="Password" name="Password" value="" pattern=".{6,}" title="Please enter a vaild password." placeholder="Password" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->


                    <div class="control-group">
                        <label class="control-label" for="Password1">Confirm</label>
                        <div class="controls">
                            <input type="password" class="span4" id="Password1" name="Password1" pattern=".{6,}" title="Please enter a vaild confirm password." placeholder="Confirm Password" value="" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->


                    <div class="control-group">
                        <label class="control-label" for="Surname">Surname</label>
                        <div class="controls">
                            <input type="text" class="span4" id="Surname" name="Surname" pattern="[A-Za-z]{1,15}" title="Please enter a vaild surname e.g. Chan" placeholder="Last Name" value="" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->


                    <div class="control-group">
                        <label class="control-label" for="GivenName">Given Name</label>
                        <div class="controls">
                            <input type="text" class="span4" id="GivenName" name="GivenName" pattern="[A-Za-z ]{1,15}" title="Please enter a vaild givenName. e.g. Siu Ming" placeholder="First Name" value="" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->


                    <div class="control-group">
                        <label class="control-label" for="DateOfBirth">Date Of Birth</label>
                        <div class="controls">
                            <input type="date" class="span4" id="DateOfBirth" name="DateOfBirth" value="" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->


                    <div class="control-group">
                        <label class="control-label" for="Gender">Gender</label>
                        <div class="controls">
                            <input type="radio" id="Gender" name="Gender" value="M" required> Male   
                            <input type="radio" id="Gender" name="Gender" value="F" required> Female
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->


                    <div class="control-group">
                        <label class="control-label" for="Passport">Passport</label>
                        <div class="controls">
                            <input type="text" class="span4" id="Passport" name="Passport"  pattern="^[A-Za-z][0-9]{7,8}$" title="Please enter a vaild passport. e.g. A123457" placeholder="Passport" value="" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->


                    <div class="control-group">
                        <label class="control-label" for="MobileNo">Mobile No.</label>
                        <div class="controls">
                            <input type="text" class="span4" id="MobileNo" name="MobileNo" pattern="\d{4}\d{4}" title="Please enter a vaild contact number. e.g. 23456789" placeholder="Mobile Number" value="" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->


                    <div class="control-group">
                        <label class="control-label" for="Nationality">Nationality</label>
                        <div class="controls">
                            <input type="text" class="span4" id="Nationality" name="Nationality" pattern="[A-Za-z]{1,30}" title="Please enter a vaild nationality. e.g. Chinese" placeholder="Nationality" value="" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <br>
                    <?php if(isset($addMsg)) print "<p color='red'>$addMsg</p>"; ?>
                    <br />


                    <div class="form-actions">
                        <button type="submit" name="addCustomer" class="btn btn-primary">Save</button>
                        <button class="btn">Cancel</button>
                    </div>
                    <!-- /form-actions -->
                </fieldset>
            </form>
		</div>
	</div>
</div>
</div>
</div>
</div>



<div class="span6">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
            <h3>Update Your Information</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> CustID </th>
                        <th> Surname </th>
                        <th> Given Name </th>
                        <th class="td-actions"> Edit / Del</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $sql = "Select * from customer" ; 
                      $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
                      while($rc = mysqli_fetch_assoc($rs)){ 
                    ?>
                    <tr>
                        <td>
                            <?php print $rc[ 'CustID']; ?> </td>
                        <td>
                            <?php print $rc[ 'Surname']; ?> </td>
                        <td>
                            <?php print $rc[ 'GivenName']; ?> </td>

                        <td class="td-actions">
                            <a href="index.php?function=management&custid=<?php print $rc['CustID']; ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                            <a href="index.php?function=management&del-custid=<?php print $rc['CustID']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only icon-trash"> </i></a>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /widget-content -->
    </div>
</div>