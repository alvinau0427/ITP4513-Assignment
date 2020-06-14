<?php
    if(isset($_POST['save'])){
        extract($_POST);
        $sql = "update customer set Password='$Password', 
                                    Surname='$Surname', 
                                    GivenName='$GivenName',
                                    DateOfBirth='$DateOfBirth',
                                    Gender='$Gender',
                                    Passport='$Passport',
                                    MobileNo='$MobileNo',
                                    Nationality='$Nationality'
                                
                                    where CustID = '$CustID'" ;
      mysqli_query($conn, $sql) or die(mysqli_error($conn));
      if(mysqli_affected_rows($conn) == 1 ){
        $msg = "Update success!";
        }else
        $msg = "Update Fail!";
    }


  $sql = "Select * from customer where CustID = '$account' AND Password = '$password'" ; 
  $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
  if(mysqli_num_rows($rs) == 1 ){ 
    $rc = mysqli_fetch_assoc($rs); 
    extract($rc);
  }
    mysqli_free_result($rs);
?>


<div class="span6">
    <div class="widget">

        <div class="widget-header">
            <i class="icon-user"></i>
            <h3>Your Account</h3>
        </div>
        <!-- /widget-header -->

        <div class="widget-content">
            <?php if(isset($msg)){ ?>
                    <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?= "$msg"; ?>
                  
            </div>
            <?php } ?>
            <form id="edit-profile" class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="CustID">Cust ID</label>
                        <div class="controls">
                            <input type="text" class=" disabled" id="CustID" name="CustID" value="<?php print $CustID; ?>" readonly>
                            <p class="help-block">Your username is for logging in and cannot be changed.</p>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Password">Password</label>
                        <div class="controls">
                            <input type="password" class="span4" id="Password" name="Password" pattern=".{6,}" title="Please enter a vaild password." placeholder="Password" value="<?php print $Password; ?>" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Password1">Confirm</label>
                        <div class="controls">
                            <input type="password" class="span4" id="Password1" name="Password1"  name="Password1" pattern=".{6,}" title="Please enter a vaild confirm password." placeholder="Confirm Password" value="">
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Surname">Surname</label>
                        <div class="controls">
                            <input type="text" class="span4" id="Surname" name="Surname" pattern="[A-Za-z]{1,15}" title="Please enter a vaild surname e.g. Chan" placeholder="Last Name" value="<?php print $Surname; ?>" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="GivenName">Given Name</label>
                        <div class="controls">
                            <input type="text" class="span4" id="GivenName" name="GivenName" pattern="[A-Za-z]{1,15}[\ ][A-Za-z]{1,15}" title="Please enter a vaild givenName. e.g. Siu Ming" placeholder="First Name" value="<?php print $GivenName; ?>" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="DateOfBirth">Date Of Birth</label>
                        <div class="controls">
                            <input type="date" id="DateOfBirth" name="DateOfBirth" value="<?php print $DateOfBirth; ?>" readonly>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Gender">Gender</label>
                        <div class="controls">
                            <?php
                                if((strcmp($Gender,"M"))==0){
                            ?>
                                    <input type="radio" id="Gender" name="Gender" value="M" readonly checked> Male 
                                    <input type="radio"  id="Gender" name="Gender" value="F" disabled> Female
                            <?php    
                                }else{
                            ?>
                                    <input type="radio" id="Gender" name="Gender" value="M" disabled> Male   
                                    <input type="radio"  id="Gender" name="Gender" value="F" readonly checked> Female
                            <?php
                                }
                            ?>
                            
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Passport">Passport</label>
                        <div class="controls">
                            <input type="text" class="span4" id="Passport" name="Passport" placeholder="Passport" value="<?php print $Passport; ?>" readonly>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="MobileNo">Mobile No.</label>
                        <div class="controls">
                            <input type="text" id="MobileNo" name="MobileNo" pattern="\d{4}\d{4}" title="Please enter a vaild contact number. e.g. 23456789" placeholder="Mobile Number" value="<?php print $MobileNo; ?>" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="Nationality">Nationality</label>
                        <div class="controls">
                            <input type="text" id="Nationality" name="Nationality" name="Nationality" pattern="[A-Za-z]{1,30}" title="Please enter a vaild nationality. e.g. Chinese" placeholder="Nationality" value="<?php print $Nationality; ?>" required>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="BonusPoint">BonusPoint</label>
                        <div class="controls">
                            <input type="text" class="disabled" id="BonusPoint" name="BonusPoint" pattern="[0-9]{1,30}" title="Please enter a vaild bonus point. e.g. 5" placeholder="Bonus Point" value="<?php print $BonusPoint; ?>" readonly>
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <br>
                    
                    <br />

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                        <button class="btn">Cancel</button>
                    </div>
                    <!-- /form-actions -->
                </fieldset>
            </form>
        </div>
        <!-- /widget-content -->
    </div>
    <!-- /widget -->
</div>
<!-- /span8 -->