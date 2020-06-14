<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<title>Online Travel Information system</title>

  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
	<meta name='apple-mobile-web-app-capable' content='yes'> 
	
  <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css' />
  <link href='css/bootstrap-responsive.min.css' rel='stylesheet' type='text/css' />

  <link href='css/font-awesome.css' rel='stylesheet'>
	<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>-->
	
  <link href='css/style.css' rel='stylesheet' type='text/css'>
  <link href="css/pages/dashboard.css" rel="stylesheet">
	
	<link href="css/pages/plans.css" rel="stylesheet"> 
	<link href="css/pages/reports.css" rel="stylesheet">
	<link href="css/pages/faq.css" rel="stylesheet"> 
	<link href="js/guidely/guidely.css" rel="stylesheet"> 
	
	
</head>

<body>
	<div class='navbar navbar-fixed-top'>
		<div class='navbar-inner'>
			<div class='container'>
				<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
				</a>
					
				<a class='brand' href='index.php'>Online Travel Information system</a>

			</div>
			<!-- /container -->
		</div>
		<!-- /navbar-inner -->
	</div>
	<!-- /navbar -->
	<div class='subnavbar'>
		<div class='subnavbar-inner'>
			<div class='container'>
				<ul class='mainnav'>
					<li><a href='index.php'><i class='icon-picture'></i><span>Home</span> </a> </li>
					
					<?php
						session_start();
					if(isset($_SESSION['type'])){
						if($_SESSION['type'] == 'customer'){

					?>

					<li><a href='index.php?function=management'><i class='icon-user'></i><span>Account update</span> </a> </li>
					<li><a href='index.php?function=view-booking'><i class='icon-tasks'></i><span>View All Booking</span> </a> </li>
					
					
					<?php
						}
						if($_SESSION['type'] == 'staff'){
							
					?>
					
					<li><a href='index.php?function=search-flight'><i class='icon-plane'></i><span>Search - Flight</span> </a></li>
					<li><a href='index.php?function=search-hotel'><i class='icon-home'></i><span>Search - Hotel</span> </a> </li>
					<li><a href='index.php?function=management'><i class='icon-cog'></i><span>Customer Management</span> </a> </li>
					<li><a href='index.php?function=search-all'><i class='icon-search'></i><span>Search - All</span> </a> </li>
						
					
					<?php
						}
						
						if($_SESSION['type'] == 'hotel'){
							
					?>
					
					<li><a href='index.php?function=search-cust'><i class='icon-user'></i><span>Search - Customer</span> </a></li>
					<li><a href='index.php?function=search-room'><i class='icon-home'></i><span>Search - Room</span> </a> </li>
					<li><a href='index.php?function=management'><i class='icon-home'></i><span>Room Management</span> </a> </li>
					<li><a href='index.php?function=report-room'><i class='icon-bar-chart'></i><span>Room Report</span> </a> </li>
					
					<?php
						}
						
						if($_SESSION['type'] == 'airline'){
							
					?>
					
					<li><a href='index.php?function=search-passenger'><i class='icon-user'></i><span>Search - Passenger</span> </a></li>
					<li><a href='index.php?function=management'><i class='icon-plane'></i><span>Flight Management</span> </a> </li>
					<li><a href='index.php?function=report-airline'><i class='icon-bar-chart'></i><span>Create Report</span> </a> </li>
					
					<?php
						}
					}
					?>

					
					<?php if(isset($_SESSION['name'])){ ?>
					
					<li><a href=''><i class='icon-user-md'></i><span>Welcome, <?php print $_SESSION['name']; ?></span> </a> </li>
					<li><a href='require/logout.php'><i class='icon-signout'></i><span>Logout</span> </a> </li>

					<?php } else { ?>
					
					<li><a href='login.php'><i class='icon-user'></i><span>Login</span> </a> </li>
					
					<?php }	?>
					
					
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /subnavbar-inner -->
	</div>
	<!-- /subnavbar -->

<?php 
 require_once('require/connection/conn.php');
 extract($_SESSION);
  if(strlen($_COOKIE['PHPSESSID']) > 0)
    //setcookie('PHPSESSID', $_COOKIE['PHPSESSID'], time() + 3600);
?>
	<div class='main'>
		<div class='main-inner'>
			<div class='container'>
				<div class='row'>
				  
				  <?php 
				   if(isset($authenticated)){
  				  if(!$authenticated and isset($_GET['function'])){ 
  				    require_once('require/asklogin.html'); //ok
  				  }else if(!$authenticated){
  				    require_once('require/home/home.html'); //ok
  				  }else{
  				    if(isset($_GET['function']))
												$function = $_GET['function'];
										else
												$function = "null";
  				    switch($type){
  				      case 'customer':
  				        switch($function){
  				          case 'search-flight': require_once('require/search/cust-search-flight.php'); //ok
  				            break;
  				            
  				          case 'view-booking': require_once('require/viewBooking/cust-view-booking.php');
  				            break;
  				            
  				          case 'management': require_once('require/management/cust-manage-account.php'); //ok
  				            break;
  				            
  				          default: require_once('require/home/cust-home.php'); //ok
  				        }
  				        break;
  				        
  				      case 'staff':
  				        switch($function){
  				          case 'search-flight': require_once('require/search/staff-search-flight.php'); //ok
  				            break;
  				          
  				          case 'search-hotel': require_once('require/search/staff-search-hotel.php'); //ok
  				            break;
  				            
  				          case 'management': require_once('require/management/staff-manage-cust.php'); //ok
  				            break;
  				            
  				          case 'search-all': require_once('require/search/staff-search-all.php'); //ok
  				            break;
  				          
  				          default: require_once('require/home/home.html'); //ok
  				        }
  				        break;
  				        
  				      case 'hotel':
  				        switch($function){
  				          case 'search-cust': require_once('require/search/hotel-search-cust.php'); //ok
  				            break;
  				          
  				          case 'search-room': require_once('require/search/hotel-search-room.php'); //ok
  				            break;
  				            
  				          case 'management': require_once('require/management/hotel-manage-room.php'); //ok
  				            break;
  				          
  				          case 'report-room': require_once('require/report/hotel-room-report.php'); //ok
  				            break;
  				          
  				          default: require_once('require/home/home.html'); //ok
  				        }
  				        break;
  				        
  				      case 'airline':
  				        switch($function){
  				          case 'search-passenger': require_once('require/search/airline-search-passenger.php'); //ok
  				            break;
  				          
  				          case 'management': require_once('require/management/airline-manage-flight.php'); //ok
  				            break;
  				          
  				          case 'report-airline': require_once('require/report/airline-all-report.php');
  				            break;
  				            
  				          default: require_once('require/home/home.html'); //ok
  				        }
  				        break;
  				      
  				      default: require_once('require/asklogin.html'); //ok
  				        
  				    }
  				  }
							} else {
								require_once('require/home/home.html');
							}
				  ?>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /main-inner -->
	</div>
	<div class="footer">
		<div class="footer-inner">
			<div class="container">
				<div class="row">
					<div class="span12"> &copy; 2016 Group Project Team A05 - <a href="index.php">Online Travel Information system</a>.</div>
					<!-- /span12 -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /footer-inner -->
	</div>
	<!-- /footer -->
	<!-- Le javascript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/excanvas.min.js"></script>
	<!--<script src="js/chart.min.js" type="text/javascript"></script>-->
	<script src="js/bootstrap.js"></script>
	<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
<script src="js/base.js"></script>
</body>
</html>
<?php
  mysqli_close($conn);
?>