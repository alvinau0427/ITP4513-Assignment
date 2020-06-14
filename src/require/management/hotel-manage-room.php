<?php
if (isset($_POST['update-hotelroom'])) {
    extract($_POST);
				if(!isset($NonSmoking))
						$NonSmoking = 0;
    $sql = "update room set NonSmoking='$NonSmoking',
    RoomSize='$RoomSize',
    RoomDesc='$RoomDesc',
    Price='$Price'
    where RoomType = '$RoomType' and HotelID = '$HotelID'";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) == 1) {
        $updateMsg = "Update success!";
    } else
        $updateMsg = "Update Fail!";
}
?>
<div class="span12">
  <div class="widget widget-table action-table">
    <div class="widget-header"> 
      <i class="icon-th-list">
      </i>
      <h3>Update Room Information
      </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <?php
      	if(isset($updateMsg)){
      ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;
        </button>
        <?=$updateMsg?>
      </div>
      <?php } ?>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <!--<th> Hotel ID </th>-->
            <th> Room Type 
            </th>
            <th> Non Smoking 
            </th>
            <th> Room Number 
            </th>
            <th> Room Size 
            </th>
            <th> Adult Number 
            </th>
            <th> Children Number 
            </th>
            <th> Room Description 
            </th>
            <th> Price 
            </th>
            <th class="td-actions"> Save
            </th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $sql = "Select * from room where HotelID = '{$_SESSION['account']}'" ;
            $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
            while($rc = mysqli_fetch_assoc($rs)){ 
          ?>
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <tr>
              <input type="hidden" style="width: 50px;" name="HotelID" value="<?php print $rc[ 'HotelID']; ?>" >
              <td> 
                <?php print $rc[ 'RoomType']; ?> 
                <input type="hidden" name="RoomType" value="<?php print $rc[ 'RoomType']; ?>">
              </td>
              <td> 
                <?php 
																				if($rc[ 'NonSmoking'] == 0)
                      $checked = '';
                    else
                      $checked = 'checked'; 
																?>
                <input type="checkbox" style="width: 50px;" name="NonSmoking" value="1" <?= $checked ?>>
              </td>
              <td> 
                <?php print $rc[ 'RoomNum']; ?> 
              </td>
              <td> 
                <input type="text" style="width: 50px;" name="RoomSize" pattern="[0-9]{1,6}" title="Please enter a valid room size. e.g. 20" value="<?php print $rc[ 'RoomSize']; ?>" required> 
              </td>
              <td> 
                <?php print $rc[ 'AdultNum']; ?> 
              </td>
              <td> 
                <?php print $rc[ 'ChildNum']; ?> 
              </td>
              <td> 
                <input type="text" style="width: 300px;" name="RoomDesc" value="<?php print $rc[ 'RoomDesc']; ?>" required> 
              </td>
              <td> 
                <input type="text" style="width: 50px;" name="Price" pattern="[0-9]{1,6}" title="Please enter a valid room size. e.g. 1000" value="<?php print $rc[ 'Price']; ?>" required> 
              </td>
              <td class="td-actions">
                <button type="submit" name="update-hotelroom" class="btn btn-small btn-success btn-icon-only icon-ok">
                </button>
              </td>
            </tr>
          </form>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /widget-content -->
  </div>
</div>
