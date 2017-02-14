<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=2" />
		<meta name="viewport" content="width=device-height, initial-scale=0.5"/>
		<title>BALL MAJORS</title>
		<link rel="stylesheet" type="text/css" href="css/mainStyleSheet.css" />
		<style>
			.header{
			position: absolute;
			top: calc(70% - 35px);
			left: calc(50% - 255px);
			z-index: 5;
			}
		</style>
	</head>

	<body>
	  <div class="body">
		  <div class="container">
			  <a href="logOut.php" class="button"><span>
				  <?php
						include 'include.php';		//get values for database

						$con = mysql_connect($dbhost, $dbuser, $dbpass);
						mysql_select_db($dbname) or die( 'error connecting to database' );

						$check = mysql_query("
							SELECT *
							FROM  student
							WHERE email = '" . mysql_real_escape_string($_SESSION['email']) . "' ") ;

						$row2 = mysql_fetch_array($check);

						echo $row2['firstName'];?>
						</span>Sign Out
				</a>
			</div>
			<center>

			<br><br><br><br><br><br><br>

			<div id="googleMap" style="width:50%;height:400px;"></div>

			<div class="grad"></div>
			<div class="header">

			</div>
		</center>
	</div>

	<script>
		function myMap() {
		var mapProp= {
			center:new google.maps.LatLng(51.508742,-0.120850),
			zoom:5,
		};
		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnFdsxMvi_VzLp9Pe6Cje9Fuo3V6J7Zqc&callback=myMap"></script>

	</body>

</html>
