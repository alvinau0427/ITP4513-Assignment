<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>Login - Online Travel Information system
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <meta name='apple-mobile-web-app-capable' content='yes'> 
    <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css' />
    <link href='css/bootstrap-responsive.min.css' rel='stylesheet' type='text/css' />
    <link href='css/font-awesome.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet' type='text/css'>
    <link href='css/pages/signin.css' rel='stylesheet'>
    <link href="css/pages/plans.css" rel="stylesheet"> 
    <link href="css/pages/reports.css" rel="stylesheet">
    <link href="css/pages/faq.css" rel="stylesheet"> 
    <link href="js/guidely/guidely.css" rel="stylesheet"> 
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </a>
          <a class="brand" href="index.php">Online Travel Information system
          </a>
          <div class="nav-collapse">
            <ul class="nav pull-right">
              <li class="">
                <a href="index.php" class="">
                  <i class="icon-chevron-left">
                  </i> Back to Homepage
                </a>
              </li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- /container -->
      </div>
      <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <?php
		session_start();
		extract($_SESSION);
		$typelist = array("customer"=>array("CustID", "GivenName"), 
		"hotel"=>array("HotelID", "EngName"), 
		"airline"=>array("AirlineCode", "airlineName"), 
		"staff"=>array("StaffID", "Name"));
			if(isset($authenticated)){
		if($authenticated == true){
			if(login($typelist, $account, $password)){
				if(isset($_SESSION['UrlRedirect']))
					$redir = $_SESSION['UrlRedirect'];
				else
					$redir = 'index.php';
					
			header("Location: $redir");
			exit;
			}
		}
			}
		function login($typelist, $account, $password){
			require_once("require/connection/conn.php");

			foreach ($typelist as $key => list($id, $name)) {
				$sql = "SELECT * FROM $key WHERE $id = '$account' AND Password = '$password'";
				$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
				if(mysqli_num_rows($rs) == 1){
					$rc = mysqli_fetch_assoc($rs);
					$_SESSION['authenticated'] = true;
					$_SESSION['account'] = $rc[$id];
					$_SESSION['password'] = $rc['Password'];
					$_SESSION['name'] = $rc[$name];
					$_SESSION['type'] = $key;
					mysqli_free_result($rs);
					mysqli_close($conn);
					return 1;
				}
			}
			header("location:login.php?msg=Please+confirm+your+account+data.");
		}
		extract($_POST);
		if (isset($submit)) {
			if ((strlen($account) == 0) || (strlen($password) == 0))
				header("location:login.php?msg=Please+input+your+User+ID+and+password.");
			else 
				if(login($typelist, $account, $password))
					header("Location: index.php");
		}
	?>
    <div class="account-container">
      <div class="content clearfix">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <h1>Member Login
          </h1>
          <div class="login-fields">
            <p>Please provide your details
            </p>
            <div class="field">
              <label for="username">Username
              </label>
              <input type="text" id="username" name="account" value="" placeholder="User ID" class="login username-field" />
            </div>
            <!-- /field -->
            <div class="field">
              <label for="password">Password:
              </label>
              <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field" />
            </div>
            <!-- /password -->
          </div>
          <!-- /login-fields -->
          <div class="login-actions">
            <span class="login-checkbox">
              <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
              <!--<label class="choice" for="Field">Keep me signed in</label>-->
            </span>
            <input type="submit" name="submit" value="Sign In" class="button btn btn-success btn-large">
          </div>
          <!-- .actions -->
        </form>
        <?php
			if (isset($_GET['msg']))
				echo "<font color='red'>{$_GET['msg']}</font>";
		?>
      </div>
      <!-- /content -->
    </div>
    <!-- /account-container -->
    <script src="js/jquery-1.7.2.min.js">
    </script>
    <script src="js/bootstrap.js">
    </script>
    <script src="js/signin.js">
    </script>
  </body>
</html>